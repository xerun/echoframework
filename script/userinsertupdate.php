<?php
    $Entity="User";
    $EntityAlias="U";
    $EntityLower=strtolower($Entity);
    $EntityCaption="User";
    $EntityCaptionLower=strtolower($EntityCaption);

    $UpdateMode=false;
    $FormTitle="Insert $EntityCaption";
    $ButtonCaption="Insert";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction");
    $User=array(
	        "UserName"=>"",
	        "UserPassword"=>"",
	        "UserEmail"=>"",
	        "UserDescription"=>"",
	        "UserTypeID"=>3,
	        "UserIsActive"=>1,
	        "Name"=>"",
	        "Street"=>"",
	        "City"=>"",
	        "ZIP"=>"",
	        "State"=>"",
	        "CountryID"=>"4b590454-e7a8-1029-9be9-4fc904b88e9e",
	        "PhoneHome"=>"",
	        "PhoneOffice"=>"",
	        "PhoneDay"=>"",
	        "PhoneMobile"=>"",
	        "FAX"=>"",
	        "Website"=>"",
	        "DateBorn"=>"",
	        "UserPicture"=>"",
			"UserIsRegistered"=>0,
	);

	if(isset($_REQUEST["uuid"])){
	    $UpdateMode=true;
	    $FormTitle="Update $EntityCaption";
	    $ButtonCaption="Update";
	    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."insertupdateaction", "uuid={$_REQUEST["uuid"]}");

		if($UpdateMode&&!isset($_POST["".$Entity."Name"]))$User=SQL_Select($Entity="User", $Where="{$EntityAlias}.{$Entity}UUID = '".REQUEST(uuid)."'", $OrderBy="{$EntityAlias}.{$Entity}Name", $SingleRow=true);
	}

	if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDmDoctor"]){
        $ConditionUser=" UT.UserTypeUUID ='".$Application["UserTypeIDDoctor"]."'";
    }else if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDAdmin"]){
		$ConditionUser=" UT.UserTypeUUID NOT IN ('".$Application["UserTypeIDGuest"]."','".$Application["UserTypeIDSuperAdmin"]."')";
    }else{
    	$ConditionUser=" UT.UserTypeUUID NOT IN ('".$Application["UserTypeIDGuest"]."')";
    }

	$_POST["UserPassword"]=$_POST["UserPasswordConfirm"]="";

	$Input=array();
	$Input[]=array("VariableName"=>"UserTypeUUID", "DefaultValue"=>$User["UserTypeUUID"], "Caption"=>"User Type", "ControlHTML"=>CCTL_UserTypeLookup($Name="UserTypeUUID", $ValueSelected=$User["UserTypeUUID"], $Where=$ConditionUser,false,false), "Required"=>false);
    $Input[]=array("VariableName"=>"UserName", "DefaultValue"=>$User["UserName"], "Caption"=>"Username", "ControlHTML"=>CTL_InputText("UserName", $User["UserName"], "", true, $Class="", $Style="", $ReadOnly=false, $Debug=false), "Required"=>true);
    $Input[]=array("VariableName"=>"UserEmail", "DefaultValue"=>$User["UserEmail"], "Caption"=>"Email", "ControlHTML"=>CTL_InputText("UserEmail", $User["UserEmail"], "", true), "Required"=>false);
	if(!$UpdateMode){// if update is true then do not make the password field mandatory
		$Input[]=array("VariableName"=>"UserPassword", "DefaultValue"=>"", "Caption"=>"Password", "ControlHTML"=>CTL_InputPassword("UserPassword", $User["UserPassword"], "", true), "Required"=>true);
		$Input[]=array("VariableName"=>"UserPasswordConfirm", "DefaultValue"=>"", "Caption"=>"Confirm Password", "ControlHTML"=>CTL_InputPassword("UserPasswordConfirm", $User["UserPassword"], "", true), "Required"=>true);
	}else{
		$Input[]=array("VariableName"=>"UserPassword", "DefaultValue"=>"", "Caption"=>"Password", "ControlHTML"=>CTL_InputPassword("UserPassword", "", "", false), "Required"=>false);
	}
	if(!empty($User["DateBorn"])){
		$DateBorn=$User["DateBorn"];
	}
	$Input[]=array("VariableName"=>"Name", "DefaultValue"=>$User["FirstName"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("Name", $User["Name"], "", true), "Required"=>true);
	$Input[]=array("VariableName"=>"PhoneMobile", "DefaultValue"=>$User["PhoneMobile"], "Caption"=>"Mobile phone",  "ControlHTML"=>CTL_InputText("PhoneMobile", $User["PhoneMobile"], "", false), "Required"=>true);
    $Input[]=array("VariableName"=>"UserDescription", "DefaultValue"=>$User["UserDescription"], "Caption"=>"Description", "ControlHTML"=>CTL_InputTextArea("UserDescription", $User["UserDescription"], $Columns=60, $Rows=5,false), "Required"=>false);

    $Input[]=array("VariableName"=>"DateBorn", "DefaultValue"=>$DateBorn, "Caption"=>"Date of Birth", "ControlHTML"=>CTL_DateSelector($DateSelectorName="DateBorn", $SelectedDate=$DateBorn), "Required"=>false);
    $Input[]=array("VariableName"=>"UserPicture", "DefaultValue"=>$User["UserPicture"], "Caption"=>"Image", "ControlHTML"=>CTL_ImageUpload($ControlName="UserPicture", $Application["UploadPath"], $CurrentImage=$User["UserPicture"], $AllowDelete=$UpdateMode, $Class="FormTextInput", $ThumbnailHeight=100, $ThumbnailWidth=0, $Preview=$UpdateMode)."<br><br>", "Required"=>false);
    $Input[]=array("VariableName"=>"Street", "DefaultValue"=>$User["Street"], "Caption"=>"Street", "ControlHTML"=>CTL_InputText("Street", $User["Street"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"City", "DefaultValue"=>$User["City"], "Caption"=>"City", "ControlHTML"=>CTL_InputText("City", $User["City"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"ZIP", "DefaultValue"=>$User["ZIP"], "Caption"=>"ZIP", "ControlHTML"=>CTL_InputText("ZIP", $User["ZIP"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"State", "DefaultValue"=>$User["State"], "Caption"=>"State", "ControlHTML"=>CTL_InputText("State", $User["State"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"CountryUUID", "DefaultValue"=>$User["CountryUUID"], "Caption"=>"Country", "ControlHTML"=>CCTL_CountryLookup($Name="CountryUUID", $ValueSelected=$User["CountryUUID"]), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneHome", "DefaultValue"=>$User["PhoneHome"], "Caption"=>"Home phone", "ControlHTML"=>CTL_InputText("PhoneHome", $User["PhoneHome"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneOffice", "DefaultValue"=>$User["PhoneOffice"], "Caption"=>"Office phone", "ControlHTML"=>CTL_InputText("PhoneOffice", $User["PhoneOffice"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneDay", "DefaultValue"=>$User["PhoneDay"], "Caption"=>"Day phone", "ControlHTML"=>CTL_InputText("PhoneDay", $User["PhoneDay"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"FAX", "DefaultValue"=>$User["FAX"], "Caption"=>"FAX", "ControlHTML"=>CTL_InputText("FAX", $User["FAX"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"Website", "DefaultValue"=>$User["Website"], "Caption"=>"Website", "ControlHTML"=>CTL_InputText("Website", $User["Website"], "", false)."<br><br>", "Required"=>false);

    $Input[]=array("VariableName"=>"SectionTitleRow", "DefaultValue"=>"", "Caption"=>"Administrator", "ControlHTML"=>"", "Required"=>False);
    $Input[]=array("VariableName"=>"UserIsActive", "DefaultValue"=>$User["UserIsActive"], "Caption"=>"Active?", "ControlHTML"=>CTL_InputRadioSet($VariableName="UserIsActive", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$User["UserIsActive"]), "Required"=>false);
    $Input[]=array("VariableName"=>"UserIsRegistered", "DefaultValue"=>$User["UserIsRegistered"], "Caption"=>"Is Registered?", "ControlHTML"=>CTL_InputRadioSet($VariableName="UserIsRegistered", $Captions=array("Yes", "No"), $Values=array(1, 0), $CurrentValue=$User["UserIsRegistered"]), "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>