<?php
include '../../zend_obd/Vehicle.php';

$device = new Vehicle();

$ModelNumID = $_POST["modelNumID"];
$Year = $_POST["year"];
$Type = $_POST["type"];
$manuAutomatic = $_POST["manuAutomatic"];
$Swept = $_POST["swept"];
$tanksize = $_POST["tanksize"];
$fuelConsumptionStandart = $_POST["fuelConsumptionStandart"];

$volumeRate = $_POST["volumeRate"];

$obj = $device->updateVehModelNumber($ModelNumID,$Year,$Type,$manuAutomatic,$Swept,$tanksize,$volumeRate,$fuelConsumptionStandart);
			    
$veh = $obj['resultCode'];

echo json_encode($veh);

?>