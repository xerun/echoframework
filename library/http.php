<?php
	/*
		Template:   http.php
		Purpose:    HTTP protocol related function, an alternate approach to the CURL PHP extension
		Risk:       Normal
		Author:     PRITHU AHMED
		Date:       February 1, 2012
	*/

	//Return only the current script filename
	function ScriptFileName($URL=""){
	    $SFN=$URL;
	    if($SFN=="")$SFN=$_SERVER["SCRIPT_NAME"];
	    if(substr($SFN, 0, 7)=="http://")$SFN=substr($SFN, 7 + strlen($_SERVER["HTTP_HOST"]));
	    if(substr($SFN, 0, 7)=="https://")$SFN=substr($SFN, 8 + strlen($_SERVER["HTTP_HOST"]));

	    $SFN=explode("/", $SFN);

		return $SFN[count($SFN)-1];
	}

	//Return only the current script's path
	function ScriptPath($URL=""){
	    $SP=$URL;
	    if($SP=="")$SP=$_SERVER["SCRIPT_NAME"];
	    if(substr($SP, 0, 7)=="http://")$SP=substr($SP, 7 + strlen($_SERVER["HTTP_HOST"]));
	    if(substr($SP, 0, 7)=="https://")$SP=substr($SP, 8 + strlen($_SERVER["HTTP_HOST"]));

	    return substr($SP, 0, strlen($SP)-strlen(ScriptFileName($URL)));
	}
?>
