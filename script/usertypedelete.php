<?php
    $Entity="UserType";
    $EntityAlias="UT";
    $EntityLower=strtolower($Entity);
    $EntityCaption="User Type";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="UserType", $Where="{$Entity}UUID = '".GET(uuid)."'");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="UserType", $Where="{$Entity}UUID = ".$id[$i]."");
		}
	}
?>