<?php
	/*
		Template:   verisign.pfpro.php
		Purpose:    VeriSign PayFlow Pro wrapper
		Risk:       Critical
		Author:     Shahriar Kabir (SKJoy2001@Yahoo.Com)
		Date:       February 1, 2004
	*/

	$VeriSignPFPro["RESPONSECODE_SUCCESS"]=0;		$VeriSignPFPro["RESPONSEMESSAGE_SUCCESS"]=   "The operation completed successfully";
	$VeriSignPFPro["RESPONSECODE_ERROR_DEMO"]=-999;	$VeriSignPFPro["RESPONSEMESSAGE_ERROR_DEMO"]="This is a DEMO error";

	//VeriSign PayFlow Pro processing routine
	function VeriSign_PFPro_Transact($UserName, $Merchant, $Partner, $Password, $Amount, $CreditCardNumber, $CreditCardExpiryDate, $Host="test-payflow.verisign.com", $Port="443"){


		DebugFunctionTrace($FunctionName="VeriSign_PFPro_Transact", $Parameter=array("UserName"=>$UserName, "Merchant"=>$Merchant, "Partner"=>$Partner, "Password"=>$Password, "Amount"=>$Amount, "CreditCardNumber"=>$CreditCardNumber, "CreditCardExpiryDate"=>$CreditCardExpiryDate, "Host"=>$Host, "Port"=>$Port), $UseURLDebugFlag=true);

	    global $VeriSignPFPro;
	    
	    $Response=array();

		$Transaction=array(
			"PARTNER"	=>	$Partner,
			"VENDOR"	=>	$Merchant,
			"USER"		=>	$UserName,
		        "PWD"		=>	$Password,
		        "TRXTYPE"	=>	"S",
	        	"TENDER"	=>	"C",
		        "AMT"		=>	$Amount,
		        "ACCT"		=>	$CreditCardNumber,
	        	"EXPDATE"	=>	$CreditCardExpiryDate
		);

		$Response=pfpro_process($Transaction, $Host, $Port);
		pfpro_cleanup();

		return $Response;
		//Comment the above line & uncomment the following line when you want to develop your application assuming that the transaction
		//went successful avoiding a real caonnection to the VeriSign server.
		//return array("RESULT"=>$VeriSignPFPro["RESPONSECODE_SUCCESS"], "RESPMSG"=>$VeriSignPFPro["RESPONSEMESSAGE_ERROR_DEMO"]);
	}
?>
