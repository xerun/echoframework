<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('Name', 'Email','Password','ConfirmPassword');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok

			$Entity="UserSignUp";
			$EntityLower=strtolower($Entity);
			
			$Name=POST('Name');
			$userEmail=POST('Email');
			
			$userPassword=trim($_POST["Password"]);
			$userPasswordConfirm=trim($_POST["ConfirmPassword"]);
			
			if (!preg_match('/\S/', $_POST["Password"])){
				throw new Exception('You have space in the Password field. Please enter password without space.');	
			}
			
			if($userPassword!=$userPasswordConfirm){
				throw new Exception('The password and retyped password didn\'t match!');
			}else{
				$error="";
				if( strlen($userPassword) < 8 ) {
					$error .= "<div id=\"passwordError\">Password should be atleast 8 characters! </div>";
				}
				if( strlen($userPassword) > 20 ) {
					$error .= "<div id=\"passwordError\">Password should not exceed 20 characters! </div>";
				}
				if( !preg_match("#[0-9]+#", $userPassword) ) {
					$error .= "<div id=\"passwordError\">Password must include at least one number! </div>";
				}
				if( !preg_match("#[a-z]+#", $userPassword) ) {
					$error .= "<div id=\"passwordError\">Password must include at least one letter! </div>";
				}
				if( !preg_match("#[A-Z]+#", $userPassword) ) {
					$error .= "<div id=\"passwordError\">Password must include at least one CAPS! </div>";
				}
				if( !preg_match("#\W+#", $userPassword) ) {
					$error .= "<div id=\"passwordError\">Password must include at least one symbol! </div>";
				}
				if($error!=""){
					throw new Exception($error);	
				}
			}
		
			$User=SQL_Select($Entity="User", $Where="U.UserName='{$userName}' OR U.UserEmail = '{$userEmail}'");
			if(count($User)>0){
				throw new Exception('Sorry, this username and/or email address has already been used!');
			}
		
			$Where="";
			$User=SQL_InsertUpdate(
				$Entity="User",
				$EntityAlias="U",
				$UserData=array(
					"Name"								=>	$Name,
					"UserPassword"						=>	md5($userPassword),
					"UserEmail"							=>	$userEmail,
					"CountryUUID"						=>	"4b590454-e7a8-1029-9be9-4fc904b88e9e",
					"UserTypeUUID"                      =>  $Application["UserTypeIDMember"],
					"UserIsActive"						=>	1,
					"UserRegistrationCode"				=>	GUID().GUID(),
					"UserIsApproved"					=>	1
				),
				$Where
			);
			
			$userID = $Encryption->encode($User["UserUUID"]);
			
	
			//Email the log in information to the user with a registration confirmation
			SendMail(
				$ToEmail=$User["UserEmail"],
				$Subject="Your login detail",
				$Body="
					Welcome <b>{$User["Name"]}</b> to <b>{$Application["Title"]}</b>.<br>
					<br>
					Please find your log in detail below:<br>
					<br>
					Please click <a href=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="signupconfirm", $OtherParameter="z={$userID}&g={$User["UserRegistrationCode"]}")."\">here</a> confirm your registration first in order to allow the system to log you in.<br>
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
				$ToEmail=$Application["EmailContact"],
				$Subject="New user registration alert",
				$Body="
					The following user has registerd into the system:<br>
					<br>
					Name: <b>{$User["Name"]}</b><br>
					Email: <a href=\"mailto:{$User["UserEmail"]}\">{$User["UserEmail"]}</a><br>
					<br>
					Please click <a href=\"".ApplicationURL()."\">here</a> to log into your account.<br>
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
	
	
			/*$Echo.=CTL_Window(
					$Title="Registration successful",
					$Content="
						Thank you for registering with us.<br>
						<br>
						Please check your email account for the log in information.<br>
						<br>
						Also note that you will have to follow the link provided into that email to actiavte your account here.<br>
						<br>
						Have a nice journey with us.<br>
						<br>
						Please click <a href=\"".ApplicationURL()."\">here</a> to continue.
					"
				)."
				<script language=\"JavaScript\">
				<!--
					//window.location='".ApplicationURL()."';
				//-->
				</script>
			";*/
			
			// let's assume everything is ok, setup successful response
			$response['type'] = 'successclear';
			$response['message'] = 'An email has been send to your email address, please verify it to continue.';	
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}	
?>