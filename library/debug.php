<?php
	/*
		Template:   debug.php
		Purpose:    A special routine that directly prints debug information to the browser, for development purpose only.
		Risk:       Normal
		Author:     Prithu Ahmed
		Date:       February 1, 2012
	*/

	function DebugOutput(){
	    global $Application;
	    $DebugOutput="";
	    $DebugOutput.="<table>";
	    $DebugOutput.="<tr class=\"DebugVariableTypeRow\"><td colspan=\"99\">REQUEST</td></tr>";
		foreach($_REQUEST as $Variable=>$Value){$DebugOutput.="<tr><td style=\"background-color: Navy; font-size: 10px; font-weight: bold; color: White;\">$Variable</td><td class=\"background-color: Silver; font-size: 10px; font-weight: bold;\">$Value</td></tr>";}
	    $DebugOutput.="<tr class=\"DebugVariableTypeRow\"><td colspan=\"99\">POST</td></tr>";
		foreach($_POST as $Variable=>$Value){$DebugOutput.="<tr><td style=\"background-color: Navy; font-size: 10px; font-weight: bold; color: White;\">$Variable</td><td class=\"background-color: Silver; font-size: 10px; font-weight: bold;\">$Value</td></tr>";}
	    $DebugOutput.="<tr class=\"DebugVariableTypeRow\"><td colspan=\"99\">SESSION</td></tr>";
		foreach($_SESSION as $Variable=>$Value){$DebugOutput.="<tr><td style=\"background-color: Navy; font-size: 10px; font-weight: bold; color: White;\">$Variable</td><td class=\"background-color: Silver; font-size: 10px; font-weight: bold;\">$Value</td></tr>";}
	    $DebugOutput.="<tr class=\"DebugVariableTypeRow\"><td colspan=\"99\">FILES</td></tr>";
		foreach($_FILES as $Variable=>$Value){$DebugOutput.="<tr><td style=\"background-color: Navy; font-size: 10px; font-weight: bold; color: White;\">$Variable</td><td class=\"background-color: Silver; font-size: 10px; font-weight: bold;\">$Value</td></tr>";}
	    $DebugOutput.="<tr class=\"DebugVariableTypeRow\"><td colspan=\"99\">SERVER</td></tr>";
		foreach($_SERVER as $Variable=>$Value){$DebugOutput.="<tr><td style=\"background-color: Navy; font-size: 10px; font-weight: bold; color: White;\">$Variable</td><td class=\"background-color: Silver; font-size: 10px; font-weight: bold;\">$Value</td></tr>";}
	    $DebugOutput.="<tr class=\"DebugVariableTypeRow\"><td colspan=\"99\">Application</td></tr>";
		foreach($Application as $Variable=>$Value){$DebugOutput.="<tr><td style=\"background-color: Navy; font-size: 10px; font-weight: bold; color: White;\">$Variable</td><td class=\"background-color: Silver; font-size: 10px; font-weight: bold;\">$Value</td></tr>";}
	    $DebugOutput.="</table>";
	    return $DebugOutput;
	}
	
	function DebugFunctionTrace($FunctionName="", $Parameter=array(), $UseURLDebugFlag=true){
	    $ParameterHTML=$HTML="";
	    foreach($Parameter as $Name=>$Value)$ParameterHTML.="&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-weight: bold; color: blue;\">$Name</span> = <span style=\"font-weight: bold; color: red;\">'</span>$Value<span style=\"font-weight: bold; color: red;\">'</span>&nbsp;&nbsp;&nbsp;&nbsp;<br>";

	    $ID=GUID();
	    $HTML.="
	        <table cellspacing=\"0\" style=\"font-family: Courier New; font-size: 12px;\">
	            <tr><td style=\"border-style: solid; border-width: 1px; border-color: yellow; background-color: red; font-weight: bold;\"><a href=\"#\" style=\"color: white;\" onclick=\"ToggleVisibilityByElementID('DebugParameterDivision_$ID')\">&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-weight: bold; color: yellow;\">".date("M d, Y H:i:s")." &gt;</span> $FunctionName()&nbsp;&nbsp;&nbsp;&nbsp;</a></td></tr>
	            <tr><td id=\"DebugParameterDivision_$ID\" style=\"border-style: solid; border-width: 1px; border-color: RED; background-color: yellow;\"><a name=\"DebugParameterDivision_$ID\">$ParameterHTML</td></tr>
			</table>
	        <script language=\"JavaScript\">document.getElementById('DebugParameterDivision_$ID').style.display = 'none';</script>
		";
		
		if($UseURLDebugFlag&&isset($_REQUEST["Debug"]))print $HTML;
	}
?>