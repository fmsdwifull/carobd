<?php
include '../DBConnection.php';
require_once '../log4php/Logger.php';
Logger :: configure('../log4php.properties');
$logger = Logger :: getRootLogger();

$roleId = isset ($_REQUEST['roleId']) ? $_REQUEST['roleId'] : null;

$roleName = isset ($_REQUEST['roleName']) ? $_REQUEST['roleName'] : null;

$opType = isset ($_REQUEST['opType']) ? $_REQUEST['opType'] : null;

$sourceIds = isset ($_REQUEST['sourceIds']) ? $_REQUEST['sourceIds'] : null;

$logger->debug("----------------opType:------" . $opType);

//combox
if ($opType == 1 or $opType == '1') {
	mysql_select_db("IOV_demo");
	$query = "select  id as roleId,name as roleName   from  Opm_Role where name not like '%客户%'  order by id ";
	$logger->debug("----------------sql:------" . $query);
	//echo $query;
	$result = mysql_query($query);
	$numRows = mysql_num_rows($result);
	$ret = array ();
	$data = array ();
	if ($numRows > 0) {
		while ($row = mysql_fetch_object($result)) {
			$data[] = $row;
		}
		mysql_free_result($result);
	}

	//$ret['rows'] = $data;

	echo json_encode($data);
}

//list
if ($opType == 2 or $opType == '2') {
	mysql_select_db("IOV_demo");
	$query = "select  id as roleId,name as roleName   from  Opm_Role   order by id ";
	$logger->debug("----------------sql:------" . $query);
	//echo $query;
	$result = mysql_query($query);
	$numRows = mysql_num_rows($result);
	$ret = array ();
	$data = array ();
	$sql= array ();
	if ($numRows > 0) {
		while ($row = mysql_fetch_object($result)) {
			$data[] = $row;
		}
		mysql_free_result($result);
	}
	$ret['total'] = $numRows;
	$ret['rows'] = $data;

	echo json_encode($ret);
}
//delete
if ($opType == 3 or $opType == '3') {
	$sql[] = "delete from Opm_Role where id=$roleId";
	$sql[] = "delete from Opm_Role_Resource where roleId=$roleId";
	mysql_query('START TRANSACTION');
	mysql_select_db("IOV_demo");
	for ($i = 0; $i < count($sql); $i++) {
		$logger->debug("----------------sql:------" . $sql[$i]);
		if (!mysql_query($sql[$i])) {
			$err = mysql_error();
			mysql_query('ROLLBACK');
			echo 1001;
			return;
		}
	}
	mysql_query('COMMIT');
	echo 200;
}

//update
if ($opType == 4 or $opType == '4') {
	mysql_select_db("IOV_demo");
	$checkUnameSql = "select count(*) as num from Opm_Role  where name='$roleName' and  id <> $roleId ";
	$logger->debug("----------------sql:------" . $checkUnameSql);
		$checkResult = mysql_query($checkUnameSql);
		$checkRows = mysql_num_rows($checkResult);
		$num = 0;
		if ($checkRows > 0) {
			$row = mysql_fetch_array($checkResult);
			$num = $row['num'];
		}
		if ($num > 0) {
			echo 1002;
			return ;
		}
	
	$sql= array ();
	$sql[] = "update Opm_Role set name='$roleName' where id=$roleId";
	$sql[] = "delete from Opm_Role_Resource where roleId=$roleId";
	if ($sourceIds != null and $sourceIds != '') {
		$arr = explode(',', $sourceIds);
		for ($i = 0; $i < sizeof($arr); $i++) {
			$sql[] = "insert into Opm_Role_Resource(resourceId,roleId) values ($arr[$i],$roleId)";
		}
	}

	mysql_query('START TRANSACTION');
	mysql_select_db("IOV_demo");
	for ($i = 0; $i < count($sql); $i++) {
		$logger->debug("----------------sql:------" . $sql[$i]);
		if (!mysql_query($sql[$i])) {
			$err = mysql_error();
			mysql_query('ROLLBACK');
			echo 1001;
			return;
		}
	}
	mysql_query('COMMIT');
	echo 200;
}

//add
if ($opType == 5 or $opType == '5') {
	mysql_select_db("IOV_demo");
	$checkUnameSql = "select count(*) as num from Opm_Role  where name='$roleName'  ";
	$logger->debug("----------------sql:------" . $checkUnameSql);
		$checkResult = mysql_query($checkUnameSql);
		$checkRows = mysql_num_rows($checkResult);
		$num = 0;
		if ($checkRows > 0) {
			$row = mysql_fetch_array($checkResult);
			$num = $row['num'];
		}
		if ($num > 0) {
			echo 1002;
			return ;
		}
	
	
	$sql= array ();
	mysql_select_db("IOV_demo");
	$sql1 = "insert into Opm_Role (type,name) values('0','$roleName')";
	$logger->debug("----------------sql:------" . $sql1);
	if (!mysql_query($sql1)) {
		echo 1001;
		return;
	}
	$roleId = mysql_insert_id();
	if ($sourceIds != null and $sourceIds != '') {
		
		$arr = explode(',', $sourceIds);
		for ($i = 0; $i < sizeof($arr); $i++) {
			$sql[] = "insert into Opm_Role_Resource(resourceId,roleId) values (".$arr[$i]. ",$roleId)";
		}
		mysql_query('START TRANSACTION');
		mysql_select_db("IOV_demo");
		for ($i = 0; $i < count($sql); $i++) {
			$logger->debug("----------------sql:------" . $sql[$i]);
			if (!mysql_query($sql[$i])) {
				$err = mysql_error();
				mysql_query('ROLLBACK');
				echo 1001;
				return;
			}
		}
		mysql_query('COMMIT');
	}

	echo 200;
}

//role resource
if ($opType == 6 or $opType == '6') {
	mysql_select_db("IOV_demo");
	$query = "select orr.resourceId,obr.parent_menu_id as pid from Opm_Role_Resource orr,obd_Resource obr where orr.roleId=$roleId and orr.resourceId =obr.id order by orr.resourceId";
	$logger->debug("----------------sql:------" . $query);
	$result = mysql_query($query);
	$numRows = mysql_num_rows($result);
	$data = array ();
	$data1 = array ();
	if ($numRows > 0) {
		while ($row = mysql_fetch_object($result)) {
			$data[] = $row;
		}
		mysql_free_result($result);
	}
	$data1=$data;
	
	for($i=0;$i<sizeof($data);$i++){
		$tmp=$data[$i];
		for($j=0;$j<sizeof($data);$j++){
			if($data[$j]->resourceId==$tmp->pid){
				$logger->debug("----------------splice:------" . $j);
					array_splice($data,$j,1); 
			}
		
		}
		
	}

	echo json_encode($data);

}
?>