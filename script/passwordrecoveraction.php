<?php
	/*
		Script:		passwordrecoveraction.php
		Author:		Prithu Ahmed
		Purpose:	Send the password to the email address
		Date:		Last updated 01-19-12
		Note:		
	*/
	if($_POST){
		// response hash
		$response = array('type'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('Email');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
			$userEmail=POST('Email');
			// ok, field validations are ok
	
			$User=SQL_Select($Entity="User", $Where="U.UserEmail = '{$userEmail}'", $OrderBy="U.UserName", $SingleRow=false, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
			if(count($User)>0){
				//$NewPassword=RandomPassword();
				//MySQLQuery("UPDATE tbluser SET UserPassword = '$NewPassword' WHERE UserEmail = '{$_POST["UserEmail"]}'");
				$User=SQL_Select($Entity="User", $Where="U.UserEmail = '{$userEmail}'", $OrderBy="U.UserName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
				
				$userID=$Encryption->encode($User["UserUUID"]);
				
				//Email the changed log in information to the user with a registration confirmation
				SendMail(
					$ToEmail=$User["UserEmail"],
					$Subject="Request for Password reset",
					$Body="
						Upon your request, we have reset your login password on our system.<br>
						<br>
						If you didn't request this information, please log into your account immediately and change your password to prevent unauthorized use of your information.<br>
						<br>
						<br>
						Please click <a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="passwordcreate","q=$userID")."\">here</a> to reset your password.<br>
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
				$response['type'] = 'successclear';
				$response['message'] = 'An Email as been send to your email address';		
				
			}else{
				throw new Exception('Sorry, the email address was not found!');
			}
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}			
?>
