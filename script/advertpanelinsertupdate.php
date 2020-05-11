<?php
    $Entity="AdvertPanel";
    $EntityAlias="AP";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advert Panel";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $AdvertPanel=array(
        "AdvertPanelName"=>"",
        "AdvertPanelIdentifire"=>"",
        "AdvertWidth"=>0,
        "AdvertHeight"=>0,
        "AdvertPanelMaxNumber"=>0,
        "AdvertPanelIsVertical"=>1,
        "AdvertPanelIsActive"=>1
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$AdvertPanel=SQL_Select($Entity="AdvertPanel", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST('uuid')."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	$Input=array();
    $Input[]=array("VariableName"=>"AdvertPanelName", "DefaultValue"=>$AdvertPanel["AdvertPanelName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("AdvertPanelName", $AdvertPanel["AdvertPanelName"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertPanelIdentifire", "DefaultValue"=>$AdvertPanel["AdvertPanelIdentifire"], "Caption"=>"Identifire", "ControlHTML"=>CTL_InputText("AdvertPanelIdentifire", $AdvertPanel["AdvertPanelIdentifire"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertWidth", "DefaultValue"=>$AdvertPanel["AdvertWidth"], "Caption"=>"Width", "ControlHTML"=>CTL_InputText("AdvertWidth", $AdvertPanel["AdvertWidth"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertHeight", "DefaultValue"=>$AdvertPanel["AdvertHeight"], "Caption"=>"Height", "ControlHTML"=>CTL_InputText("AdvertHeight", $AdvertPanel["AdvertHeight"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertPanelMaxNumber", "DefaultValue"=>$AdvertPanel["AdvertPanelMaxNumber"], "Caption"=>"Max Number", "ControlHTML"=>CTL_InputText("AdvertPanelMaxNumber", $AdvertPanel["AdvertPanelMaxNumber"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"AdvertPanelIsVertical", "DefaultValue"=>$AdvertPanel["AdvertPanelIsVertical"], "Caption"=>"Vertical?", "ControlHTML"=>CTL_InputRadioSet($VariableName="AdvertPanelIsVertical", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$AdvertPanel["AdvertPanelIsVertical"]), "Required"=>false);
    $Input[]=array("VariableName"=>"AdvertPanelIsActive", "DefaultValue"=>$AdvertPanel["AdvertPanelIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="AdvertPanelIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$AdvertPanel["AdvertPanelIsActive"]), "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>