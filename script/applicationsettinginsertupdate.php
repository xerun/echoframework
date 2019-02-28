<?php
   $Entity="ApplicationSetting";
    $EntityAlias="APS";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Application Setting";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $ApplicationSetting=array(
        "ApplicationSettingName"=>"",
        "ApplicationSettingValue"=>"",
        "ApplicationSettingDescription"=>"",
        //"ApplicationSettingInputTypeName"=>"",
        //"ApplicationSettingIsHidden"=>0,
        //"ApplicationSettingIsLocked"=>0,
        "ApplicationSettingIsActive"=>1
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$ApplicationSetting=SQL_Select($Entity="ApplicationSetting", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST(uuid)."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	$Input=array();
    if($UpdateMode){
		$Input[]=array("VariableName"=>"ApplicationSettingName", "DefaultValue"=>$ApplicationSetting["ApplicationSettingName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("ApplicationSettingName", $ApplicationSetting["ApplicationSettingName"], "", true,"","","true"), "Required"=>true);
	}else{
		$Input[]=array("VariableName"=>"ApplicationSettingName", "DefaultValue"=>$ApplicationSetting["ApplicationSettingName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("ApplicationSettingName", $ApplicationSetting["ApplicationSettingName"], "", true), "Required"=>true);
	}
    $Input[]=array("VariableName"=>"ApplicationSettingValue", "DefaultValue"=>$ApplicationSetting["ApplicationSettingValue"], "Caption"=>"Value", "ControlHTML"=>CTL_InputText("ApplicationSettingValue", $ApplicationSetting["ApplicationSettingValue"], "", true), "Required"=>false);
    $Input[]=array("VariableName"=>"ApplicationSettingDescription", "DefaultValue"=>$ApplicationSetting["ApplicationSettingDescription"], "Caption"=>"Description", "ControlHTML"=>CTL_InputTextArea($Name="ApplicationSettingDescription", $Value=$ApplicationSetting["ApplicationSettingDescription"], $Columns=61, $Rows=3), "Required"=>false);
    //$Input[]=array("VariableName"=>"ApplicationSettingInputTypeName", "DefaultValue"=>$ApplicationSetting["ApplicationSettingInputTypeName"], "Caption"=>"Type", "ControlHTML"=>CTL_InputText("ApplicationSettingInputTypeName", $ApplicationSetting["ApplicationSettingInputTypeName"], "", 61), "Required"=>true);
    //$Input[]=array("VariableName"=>"ApplicationSettingIsHidden", "DefaultValue"=>$ApplicationSetting["ApplicationSettingIsHidden"], "Caption"=>"Hidden?", "ControlHTML"=>CTL_InputRadioSet($VariableName="ApplicationSettingIsHidden", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$ApplicationSetting["ApplicationSettingIsHidden"]), "Required"=>false);
    //$Input[]=array("VariableName"=>"ApplicationSettingIsLocked", "DefaultValue"=>$ApplicationSetting["ApplicationSettingIsLocked"], "Caption"=>"Locked?", "ControlHTML"=>CTL_InputRadioSet($VariableName="ApplicationSettingIsLocked", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$ApplicationSetting["ApplicationSettingIsLocked"]), "Required"=>false);
	if($ApplicationSetting["IsParmanent"]!=1){
    	$Input[]=array("VariableName"=>"ApplicationSettingIsActive", "DefaultValue"=>$ApplicationSetting["ApplicationSettingIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="ApplicationSettingIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$ApplicationSetting["ApplicationSettingIsActive"]), "Required"=>false);
	}else{
		 $Input[]=array("VariableName"=>"ApplicationSettingValue", "DefaultValue"=>$ApplicationSetting["ApplicationSettingValue"], "Caption"=>"", "ControlHTML"=>CTL_InputHidden("ApplicationSettingIsActive", 1, "", 61), "Required"=>false);
	}
	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);

?>