<?php
    $Entity="Advert";
    $EntityAlias="A";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advert";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $Advert=array(
        "AdvertName"=>"",
        "AdvertType"=>"",
        "AdvertPanelUUID"=>0,
        "AdvertPicture"=>"",
        "AdvertClickURL"=>"",
        "AdvertToolTip"=>"",
        "AdvertIsActive"=>1
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$Advert=SQL_Select($Entity="Advert", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST(uuid)."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	$Input=array();
    $Input[]=array("VariableName"=>"AdvertName", "DefaultValue"=>$Advert["AdvertName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("AdvertName", $Advert["AdvertName"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertType", "DefaultValue"=>$Advert["AdvertType"], "Caption"=>"Type", "ControlHTML"=>CTL_Combo($Name="AdvertType", $Values=array("Image", "Flash"), $Captions=array("Image", "Flash"), $IncludeBlankItem=false, $CurrentValue=$Advert["AdvertType"],"",true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertPanelUUID", "DefaultValue"=>$Advert["AdvertPanelUUID"], "Caption"=>"Panel", "ControlHTML"=>CCTL_AdvertPanelLookup($Name="AdvertPanelUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false), "Required"=>false);
    $Input[]=array("VariableName"=>"AdvertPicture", "DefaultValue"=>$Advert["AdvertPicture"], "Caption"=>"Image", "ControlHTML"=>CTL_ImageUpload($ControlName="AdvertPicture", $Application["UploadPath"], $CurrentImage=$Advert["AdvertPicture"], $AllowDelete=$UpdateMode, $Class="FormTextInput", $ThumbnailHeight=100, $ThumbnailWidth=0, $Preview=$UpdateMode)."<br><br>", "Required"=>false);
    $Input[]=array("VariableName"=>"AdvertClickURL", "DefaultValue"=>$Advert["AdvertClickURL"], "Caption"=>"URL", "ControlHTML"=>CTL_InputText("AdvertClickURL", $Advert["AdvertClickURL"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertToolTip", "DefaultValue"=>$Advert["AdvertToolTip"], "Caption"=>"Tool tip", "ControlHTML"=>CTL_InputText("AdvertToolTip", $Advert["AdvertToolTip"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertIsActive", "DefaultValue"=>$Advert["AdvertIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="AdvertIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$Advert["AdvertIsActive"]), "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>