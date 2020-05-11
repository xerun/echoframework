<?php
    $Entity="Menu";
    $EntityAlias="M";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Menus";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $Menu=array(
        "MenuName"=>"",
        "MenuIsActive"=>1
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$Menu=SQL_Select($Entity="Menu", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST('uuid')."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	$Input=array();
    $Input[]=array("VariableName"=>"MenuPosition", "DefaultValue"=>$Menu["MenuPosition"], "Caption"=>"Position", "ControlHTML"=>CTL_Combo($Name="MenuPosition", $Values=array("Admin", "Manage","Report"), $Captions=array("Admin", "Manage","Report"), $IncludeBlankItem=true, $CurrentValue=$Menu["MenuPosition"],$BlankItemCaption="Select Position",true), "Required"=>true);

    $parent='<div class="col-sm-9"><select name="MenuParentUUID" id="MenuParentUUID" class="form-control">
                    <option value="">Select Parent</option>';
    $sqlParent="SELECT MenuUUID,MenuName FROM tblmenu WHERE MenuParentUUID='' AND MenuIsActive=1 order by MenuName";
    $rstParent=MySQLQuery($sqlParent);
    while($rowParent=$rstParent->fetch_object()) {
        $parent.='
                        <option value="'.$rowParent->MenuUUID.'"'; if($Menu["MenuParentUUID"]==$rowParent->MenuUUID){$parent.=' selected';} $parent.='>'.$rowParent->MenuName.'</option>';
    }
    $parent.='</select></div>';
    $Input[]=array("VariableName"=>"MenuParentUUID", "DefaultValue"=>$Menu["MenuParentUUID"], "Caption"=>"Parent", "ControlHTML"=>$parent, "Required"=>false);

    $Input[]=array("VariableName"=>"MenuName", "DefaultValue"=>$Menu["MenuName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("MenuName", $Menu["MenuName"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"MenuUrl", "DefaultValue"=>$Menu["MenuUrl"], "Caption"=>"Url", "ControlHTML"=>CTL_InputText("MenuUrl", $Menu["MenuUrl"], "", true), "Required"=>true);
    $Input[]=array("VariableName"=>"MenuIsActive", "DefaultValue"=>$Menu["MenuIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="MenuIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$Menu["MenuIsActive"]), "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);