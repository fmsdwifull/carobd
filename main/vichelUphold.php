<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>车型维护</title>
    <link rel="stylesheet" type="text/css" href="../themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../demo.css">
    
    <style>
		.search{
			margin-top: 0px;
			margin-left: 47px;
			width: 231px;
			height: 24px;
			font-size: 16px;
			color: #CFCFCB;
			font-family: '楷体';
			border: 1px solid #95b8e7;
			/*border-radius: 5px;*/
			position: absolute;
			z-index: 1000;
		}
		
		.btn_search{
			position: absolute;
			z-index: 1001;
			height: 18px;
			width: 40px;
			line-height: 18px;
			padding: 5px;
			margin-left: 229px;
			text-align:center;
			background-color: #35B5BB;
			opacity: 0.8;
			font-family: '楷体';
			cursor: pointer;
			color:#333;
		}		
		
		.btn_search:hover{
			opacity: 1;
			color:#000;
		}
		
		ul{
			padding:0px;
			margin:0px;
			width:100%;
			overflow-x:hidden;
		}
		
		li{
			margin:0px;
			width:258px;
			padding-left:20px;
			height:40px;
			font-size:16px;
			line-height: 40px;
			list-style:none;
			text-align:left;
			/*background-color:#CBEDED;*/
			cursor: pointer;
			/*border-bottom:1px solid #95b8e7;*/
		}
		
		#car li{
			width:460px;	
		}
		/*#brand li:first-child,#model li:first-child{background-color:#DDF7F9;color:#900;}
		li:nth-child(2n){
			background-color:#CCC;
			opacity: .8;
			
		}*/
		
		li:hover{
			background-color:#95b8e7;
			/*color:#95b8e7;*/
		}
		
		li .car_brand{
			width:80px;
			/*font-size:16px;
			font-weight:bold;*/
		}
		
		/*li a{
			font-size:16px;
			border:1px solid #666;
			border-radius:5px;
			text-decoration:none;
			color:#000000;
			padding:5px;
		}
		
		li a:hover{
			background:#F5C28F;
			border:1px solid #ff0000;
			color:#0000ff;
		}*/
		#detail{
			position:absolute;
			border-radius:5px;
			background:#fff;
			z-index:1005;
			display:none;
			width:280px;
			height:200px;
			border:1px solid #95b8e7;
			top:0;
			left:0;
		}
		#detail span{
			display:block;
			font-size:12px;
			/*font-weight:bold;*/
			padding:5px;
			color:#0080C0;
		}
		
		#windowDiv{
			position:fixed;
			width:100%;
			height:100%;
			top:0;
			left:0;
			border:1px solid red;
			z-index:1998;
			background-color:#666;
			opacity:.8;
			display:none;
		}
		
		#addNewBrand,#addNewModel,#addNewCar{
			position:absolute;
			top:50%; 
			left:50%; 
			margin:-200px 0 0 -180px; 
			border:4px solid #95b8e7;
			width:350px;
			/*height:530px*/
			height:auto;	
			text-align:center;
			border-radius:10px;
			background-color:#ffffff;
			display:none;
			z-index:1999;
		}
		
		#addNewModel div,#addNewBrand div,#addNewCar div{
			width:100%;
			height:35px;			
		}
		
		.title{
			width:150px;
			float:left;
			/*font-weight:bold;*/
			font-size:13px;	
			text-align:right;
			line-height:35px;
		}
		
		.context{
			width:190px;
			height:35px;
			float:right;
			text-align:left;
		}
		
		.context input{
			line-height: 24px;
			margin-top: 3px;
			width: 160px;
			font-size:14px;
			padding-left:4px;
			border-radius:2px;
		}
		
		.close{
			cursor:pointer;
			float:right;
			margin:5px;
			width:20px;
			height:20px;
/*			border-radius:20px;
			border:1px solid #000000;*/
			font-size:18px;
			line-height:20px;
		}
		
		.close:hover{
			border-color:#930;
			color:#930;
		}
	</style>
    
	<script type="text/javascript" src="../jquery.min.js"></script>
	<script type="text/javascript" src="../jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../ajaxfileupload.js"></script>
</head>

