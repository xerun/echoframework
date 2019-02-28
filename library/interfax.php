<?php
	include "./library/nusoap/nusoap.php";
	
	$InterFAXErrorCode=array(
		"-112"=>"No valid recipients added or missing fax number",
		"-123"=>"No valid documents attached",
		"-150"=>"Internal System Error",
		"-1002"=>"Number of types does not match number of document sizes string",
		"-1003"=>"Authentication error",
		"-1004"=>"Missing file type",
		"-1005"=>"Transaction does not exist",
		"-1007"=>"Size value is not numeric or not greater than 0",
		"-1008"=>"Total sizes does not match filesdata length",
		"-1009"=>"Image not available (may happen if the 'delete fax after completion' feature is active)",
		"-1030"=>"Invalid Verb or VerbData",
		"-3001"=>"Invalid MessageID",
		"-3002"=>"From parameter is larger than image size",
		"-3003"=>"Image doesn't exist",
		"-3004"=>"TIFF file is empty",
		"-3005"=>"Chunk size is smaller than 1",
		"-3006"=>"Max item is smaller than 1",
		"-3007"=>"No permission for this action (In inbound method GetList, LType is set to AccountAllMessages or AccountNewMessages, when the username is not a Primary user)"
	);

	function InterFAX_SendHTML($UserName="Joy2GP", $Password="password", $FAXNumber="008801720007627", $Data="TEST FAX"){
	
		DebugFunctionTrace($FunctionName="InterFAX_SendHTML", $Parameter=array("UserName"=>$UserName, "Password"=>$Password, "FAXNumber"=>$FAXNumber, "Data"=>$Data), $UseURLDebugFlag=true);

	    /*
	        Send character based FAX (HTML or TEXT).

	        Syntax:	InterFAX_SendHTML(
						$UserName (string) 		= InterFAX username of the subscriber,
						$Password (string) 		= InterFAX password of the subscriber,
						$FAXNumber (string) 	= Number to send the FAX to, in full international format (e.g.: 00<COUNTRY_CODE>0<AREA_CODE><PHONE_NUMBER>),
						$Data (string) 			= HTML/TEXT data to send
					)
					
			Return: This function returns an array with result code and result description. Any positive number in the code denotes a
			        Transaction ID, in another word, success. Any negative value in the code denotes an error and the description has a
			        humanly readable textual representation of the error.
			        
			        Array_return(
						"Code" (numeric) = Negative in case of error and positive as the Transaction ID when succeds,
						"Description" (string) = Description of the result
					)
	    */
	    
		$FAXChannel = new soapclient("http://ws.interfax.net/dfs.asmx?wsdl", true);
		$FAXParameter[] = array(
			"Username"        => $UserName,
		    "Password"        => $Password,
		    "FaxNumber"       => $FAXNumber,
		    "Data"            => $Data,
		    "FileType"        => "TXT"
		);

		$FAXResult = $FAXChannel->call("SendCharFax", $FAXParameter);
		if($FAXResult["SendCharFaxResult"]<0){$Response=$InterFAXErrorCode[$FAXResult["SendCharFaxResult"]];}else{$Response="FAX Transmission Succeeded";}
	    return array("Code"=>$FAXResult["SendCharFaxResult"], "Description"=>$Response);
	}
?>
