<?php
	/*
		Script:		paymentlander.php
		Author:		PRITHU AHMED
		Date:		Last updated 01-21-12
		Purpose:	Notifies the user of the payment result
		Note:		THIS IS NOT THE ACTUAL BACKGROUND PAGE TO INTERACT WITH PAYMENT NOTIFICATION, IPN IS PROCESSED BY ANOTHER PAGE
	*/

	//Check to see if the payment is really made
	//Try fetching the associated payment record

	//The actual payment recording code goes here
	if(!isset($_POST["RESULT"]))$_POST["RESULT"]=-1;
	if(!isset($_POST["RESPMSG"]))$_POST["RESPMSG"]="DIRECT ACCESS NOT ALLOWED";

	if($_POST["RESULT"]==0){//Payment went successful
		//Payment record update
		$Payment=SQL_PaymentSelect($Where="P.PaymentUUID = '".POST(USER2)."'", $OrderBy="", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
		SQL_PaymentInsertUpdate(
			$PaymentData=array(
			    "PaymentPurpose"			=>	$Payment["PaymentPurpose"],
			    "PaymentDescription"		=>	$Payment["PaymentDescription"],
			    "UserID"					=>	$Payment["UserID"],
			    "AmountPayable"				=>	$Payment["AmountPayable"],
			    "AmountPaid"				=>	$Payment["AmountPayable"],
			    "DatePaid"					=>	date("Y-m-d"),
	            "CouponCode"				=>	$Payment["CouponCode"],
	            "CouponDiscountPercentile"	=>	$Payment["CouponDiscountPercentile"],
	            "CouponDiscountAmount"		=>	$Payment["CouponDiscountAmount"]
			),
			$Where="PaymentID = ".POST(USER1)." AND PaymentUUID = '".POST(USER2)."'"
		);

		$Payment=SQL_PaymentSelect($Where="P.PaymentID = ".POST(USER1)." AND P.PaymentUUID = '".POST(USER2)."' AND P.AmountPayable = P.AmountPaid", $OrderBy="P.DatePaid", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);

	    MySQLQuery("UPDATE tblcoupon SET CouponScopes = CouponScopes - 1, CouponScopesUsed = CouponScopesUsed + 1 WHERE CouponCode = '{$Payment["CouponCode"]}'");

	    $Response="
	        Thank you for the payment.<br>
	        <br>
	        <b>Please click <a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="checksurveypermission", $AdditionalParameter="SurveyID={$_POST["USER3"]}&SurveyUUID={$_POST["USER4"]}&PaymentID={$_POST["USER1"]}&PaymentUUID={$_POST["USER2"]}")."\">here</a> to proceed for the survey.</b><br>
	        <br>
	        {$Application["Title"]}
		";

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
	}else{//Payment attempt failed
	    $Response="
		    Sorry, the payment attempt failed.<br>
		    <br>
		    You can hit your browser's back button or can clieck <a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="home")."\">here</a> to try again.
		";
		SQL_PaymentDelete($Where="PaymentID = {$_POST["USER1"]} AND PaymentUUID = '{$_POST["USER2"]}'");
	}

	//Show the response to the user
    $Echo.=CTL_Window(
		$Title="Payment department",
		$Content=$Response,
		$Width="",
		$Icon="system",
		$Template=""
	);

/*  //PAYPAL CODE
	$Payment=SQL_PaymentSelect($Where="P.PaymentID = {$_REQUEST["PaymentID"]} AND P.PaymentUUID = '{$_REQUEST["PaymentUUID"]}' AND P.AmountPayable = P.AmountPaid", $OrderBy="P.DatePaid", $SingleRow=false, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
	if(count($Payment)>0){//Payment went successful
	    $Response="
	        Thank you for the payment.<br>
	        <br>
	        <b>Please click <a href=\"".ApplicationURL($Script="checksurveypermission", $AdditionalParameter="SurveyID={$_REQUEST["SurveyID"]}&SurveyUUID={$_REQUEST["SurveyUUID"]}&PaymentID={$_REQUEST["PaymentID"]}&PaymentUUID={$_REQUEST["PaymentUUID"]}")."\">here</a> to proceed for the survey.</b><br>
	        <br>
	        {$Application["Title"]}
		";
	}else{//Payment attempt failed
	    $Response="
		    Sorry, the payment attempt failed.<br>
		    <br>
		    You can hit your browser's back button or can clieck <a href=\"".ApplicationURL($Script="home")."\">here</a> to try again.
		";
		SQL_PaymentDelete($Where="PaymentID = {$_REQUEST["PaymentID"]} AND PaymentUUID = '{$_REQUEST["PaymentUUID"]}'");
	}
	//Show the response to the user
    $Echo.=CTL_Window(
		$Title="Payment department",
		$Content=$Response,
		$Width="",
		$Icon="system",
		$Template=""
	);
*/
?>