<?php
	/*
		Script:     paymentdeleteaction.php
		Author:		PRITHU AHMED
		Date:		Last updated 03-12-07
		Purpose:	
		Note:		
	*/
	
	$Entity="Payment";
	$EntityLower=strtolower($Entity);
	$EntityCaption="Payment";
	$EntityCaptionLower=strtolower($EntityCaption);

	if($_GET["uuid"]!=""){	
		SQL_Delete($Entity="Payment", $Where="{$Entity}UUID = '".GET('uuid')."'");
	}else{
		$id=explode(',',$_POST["multiple_id"]);
		for($i = 0; $i<count($id); $i++){
			SQL_Delete($Entity="Payment", $Where="{$Entity}UUID = ".$id[$i]."");
		}
	}
?>
