<?php
    $Entity="AdvertPanel";
    $EntityAlias="AP";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advert Panel";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="AdvertPanel", $Where="{$Entity}UUID = '".GET(uuid)."'");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="AdvertPanel", $Where="{$Entity}UUID = ".$id[$i]."");
		}
	}
?>