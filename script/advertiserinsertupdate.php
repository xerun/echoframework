<?php
    $Entity="Advertiser";
    $EntityAlias="A";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advertiser List";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $Advertiser=array(
        "AdvertiserName"=>"",
        "AdvertiserIsActive"=>1
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$Advertiser=SQL_Select($Entity="Advertiser", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST('uuid')."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	$Input=array();
	//$Input[]=array("VariableName"=>"AdvertiserService", "DefaultValue"=>$Advertiser["AdvertiserService"], "Caption"=>"Service", "ControlHTML"=>CTL_Combo($Name="AdvertiserService", $Values=array("Bondhu", "Tuition","Jobs","Matrimony","Tolet","mHaat","News","Entertainment","mDoctor","mLibrary"), $Captions=array("Bondhu", "Tuition","Jobs","Matrimony","Tolet","mHaat","News","Entertainment","mDoctor","mLibrary"), $IncludeBlankItem=true, $CurrentValue=$Advertiser["AdvertiserService"],$BlankItemCaption="Select Service"), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertiserName", "DefaultValue"=>$Advertiser["AdvertiserName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("AdvertiserName", $Advertiser["AdvertiserName"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertiserIsActive", "DefaultValue"=>$Advertiser["AdvertiserIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="AdvertiserIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$Advertiser["AdvertiserIsActive"]), "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>