<?php
	function CheckRequiredFormVariables($Variable){
		DebugFunctionTrace($FunctionName="CheckRequiredFormVariables", $Parameter=array("Variable"=>$Variable), $UseURLDebugFlag=true);

	    global $ErrorUserInput;
		foreach($Variable as $ThisVariable){
		    if(trim($_POST[$ThisVariable["Name"]])==""){
			    //print "'{$ThisVariable["Name"]}' = '".trim($_POST[$ThisVariable["Name"]])."' found NULL<hr>";
		        $ErrorUserInput["_Error"]=true;
		        $ErrorUserInput["_Message"]=$ThisVariable["Message"];
		        $ErrorUserInput[$ThisVariable["Name"]]=true;
			}
		}
	}

	function SetFormVariable($VariableName, $DefaultValue="", $SetErrorFlag=true, $UseRequestVariable=true, $Debug=false){

		DebugFunctionTrace($FunctionName="SetFormVariable", $Parameter=array("VariableName"=>$VariableName, "DefaultValue"=>$DefaultValue, "SetErrorFlag"=>$SetErrorFlag, "UseRequestVariable"=>$UseRequestVariable, "Debug"=>$Debug), $UseURLDebugFlag=true);

	    if(isset($_REQUEST[$VariableName]))$Debug_1="\$_REQUEST[\"$VariableName\"] = '{$_REQUEST[$VariableName]}' is set, skipping \$DefaultValue";
	    if(!isset($_REQUEST[$VariableName]))$Debug_1="\$_REQUEST[\"$VariableName\"] is NOT set, setting \$DefaultValue";

	    global $ErrorUserInput;
	    if($SetErrorFlag){
			if(!isset($ErrorUserInput["_Error"]))$ErrorUserInput["_Error"]=false;
		    if(!isset($ErrorUserInput[$VariableName]))$ErrorUserInput[$VariableName]=false;
		}
	    if($UseRequestVariable)if(!isset($_REQUEST[$VariableName]))$_REQUEST[$VariableName]=$DefaultValue;
	    if(!isset($_POST[$VariableName])){
			$_POST[$VariableName]=$DefaultValue;
	        if($UseRequestVariable)$_POST[$VariableName]=$_REQUEST[$VariableName];
		}
		if($Debug)print "
		    SetFormVariable($VariableName='$VariableName', \$DefaultValue='$DefaultValue', \$SetErrorFlag=$SetErrorFlag, \$UseRequestVariable=$UseRequestVariable, \$Debug=$Debug){<br>
		        $Debug_1<br>
		        \$_REQUEST[\"$VariableName\"] = '{$_REQUEST["$VariableName"]}';<br>
		        \$_POST[\"$VariableName\"] = '{$_POST["$VariableName"]}';<br>
			}
			<hr>
		";
	}
	
	function FormTitleRow($FormTitle){
		DebugFunctionTrace($FunctionName="FormTitleRow", $Parameter=array("FormTitle"=>$FormTitle), $UseURLDebugFlag=true);

	    return '<div class="panel-header bg-dark"><h2>'.$FormTitle.'</h2></div>';
	}
	
	function FormErrorRow($EntityName){
		DebugFunctionTrace($FunctionName="FormErrorRow", $Parameter=array("EntityName"=>$EntityName), $UseURLDebugFlag=true);
	   
		global $ErrorUserInput;
	    $HTML="";
	    if($ErrorUserInput["_Error"])$HTML="<tr class=\"FormRowErrorMessage\"><td>{$ErrorUserInput["_Message"]}</td></tr>";
	    return $HTML;
	}
	
	function FormInputSectionRow($Caption=""){
		DebugFunctionTrace($FunctionName="FormInputSectionRow", $Parameter=array("Caption"=>$Caption), $UseURLDebugFlag=true);
    	return "<label class='col-sm-3 control-label'>$Caption</label>";
	}
	
	function FormInputRow($VariableName, $Caption, $ControlHTML, $Required=false){

	   DebugFunctionTrace($FunctionName="FormInputRow", $Parameter=array("VariableName"=>$VariableName, "Caption"=>$Caption, "ControlHTML"=>$ControlHTML, "Required"=>$Required), $UseURLDebugFlag=true);

	    global $ErrorUserInput;
	    $RequiredSymbol="&nbsp;";
	    if($Required)$RequiredSymbol="*";
		$HTML="";
		if(!empty($Caption)) {
			$HTML .= "<label class='col-sm-3 control-label'";
			if ($ErrorUserInput[$VariableName]) $HTML .= " class=\"FormFieldCaptionError\"";
			$HTML .= ">$Caption</label>";
		}
		$HTML.=$ControlHTML;
		return $HTML;
	}
	
	function FormButtonRow($ButtonCaption,$ActionURL){
		DebugFunctionTrace($FunctionName="FormButtonRow", $Parameter=array("ButtonCaption"=>$ButtonCaption), $UseURLDebugFlag=true);
		$scriptName=$_REQUEST["Script"];
		if(preg_match("/insertupdate/", $scriptName)) {
			$string_exploded = explode('insertupdate',$scriptName);
			$GetValue=$string_exploded[0]."manage"; 
		}elseif(preg_match("/manage/", $scriptName)){
			$string_exploded = explode('manage',$scriptName);
			$GetValue=$string_exploded[0]."manage";
		}else{
			$GetValue="home";
		}
	    return "<div class='row'><div class='col-sm-9 col-sm-offset-3'><div class='pull-right'>
		<button TYPE=\"BUTTON\" Class=\"cancel btn btn-embossed btn-default m-b-10 m-r-0\" style=\"border:none\" ONCLICK=\"window.location='".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$GetValue)."'\">Cancel</button>&nbsp;".CTL_InputSubmit("btnSubmit", $ButtonCaption)."</div></div></div>";
	}

	function FormInsertUpdate($EntityName, $FormTitle, $Input, $ButtonCaption, $ActionURL){
	  
		DebugFunctionTrace($FunctionName="FormInsertUpdate", $Parameter=array("EntityName"=>$EntityName,"FormTitle"=>$FormTitle,"Input"=>$Input,"ButtonCaption"=>$ButtonCaption,"ActionURL"=>$ActionURL), $UseURLDebugFlag=true);

		global $ErrorUserInput;

	    $JavaScriptInputvalidator="";
		$JavaScriptEmailvalidator="";

		if(!isset($ErrorUserInput["_Error"]))$ErrorUserInput["_Error"]=false;
	    $HTML="
		<div class='row'>
			<div class='col-md-12'>
				<div class='panel panel-default'>
			".FormTitleRow($FormTitle)."
			<div class='panel-content bg-white'>
				<div class='row'>
					<div class='col-md-12 col-sm-12 col-xs-12'>
						<div id=\"content-loading\"></div>
				<form name=\"frm".$EntityName."InsertUpdate\" class=\"form-horizontal\" id=\"app-form\" action=\"$ActionURL\" method=\"post\" enctype=\"multipart/form-data\" >
					    ".FormErrorRow($EntityName)."
		";
		foreach($Input as $ThisInput){
			$HTML.="<div class='form-group'>";
		    if($ThisInput["VariableName"]=="SectionTitleRow"){
				if(!empty($ThisInput["Caption"])) {
					$HTML .= FormInputSectionRow($Caption = $ThisInput["Caption"]);
				}
			}else{
			    SetFormVariable($ThisInput["VariableName"], $ThisInput["DefaultValue"], $SetErrorFlag=true, $UseRequestVariable=true);

			    /*if($ThisInput["Required"]){$JavaScriptInputvalidator.="
					if(document.getElementById('{$ThisInput["VariableName"]}').value==''){
						InputValid=false; 
						WarningMessage+='    &raquo; ".str_replace("'", "\'", $ThisInput["Caption"]).".<br>';
					}
				";
					
						if (strpos($ThisInput["Caption"],"Email") !== false) {
							$JavaScriptEmailvalidator.="
							var frmName = document.getElementById('app-form');
							var mystring= new String(frmName.{$ThisInput["VariableName"]}.value);
							var mymailid=/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/;
							var mailid=mystring.search(mymailid)
							if (mailid==-1)
							{
								InputValid=false;
								jAlert('Email address invalid', 'Alert Dialog');
								return InputValid;
							}
							";					
						}
				}*/
			    $HTML.=FormInputRow($ThisInput["VariableName"], $Caption=$ThisInput["Caption"], $ControlHTML=$ThisInput["ControlHTML"], $Required=$ThisInput["Required"]);
			}
			$HTML.="</div>";
		}
	    $HTML.="
					    ".FormButtonRow($ButtonCaption,$ActionURL)."
								<div id=\"basic-preview\" class=\"preview active\" style='display:none'>
									<div class=\"alert media fade in alert-success\">
										<p></p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		";
		
		return $HTML;
	}
	
	function FormButtonRowNoCancel($ButtonCaption,$ActionURL){
		DebugFunctionTrace($FunctionName="FormButtonRow", $Parameter=array("ButtonCaption"=>$ButtonCaption), $UseURLDebugFlag=true);
	    return "<div class='row'><div class='col-sm-9 col-sm-offset-3'><div class='pull-right'>".CTL_InputSubmit("btnSubmit", $ButtonCaption)."</div></div></div>";
	}

	function FormInsertUpdateNoAjax($EntityName, $FormTitle, $Input, $ButtonCaption, $ActionURL){
	  
		DebugFunctionTrace($FunctionName="FormInsertUpdate", $Parameter=array("EntityName"=>$EntityName,"FormTitle"=>$FormTitle,"Input"=>$Input,"ButtonCaption"=>$ButtonCaption,"ActionURL"=>$ActionURL), $UseURLDebugFlag=true);

		global $ErrorUserInput;

		if(!isset($ErrorUserInput["_Error"]))$ErrorUserInput["_Error"]=false;
	    $HTML="
			<div class='row'>
				<div class='col-md-12'>
					<div class='panel panel-default'>
						".FormTitleRow($FormTitle)."
						<div class='panel-content bg-white'>
							<div class='row'>
								<div class='col-md-12 col-sm-12 col-xs-12'>
									<div id=\"content-loading\"></div>
									<form name=\"frm".$EntityName."InsertUpdate\" class=\"form-horizontal\" action=\"$ActionURL\" method=\"post\" enctype=\"multipart/form-data\" >
					   					".FormErrorRow($EntityName)."
		";
		foreach($Input as $ThisInput){
			$HTML.="<div class='form-group'>";
		    if($ThisInput["VariableName"]=="SectionTitleRow"){
				if(!empty($ThisInput["Caption"])) {
					$HTML .= FormInputSectionRow($Caption = $ThisInput["Caption"]);
				}
			}else{
			    SetFormVariable($ThisInput["VariableName"], $ThisInput["DefaultValue"], $SetErrorFlag=true, $UseRequestVariable=true);
			    $HTML.=FormInputRow($ThisInput["VariableName"], $Caption=$ThisInput["Caption"], $ControlHTML=$ThisInput["ControlHTML"], $Required=$ThisInput["Required"]);
			}
			$HTML.="</div>";
		}
	    $HTML.=FormButtonRowNoCancel($ButtonCaption,$ActionURL)."
										<div id='basic-preview' class='preview active' style='display:none'>
											<div class='alert media fade in alert-success'>
												<p></p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		";
		
		return $HTML;
	}