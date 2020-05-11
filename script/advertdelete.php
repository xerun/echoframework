<?php
    $Entity="Advert";
    $EntityAlias="A";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advert";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="Advert", $Where="{$Entity}UUID = '".GET('uuid')."'");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="Advert", $Where="{$Entity}UUID = ".$id[$i]."");
		}
	}
?>