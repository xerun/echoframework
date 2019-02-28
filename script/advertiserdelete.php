<?php
    $Entity="Advertiser";
    $EntityAlias="A";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advertiser List";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="Advertiser", $Where="{$Entity}UUID = '".GET(uuid)."'");
	}else{
		$id=explode(',',$_GET["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="Advertiser", $Where="{$Entity}UUID = ".$id[$i]."");
		}
	}
?>