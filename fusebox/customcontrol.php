<?php
	DebugFunctionTrace($FunctionName="Module: customcontrol()", $Parameter=array(), $UseURLDebugFlag=true);


	function CCTL_AdvertPanel($AdvertPanelIdentifire){
        $AdvertPanelHTML="";
        //Collecting Advert Panel information
	    $AdvertPanel=SQL_Select($Entity="AdvertPanel", $Where="AP.AdvertPanelIdentifire = '$AdvertPanelIdentifire' AND AP.AdvertPanelIsActive = 1", $OrderBy="", $SingleRow=true);
	    if(count($AdvertPanel)>2){//Checking is there any row in the database for the selected Panel Identifire
	        //Collecting Advert information for selected Advert panel
		    $Advert=SQL_Select($Entity="Advert", $Where="A.AdvertPanelID = {$AdvertPanel["AdvertPanelID"]} AND A.AdvertIsActive = 1", $OrderBy="", $SingleRow=false);
		    if(count($Advert)>0){////Checking is there any data in the database for the current Panel
		        $AdvertPanelHTML.="<table cellspacing=\"5\" style=\"\"><tr>";
		        $AdvertHTML="";
			    foreach($Advert as $ThisAdvert){//Looping through all the data form the database
			        if($ThisAdvert["AdvertType"]=="Image"){
					    $AdvertHTML="".CTL_Image($ImageFile=$ThisAdvert["AdvertPicture"], $Height=$AdvertPanel["AdvertHeight"], $Width=$AdvertPanel["AdvertWidth"], $Class="", $Nothing=false)."";
					}elseif($ThisAdvert["AdvertType"]=="Flash"){
					    $AdvertHTML="
						   	<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"{$AdvertPanel["AdvertWidth"]}\" height=\"{$AdvertPanel["AdvertHeight"]}\">
                             	<param name=\"movie\" value=\"./upload/{$ThisAdvert["AdvertPicture"]}\">
                             	<param name=\"quality\" value=\"high\">
                            	<embed src=\"./upload/{$ThisAdvert["AdvertPicture"]}\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"{$AdvertPanel["AdvertWidth"]}\" height=\"{$AdvertPanel["AdvertHeight"]}\"></embed>
					       	</object>
						";
					}
				    if($ThisAdvert["AdvertClickURL"]!=""){//Checking is there any URL selected by the user for this advert
						$AdvertHTML="<a href=\"{$ThisAdvert["AdvertClickURL"]}\" target=\"_blank\" title=\"{$ThisAdvert["AdvertToolTip"]}\">$AdvertHTML</a>";
					}
			        $AdvertPanelHTML.="<td>$AdvertHTML</td>";
			        if($AdvertPanel["AdvertPanelIsVertical"]!=0)$AdvertPanelHTML.="</tr><tr>";
				}
		        $AdvertPanelHTML.="</tr></table>";
			}
		}
        return $AdvertPanelHTML;
	}


	function CCTL_USStateSelector($Name="State", $StateSelected=""){
		DebugFunctionTrace($FunctionName="CCTL_USStateSelector", $Parameter=array("Name"=>$Name, "StateSelected"=>$StateSelected), $UseURLDebugFlag=true);

		SetFormVariable($Name, $StateSelected);
		
	    $State=array(
			array("Alias"=>"", "Name"=>""),
			array("Alias"=>"AL", "Name"=>"Alabama"),
			array("Alias"=>"AK", "Name"=>"Alaska"),
			array("Alias"=>"AZ", "Name"=>"Arizona"),
			array("Alias"=>"AR", "Name"=>"Arkansas"),
			array("Alias"=>"CA", "Name"=>"California"),
			array("Alias"=>"CO", "Name"=>"Colorado"),
			array("Alias"=>"CT", "Name"=>"Connecticut"),
			array("Alias"=>"DC", "Name"=>"D.C."),
			array("Alias"=>"DE", "Name"=>"Delaware"),
			array("Alias"=>"FL", "Name"=>"Florida"),
			array("Alias"=>"GA", "Name"=>"Georgia"),
			array("Alias"=>"HI", "Name"=>"Hawaii"),
			array("Alias"=>"ID", "Name"=>"Idaho"),
			array("Alias"=>"IL", "Name"=>"Illinois"),
			array("Alias"=>"IN", "Name"=>"Indiana"),
			array("Alias"=>"IA", "Name"=>"Iowa"),
			array("Alias"=>"KS", "Name"=>"Kansas"),
			array("Alias"=>"KY", "Name"=>"Kentucky"),
			array("Alias"=>"LA", "Name"=>"Louisiana"),
			array("Alias"=>"ME", "Name"=>"Maine"),
			array("Alias"=>"MD", "Name"=>"Maryland"),
			array("Alias"=>"MA", "Name"=>"Massachusetts"),
			array("Alias"=>"MI", "Name"=>"Michigan"),
			array("Alias"=>"MN", "Name"=>"Minnesota"),
			array("Alias"=>"MS", "Name"=>"Mississippi"),
			array("Alias"=>"MO", "Name"=>"Missouri"),
			array("Alias"=>"MT", "Name"=>"Montana"),
			array("Alias"=>"NE", "Name"=>"Nebraska"),
			array("Alias"=>"NV", "Name"=>"Nevada"),
			array("Alias"=>"NH", "Name"=>"New Hampshire"),
			array("Alias"=>"NJ", "Name"=>"New Jersey"),
			array("Alias"=>"NM", "Name"=>"New Mexico"),
			array("Alias"=>"NY", "Name"=>"New York"),
			array("Alias"=>"NC", "Name"=>"North Carolina"),
			array("Alias"=>"ND", "Name"=>"North Dakota"),
			array("Alias"=>"OH", "Name"=>"Ohio"),
			array("Alias"=>"OK", "Name"=>"Oklahoma"),
			array("Alias"=>"OR", "Name"=>"Oregon"),
			array("Alias"=>"PA", "Name"=>"Pennsylvania"),
			array("Alias"=>"RI", "Name"=>"Rhode Island"),
			array("Alias"=>"SC", "Name"=>"South Carolina"),
			array("Alias"=>"SD", "Name"=>"South Dakota"),
			array("Alias"=>"TN", "Name"=>"Tennessee"),
			array("Alias"=>"TX", "Name"=>"Texas"),
			array("Alias"=>"UT", "Name"=>"Utah"),
			array("Alias"=>"VT", "Name"=>"Vermont"),
			array("Alias"=>"VA", "Name"=>"Virginia"),
			array("Alias"=>"WA", "Name"=>"Washington"),
			array("Alias"=>"WV", "Name"=>"West Virginia"),
			array("Alias"=>"WI", "Name"=>"Wisconsin"),
			array("Alias"=>"WY", "Name"=>"Wyoming")
		);
	    
	    $StateOptions="";
		foreach($State as $ThisState){
		    $ThisStateSelected="";
		    if($ThisState["Name"]==$_POST[$Name]||$ThisState["Alias"]==$_POST[$Name])$ThisStateSelected=" selected";
		    $StateOptions.="<option value=\"{$ThisState["Alias"]}\"$ThisStateSelected>{$ThisState["Name"]}</option>";
		}
		return "<select name=\"$Name\">$StateOptions</select>";
	}

	function CCTL_CountryLookup($Name="CountryUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false,$Required=false){
		DebugFunctionTrace($FunctionName="CCTL_CountryLookup", $Parameter=array("Name"=>$Name, "ValueSelected"=>$ValueSelected, "Where"=>$Where, "PrependBlankOption"=>$PrependBlankOption), $UseURLDebugFlag=true);

		SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
		return CTL_DBCombo($Name, $Rows=SQL_Select($Entity="Country", $Where, $OrderBy="CountryName"), $ValueColumn="CountryUUID", $CaptionColumn="CountryName", $ValueSelected=$_POST[$Name], $PrependBlankOption, $BlankItemCaption="",$Required=false,$Class="form-control", $Style="");
	}

	function CCTL_AdvertPanelLookup($Name="AdvertPanelUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false,$Required=false){
		DebugFunctionTrace($FunctionName="CCTL_AdvertPanelLookup", $Parameter=array("Name"=>$Name, "ValueSelected"=>$ValueSelected, "Where"=>$Where, "PrependBlankOption"=>$PrependBlankOption), $UseURLDebugFlag=true);

		SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
		return CTL_DBCombo($Name, $Rows=SQL_Select($Entity="AdvertPanel", $Where, $OrderBy="AdvertPanelName"), $ValueColumn="AdvertPanelUUID", $CaptionColumn="AdvertPlacementName", $ValueSelected=$_POST[$Name], $PrependBlankOption, $BlankItemCaption="",$Required=false, $Class="form-control", $Style="");
	}

	function CCTL_UserLookup($Name="UserUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false,$Required=false){
		DebugFunctionTrace($FunctionName="CCTL_UserLookup", $Parameter=array("Name"=>$Name, "ValueSelected"=>$ValueSelected, "Where"=>$Where, "PrependBlankOption"=>$PrependBlankOption), $UseURLDebugFlag=true);

		SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
		return CTL_DBCombo($Name, $Rows=SQL_Select($Entity="User", $Where), $ValueColumn="UserUUID", $CaptionColumn="UserName", $ValueSelected=$_POST[$Name], $PrependBlankOption, $BlankItemCaption="Select Name",$Required=false, $Class="form-control", $Style="");
	}

	function CCTL_UserTypeLookup($Name="UserTypeUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false,$Required=false){
		DebugFunctionTrace($FunctionName="CCTL_UserTypeLookup", $Parameter=array("Name"=>$Name, "ValueSelected"=>$ValueSelected, "Where"=>$Where, "PrependBlankOption"=>$PrependBlankOption), $UseURLDebugFlag=true);

		SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
		return CTL_DBCombo($Name, $Rows=SQL_Select($Entity="UserType", $Where), $ValueColumn="UserTypeUUID", $CaptionColumn="UserTypeName", $ValueSelected=$_POST[$Name], $PrependBlankOption, $BlankItemCaption="Select User Type",$Required=false, $Class="form-control", $Style="");
	}

	function CCTL_VendorLookup($Name="VendorUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false,$Required=false){
        DebugFunctionTrace($FunctionName="CCTL_VendorLookup", $Parameter=array("Name"=>$Name, "ValueSelected"=>$ValueSelected, "Where"=>$Where, "PrependBlankOption"=>$PrependBlankOption), $UseURLDebugFlag=true);

        SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
        return CTL_DBCombo($Name, $Rows=SQL_Select($Entity="Vendor", $Where), $ValueColumn="VendorUUID", $CaptionColumn="VendorName", $ValueSelected=$_POST[$Name], $PrependBlankOption, $BlankItemCaption="Select Vendor",$Required=false, $Class="form-control", $Style="");
    }
	function CCTL_AdvertiserLookup($Name="AdvertiserUUID", $ValueSelected=0, $Where="", $PrependBlankOption=false,$Required=false){
		DebugFunctionTrace($FunctionName="CCTL_AdvertiserLookup", $Parameter=array("Name"=>$Name, "ValueSelected"=>$ValueSelected, "Where"=>$Where, "PrependBlankOption"=>$PrependBlankOption), $UseURLDebugFlag=true);

		SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
		return CTL_DBCombo($Name, $Rows=SQL_Select($Entity="User", $Where), $ValueColumn="UserUUID", $CaptionColumn="FirstName", $ValueSelected=$_POST[$Name], $PrependBlankOption, $BlankItemCaption="Select Advertiser",$Required=false, $Class="form-control", $Style="");
	}

