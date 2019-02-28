<?php
	//Input type TEXT
	function CTL_InputText($Name, $DefaultValue="", $Title="", $Required=false, $Class="", $Style="", $ReadOnly=false, $Disable=false, $Placeholder="",$Debug=false, $Event=""){
		
		DebugFunctionTrace($FunctionName="CTL_InputText", $Parameter=array("Name"=>$Name, "DefaultValue"=>$DefaultValue, "Title"=>$Title, "Size"=>$Size, "Class"=>$Class, "Style"=>$Style, "ReadOnly"=>$ReadOnly, "Disable"=>$Disable, "Placeholder"=>$Placeholder, "Debug"=>$Debug), $UseURLDebugFlag=true);

	    SetFormVariable($Name, $DefaultValue, $SetErrorFlag=true, $UseRequestVariable=true, $Debug);
	    if($Class=="")$Class="form-control";
		$ReadOnlyHTML="";
		$DisableHTML="";
		if($Required)$RequiredHTML=" required";
	    if($ReadOnly)$ReadOnlyHTML=" readonly=\"true\"";
		if($Disable)$DisableHTML=" disabled=\"true\"";
		$HTML="<div class='col-sm-9'><input type=\"text\" name=\"$Name\" id=\"$Name\" placeholder=\"$Placeholder\" value=\"{$_POST[$Name]}\" title=\"$Title\" $RequiredHTML $ReadOnlyHTML class=\"$Class\"$DisableHTML style=\"$Style\" $Event ></div>";
		if($Debug)print "
		    CTL_InputText(\$Name='$Name', \$DefaultValue='$DefaultValue', \$Title='$Title', \$Size=$Size, \$Class='$Class', \$Style='$Style', \$ReadOnly=$ReadOnly, \$Debug=$Debug, \$Placeholder=$Placeholder){
			}
		    <hr>
		";
		return $HTML;
	}
	//TEXT AREA
	function CTL_InputTextArea($Name, $Value="", $Columns=80, $Rows=15, $Required=false, $Class="", $Style="", $ReadOnly=false, $Disable=false, $Event=""){

		DebugFunctionTrace($FunctionName="CTL_InputTextArea", $Parameter=array("Name"=>$Name, "Value"=>$Value, "Columns"=>$Columns, "Rows"=>$Rows, "Class"=>$Class, "Style"=>$Style, "ReadOnly"=>$ReadOnly), $UseURLDebugFlag=true);


	    SetFormVariable($Name, $Value, $SetErrorFlag=true, $UseRequestVariable=true);
	    if($Class=="")$Class="form-control";
		$ReadOnlyHTML="";
		$DisableHTML="";
		if($Required)$RequiredHTML=" required";
	    if($ReadOnly)$ReadOnlyHTML=" readonly";
		if($Disable)$DisableHTML=" disabled=\"true\"";
		$HTML="<div class='col-sm-9'><textarea name=\"$Name\" id=\"$Name\" cols=\"$Columns\" rows=\"$Rows\" $DisableHTML $RequiredHTML class=\"$Class\"$ReadOnlyHTML style=\"$Style\" $Event>{$_POST[$Name]}</textarea></div>";
		return $HTML;
	}
	//Input type PASSWORD
	function CTL_InputPassword($Name, $DefaultValue="", $Title="", $Size="", $Required=false,$Class="", $Style="", $Placeholder="", $Debug=false){

		DebugFunctionTrace($FunctionName="CTL_InputPassword", $Parameter=array("Name"=>$Name, "DefaultValue"=>$DefaultValue, "Title"=>$Title, "Size"=>$Size, "Class"=>$Class, "Style"=>$Style, "Placeholder"=>$Placeholder, "Debug"=>$Debug), $UseURLDebugFlag=true);

	    SetFormVariable($Name, $DefaultValue, $SetErrorFlag=true, $UseRequestVariable=true);
		if($Required)$RequiredHTML=" required";
		if($Class=="")$Class="form-control";
		$HTML="<div class='col-sm-9'><input type=\"password\" name=\"$Name\" id=\"$Name\" placeholder=\"$Placeholder\" $RequiredHTML value=\"$DefaultValue\" title=\"$Title\" size=\"$Size\" class=\"$Class\" style=\"$Style\"></div>";
		return $HTML;
	}
	//Input type CHECKBOX
	function CTL_InputCheck($Name, $Value=-1, $Title="", $Required=false,$Class="", $Style="", $Event=""){
		
		DebugFunctionTrace($FunctionName="CTL_InputCheck", $Parameter=array("Name"=>$Name, "Value"=>$Value, "Title"=>$Title, "Class"=>$Class, "Style"=>$Style), $UseURLDebugFlag=true);

	    SetFormVariable($Name, $Value, $SetErrorFlag=true, $UseRequestVariable=true);
		if($Class=="")$Class="";
		if($Required)$RequiredHTML=" required";
		$HTML="<div class=\"icheck-list\"><label><input type=\"checkbox\" name=\"$Name\" id=\"$Name\" data-radio=\"icheckbox_minimal-blue\" value=\"{$_POST[$Name]}\" title=\"$Title\" $Event style=\"$Style\"";
	    if(isset($_POST[$Name])&&$_POST[$Name]>(-1))$HTML.=" checked";
		$HTML.="></label>";
		return $HTML;
	}
	//Input type RADIO
	function CTL_InputRadio($Name, $Value, $ValueSelected="", $Title="", $Required=false,$Class="", $Style="", $Event=""){

		DebugFunctionTrace($FunctionName="CTL_InputRadio", $Parameter=array("Name"=>$Name, "Value"=>$Value, "ValueSelected"=>$ValueSelected, "Title"=>$Title, "Class"=>$Class, "Style"=>$Style), $UseURLDebugFlag=true);

	    SetFormVariable($Name, $ValueSelected, $SetErrorFlag=true, $UseRequestVariable=true);
		if($Class=="")$Class="icheck";
		if($Required)$RequiredHTML=" required";
		$HTML="<label><input type=\"radio\" name=\"$Name\" id=\"$Name\" value=\"$Value\" title=\"$Title\" data-radio=\"iradio_square-blue\" $Event style=\"$Style\"";
	    if($_POST[$Name]==$Value)$HTML.=" checked";
		$HTML.="></label>";
		return $HTML;
	}
	//Input type RADIO set
	function CTL_InputRadioSet($VariableName, $Captions, $Values, $CurrentValue,$Required=false, $Class="", $Style="", $Event=""){
		DebugFunctionTrace($FunctionName="CTL_InputRadioSet", $Parameter=array("VariableName"=>$VariableName, "Captions"=>$Captions, "Values"=>$Values, "CurrentValue"=>$CurrentValue, $Required=false,"Class"=>$Class, "Style"=>$Style), $UseURLDebugFlag=true);

		/*
			$VariableName: Name of the variable to hold the selection value
			$Captions: Array of captions
	        $Values: Array of values of datatype of string or number
			$CurrentValue: Default value to set with if no value is found
			$Class: Style class to use with the appearance
			$Style: Custom style to force the appearance with
	    */
	    SetFormVariable($VariableName, $CurrentValue, $SetErrorFlag=true, $UseRequestVariable=true);
	    if($Class=="")$Class="icheck";
		if($Required)$RequiredHTML=" required";
		$HTML="<div class='col-sm-9'><div class='input-group'><div class='icheck-inline'>";
	    $ValueCounter=-1;
	    foreach($Values as $ThisValue){
	        $ValueCounter++;
	        $Selected="";
	        if($ThisValue==$_POST[$VariableName])$Selected=" checked";
	        $HTML.="<label><input type=\"radio\" name=\"$VariableName\" data-radio=\"iradio_flat-blue\" $RequiredHTML value=\"$ThisValue\" class=\"$Class\" $Event style=\"$Style\"$Selected> {$Captions[$ValueCounter]}</label> ";
		}
		$HTML.='</div></div></div>';
		/*
		print "\$_POST[\"$VariableName\"] = {$_POST[$VariableName]}<hr>";
		print "\$CurrentValue = $CurrentValue<hr>";
		*/
		return $HTML;
	}
	//Input type BUTTON
	function CTL_InputButton($Name="", $Value="", $Title="", $Size="", $Class="", $Style="", $Event=""){

		DebugFunctionTrace($FunctionName="CTL_InputButton", $Parameter=array("Name"=>$Name, "Value"=>$Value, "Title"=>$Title, "Size"=>$Size, "Class"=>$Class, "Style"=>$Style, "OnClick"=>$OnClick), $UseURLDebugFlag=true);
		if($Class=="")$Class="btn btn-success btn-embossed m-r-20";
		$HTML="<input type=\"button\" name=\"$Name\" id=\"$Name\" value=\"$Value\" title=\"$Title\" size=\"$Size\" class=\"$Class\" style=\"$Style\" $Event>";
		return $HTML;
	}
	//Input type SUBMIT
	function CTL_InputSubmit($Name="", $Value="Post", $Title="", $Size="", $Class="", $Style="", $OnClick=""){
		
		DebugFunctionTrace($FunctionName="CTL_InputSubmit", $Parameter=array("Name"=>$Name, "Value"=>$Value, "Title"=>$Title, "Size"=>$Size, "Class"=>$Class, "Style"=>$Style, "OnClick"=>$OnClick), $UseURLDebugFlag=true);

		if($Class=="")$Class="btn btn-embossed btn-primary m-r-20";
		$HTML="<button type=\"submit\" name=\"$Name\" id=\"$Name\" title=\"$Title\" size=\"$Size\" class=\"$Class ladda-button\" data-style=\"expand-right\" style=\"$Style\" onclick=\"$OnClick\" >$Value</button";
		return $HTML;
	}
	//Input type RESET
	function CTL_InputReset($Name, $Value="", $Title="", $Size="", $Class="", $Style=""){

		DebugFunctionTrace($FunctionName="CTL_InputReset", $Parameter=array("Name"=>$Name, "Value"=>$Value, "Title"=>$Title, "Size"=>$Size, "Class"=>$Class, "Style"=>$Style), $UseURLDebugFlag=true);
		if($Class=="")$Class="cancel btn btn-embossed btn-default m-b-10 m-r-0";
		$HTML="<input type=\"reset\" name=\"$Name\" id=\"$Name\" value=\"$Value\" title=\"$Title\" size=\"$Size\" class=\"$Class\" style=\"$Style\">";
		return $HTML;
	}

	//Input type HIDDEN
	function CTL_InputHidden($Name, $Value=""){

		DebugFunctionTrace($FunctionName="CTL_InputHidden", $Parameter=array("Name"=>$Name, "Value"=>$Value), $UseURLDebugFlag=true);

	    SetFormVariable($Name, $Value, $SetErrorFlag=true, $UseRequestVariable=true);
		$HTML="<input type=\"hidden\" name=\"$Name\" value=\"{$_POST[$Name]}\">";
		return $HTML;
	}

	//SELECT
	function CTL_Combo($Name="", $Values, $Captions, $IncludeBlankItem=false, $CurrentValue, $BlankItemCaption="", $Required=false,$Class="form-control", $Style="", $Event=""){
		DebugFunctionTrace($FunctionName="CTL_Combo", $Parameter=array("Name"=>$Name, "Values"=>$Values, "Captions"=>$Captions, "IncludeBlankItem"=>$IncludeBlankItem, "CurrentValue"=>$CurrentValue, "BlankItemCaption"=>$BlankItemCaption, "Class"=>$Class, "Style"=>$Style), $UseURLDebugFlag=true);

		SetFormVariable($Name, $CurrentValue, $SetErrorFlag=true, $UseRequestVariable=true);
		if($Required)$RequiredHTML=" required";
		$HTML="<div class=\"col-sm-9\"><select name=\"$Name\" id=\"$Name\" class=\"$Class\" $RequiredHTML data-search=\"true\" style=\"$Style\" $Event >";
		if($IncludeBlankItem)$HTML.="<option value=\"\">$BlankItemCaption</option>";
		foreach($Values as $Value){
			$HTML.="<option value=\"$Value\"";
			if($Value==$_POST[$Name])$HTML.=" selected";
			$HTML.=">".$Captions[array_search($Value, $Values)]."</option>";
		}
		$HTML.="</select></div>";
		return $HTML;
	}
	
	//Image
	function CTL_Image($ImageFile, $UploadPath, $Height=0, $Width=0, $Class="", $Nothing=false){
		DebugFunctionTrace($FunctionName="CTL_Image", $Parameter=array("ImageFile"=>$ImageFile, "Height"=>$Height, "Width"=>$Width, "Class"=>$Class, "Nothing"=>$Nothing), $UseURLDebugFlag=true);

		global $Application;
	    $ImageFile=$UploadPath.$ImageFile;
	    if(!file_exists($ImageFile) or $ImageFile==$UploadPath)$ImageFile="".$Application["BaseURL"]."/theme/{$_REQUEST["Theme"]}/image/other/noimage.gif";
	    $HeightHTML=$WidthHTML="";
	    if($Height>0)$HeightHTML=" height=\"$Height\"";
	    if($Width>0)$WidthHTML=" width=\"$Width\"";
	    if(!$Nothing or $ImageFile!="".$Application["BaseURL"]."/theme/{$_REQUEST["Theme"]}/image/other/noimage.gif"){
	    	return "<img src=\"$ImageFile\"".$HeightHTML.$WidthHTML." class=\"$Class\">";
		}else{
		    return "";
		}
	}

	function CTL_HeightSelector($HeightSelectorName, $HeightSelected="", $HeightStart=42, $HeightStop=84, $Class="DataFormInput", $ShowFeet=true, $ShowInch=true, $ShowCM=true){

		DebugFunctionTrace($FunctionName="CTL_HeightSelector", $Parameter=array("HeightSelectorName"=>$HeightSelectorName, "HeightSelected"=>$HeightSelected, "HeightStart"=>$HeightStart, "HeightStop"=>$HeightStop, "Class"=>$Class, "ShowFeet"=>$ShowFeet, "ShowInch"=>$ShowInch, "ShowCM"=>$ShowCM), $UseURLDebugFlag=true);



		/*Build HTML code for a height picker by Feet-Inch-Cm list
		$HeightSelectorName	= Outputs a list of heights to chose from
		$HeightSelected		= Selected height
		$HeightStart		= Height to start the list from
		$HeightStop			= Height to stop the list at
		$Class				= CSS class to be used for the control, if NULL, "FormTextInput" is used
		Date: Sunday, June 05, 2005				Developer: Shahriar Kabir Joy (SKJoy2001@Yahoo.Com)*/
		if($Class==""){$Class="DataFormInput";}
    	$HTML_Code="<select name=$HeightSelectorName class=$Class>";
		for($Counter=$HeightStart;$Counter<=$HeightStop;$Counter++){
			$HTML_Code=$HTML_Code."<option value=\"$Counter\"";
			if($HeightSelected==$Counter){$HTML_Code=$HTML_Code." selected";}
			$HeightFeet=round($Counter/12, 2)." ft";
			$HeightInch="$Counter inch";
			$HeightCM=round($Counter*2.54, 0)." cm";
			$HeightOptionHTML="";
			if($ShowFeet)if($HeightOptionHTML==""){$HeightOptionHTML.=$HeightFeet;}else{$HeightOptionHTML.=" = $HeightFeet";}
			if($ShowInch)if($HeightOptionHTML==""){$HeightOptionHTML.=$HeightInch;}else{$HeightOptionHTML.=" = $HeightInch";}
			if($ShowCM)if($HeightOptionHTML==""){$HeightOptionHTML.=$HeightCM;}else{$HeightOptionHTML.=" = $HeightCM";}
			$HTML_Code=$HTML_Code.">$HeightOptionHTML</option>";
		}
		$HTML_Code=$HTML_Code."</select>";
		return $HTML_Code;
	}

	function CTL_WeightSelector($WeightSelectorName, $WeightSelected="", $WeightStart=50, $WeightStop=250, $Class="DataFormInput"){

	DebugFunctionTrace($FunctionName="CTL_WeightSelector", $Parameter=array("WeightSelectorName"=>$WeightSelectorName, "WeightSelected"=>$WeightSelected, "WeightStart"=>$WeightStart, "WeightStop"=>$WeightStop, "Class"=>$Class), $UseURLDebugFlag=true);

		/*Build HTML code for a height picker by Feet-Inch-Cm list

		$WeightSelectorName	= Outputs a list of weights to chose from
		$WeightSelected		= Selected weight
		$WeightStart		= Weight to start the list from
		$WeightStop			= Weight to stop the list at
		$Class				= CSS class to be used for the control, if NULL, "FormTextInput" is used

		Date: Sunday, June 05, 2011				Developer: PRITHU AHMED*/

		if($Class==""){$Class="DataFormInput";}

    	$HTML_Code="<select name=$WeightSelectorName class=$Class>";
		for($Counter=$WeightStart;$Counter<=$WeightStop;$Counter++){
			$HTML_Code=$HTML_Code."<option value=\"$Counter\"";
			if($WeightSelected==$Counter){$HTML_Code=$HTML_Code." selected";}
			$HTML_Code=$HTML_Code.">$Counter lbs = ".round($Counter/2.2, 0)." kg</option>";
		}
		$HTML_Code=$HTML_Code."</select>";

		return $HTML_Code;
	}

	function CTL_TimeSelector($TimeSelectorName, $HourSelected="01", $MinuteSelected="00", $SecondSelected="00", $Class="DataFormInput"){

		DebugFunctionTrace($FunctionName="CTL_TimeSelector", $Parameter=array("TimeSelectorName"=>$TimeSelectorName, "HourSelected"=>$HourSelected, "MinuteSelected"=>$MinuteSelected, "SecondSelected"=>$SecondSelected, "Class"=>$Class), $UseURLDebugFlag=true);

		/*Build HTML code for a time picker by Hour-Minute-Second list

		$TimeSelectorName	= Outputs 3 form controls as $TimeSelectorName_Hour, $TimeSelectorName_Minute & $TimeSelectorName_Second
		$HourSelected		= Selected hour
		$MinuteSelected		= Selected minute
		$SecondSelected		= Selected second
		$Class				= CSS class to be used for the control, if NULL, "FormTextInput" is used

		Date: Sunday, June 05, 2011				Developer: PRITHU AHMED*/

		if($Class==""){$Class="DataFormInput";}

		$HTML_Code="<select name=".$TimeSelectorName."Hour class=$Class>";
		for($Counter=0;$Counter<=23;$Counter++){
			$HTML_Code=$HTML_Code."<option value=".$Counter;
			if($Counter==$HourSelected){$HTML_Code=$HTML_Code." selected";}
            $HTML_Code=$HTML_Code.">".str_pad($Counter, 2, "0", STR_PAD_LEFT)."</option>";
		}
		$HTML_Code=$HTML_Code."</select>";

		$HTML_Code=$HTML_Code."<select name=".$TimeSelectorName."Minute class=$Class>";
		for($Counter=0;$Counter<=59;$Counter++){
			$HTML_Code=$HTML_Code."<option value=".$Counter;
			if($Counter==$MinuteSelected){$HTML_Code=$HTML_Code." selected";}
            $HTML_Code=$HTML_Code.">".str_pad($Counter, 2, "0", STR_PAD_LEFT)."</option>";
		}
		$HTML_Code=$HTML_Code."</select>";

		$HTML_Code=$HTML_Code."<select name=".$TimeSelectorName."Second class=$Class>";
		for($Counter=0;$Counter<=59;$Counter++){
			$HTML_Code=$HTML_Code."<option value=".$Counter;
			if($Counter==$SecondSelected){$HTML_Code=$HTML_Code." selected";}
            $HTML_Code=$HTML_Code.">".str_pad($Counter, 2, "0", STR_PAD_LEFT)."</option>";
		}
		$HTML_Code=$HTML_Code."</select>";

		return $HTML_Code;
	}

	function CTL_DateSelector($DateSelectorName, $SelectedDate="", $YearHalfSpan=50, $Class="", $Years=true, $Months=true, $Days=true){

	DebugFunctionTrace($FunctionName="CTL_DateSelector", $Parameter=array("DateSelectorName"=>$DateSelectorName, "SelectedDate"=>$SelectedDate, "YearHalfSpan"=>$YearHalfSpan, "Class"=>$Class, "Years"=>$Years, "Months"=>$Months, "Days"=>$Days), $UseURLDebugFlag=true);

		/*Build HTML code for a date picker by Year-Month-Day list

		$DateSelectorName	= Outputs 3 form controls as $DateSelectorName_Year, $DateSelectorName_Month & $DateSelectorName_Day
		$SelectedDate		= Selected date (YYYY-MM-DD)
		$YearHalfSpan		= Half value of the years to be ranged from YearSelected

		Date: Sunday, June 05, 2011				Developer: PRITHU AHMED*/
		
		if($SelectedDate==""||$SelectedDate=="0000-00-00")$SelectedDate=date("Y-m-d");

	    SetFormVariable($VariableName=$DateSelectorName, $CurrentValue=$SelectedDate, $SetErrorFlag=true, $UseRequestVariable=true);
/*
	    SetFormVariable($VariableName=$DateSelectorName."Year", $CurrentValue=date("Y", strtotime($SelectedDate)), $SetErrorFlag=true, $UseRequestVariable=true);
	    SetFormVariable($VariableName=$DateSelectorName."Month", $CurrentValue=date("m", strtotime($SelectedDate)), $SetErrorFlag=true, $UseRequestVariable=true);
	    SetFormVariable($VariableName=$DateSelectorName."Day", $CurrentValue=date("d", strtotime($SelectedDate)), $SetErrorFlag=true, $UseRequestVariable=true);
*/
	    SetFormVariable($VariableName=$DateSelectorName."Year", $CurrentValue=substr($SelectedDate, 0, 4), $SetErrorFlag=true, $UseRequestVariable=true);
	    SetFormVariable($VariableName=$DateSelectorName."Month", $CurrentValue=substr($SelectedDate, 5, 2), $SetErrorFlag=true, $UseRequestVariable=true);
	    SetFormVariable($VariableName=$DateSelectorName."Day", $CurrentValue=substr($SelectedDate, 8, 2), $SetErrorFlag=true, $UseRequestVariable=true);

        $YearSelected= $_POST[$DateSelectorName."Year"];
        $MonthSelected=$_POST[$DateSelectorName."Month"];
        $DaySelected=  $_POST[$DateSelectorName."Day"];

        $strDateSelector="<div class=\"col-sm-9\">";

		
		if($Days){
	        $strDateSelector=$strDateSelector."<select name=\"".$DateSelectorName."Day\" class=\"DataFormInput\">";
			for($Counter=1;$Counter<=31;$Counter++){
				$strDateSelector=$strDateSelector."<option value=\"".$Counter."\"";
				if($Counter==$DaySelected){$strDateSelector=$strDateSelector." selected";}
	            $strDateSelector=$strDateSelector.">".$Counter."</option>";
			}
			$strDateSelector=$strDateSelector."</select>";
		}else{$strDateSelector.="<input type=\"hidden\" name=\"$DateSelectorName\" value=\"$DaySelected\">";}

		if($Months){
	        $strDateSelector=$strDateSelector."<select name=\"".$DateSelectorName."Month\" class=\"DataFormInput\">";
			$strDateSelector=$strDateSelector."<option value=\"01\"";
			if($MonthSelected==1){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">January</option>";
			$strDateSelector=$strDateSelector."<option value=\"02\"";
			if($MonthSelected==2){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">February</option>";
			$strDateSelector=$strDateSelector."<option value=\"03\"";
			if($MonthSelected==3){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">March</option>";
			$strDateSelector=$strDateSelector."<option value=\"04\"";
			if($MonthSelected==4){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">April</option>";
			$strDateSelector=$strDateSelector."<option value=\"05\"";
			if($MonthSelected==5){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">May</option>";
			$strDateSelector=$strDateSelector."<option value=\"06\"";
			if($MonthSelected==6){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">June</option>";
			$strDateSelector=$strDateSelector."<option value=\"07\"";
			if($MonthSelected==7){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">July</option>";
			$strDateSelector=$strDateSelector."<option value=\"08\"";
			if($MonthSelected==8){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">August</option>";
			$strDateSelector=$strDateSelector."<option value=\"09\"";
			if($MonthSelected==9){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">September</option>";
			$strDateSelector=$strDateSelector."<option value=\"10\"";
			if($MonthSelected==10){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">October</option>";
			$strDateSelector=$strDateSelector."<option value=\"11\"";
			if($MonthSelected==11){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">November</option>";
			$strDateSelector=$strDateSelector."<option value=\"12\"";
			if($MonthSelected==12){$strDateSelector=$strDateSelector." selected";}
	        $strDateSelector=$strDateSelector.">December</option>";
			$strDateSelector=$strDateSelector."</select>";
		}else{$strDateSelector.="<input type=\"hidden\" name=\"$DateSelectorName\" value=\"$MonthSelected\">";}

		if($Years){
	        $strDateSelector=$strDateSelector."<input type=\"text\" size=\"3\" maxlength=\"4\" name=\"".$DateSelectorName."Year\" value=\"$YearSelected\" class='form-control' style='width:auto;' Placeholder='Year'>";
			
			/*$strDateSelector=$strDateSelector."<select name=\"".$DateSelectorName."Year\" class=\"$Class\">";
			for($Counter=$YearSelected-$YearHalfSpan;$Counter<=$YearSelected+$YearHalfSpan;$Counter++){
				$strDateSelector=$strDateSelector."<option value=\"".$Counter."\"";
				if($Counter==$YearSelected){$strDateSelector=$strDateSelector." selected";}
	            $strDateSelector=$strDateSelector.">".$Counter."</option>";
			}
			$strDateSelector=$strDateSelector."</select>";*/
		}else{$strDateSelector.="<input type=\"hidden\" name=\"$DateSelectorName\" value=\"$YearSelected\" >";}
		$strDateSelector.="</div>";
	
		return $strDateSelector;
    }

	//Date range selection control
    function CTL_DateRangeSelector(
        $DateRangeSelectorName,
        $FromYear=0,
        $FromMonth=0,
        $FromDay=0,
        $FromCaption="From",
        $ToYear=0,
        $ToMonth=0,
        $ToDay=0,
        $ToCaption="to",
        $YearHalfSpan=50,
        $Class="",
        $FromDate="",
        $ToDate=""
    ){

       DebugFunctionTrace($FunctionName="CTL_DateRangeSelector", $Parameter=array("DateRangeSelectorName"=>$DateRangeSelectorName, "FromYear"=>$FromYear, "FromMonth"=>$FromMonth, "FromDay"=>$FromDay, "FromCaption"=>$FromCaption, "ToYear"=>$ToYear, "ToMonth"=>$ToMonth, "ToDay"=>$ToDay, "ToCaption"=>$ToCaption, "YearHalfSpan"=>$YearHalfSpan, "Class"=>$Class, "FromDate"=>$FromDate, "ToDate"=>$ToDate), $UseURLDebugFlag=true);



        $HTML_Code="
            $FromCaption ".CTL_DateSelector($DateRangeSelectorName."From", $FromYear, $FromMonth, $FromDay, $YearHalfSpan, $Class, $FromDate)."
            $ToCaption ".CTL_DateSelector($DateRangeSelectorName."To", $ToYear, $ToMonth, $ToDay, $YearHalfSpan, $Class, $ToDate)."
        ";

        return $HTML_Code;
    }

	//A file upload control with DELETE EXISTING link & download link
    function CTL_FileUpload($ControlName, $UploadPath, $CurrentFile="", $AllowDelete=true, $Class="FormTextInput", $Size=50){


    	global $Application;

		DebugFunctionTrace($FunctionName="CTL_FileUpload", $Parameter=array("ControlName"=>$ControlName, "CurrentFile"=>$CurrentFile, "AllowDelete"=>$AllowDelete, "Class"=>$Class, "Size"=>$Size), $UseURLDebugFlag=true);

	    SetFormVariable($ControlName, $CurrentFile, $SetErrorFlag=true, $UseRequestVariable=true);

    	if(!$Class)$Class="FormTextInput";

    	$DocumentFile=$UploadPath.$CurrentFile;
    	if(!file_exists($UploadPath.$CurrentFile) or !$CurrentFile){$DocumentFile="".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/images/noimage.gif";}

    	$HTML_Code="<div class=\"col-sm-9\">
						<div class=\"fileinput fileinput-new input-group\" data-provides=\"fileinput\">
                            <div class=\"form-control\" data-trigger=\"fileinput\">
                              <i class=\"glyphicon glyphicon-file fileinput-exists\"></i><span class=\"fileinput-filename\"></span>
                            </div>
                            <span class=\"input-group-addon btn btn-default btn-file\"><span class=\"fileinput-new\">Choose...</span><span class=\"fileinput-exists\">Change</span>
                            <input type=\"file\" id=\"".$ControlName."New\" name=\"".$ControlName."New\" size=\"$Size\" class=\"$Class\">
                            </span>
                            <a href=\"#\" class=\"input-group-addon btn btn-default fileinput-exists\" data-dismiss=\"fileinput\">Remove</a>
                          </div><br>";
    	if(file_exists($UploadPath.$CurrentFile)&&$CurrentFile){$HTML_Code.="<a href=\"".$Application["BaseURL"]."/".$UploadPath.$CurrentFile."\" class=\"FormTextLink\" title=\" Download \"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/images/datagrid/datagrid_action_download.png\" border=\"0\">&nbsp;Download</a>&nbsp;";}
    	if(file_exists($UploadPath.$CurrentFile) and $CurrentFile){$HTML_Code.=CTL_InputCheck($ControlName."Delete")." Delete";}
    	$HTML_Code.="<input type=\"hidden\" name=\"$ControlName\" value=\"$CurrentFile\"></div>";

		return $HTML_Code;
	}

	//An image upload control with DELETE EXISTING link & preview
    function CTL_ImageUpload($ControlName, $UploadPath, $CurrentImage="", $AllowDelete=true, $Class="FormTextInput", $ThumbnailHeight=100, $ThumbnailWidth=0, $Preview=true, $Size=50){
	    DebugFunctionTrace($FunctionName="CTL_ImageUpload", $Parameter=array("ControlName"=>$ControlName, "CurrentImage"=>$CurrentImage, "AllowDelete"=>$AllowDelete, "Class"=>$Class, "ThumbnailHeight"=>$ThumbnailHeight, "ThumbnailWidth"=>$ThumbnailWidth, "Preview"=>$Preview, "Size"=>$Size), $UseURLDebugFlag=true); 

		global $Application;
	    SetFormVariable($ControlName, $CurrentImage, $SetErrorFlag=true, $UseRequestVariable=true);
    	if(!$Class)$Class="FormTextInput";
    	$ImageFile=$UploadPath.$_POST[$ControlName];
    	if(!$CurrentImage or !file_exists($ImageFile)){
			$ImageFile="".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/images/other/noimage.gif";
		}else{
			$ImageFile=$Application["BaseURL"]."/".$UploadPath.$_POST[$ControlName];
		}
    	$HTML_Code="<div class=\"col-sm-9\">
						<div class=\"fileinput fileinput-new input-group\" data-provides=\"fileinput\">
                            <div class=\"form-control\" data-trigger=\"fileinput\">
                              <i class=\"glyphicon glyphicon-file fileinput-exists\"></i><span class=\"fileinput-filename\"></span>
                            </div>
                            <span class=\"input-group-addon btn btn-default btn-file\"><span class=\"fileinput-new\">Choose...</span><span class=\"fileinput-exists\">Change</span>
                            <input type=\"file\" id=\"".$ControlName."New\" name=\"".$ControlName."New\" accept=\"image/png, image/gif, image/jpeg\" size=\"$Size\" class=\"$Class\">
                            </span>
                            <a href=\"#\" class=\"input-group-addon btn btn-default fileinput-exists\" data-dismiss=\"fileinput\">Remove</a>
                          </div><br>";
    	if($Preview){
	    	$HTML_Code.="<img src=\"$ImageFile\" border=\"";
        	if(!$CurrentImage||!file_exists($ImageFile)){$HTML_Code.="0";}else{$HTML_Code.="1";}
	    	if($ThumbnailWidth){$HTML_Code.=" width=$ThumbnailWidth";}else{$HTML_Code.="\" height=\"$ThumbnailHeight";}
	    	$HTML_Code.="\">";
		}
    	if($CurrentImage and file_exists($ImageFile))$HTML_Code.="<br>".CTL_InputCheck($ControlName."Delete")." Delete current picture";
    	$HTML_Code.="<input type=\"hidden\" name=\"$ControlName\" value=\"$CurrentImage\"></div>";
		return $HTML_Code;
	}

	//A control to make a custom window/panel/box with Caption, icon, etc.
	function CTL_Window($Title="", $Content="", $Width="", $Icon="system", $Template=""){
	    global $Application;

		 DebugFunctionTrace($FunctionName="CTL_Window", $Parameter=array("Title"=>$Title, "Content"=>$Content, "Width"=>$Width, "Icon"=>$Icon, "Template"=>$Template), $UseURLDebugFlag=true); 

		if($Icon){
			$HTML_Icon="
								<td width=\"1\" valign=\"top\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/window/".$Template."window_icon_".$Icon.".png\"></td>
								<td width=\"1\">&nbsp;&nbsp;</td>
			";
		}else{$HTML_Icon="";}
		$HTML="
		    <div align=\"center\" class=\"window\">
				<table class=\"".$Template."WindowTable\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
					<tr class=\"".$Template."WindowRowTop\">
						<td class=\"".$Template."WindowRowTopCellLeft\"></td>
						<td class=\"".$Template."WindowRowTopCellCenter\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									<td width=\"1\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/window/".$Template."window_icon_info.gif\"></td>
									<td width=\"1\">&nbsp;</td>
									<td class=\"".$Template."WindowTitle\">$Title</td>
								</tr>
							</table>
						</td>
						<td class=\"".$Template."WindowRowTopCellRight\"></td>
					</tr>
					<tr class=\"".$Template."WindowRowMiddle\">
						<td class=\"".$Template."WindowRowMiddleCellLeft\"></td>
						<td class=\"".$Template."WindowRowMiddleCellCenter\" width=\"$Width\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									".$HTML_Icon."
									<td class=\"".$Template."WindowContent\">$Content</td>
								</tr>
							</table>
						</td>
						<td class=\"".$Template."WindowRowMiddleCellRight\"></td>
					</tr>
					<tr class=\"".$Template."WindowRowBottom\">
						<td class=\"".$Template."WindowRowBottomCellLeft\"></td>
						<td class=\"".$Template."WindowRowBottomCellCenter\"></td>
						<td class=\"".$Template."WindowRowBottomCellRight\"></td>
					</tr>
				</table>
			</div>
		";
		return $HTML;
	}
	//Datagrid control!
	function CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName,
		$ColumnTitle,
		$ColumnShort,
		$ColumnAlign,
		$ColumnType,
		$Where,
		$AddButton=true,
		$SearchValue=array(),
		$RecordShowUpTo,
   		$SortBy,
    	$SortType,
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption="",
		$PageName=""
	){
		
		 DebugFunctionTrace($FunctionName="CTL_Datagrid", $Parameter=array("Entity"=>$Entity, "ColumnName"=>$ColumnName, "ColumnTitle"=>$ColumnTitle, "ColumnAlign"=>$ColumnAlign, "ColumnType"=>$ColumnType, "Rows"=>$Rows, "SearchHTML"=>$SearchHTML, "ControlHTML"=>$ControlHTML, "AdditionalLinks"=>$AdditionalLinks, "AdditionalActionParameter"=>$AdditionalActionParameter, "ActionLinks"=>$ActionLinks, "SearchPanel"=>$SearchPanel, "ControlPanel"=>$ControlPanel, "CheckBox"=>$CheckBox, "EntityAlias"=>$EntityAlias, "SortLinkExtraParameter"=>$SortLinkExtraParameter, "ControlPanelFormActionExtraParameter"=>$ControlPanelFormActionExtraParameter), $UseURLDebugFlag=true);

	    global $Application;
	    $EntityLower=strtolower($Entity);
	    if($EntityAlias=="")$EntityAlias=$Entity;
		if($PageName=="")$PageName=strtolower($Entity);
	    $EntityAliasLower=strtolower($EntityAlias);
		$extraLink=mysqli_escape(json_encode($AdditionalLinks));
		$HTML_Grid="
			<div class='header'>
				<h2>$EntityCaption</h2>
		";
		if($AddButton==1){
			$HTML_Grid.="
				<div class='breadcrumb-wrapper'>
					<button class=\"btn btn-success\" type=\"button\" onclick='window.location=\"".$PageName."insertupdate\"'>
						<i class=\"fa fa-plus\"></i> ADD
					</button>
					<button class=\"btn btn-warning\" type=\"button\" onclick='action(\"Delete Selected\",\"\")'>
						<i class=\"fa fa-trash\"></i> Delete
					</button>
				</div>
			";
		}
		$HTML_Grid.="
			</div>
			<div class='panel'>
			<div class='panel-content'>
			<div class='row'>
		    <table id='grid_data' class='display grid-data' cellspacing='0' width='100%'>
				<thead>
					<tr>
						<th><input name=\"select_chk\" value=\"1\" class=\"selchckbox ncheckbox\" id=\"select-chk\" type=\"checkbox\"></th>
						<th>SL.</th>
		";
		foreach($ColumnTitle as $getColumn) {
			$HTML_Grid .= "
						<th>".$getColumn."</th>
			";
		}
		if($ActionLinks==1){
			$HTML_Grid.="
						<th></th>
			";
		}
			$HTML_Grid.="
					</tr>
				</thead>
			</table>
			</div>
			</div>
			</div>
			<script type=\"text/javascript\">
				var columnSearch = [];
				var columnType = [];
				columnSearch.push('checkbox');
				columnType.push('checkbox');
				columnSearch.push('serial');
				columnType.push('serial');
			";
				foreach($SearchValue as $getSearch){
					$HTML_Grid.="
						columnSearch.push('".$getSearch."');
					";
				}
				foreach($ColumnType as $getColumnType){
					$HTML_Grid.="
						columnType.push('".$getColumnType."');
					";
				}
				$HTML_Grid.="
						columnType.push('action');
				";
			if($AddButton){
				$AddButton=1;
			}else{
				$AddButton=0;
			}
			if($ActionLinks){
				$ActionLinks=1;
			}else{
				$ActionLinks=0;
			}
			
			$HTML_Grid.="
				var condition='".urlencode($Where)."';
				var table = $('.grid-data').DataTable( {
					'processing': true,
					'serverSide': true,
					'ajax':{
						'url':'".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="data-table",$OtherParameter="mco=t&entity=".$Entity."&alias=".$EntityAlias."&pagename=".$PageName)."&condi='+(condition)+'&clmtype='+columnType+'&clmsearch='+columnSearch+'&actionLinks=".$ActionLinks."&additionalLinks={$extraLink}&additionalActionParameter={$AdditionalActionParameter}&short=".$SortBy."&shorttype=".$SortType."',
						'type': 'POST'
					},
					'columns': [
					";
		$c=0;
		$gridColumn="{data : 'checkbox',name: 'checkbox',orderable : false},{data : 'SL',name: 'SL'},";
		foreach($ColumnName as $MyColumn){
			$gridColumn.="{data : '{$MyColumn}',name: '{$ColumnTitle[$c]}', orderable : {$ColumnShort[$c]}},";
			$c++;
		}
		if($ActionLinks==1){
			$gridColumn.="{data : 'Action',name: '', orderable : false},";
		}
		$HTML_Grid.=substr($gridColumn,0,-1)."],";
		$HTML_Grid.="
					'order': [[ ".$SortBy.", '".$SortType."' ]]
				});
				$('.grid-data tbody').on( 'click', 'tr', function () {
					$(this).toggleClass('selected');
					var checkBoxes = $(this).find('.cschkbox');
					$(this).find('.cschkbox').prop(\"checked\", !checkBoxes.prop(\"checked\"));
				});
				$('#select-chk').on('click', function(){
				  // Get all rows with search applied
				  var rows = table.rows({ 'search': 'applied' }).nodes();
				  // Check/uncheck checkboxes for all rows in the table
				  $('input[type=\"checkbox\"]', rows).prop('checked', this.checked);
				  if(!this.checked){
				  	$('.grid-data tbody tr').removeClass('selected');
				  }else{
				  	$('.grid-data tbody tr').addClass('selected');
				  }
			   });

			   // Handle click on checkbox to set state of \"Select all\" control
			   $('.grid-data tbody').on('change', 'input[type=\"checkbox\"]', function(){
				  // If checkbox is not checked
				  if(!this.checked){
					 var el = $('#select-all').get(0);
					 // If \"Select all\" control is checked and has 'indeterminate' property
					 if(el && el.checked && ('indeterminate' in el)){
						// Set visual state of \"Select all\" control
						// as 'indeterminate'
						el.indeterminate = true;
					 }
				  }
			   });
				function gridTextUpdate (elmid,entity,uuid,field) {
				    var val = jQuery('#'+elmid).val();
					jQuery.ajax({
						url: '".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="gridtextupdate",$OtherParameter="mco=t&elmid='+elmid+'&entity='+entity+'&uuid='+uuid+'&field='+field+'&val='+val").",
						success: function (data) {
						    jQuery('#'+elmid).addClass('successBorder');
							//jQuery(\"#flexme\").DataTable().draw();
						}
					});
				}
				function activeToggle (entity,uuid,field,val) {
					jQuery.ajax({
						url: '".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="activetoggle",$OtherParameter="mco=t&entity='+entity+'&uuid='+uuid+'&field='+field+'&val='+val").",
						success: function (data) {
							jQuery(\".grid-data\").DataTable().draw();
						}
					});
				}
				function action(com, grid) {
					if (com == 'Delete') {
						swal({
						  title: \"Confirm Delete\",
						  text: \"Are you sure you want to delete this record?\",
						  type: \"warning\",
						  showCancelButton: true,
						  confirmButtonClass: \"btn-danger\",
						  confirmButtonText: \"Yes, delete it!\",
						  closeOnConfirm: false
						}).then(
						function(){
						  jQuery.ajax({type: \"GET\",url: grid,success: function(msg){jQuery(\".grid-data\").DataTable().draw();}});
						  swal({title:\"Deleted!\", text:\"The record has been deleted.\",type:\"success\",timer: 2000}).then(
							function() {},
							function() {}
						  );
						});
					} else if (com == 'Add') {
						window.location.href='".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$PageName."insertupdate")."';
					} else if (com == 'Delete Selected') {
						if($('.dataTable .selected').find('input[type=checkbox]:checked').length == 0)
    					{
							swal(\"Select checkbox\", \"Please select at least one record to delete\",\"info\");
    					}else{
							swal({
							  title: \"Confirm Delete\",
							  text: \"Are you sure you want to delete the selected records?\",
							  type: \"warning\",
							  showCancelButton: true,
							  confirmButtonClass: \"btn-danger\",
							  confirmButtonText: \"Yes, delete it!\",
							  closeOnConfirm: false
							}).then(
							function(){
							  var ids = [];
								a=0;
								jQuery(\".dataTable .selected .ncheckbox\").each(function(){
									ids[a]=jQuery(this).val();
									a++;
								});

								jQuery.ajax({
								  type: \"POST\",
								  dataType : 'json',
								  data:'multiple_id='+ids,
								  url: '".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$PageName."delete",$OtherParameter="mco=t")."',
								  success: function(msg){
									  jQuery(\".grid-data\").DataTable().draw();
									  swal({title:\"Deleted!\", text:\"All the selected records has been deleted.\",type:\"success\",timer: 2000}).then(
										function() {},
										function() {}
									  );
								  }
								});
							});
						}
					}
				}  
			</script>
		";
		return $HTML_Grid;
	}
	function CTL_Thumbnail($Thumbnail, $Width=148, $Height=148, $ThumbnailStyle="standard", $BackgroundColor="White"){

		DebugFunctionTrace($FunctionName="CTL_Thumbnail", $Parameter=array("Thumbnail"=>$Thumbnail, "Width"=>$Width, "Height"=>$Height, "ThumbnailStyle"=>$ThumbnailStyle, "BackgroundColor"=>$BackgroundColor), $UseURLDebugFlag=true);


	    $HTML="
	        <!-- Thumbnail start -->
			<table cellspacing=\"0\">
				<tr>
				    <td colspan=\"99\" width=\"1\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/thumbnail_".$ThumbnailStyle."_border_top.gif\"></td>
				</tr>
				<tr>
				    <td width=\"1\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/thumbnail_".$ThumbnailStyle."_border_left.gif\"></td>
				    <td style=\"background-color: $BackgroundColor;\"><a href=\"./image/".$Thumbnail.".gif\" target=\"_blank\"><img src=\"./image/".$Thumbnail."_thumbnail.gif\" width=\"$Width\" height=\"$Height\"></a></td>
				    <td width=\"1\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/thumbnail_".$ThumbnailStyle."_border_right.gif\"></td>
				</tr>
				<tr>
				    <td colspan=\"99\" width=\"1\"><img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/thumbnail_".$ThumbnailStyle."_border_bottom.gif\"></td>
				</tr>
			</table>
	        <!-- Thumbnail end -->
		";
		return $HTML;
	}
	function CTL_ThumbnailGrid($Images, $Columns=4, $Spacing=15){

		DebugFunctionTrace($FunctionName="CTL_ThumbnailGrid", $Parameter=array("Images"=>$Images, "Columns"=>$Columns, "Spacing"=>$Spacing), $UseURLDebugFlag=true);

		$Rows=ceil(count($Images)/$Columns);
	    $ThumbnailGrid="
			<!-- Start of Thumbnail grid -->
			<table cellspacing=\"$Spacing\">
		";
		for($RowCounter=1; $RowCounter<=$Rows; $RowCounter++){
		    $ThumbnailGrid.="<tr>";
		    for($ColumnCounter=1; $ColumnCounter<=$Columns; $ColumnCounter++){
		        $CurrentImage=(($RowCounter*$Columns)-$Columns)+$ColumnCounter;
		        if($CurrentImage<=count($Images)){
		            $ThumbnailGrid.="<td>".CTL_Thumbnail($Images[$CurrentImage-1])."</td>";
				}
			}
		    $ThumbnailGrid.="</tr>";
		}
	    $ThumbnailGrid.="
			</table>
			<!-- End of Thumbnail grid -->
		";
		return $ThumbnailGrid;
	}
?>