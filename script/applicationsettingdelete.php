<?php
    $Entity="ApplicationSetting";
    $EntityAlias="APS";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Application Setting";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="ApplicationSetting", $Where="{$Entity}UUID = '".GET(uuid)."' AND IsParmanent!=1");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="ApplicationSetting", $Where="{$Entity}UUID = ".$id[$i]." AND IsParmanent!=1");
		}
	}
?>