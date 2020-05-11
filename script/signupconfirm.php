<?php
	/*
		Script:		usersignupconfirm.php
		Author:		Prithu Ahmed
		Purpose:    Update the registration information for the registrant user
		Date:		Last updated 02-02-12
		Note:		
	*/
	$userID = $Encryption->decode($_REQUEST["z"]);
	$User=SQL_Select($Entity="User", $Where="U.UserUUID = '".$userID."' AND U.UserRegistrationCode = '".REQUEST('g')."'", $OrderBy="U.UserName", $SignleRow=true, $Debug=false);
	if(count($User)>1){
	    $Where="UserUUID = '".$userID."' AND UserRegistrationCode = '".REQUEST('g')."'";
		$User=SQL_InsertUpdate(
	        $Entity="User",
	        $EntityAlias="U",
			$UserData=array(
				"UserIsRegistered"    	=>  1
			),
			$Where
		);

		SendMail(
			$ToEmail=$User["UserEmail"],
			$Subject="Your login detail",
			$Body="
				Dear <b>{$User["FirstName"]} {$User["LastName"]}</b>,<br>
				<br>
				This is to confirm that you have successfully confirmed your user account over <b>{$Application["Title"]}</b>.<br>
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

		$Message="
		    Thank you for confirming your registration. Now you can login to the site and continue browsing.<br>
		    <br>
		    <b>{$Application["Title"]}</b>
		";
	}else{
		$Message="
		    Sorry, we could not find any sign up request for the confirmation link you provided with.<br>
		    <br>
		    <b>{$Application["Title"]}</b>
		";
	}

	$Echo.=CTL_Window(
		$Title="Registration successful",
		$Content=$Message
	);
?>