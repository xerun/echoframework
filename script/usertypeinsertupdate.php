<?php
    $Entity="UserType";
    $EntityAlias="UT";
    $EntityLower=strtolower($Entity);
    $EntityCaption="User Type";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $UserType=array(
        "UserTypeName"=>"",
        "UserTypeDescription"=>"",
        "UserTypePicture"=>"",
        "UserTypeIsActive"=>1,
        "IsServiceProvider"=>0
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$UserType=SQL_Select($Entity="UserType", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST(uuid)."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	$Input=array();
    $Input[]=array("VariableName"=>"UserTypeName", "DefaultValue"=>$UserType["UserTypeName"], "Caption"=>"Type", "ControlHTML"=>CTL_InputText("UserTypeName", $UserType["UserTypeName"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"UserTypeDescription", "DefaultValue"=>$UserType["UserTypeDescription"], "Caption"=>"Description", "ControlHTML"=>CTL_InputTextArea($Name="UserTypeDescription", $Value=$UserType["UserTypeDescription"], $Columns=89, $Rows=3), "Required"=>false);
    //$Input[]=array("VariableName"=>"", "DefaultValue"=>"", "Caption"=>"", "ControlHTML"=>"<a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="imagestorebrowser")."\">Image Browser</a>", "Required"=>false);
    $Input[]=array("VariableName"=>"UserTypePicture", "DefaultValue"=>$UserType["UserTypePicture"], "Caption"=>"Image", "ControlHTML"=>CTL_ImageUpload($ControlName="UserTypePicture", $Application["UploadPath"], $CurrentImage=$UserType["UserTypePicture"], $AllowDelete=$UpdateMode, $Class="FormTextInput", $ThumbnailHeight=100, $ThumbnailWidth=0, $Preview=$UpdateMode), "Required"=>false);
    $Input[]=array("VariableName"=>"UserTypeIsActive", "DefaultValue"=>$UserType["UserTypeIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="UserTypeIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$UserType["UserTypeIsActive"]), "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>