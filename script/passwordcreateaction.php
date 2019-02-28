<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'page'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('PasswordConfirm','Password');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
			
			$userPassword=trim($_POST["Password"]);
			$userPasswordConfirm=trim($_POST["PasswordConfirm"]);
			
			$UserUUID=$Encryption->decode(POST(q));
			$User=SQL_Select($Entity="User", $Where="U.UserUUID = '{$UserUUID}'", $OrderBy="U.FirstName", $SingleRow=false, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
			if(count($User)>0){

				if (!preg_match('/\S/', $_POST["Password"])){
					throw new Exception('You have space in the Password field. Please enter password without space.');	
				}
				
				if($userPassword!=$userPasswordConfirm){
					throw new Exception('The password and confirm password didn\'t match!');
				}else{
					$error="";
					if( strlen($userPassword) < 8 ) {
						$error .= "Password should be atleast 8 characters! <br/>";
					}
					if( strlen($userPassword) > 20 ) {
						$error .= "Password should not exceed 20 characters! <br/>";
					}
					if( !preg_match("#[0-9]+#", $userPassword) ) {
						$error .= "Password must include at least one number! <br/>";
					}
					if( !preg_match("#[a-z]+#", $userPassword) ) {
						$error .= "Password must include at least one letter! <br/>";
					}
					if( !preg_match("#[A-Z]+#", $userPassword) ) {
						$error .= "Password must include at least one CAPS! <br/>";
					}
					if( !preg_match("#\W+#", $userPassword) ) {
						$error .= "Password must include at least one symbol! <br/>";
					}
					if($error!=""){
						throw new Exception($error);	
					}
				}

					//$NewPassword=RandomPassword();
				MySQLQuery("UPDATE tbluser SET UserPassword = '".md5($_POST["Password"])."' WHERE UserUUID = '{$UserUUID}'");
					//$User=SQL_Select($Entity="User", $Where="U.UserEmail = '{$_POST["UserEmail"]}'", $OrderBy="U.JS_FullName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
			
					//Email the changed log in information to the user with a registration confirmation
				SendMail(
					$ToEmail=$User["UserEmail"],
					$Subject="Password changed successfully",
					$Body="
						Dear {$User["FirstName"]} {$User["LastName"]},<br><br>
						This is to confirm you that you have changed your account password.<br>
						<br>
						If you didn't request this information, please log into your account immediately and change your password to prevent unauthorized use of your information.<br>
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
			}else{
				throw new Exception('This member does not exsists.');	
			}	
			
			// let's assume everything is ok, setup successful response
			$response['type'] = 'redirect';
			$response['page'] = 'login';
			$response['message'] = 'You have successfully reset your password.';	
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}
?>
