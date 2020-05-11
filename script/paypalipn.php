<?php
	/*
		Script:		paypalipn.php
		Author:		PRITHU AHMED
		Date:		Last updated 01-21-12
		Purpose:	Interacts with the application in response with PayPal transaction response
		Note:		THIS IS THE ACTUAL PAGE THAT TAKES NECESSARY ACTIONS UPON A SUCCESSFUL PAYMENT VIA PAYPAL
	*/
	
	//The payment was made, update payment record
	$Payment=SQL_PaymentSelect($Where="P.PaymentUUID = '".REQUEST('PaymentUUID')."'", $OrderBy="", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
	SQL_PaymentInsertUpdate(
		$PaymentData=array(
		    "PaymentPurpose"=>$Payment["PaymentPurpose"],
		    "PaymentDescription"=>$Payment["PaymentDescription"],
		    "UserUUID"=>$Payment["UserUUID"],
		    "AmountPayable"=>$Payment["AmountPayable"],
		    "AmountPaid"=>$Payment["AmountPayable"],
		    "DatePaid"=>date("Y-m-d"),
		),
		$Where="PaymentUUID = '".REQUEST('PaymentUUID')."'"
	);

	$Payment=SQL_PaymentSelect($Where="P.PaymentUUID = '".REQUEST('PaymentUUID')."'", $OrderBy="", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
	//Email a notification to the administrator
	SendMail(
		$ToEmail=$Application["EmailContact"],
		$Subject="New payment alert",
		$Body="
		    Dear Admin,<br><br>
			This is to notify that a payment of &pound; {$Payment["AmountPayable"]} has successfully been made
			for the item of {$Payment["PaymentDescription"]} and you should be notified
			by your payment processor as well shortly.<br>
			<br>
			Please click <a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="login")."\">here</a> to log into your account.<br>
			<br>
			Thanking you,<br>
			<br>
			<b>{$Application["Title"]}</b>
		",
		$FromName=$Application["Title"],
		$FromEmail = $Application["EmailContact"],
		$ReplyToName=$Application["Title"],
		$ReplyToEmail=$Application["EmailContact"],
		$ExtraHeaderParameters=""
	);

	//Email a notification to the administrator
	SendMail(
		$ToEmail=$_SESSION["UserEmail"],
		$Subject="Payment successful",
		$Body="
		    Dear {$_SESSION["UserName"]},<br><br>
			This is to notify that your payment &pound; {$Payment["AmountPayable"]} has successfully been made
			for the item of {$Payment["PaymentDescription"]}<br>
			<br>
			Thanking you,<br>
			<br>
			<b>{$Application["Title"]}</b>
		",
		$FromName=$Application["Title"],
		$FromEmail = $Application["EmailContact"],
		$ReplyToName=$Application["Title"],
		$ReplyToEmail=$Application["EmailContact"],
		$ExtraHeaderParameters=""
	);

	$Echo.="Payment record updated";
?>