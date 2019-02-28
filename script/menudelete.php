<?php
    $Entity="Menu";
    $EntityAlias="M";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Menu";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="Menu", $Where="{$Entity}UUID = '".GET(uuid)."'");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="Menu", $Where="{$Entity}UUID = '".$id[$i]."'");
		}
	}
?>