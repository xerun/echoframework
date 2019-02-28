<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('UserEmail', 'Name');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok

			$Entity="UserProfile";
			$EntityLower=strtolower($Entity);
		
			$User=SQL_Select($Entity="User", $Where="U.UserUUID = '".$_SESSION["UserUUID"]."'", $OrderBy="U.UserName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
			$_POST["UserPicture"]=ProcessUpload($FieldName="UserPicture", $UploadPath=$Application["UploadPath"]);
	
			$Where="UserUUID = '".$_SESSION["UserUUID"]."'";
			SQL_InsertUpdate(
				$Entity="User",
				$EntityAlias="U",
				$UserData=array(
					"UserName"=>							$User["UserName"],
					"UserEmail"=>							POST(UserEmail),
					"Name"=>								POST(Name),
					"Street"=>								POST(Street),
					"City"=>								POST(City),
					"ZIP"=>									POST(ZIP),
					"State"=>								POST(State),
					"CountryUUID"=>							POST(CountryUUID),
					"PhoneOffice"=>							POST(PhoneOffice),
					"PhoneMobile"=>							POST(PhoneMobile),
					"FAX"=>									POST(FAX),
					"Website"=>								POST(Website),
					"UserPicture"=>							POST(UserPicture),
					"UserIDParent"=>						0,
					"UserIsActive"=>						$User["UserIsActive"],
					"UserIsRegistered"=>					$User["UserIsRegistered"],
					"UserRegistrationCode"=>				$User["UserRegistrationCode"],
					"UserRegistrationPendingApprovals"=>	0,
					"UserIsApproved"=>						1,
				),
				$Where
			);
	
			//Email the log in information to the user
			/*SendMail(
				$ToEmail=POST(UserEmail),
				$Subject="Your login detail",
				$Body="
					Dear <b>{$_SESSION["UserName"]}</b>,<br>
					<br>
					Please find your log in detail below:<br>
					<br>
					Username: <b>{$_SESSION["UserName"]}</b><br>
					<br>
					Please click <a href=\"".ApplicationURL($Theme=REQUEST(Theme),$Script="login")."\">here</a> to log into your account.<br>
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
			);*/
	
			// let's assume everything is ok, setup successful response
			$response['type'] = 'success';
			$response['message'] = 'Your profile has been saved!';	
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}
?>
