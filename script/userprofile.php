<?php
    $Entity="UserProfile";
    $EntityLower=strtolower($Entity);

    $User=SQL_Select($Entity="User", $Where="U.UserUUID = '".$_SESSION["UserUUID"]."'", $OrderBy="", $SignleRow=true, $Debug=false);

    $FormTitle="My User Profile";
    $ButtonCaption="Update Profile";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="userprofileupdate");

	$Input=array();
    $Input[]=array("VariableName"=>"UserEmail", "DefaultValue"=>$User["UserEmail"], "Caption"=>"Email", "ControlHTML"=>CTL_InputText("UserEmail", $User["UserEmail"], "", true,"form-control valid","",true), "Required"=>true);
    $Input[]=array("VariableName"=>"Name", "DefaultValue"=>$User["Name"], "Caption"=>"Name", "ControlHTML"=>CTL_InputText("Name", $User["Name"], "", true,"form-control valid","",true), "Required"=>true);
    $Input[]=array("VariableName"=>"DateBorn", "DefaultValue"=>$User["DateBorn"], "Caption"=>"Date of birth", "ControlHTML"=>CTL_DateSelector($DateSelectorName="DateBorn", $SelectedDate=$User["DateBorn"], $YearHalfSpan=50, $Class="", $Years=true, $Months=true, $Days=true), "Required"=>false);
    $Input[]=array("VariableName"=>"UserPicture", "DefaultValue"=>$User["UserPicture"], "Caption"=>"Picture", "ControlHTML"=>CTL_ImageUpload($ControlName="UserPicture", $Application["UploadPath"], $CurrentImage=$User["UserPicture"], $AllowDelete=true, $Class="FormTextInput", $ThumbnailHeight=100, $ThumbnailWidth=0, $Preview=true, $Size=40), "Required"=>false);
    $Input[]=array("VariableName"=>"Street", "DefaultValue"=>$User["Street"], "Caption"=>"Street", "ControlHTML"=>CTL_InputText("Street", $User["Street"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"City", "DefaultValue"=>$User["City"], "Caption"=>"City", "ControlHTML"=>CTL_InputText("City", $User["City"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"ZIP", "DefaultValue"=>$User["ZIP"], "Caption"=>"ZIP", "ControlHTML"=>CTL_InputText("ZIP", $User["ZIP"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"State", "DefaultValue"=>$User["State"], "Caption"=>"State", "ControlHTML"=>CTL_InputText("State", $User["State"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"CountryUUID", "DefaultValue"=>$User["CountryUUID"], "Caption"=>"Country", "ControlHTML"=>CCTL_CountryLookup($Name="CountryUUID", $ValueSelected=$User["CountryUUID"]), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneHome", "DefaultValue"=>$User["PhoneHome"], "Caption"=>"Home phone", "ControlHTML"=>CTL_InputText("PhoneHome", $User["PhoneHome"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneOffice", "DefaultValue"=>$User["PhoneOffice"], "Caption"=>"Office phone", "ControlHTML"=>CTL_InputText("PhoneOffice", $User["PhoneOffice"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneMobile", "DefaultValue"=>$User["PhoneMobile"], "Caption"=>"Mobile phone", "ControlHTML"=>CTL_InputText("PhoneMobile", $User["PhoneMobile"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"PhoneDay", "DefaultValue"=>$User["PhoneDay"], "Caption"=>"Day phone", "ControlHTML"=>CTL_InputText("PhoneDay", $User["PhoneDay"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"FAX", "DefaultValue"=>$User["FAX"], "Caption"=>"FAX", "ControlHTML"=>CTL_InputText("FAX", $User["FAX"], "", false), "Required"=>false);
    $Input[]=array("VariableName"=>"Website", "DefaultValue"=>$User["Website"], "Caption"=>"Website", "ControlHTML"=>CTL_InputText("Website", $User["Website"], "", false)."<br><br>", "Required"=>false);

	$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);
?>