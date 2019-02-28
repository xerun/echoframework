<?php
    $Entity="PasswordReset";
    $EntityLower=strtolower($Entity);

    //$User=SQL_Select($Entity="User", $Where="U.UserID = {$_SESSION["UserID"]}", $OrderBy="", $SignleRow=true, $Debug=false);
    //$User["UserPassword"]=$User["UserPasswordConfirm"]="";

    $FormTitle="Change your password";
    $ButtonCaption="Update";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="passwordresetupdate");

	$Input=array();
    $Input[]=array("VariableName"=>"CurrentPassword", "DefaultValue"=>"", "Caption"=>"Current Password", "ControlHTML"=>CTL_InputPassword("CurrentPassword", "", "", 51), "Required"=>true);
    $Input[]=array("VariableName"=>"NewPassword", "DefaultValue"=>"", "Caption"=>"New Password", "ControlHTML"=>CTL_InputPassword("NewPassword", "", "", 51), "Required"=>true);
    $Input[]=array("VariableName"=>"ConfirmPassword", "DefaultValue"=>"", "Caption"=>"Confirm New Password", "ControlHTML"=>CTL_InputPassword("ConfirmPassword", "", "", 51), "Required"=>true);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>