<body>

	<div  style="overflow:auto;padding:0px;width:1200px;margin:0 auto;">
        
		<div  style = "width:300px;float:left;right-margin:10px">
        	<input type="text" class="search" id="searchBrand" placeholder="找品牌"/>
             	 
            <!-- <a class="btn_search" id="searchBrandSubmit">搜索</a>-->
             
             <div id="p" class="easyui-panel" title="品牌"  style="width:280px;height:600px;overflow:hidden;">	
                 <div id="tb" style="height:auto" class="datagrid-toolbar">
					<a href="javascript:void(0)" 
                        class="easyui-linkbutton l-btn l-btn-small l-btn-plain" 
                        data-options="iconCls:'icon-add',plain:true" 
                        onclick="addBrand()" 
                        group="" 
                        id="">
                        <span class="l-btn-text" style="margin-left:0px;">新增品牌</span>                    
                   </a>
				 </div>
                 
                 <div style="width:280px;height:542px;overflow-y: auto;">
                 	<ul id="brand">
                 	
                 	</ul><!--车的品牌-->
                 </div>

             </div>
             
        </div>
        
		<div  style = "width:300px;float:left;right-margin:10px">
             <input type="text" class="search" id="searchModel" placeholder="找车型"/>
             
            <!-- <a class="btn_search" id="searchModelSubmit">搜索</a>-->
             <div id="p" class="easyui-panel" title="车型"  style="width:280px;height:600px;overflow:hidden;">
             	 <div id="tb" style="height:auto" class="datagrid-toolbar">
					<a href="javascript:void(0)" 
                        class="easyui-linkbutton l-btn l-btn-small l-btn-plain" 
                        data-options="iconCls:'icon-add',plain:true" 
                        onclick="addModel()" 
                        group="" 
                        id="">
                        <span class="l-btn-text" style="margin-left:0px;">新增车型</span>                    
                   </a>
				 </div>
                 
                 <div style="width:280px;height:542px;overflow-y: auto;">
                 	<ul id="model"></ul><!--车的车型-->
                 </div>

             </div>
        </div>
        
        
        <div style = "width:500px;float:left;right-margin:10px">
             <input type="text" class="search" id="searchCar" style="width: 431px;" placeholder="找车款"/>
             
            <!-- <a class="btn_search" id="searchCarSubmit">搜索</a>-->
             <div id="p" class="easyui-panel" title="车款"  style="width:480px;height:600px;overflow:hidden;">
             	<div id="tb" style="height:auto" class="datagrid-toolbar">
					<a href="javascript:void(0)" 
                        class="easyui-linkbutton l-btn l-btn-small l-btn-plain" 
                        data-options="iconCls:'icon-add',plain:true" 
                        onclick="addCar()" 
                        group="" 
                        id="">
                        <span class="l-btn-text" style="margin-left:0px;">新增车款</span>                    
                   </a>
				 </div>
                 
                 <div style="width:480px;height:542px;overflow-y: auto;">
                 	<ul id="car"></ul><!--车的车款-->
                 </div>
                
             </div>
        </div>
      </div>  
      <div id="detail"></div>
      
      <div id="windowDiv"></div>
      
      
      <div id="addNewBrand">
      	  <form method="post" name="addNewBrand" id="addBrandForm" action="" enctype="multipart/form-data">
            <div style="line-height:35px;background-color:#95b8e7;border-radius:5px 5px 0 0;">
            	<span id="addNewBrandTitle" data-id="" 
                	style="text-align:center;font-size:18px;font-weight:bold;">新增品牌</span>
                <span class="close" id="closeAddBrand" title="关闭">X</span>
            </div>
            
          	<div>
            	<span class="title">品牌</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="brand_carBrand" 
                       style="border:1;" 
                       type="text" 
                       name="brandName" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">图标</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="brand_carImage" 
                       style="border:1;" 
                       type="file" 
                       name="brand_carImage" 	
                       value="选图标" /></span>
            </div>
            
            <div id="brandLogo" style="height: 50px;">
            	<span class="title">图标展示</span>
                <span class="context"><img src="" id="brand_image" width="50px" height="50px" style="display:none;"/></span>
            </div>
            
            
            <div id="addBrandMsg" style="line-height:35px;font-size:16px;font-family:'楷体';color:red;">
            	
            </div>
            <div style="line-height:35px;background-color:#95b8e7;border-radius:0 0 5px 5px;">
            	<input type="button" 
                	id="sureAddBrand" value="确认" onclick="return ajaxFileUpload();"
                    style="font-size: 14px;padding: 4px;width: 60px;border-radius: 10px;margin-top: 5px;"/>
            </div>
          </form>
      </div>
      
      <div id="addNewModel">
      	  <form method="post" name="addNewModel">
            <div style="line-height:35px;background-color:#95b8e7;border-radius:5px 5px 0 0;">
            	<span id="addNweModelTitle" data-id="" style="text-align:center;font-size:18px;font-weight:bold;">新增车型</span>
                <span class="close" id="closeAddModel" title="关闭">X</span>
            </div>
            
          	<div>
            	<span class="title">品牌</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="model_carBrand" 
                       style="border:1;" 
                       type="text" 
                       name="brandName" 
                       value="" 
                       disabled="disabled"/></span>
            </div>
            <div>
            	<span class="title">车型</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="model_carModel" 
                       style="border:1;" 
                       type="text" 
                       name="modelName" 
                       value="" /></span>
            </div>
            <div id="addModelMsg" style="line-height:35px;font-size:16px;font-family:'楷体';color:red;">
            	
            </div>
            <div style="line-height:35px;background-color:#95b8e7;border-radius:0 0 5px 5px;">
            	<input type="button" 
                	id="sureAddModel" value="确认" 
                    style="font-size: 14px;padding: 4px;width: 60px;border-radius: 10px;margin-top: 5px;"/>
            </div>
          </form>
      </div>
      
      <div id="addNewCar">
      	  <form method="post" name="addNewCar">
            <div style="line-height:35px;background-color:#95b8e7;border-radius:5px 5px 0 0;">
            	<span id="addNewCarTitle" data-id="" style="text-align:center;font-size:18px;font-weight:bold;">新增车款</span>
                <span class="close" id="closeAddCar" title="关闭">X</span>
            </div>
            
          	<div>
            	<span class="title">品牌</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="car_carBrand" 
                       style="border:1;" 
                       type="text" 
                       name="brandName" 
                       value="" 
                       disabled="disabled"/></span>
            </div>
            <div>
            	<span class="title">车型</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="car_carModel" 
                       style="border:1;" 
                       type="text" 
                       name="modelName" 
                       value="" 
                       disabled="disabled"/></span>
            </div>
            <div>
            	<span class="title">年份</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="year" 
                       style="border:1;" 
                       type="text" 
                       name="year" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">车款</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="carNum" 
                       style="border:1;" 
                       type="text" 
                       name="carName" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">变速箱形式</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="manuAutomatic" 
                       style="border:1;" 
                       type="text" 
                       name="manuAutomatic" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">排量(L)</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="swept" 
                       style="border:1;" 
                       type="text" 
                       name="swept" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">发动机容积率</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="volumeRate" 
                       style="border:1;" 
                       type="text" 
                       name="volume_rate" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">燃油箱容积</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="tanksize" 
                       style="border:1;" 
                       type="text" 
                       name="tanksize" 
                       value="" /></span>
            </div>
            <div>
            	<span class="title">官方油耗(L/100km)</span>
                <span class="context"><input class="easyui-validatebox textbox validatebox-text" 
                	   id="fuelConsumptionStandart" 
                       style="border:1;" 
                       type="text" 
                       name="fuelConsumptionStandart" 
                       value="" /></span>
            </div>
            
            <div id="addCarMsg" style="line-height:35px;font-size:16px;font-family:'楷体';color:red;">
            	
            </div>
            
            <div style="line-height:35px;background-color:#95b8e7;border-radius:0 0 5px 5px;">
            	<input type="button" 
                	id="sureAddCar" value="确认" 
                    style="font-size: 14px;padding: 4px;width: 60px;border-radius: 10px;margin-top: 5px;"/>
            </div>
          </form>
      </div>
	
	<script> 
		var brandID;//保存当前被双击的车品牌id
		var modelId;//保存当前被双击的车型id
		var brandName;//保存当前被双击的品牌
		var modelName;//保存当前被双击的车型
	
		$(function(){
			
			$(".search").click(function(){
				//$(this).focus();
				
				var value = $.trim($(this).val());
				if(value == "找品牌" || value == "找车型" || value == "找车款"){
					$(this).select();
				}
				$(this).css({"color":"#000000"});	
			}).blur(function(){
				$(this).css({"color":"#CFCFCB"});	
			});
			
			getBrand();
			
			/*//点击搜索按钮时触发查找品牌
			$("#searchBrandSubmit").click(function(){
				getBrand();	
			});*/
			
			//绑定搜索框，当它的值发生改变的时候触发，查找品牌
			$("#searchBrand").bind('propertychange input change',function(e){  
			    getBrand();  
			});  
			
			
			/*//点击搜索按钮时触发查找车型
			$("#searchModelSubmit").click(function(){
				lookBrand(brandID,brandName);
			});*/
			
			//绑定搜索框，当它的值发生改变的时候触发，查找车型
			$("#searchModel").bind('propertychange input change',function(e){  
			    lookBrand(brandID,brandName);  
			}); 
			
		/*	//点击搜索按钮时触发查找车款
			$("#searchCarSubmit").click(function(){
				lookCar(modelId,modelName);
			});*/
			
			//绑定搜索框，当它的值发生改变的时候触发，查找车款
			$("#searchCar").bind('propertychange input change',function(e){  
			    lookCar(modelId,modelName);  
			});
			
			$("#closeAddModel").bind("click",function(){
				$("#addModelMsg").html("");
				$("#windowDiv,#addNewModel").hide();
			});
			
			
			$("#brand_carImage").live("change",function(){
				//alert(1);
				var image = $(this).val();
				
				 if(!/.(gif|jpg|jpeg|png|gif|jpg|png)$/i.test(image)){
					//alert("图片类型只能是.gif,jpeg,jpg,png中的一种");
					$("#brand_image").attr("src","").hide();
					$("#addBrandMsg").html("图片类型只能是gif,jpeg,jpg,png中的一种");
					return;
				 }				
				$("#addBrandMsg").html("");
				//console.info(this.files[0]);
				
				var imgUrl = getObjectURL(this.files[0]);
				
				if(imgUrl){
					$("#brand_image").attr({"src":imgUrl,"data-src":image}).show();	
				}
					
			});
			
			
			
			
			$("#closeAddBrand").bind("click",function(){
				$("#windowDiv,#addNewBrand").hide();
				
				$("#brand_carBrand").val("");
				$("#brand_carImage").val("");
				$("#addBrandMsg").html("");
				
				$("#addNewBrandTitle").text("新增品牌");
				$("#addNewBrandTitle").attr("data-id","");
				$("#brand_image").attr("src","").hide();
				
			});
			
			$("#sureAddModel").bind("click",function(){
				var model_carModel = $.trim($("#model_carModel").val());
				if(model_carModel == ""){
					$("#addModelMsg").html("* 车型必须输入！");
					$("#model_carModel").focus();
					return ;
				}
				
				var title = $("#addNweModelTitle").html();
				
				if(title == "新增车型"){
					$.post("../service/addModel.php",
					{
						
						//$ModelName = $_POST["modelName"];$BrandID = $_POST["brandID"];
						modelName:model_carModel,
						brandID:brandID
					},
					function(data,status){
						var rows = eval(data);

						if(rows=="200"){
							lookBrand(brandID,brandName);
							$("#addModelMsg").html("");
							$("#model_carModel").val("");
							$("#windowDiv,#addNewModel").hide();
						}else if(rows=="1016"){						
							//alert("该车款已经存在！");
							$("#model_carModel").select();
							$("#addModelMsg").html("* 该车型已经存在！");
						}
					});	
				}else if(title == "修改车型"){
					
					var modelId = $("#addNweModelTitle").attr("data-id");
					
					$.post("../service/updateModel.php",
						{modelName:model_carModel,modelId:modelId},
						function(data,status){
							var rows = eval(data);
	
							if(rows=="200"){
								lookBrand(brandID,brandName);
								$("#addModelMsg").html("");
								$("#model_carModel").val("");
								$("#windowDiv,#addNewModel").hide();
							}else if(rows=="1001"){						
								alert("修改失败");
								
							}
						});		
						
				}
				
			});
			
			//关闭 增加车款 的弹出框
			$("#closeAddCar").bind("click",function(){
				$("#addCarMsg").html("");
				$("#windowDiv,#addNewCar").hide();
			});
			
			//增加车款的 提交与验证输入函数
			$("#sureAddCar").bind("click",function(){
				
				var title = $("#addNewCarTitle").html();
				var volumeRate = $.trim($("#volumeRate").val());//发动机容积率
				var year = $.trim($("#year").val());
				var type = $.trim($("#carNum").val());
				var manuAutomatic = $.trim($("#manuAutomatic").val());
				var swept = $.trim($("#swept").val());
				var tanksize = $.trim($("#tanksize").val());
				var fuelConsumptionStandart = $.trim($("#fuelConsumptionStandart").val());
				
				if(type == ""){;
					$("#addCarMsg").html("* 车款必须输入！");
					$("#carNum").focus();
					return ;	
				}
				
				/**************这里还应该对其他 的input值进行验证*************/
				
				/*alert(modelId+"->"+year+"->"+type+"->"+swept+"->"+
					manuAutomatic+"->"+tanksize+"->"+fuelConsumptionStandart);*/	
				
				if(title == "新增车款"){
					
					$.post("../service/addVehicleNumber.php",
						{
							modelId:modelId,
							year:year,
							type:type,
							swept:swept,
							tanksize:tanksize,
							fuelConsumptionStandart:fuelConsumptionStandart,
							manuAutomatic:manuAutomatic,
							volumeRate:volumeRate
						},
						function(data,status){
							var rows = eval(data);
							//alert(rows);
							if(rows=="200"){
								lookCar(modelId,modelName);
								$("#addCarMsg").html("");
								
								$("#carNum").val("");
								$("#year").val("");
								$("#manuAutomatic").val("");
								$("#swept").val("");
								$("#tanksize").val("");
								$("#volumeRate").val("");
								$("#fuelConsumptionStandart").val("");
								
								$("#windowDiv,#addNewCar").hide();
							}else if(rows=="1017"){						
								//alert("该车款已经存在！");
								$("#carNum").select();
								$("#addCarMsg").html("* 该车款已经存在！");
							}else{
								alert("添加失败");	
							}
					});	
				}else if(title == "修改车款"){
					var modelNumID = $("#addNewCarTitle").attr("data-id");
					$.post("../service/updateVehModelNumber.php",
						{
							modelNumID:modelNumID,
							year:year,
							type:type,
							swept:swept,
							tanksize:tanksize,
							fuelConsumptionStandart:fuelConsumptionStandart,
							manuAutomatic:manuAutomatic,
							volumeRate:volumeRate
						},
						function(data,status){
							var rows = eval(data);
	
							if(rows=="200"){
								lookCar(modelId,modelName);
								$("#addCarMsg").html("");
								
								$("#carNum").val("");
								$("#year").val("");
								$("#manuAutomatic").val("");
								$("#swept").val("");
								$("#tanksize").val("");
								$("#volumeRate").val("");
								$("#fuelConsumptionStandart").val("");
								
								$("#windowDiv,#addNewCar").hide();
								//alert("修改成功");
							}else if(rows=="1001"){						
								alert("修改失败");
							}
					});
				}
				
				
				
			});
			
		});
		
		
		function getBrand(){
			var brand = $.trim($("#searchBrand").val());
			if(brand == "找品牌"){
				brand = "";
			}
			
			$.post("../service/getBrand.php",{brand:brand},function(result){
				var json = eval(result);  
				
				var ulContext = "";
				
				$.each(json,function(i,n){ 
					if(i == 0){
						brandID = json[0].BrandID;
						brandName = json[0].Brand;
						//alert(brandName);	
					}
				 
					var id = json[i].BrandID;  
					var brand = json[i].Brand;//根据索引取值 
					//var brandEn = json[i].Brand_en;
					//var logo = json[i].Logo; 
					
					ulContext += "<li data='"+id+"' ondblclick=\"lookBrand("+id+",'"+brand+"')\"><span class='car_brand'>"+
						brand+
						"</span><span style='float: right;padding-right: 20px;'>"+
						/*"<a href='javascript:;' "+
							"class='update' "+
							"onclick='updateBrand("+id+")'><span class='l-btn-icon icon-edit'>&nbsp;</span></a>"+
						"<a href='javascript:;' style='margin-left:10px;'"+
							"class='update' "+
							"onclick='deleteBrand("+id+")'><span class='l-btn-icon icon-remove'>&nbsp;</span></a>"+*/
						"<a title='修改' href='javascript:void(0)' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' data-options='iconCls:'icon-remove',plain:true' onclick='updateBrand("+id+",\""+brand+"\")' group='' style='margin-top:8px;' id=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>&nbsp;</span><span class='l-btn-icon icon-edit'>&nbsp;</span></span></a>"+						
						"<a title='移除' href='javascript:void(0)' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' data-options='iconCls:'icon-remove',plain:true' onclick='deleteBrand("+id+",\""+brand+"\")' group='' style='margin-top:8px;' id=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>&nbsp;</span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a>"+
"</span>"+
"</li>";
					
				}); 
				$("#brand").html(ulContext);
				//$('#brand li:eq(0)').css({'background-color':'#DDF7F9','color':'#900'});
				lookBrand(brandID,brandName);//当品牌加载完成时，就加载第一项的车型做为第二个div(车型)中的值
			});	
			
			
			
		}
		
		//修改品牌信息，当前品牌的id与name
		function updateBrand(id,brand_name){
			$("#windowDiv,#addNewBrand").show();
			$("#brand_carBrand").val(brand_name);
			
			$("#addNewBrandTitle").text("修改品牌");
			$("#addNewBrandTitle").attr("data-id",id);
			
			$.post("../service/getBrandLogo.php",
				{brandId:id},
				function(data,status){
					var rows = eval(data);
					$("#brand_image").attr("src","../"+rows[0].Logo).show();
					$("#brand_carImage").attr("data-src","../"+rows[0].Logo);					
				}				
			);		
		}
		
		function deleteBrand(id,name){
			if(confirm("确定要删除品牌 "+name+" 吗？")){
			
				$.post("../service/deleteBrand.php",
					{brandId:id},
					function(data,status){
						var rows = eval(data);
						
						if(rows == "1005"){
							alert("该品牌下有车款车辆正在使用,请先停止其使用后再删除品牌:"+name);	
						}else if(rows == "200"){
							alert("删除成功");
							getBrand();	
						}else if(rows == "1001"){
							alert("未知错误:删除失败");	
						}
												
					}
									
				);
				
			}
			
		}
		
		function lookBrand(id,brand){
			//$('#brand li:eq(0)').css({'background-color':'','color':''});
			brandID = id;
			brandName = brand;
			//alert(brandName);
			var model = $.trim($("#searchModel").val());
			if(model == "找车型"){
				model = "";
			}			
			
			$("#brand li").css({"background-color":""});
			$("#brand li[data='"+id+"']").css({"background-color":"#E0ECFF"});
			
			$.post("../service/getModel.php",{brandId:id,model:model},function(result){
				var json = eval(result);  
				
				var ulContext = "";
				var json_length = json.length;
				$.each(json,function(i,n){  
					
					if(i == 0){
						modelId = json[0].ModelID;
						modelName = json[0].ModelName;  
					}
				
					var id = json[i].ModelID;  
					var name = json[i].ModelName;//根据索引取值 
					
					ulContext += "<li data='"+id+"' ondblclick=\"lookCar("+id+",'"+name+"')\"><span class='car_brand'>"+
						name+
						"</span><span style='float: right;padding-right: 20px;'>"+
						/*"<a href='javascript:;' "+
							"class='update' "+
							"onclick='updateModel("+id+",\""+name+"\")'><span class='l-btn-icon icon-edit'>&nbsp;</span></a>"+
						"<a href='javascript:;' style='margin-left:10px;'"+
							"class='update' "+
							"onclick='deleteModel("+id+")'><span class='l-btn-icon icon-remove'>&nbsp;</span></a>"+*/
						"<a title='修改' href='javascript:void(0)' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' data-options='iconCls:'icon-remove',plain:true' onclick='updateModel("+id+",\""+name+"\")' group='' style='margin-top:8px;' id=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>&nbsp;</span><span class='l-btn-icon icon-edit'>&nbsp;</span></span></a>"+						
						"<a title='移除' href='javascript:void(0)' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' data-options='iconCls:'icon-remove',plain:true' onclick='deleteModel("+id+",\""+name+"\")' group='' style='margin-top:8px;' id=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>&nbsp;</span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a>"+
"</span>"+
"</li>";
					
				}); 
				$("#model").html(ulContext);
				//$('#model li:eq(0)').css({'background-color':'#DDF7F9','color':'#900'});
				if(json_length > 0){
					lookCar(modelId,modelName);//当品牌下有车型时则加载
				}else{
					$("#car").html("");//若品牌下没有车型则为空
				}
				
			});
		}
		
		function updateModel(id,name){
			//alert("修改"+id+name);	
			$("#windowDiv,#addNewModel").show();
			
			$("#addNweModelTitle").html("修改车型");
			
			$("#model_carBrand").val(brandName);

			$("#addNweModelTitle").attr("data-id",id);
			
			$("#model_carModel").val(name);
			
		}
		
		function deleteModel(id,name){
			if(confirm("确定要删除车型 "+name+" 吗？")){
				$.post("../service/deleteModel.php",
					{modelId:id},
					function(data,status){
						var rows = eval(data);
	
						if(rows=="200"){
							lookBrand(brandID,brandName);
						}else if(rows=="1001"){						
							alert("删除失败！");
						}else if(rows == "1005"){							
							alert("该车型下有车款中的车辆正在使用，请先停止使用后再删除车型:"+name);	
						}
				});	
			}
		}
		
		function lookCar(id,name){
			modelId = id;
			modelName = name;
			var flag = $.trim($("#searchCar").val());
			if(flag == "找车款"){
				flag = "";
			}			
			
			//双击一个li后，让它的背景色改变
			$("#model li").css({"background-color":""});
			$("#model li[data='"+id+"']").css({"background-color":"#E0ECFF"});
			
			
			
			$.post("../service/getCar.php",{modelId:id,flag:flag},function(result){
				var json = eval(result);  
				//alert(id+"======"+flag+"====="+result);
				var ulContext = "";
				
				$.each(json,function(i,n){  				
					var id = json[i].ModelNumID;  
					var name = json[i].Type;//根据索引取值
					var year = json[i].Year;
					var manuAutomatic = json[i].manuAutomatic;
					var swept = json[i].Swept; 
					var tanksize = json[i].tanksize;
					var fuelConsumptionStandart = json[i].fuelConsumptionStandart;
					var volumeRate = json[i].volume_rate;
					
					ulContext += "<li data='"+id+"' "+
						"onmousemove='carMove("+id+",\""+name+"\","+year+",\""+manuAutomatic+"\",\""+swept+"\",\""+tanksize+"\",\""+volumeRate+"\",\""+fuelConsumptionStandart+"\")' "+ 
						"onmouseout='carOut()'><span class='car_brand'>"+
						name+"</span><span style='float: right;padding-right: 20px;'>"+
						/*"<a href='javascript:;' "+
							"class='update' "+
							"onclick='updateCar("+id+")'><span class='l-btn-icon icon-edit'>&nbsp;</span></a>"+
						"<a href='javascript:;' style='margin-left:10px;'"+
							"class='update' "+
							"onclick='deleteCar("+id+")'><span class='l-btn-icon icon-remove'>&nbsp;</span></a>"+*/
						"<a title='修改' href='javascript:void(0)' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' data-options='iconCls:'icon-remove',plain:true' onclick='updateCar("+id+",\""+name+"\",\""+year+"\",\""+manuAutomatic+"\",\""+swept+"\",\""+tanksize+"\",\""+volumeRate+"\",\""+fuelConsumptionStandart+"\")' group='' style='margin-top:8px;' id=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>&nbsp;</span><span class='l-btn-icon icon-edit'>&nbsp;</span></span></a>"+						
						"<a title='移除' href='javascript:void(0)' class='easyui-linkbutton l-btn l-btn-small l-btn-plain' data-options='iconCls:'icon-remove',plain:true' onclick='deleteCar("+id+",\""+name+"\")' group='' style='margin-top:8px;' id=''><span class='l-btn-left l-btn-icon-left'><span class='l-btn-text'>&nbsp;</span><span class='l-btn-icon icon-remove'>&nbsp;</span></span></a>"+
"</span>"+
"</li>";
					
				}); 
				$("#car").html(ulContext);
			});	
		}
		
		function carMove(id,name,year,manuAutomatic,swept,tanksize,volumeNum,fuelConsumptionStandart){
			mouse = new MouseEvent();
			//这里可得到鼠标X坐标
			var pointX = mouse.x;
			//这里可以得到鼠标Y坐标
			var pointY = mouse.y;
			
			//alert(pointX);
			$("#detail").show()
				.css({"top": pointY+15+"px","left":pointX+15+"px"})
				//.css({"top": pointY-90+"px","left":pointX+15+"px"})
				.html("<span>ModelNumId:"+id+"</span><span>年份："+year+"</span><span>车款名："+name+"</span><span>变速箱："+manuAutomatic+"</span><span>排量："+swept+"</span><span>发动机容积率："+volumeNum+"</span><span>油箱容积："+tanksize+"</span><span>官方油耗："+fuelConsumptionStandart+"</span>");
		}
		
		function carOut(){
			$("#detail").hide();	
		}
		
		 //获取鼠标坐标函数
        var MouseEvent = function() {
			var evt = getEvent(); // 获取event对象
            this.x = evt.pageX;
            this.y = evt.pageY;
        }
		
		function getEvent(){  //同时兼容ie和ff的写法,得到浏览器事件  
			if(document.all)  return window.event;     
			func=getEvent.caller;         
			while(func!=null){   
				var arg0=func.arguments[0];  
				if(arg0){  
				  if((arg0.constructor==Event || arg0.constructor ==MouseEvent) 
						|| (typeof(arg0)=="object" && arg0.preventDefault && arg0.stopPropagation)){  
						 
				  	return arg0;  
					
				  } 
				   
				} 
				 
				func=func.caller;  
			}  
			
			return null;  
		}
	
		function updateCar(id,name,year,manuAutomatic,swept,tanksize,volumeRate,fuelConsumptionStandart){
			$("#windowDiv,#addNewCar").show();
			
			$("#addNewCarTitle").html("修改车款");
			
			$("#car_carBrand").val(brandName);
			$("#car_carModel").val(modelName);
			
			$("#addNewCarTitle").attr("data-id",id);
			
			$("#year").val(year);
			$("#carNum").val(name);
			$("#volumeRate").val(volumeRate);
			$("#manuAutomatic").val(manuAutomatic);
			$("#tanksize").val(tanksize);
			$("#swept").val(swept);
			$("#fuelConsumptionStandart").val(fuelConsumptionStandart);
			
		}
		
		function deleteCar(id,name){
			
			 if(confirm("确定要删除车款 "+name+" 吗？")){
				$.post("../service/deleteVehicleNumber.php",
					{modelNumID:id},
					function(data,status){
						var rows = eval(data);
	
						if(rows=="200"){
							lookCar(modelId,modelName);
						}else if(rows=="1001"){						
							alert("删除失败！");
						}else if(rows=="1005"){
							alert("该车款下有车辆正在使用,请先停止其使用后再删除车款:"+name);	
						}
				});	
			}
		}
		
		/*function lookDetail(id){
			alert("查看详细内容,估计可废除它了"+id);	
		}*/
		
		function addBrand(){
			$("#windowDiv,#addNewBrand").show();
		}
		
		function addModel(){
			//alert(brandName+"("+brandID+")->新增加车型"+brandID);
				
			$("#windowDiv,#addNewModel").show();
			
			$("#addNweModelTitle").html("新增车型");
			
			$("#model_carBrand").val(brandName);
		}
		
		function addCar(){
			//alert(brandName+"("+brandID+")->"+modelName+"("+modelId+")->新增加车款"+modelId);	
			$("#windowDiv,#addNewCar").show();
			
			$("#addNewCarTitle").html("新增车款");
			
			$("#car_carBrand").val(brandName);
			$("#car_carModel").val(modelName);
			
			$("#carNum").val("");
			$("#volumeRate").val("");
			$("#year").val("");
			$("#manuAutomatic").val("");
			$("#swept").val("");
			$("#tanksize").val("");
			$("#fuelConsumptionStandart").val("");
			
		}
		
		
		//建立一個可存取到該file的url
		function getObjectURL(file) {
			var url = null ; 
			if (window.createObjectURL!=undefined) { // basic
				url = window.createObjectURL(file) ;
			} else if (window.URL!=undefined) { // mozilla(firefox)
				url = window.URL.createObjectURL(file) ;
			} else if (window.webkitURL!=undefined) { // webkit or chrome
				url = window.webkitURL.createObjectURL(file) ;
			}
			return url ;
		}
		
		
		//新建品牌  图片上传异步提交 函数
		function ajaxFileUpload(){
			
			var carBrand = $.trim($("#brand_carBrand").val());
			if(carBrand == ""){
				$("#addBrandMsg").html("* 品牌不能为空！");
				$("#brand_carBrand").focus();
				return ;
			}
			
			var title = $("#addNewBrandTitle").html();
			
			var image = $("#brand_image").attr("src");
			
			if(title == "新增品牌"){
				$.ajaxFileUpload(
					{
						url:'../service/addBrand.php',
						secureuri:false,
						fileElementId:'brand_carImage',
						dataType: 'text',
						data:{brandName:carBrand,imageURL:image},
						success: function (data, status)
						{
							//console.info(data);
							var rows = eval(data);

							if(rows=="200"){
								getBrand();
								$("#windowDiv,#addNewBrand").hide();
								$("#brand_carBrand").val("");
								$("#brand_carImage").val("");
								$("#addBrandMsg").html("");
								
								$("#addNewBrandTitle").text("新增品牌");
								$("#addNewBrandTitle").attr("data-id","");
								$("#brand_image").attr("src","").hide();
							}else if(rows=="1015"){
								$("#brand_carBrand").select();
								$("#addBrandMsg").html("* 该品牌已经存在！");
							}
						},
						error: function (data, status, e)
						{
							alert(e);
						}
					}
				);
			}else if(title == "修改品牌"){
				var brandId = $("#addNewBrandTitle").attr("data-id");
				
				var imagePath = $("#brand_carImage").val();
				
				//console.info("path:"+imagePath);
				
				$.ajaxFileUpload(
					{
						url:'../service/updateBrand.php',
						secureuri:false,
						fileElementId:'brand_carImage',
						dataType: 'text',
						data:{brandName:carBrand,brandId:brandId,imageURL:image},
						success: function (data, status)
						{
							//alert(data);
							//console.info(data);
							var rows = eval(data);

							if(rows=="200"){
								getBrand();
								
								$("#windowDiv,#addNewBrand").hide();
								$("#brand_carBrand").val("");
								$("#brand_carImage").val("");
								$("#addBrandMsg").html("");
								
								$("#addNewBrandTitle").text("新增品牌");
								$("#addNewBrandTitle").attr("data-id","");
								$("#brand_image").attr("src","").hide();
								
							}else if(rows=="1001"){
								//$("#brand_carBrand").select();
								$("#addBrandMsg").html("* 修改失败！");
							}
						},
						error: function (data, status, e)
						{
							alert(e);
						}
					}
				);	
					
			}
			return false;	
		}	
		
	</script>

</body>
</html>