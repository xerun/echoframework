<?php
    $Entity="User";
    $EntityAlias="U";
    $EntityLower=strtolower($Entity);
    $EntityCaption="User";
    $EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="User", $Where="{$Entity}UUID = '".GET(uuid)."' AND IsParmanent = 0");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="User", $Where="{$Entity}UUID = ".$id[$i]." AND IsParmanent=0");
		}
	}
?>