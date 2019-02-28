<?php
	/*
		Template:   email.php
		Purpose:    Email related functions
		Risk:       Normal
		Author:     PRITHU AHMED
		Date:       January 19, 2013
	*/

	//$EmailExtraHeaderDelimeter=chr(13).chr(10); //For Windows server
	$EmailExtraHeaderDelimeter="\r\n";          //For LINUX server

	//Send email with custom header information in the easy way
	function SendMail($ToEmail="", $Subject="", $Body="", $FromName="", $FromEmail = "", $ReplyToName="", $ReplyToEmail="", $ExtraHeaderParameters="", $Debug=false){
		//DebugFunctionTrace($FunctionName="SendMail", $Parameter=array("ToEmail"=>$ToEmail, "Subject"=>$Subject, "Body"=>$Body, "FromName"=>$FromName, "FromEmail"=>$FromEmail, "ReplyToName"=>$ReplyToName, "ReplyToEmail"=>$ReplyToEmail, "ExtraHeaderParameters"=>$ExtraHeaderParameters, "Debug"=>$Debug), $UseURLDebugFlag=true);

		global $EmailExtraHeaderDelimeter, $Application;
		
		if($Debug)print "
		    function SendMail(\$ToEmail='$ToEmail', \$Subject='$Subject', \$Body='$Body', \$FromName='$FromName', \$FromEmail = '$FromEmail', \$ReplyToName='$ReplyToName', \$ReplyToEmail='$ReplyToEmail', \$ExtraHeaderParameters='$ExtraHeaderParameters', \$Debug=$Debug){<br>
		    <br>
		    }
		";

		if($FromName=="")$FromName=$Application["Title"];
		if($FromEmail=="")$FromEmail=$Application["EmailSupport"];

		if($ReplyToName=="")$ReplyToName=$FromName;
		if($ReplyToEmail=="")$ReplyToEmail=$FromEmail;

		$ExtraHeader="";
		$ExtraHeader.="From: $FromName <$FromEmail>".$EmailExtraHeaderDelimeter;
		$ExtraHeader.="Reply-To: $ReplyToName <$ReplyToEmail>".$EmailExtraHeaderDelimeter;

		//You must supply the full extra header information, not just the values, and also the delimeters for multiple headers
		if($ExtraHeaderParameters!=""){$ExtraHeader=$ExtraHeader.$ExtraHeaderParameters.$EmailExtraHeaderDelimeter;}

		$ExtraHeader=$ExtraHeader."MIME-Version: 1.0".$EmailExtraHeaderDelimeter;
		$ExtraHeader=$ExtraHeader."X-Mailer: ".$Application["Title"]."/1.0".$EmailExtraHeaderDelimeter;
		$ExtraHeader=$ExtraHeader."Content-Type: text/html; charset=\"iso-8859-1\"";

		@mail($ToEmail, $Subject, "<html><body>".$Body."</body></html>", $ExtraHeader);
	}

	
	//Send email with attachment in the easy way
	function SendAttachedMail($ToEmail="", $Subject="", $Body="", $FromName="", $FromEmail = "", $ReplyToName="", $ReplyToEmail="", $AttachedPath="", $AttachedFile="", $Debug=false)
	{

		global $Application;

		if($Debug)print "
		    function SendAttachedMail(\$ToEmail='$ToEmail', \$Subject='$Subject', \$Body='$Body', \$FromName='$FromName', \$FromEmail = '$FromEmail', \$ReplyToName='$ReplyToName', \$ReplyToEmail='$ReplyToEmail', \$AttachedPath='$AttachedPath', \$AttachedFile='$AttachedFile', \$Debug=$Debug){<br>
		    <br>
		    }
		";

		if($FromName=="")$FromName=$Application["Title"];
		if($FromEmail=="")$FromEmail=$Application["EmailSupport"];

		if($ReplyToName=="")$ReplyToName=$FromName;
		if($ReplyToEmail=="")$ReplyToEmail=$FromEmail;

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mime_type= finfo_file($finfo, $AttachedPath.$AttachedFile);
		finfo_close($finfo);
	
		$Header = "From: $FromName <$FromEmail>";
		$Header .= "Reply-To: $ReplyToName <$ReplyToEmail>";
		
		$files = fopen($AttachedPath.$AttachedFile,'rb');
		$data = fread($files,filesize($AttachedPath.$AttachedFile));
		fclose($files);
		  
		// Generate a boundary string
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		
		// Add the headers for a file attachment
		$Header .= "\nMIME-Version: 1.0\n" .
					  "Content-Type: multipart/mixed;\n" .
					  " boundary=\"{$mime_boundary}\"";
		
		// Add a multipart boundary above the plain message
		$Message = "This is a multi-part message in MIME format.\n\n" .
					 "--{$mime_boundary}\n" .
					 "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
					 "Content-Transfer-Encoding: 7bit\n\n" .
					 $Body . "\n\n";
		
		// Base64 encode the file data
		$data = chunk_split(base64_encode($data));
		
		// Add file attachment to the message
		$Message .= "--{$mime_boundary}\n" .
		  "Content-Type: {$mime_type};\n" .
		  " name=\"{$AttachedFile}\"\n" .
		  //"Content-Disposition: attachment;\n" .
		  //" filename=\"{$fileatt_name}\"\n" .
		"Content-Transfer-Encoding: base64\n\n" .
		$data . "\n\n" .
		"--{$mime_boundary}--\n";
	
		@mail($ToEmail, $Subject, $Message, $Header);
	}


	function IsValidEmailAddress($EmailAddress) {
		DebugFunctionTrace($FunctionName="IsValidEmailAddress", $Parameter=array("EmailAddress"=>$EmailAddress), $UseURLDebugFlag=true);

		$Valid = true;
		if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $EmailAddress))$Valid = false;
		return $Valid;
	}
?>