<?php
    $Entity="PasswordReset";
    $EntityLower=strtolower($Entity);

    $FormTitle="Password Reset";
    $ButtonCaption="Reset";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="passwordcreateaction");

	$Input=array();
    $Input[]=array("VariableName"=>"Password", "DefaultValue"=>"", "Caption"=>"Password", "ControlHTML"=>CTL_InputPassword("Password", "", "", 51), "Required"=>true);
    $Input[]=array("VariableName"=>"PasswordConfirm", "DefaultValue"=>"", "Caption"=>"Confirm Password", "ControlHTML"=>CTL_InputPassword("PasswordConfirm", "", "", 51), "Required"=>true);
	$Input[]=array("VariableName"=>"", "DefaultValue"=>"", "Caption"=>"", "ControlHTML"=>CTL_InputHidden("q", $_REQUEST["q"], "", 51), "Required"=>false);


	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>
