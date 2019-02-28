<?php
	/*
		Script:		passwordrecover.php
		Author:		Prithu Ahmed
		Purpose:	Allows the user to provide with the email address and recover the log in detail
		Date:		Last updated 01-19-12
		Note:		
	*/
	
    $Entity="UserEmail";
    $EntityLower=strtolower($Entity);

    $User=array(
        "UserEmail"=>""
	);

    $FormTitle="Recover Account Password";
    $ButtonCaption="Recover";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="passwordrecoveraction");

	$Input=array();
    $Input[]=array("VariableName"=>"Email", "DefaultValue"=>$User["UserEmail"], "Caption"=>"Email", "ControlHTML"=>CTL_InputText("Email", $User["UserEmail"],$Title="t", "", ""), "Required"=>true);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>
