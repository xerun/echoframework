<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'page'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$UpdateMode=false;
			if(isset($_REQUEST["uuid"]))$UpdateMode=true;

			if(!$UpdateMode){
				$required_fields = array('UserPassword','UserPasswordConfirm','UserName');
			}else{
				$required_fields = array('UserName');
			}
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok

			$Entity="User";
			$EntityAlias="U";
			$EntityLower=strtolower($Entity);
			$EntityCaption="User";
			$EntityCaptionLower=strtolower($EntityCaption);
			
			
			$userPassword=trim($_POST["UserPassword"]);
			$userPasswordConfirm=trim($_POST["UserPasswordConfirm"]);
		
			if(!$UpdateMode){
				if($userPassword!=$userPasswordConfirm){
					throw new Exception('Please verify the Password and Confirm Password.');
				}else{
					$error="";
					if (!preg_match('/\S/', $userPassword)){
						$error .= "You have space in the Password field. Please enter password without space.";	
					}
					/*if( strlen($userPassword) < 8 ) {
						$error .= "Password should be atleast 8 characters! <br />";
					}
					if( strlen($userPassword) > 20 ) {
						$error .= "Password should not exceed 20 characters! <br />";
					}
					if( !preg_match("#[0-9]+#", $userPassword) ) {
						$error .= "Password must include at least one number! <br />";
					}
					if( !preg_match("#[a-z]+#", $userPassword) ) {
						$error .= "Password must include at least one letter! <br />";
					}
					if( !preg_match("#[A-Z]+#", $userPassword) ) {
						$error .= "Password must include at least one CAPS! <br />";
					}
					if( !preg_match("#\W+#", $userPassword) ) {
						$error .= "Password must include at least one symbol! <br />";
					}*/
					if($error!=""){
						throw new Exception($error);	
					}
				}
			}

			
			if(!$UpdateMode)$_REQUEST["uuid"]=0;
			/*$User=SQL_Select($Entity="User", $Where="U.UserEmail='".POST(UserEmail)."' AND U.UserUUID <> '".REQUEST(uuid)."'");
			if(count($User)>0){
				throw new Exception('User Email already exists.');
			}*/
			if($userPassword==""){
				$userPassword=$User["UserPassword"];
			}else{
				$userPassword=$Encryption->encrypt($_POST["UserPassword"]);
			}
			
			$UserPicture="";
			if($_FILES["UserPictureNew"]["name"] != ""){
				$UserPicture=ImageResize ("UserPictureNew", $Application["UploadPath"], 200, 250);
			}else{
				$UserPicture=$User["UserPicture"];
			}
	
			$Where="";
			if($UpdateMode)$Where="{$Entity}UUID = '".REQUEST(uuid)."'";	
					
			$User=SQL_InsertUpdate(
				$Entity,
				$EntityAlias,
				$UserData=array(
					"UserEmail"=>POST('UserEmail'),
					"UserDescription"=>POST('UserDescription'),
					"UserPassword"=>$userPassword,
					"UserTypeUUID"=>POST('UserTypeUUID'),
					"UserIsActive"=>POST('UserIsActive'),
                    "UserName"=>POST('UserName'),
					"Name"=>POST('Name'),
					"Street"=>POST('Street'),
					"City"=>POST('City'),
					"ZIP"=>POST('ZIP'),
					"State"=>POST('State'),
					"CountryUUID"=>POST('CountryUUID'),
					"PhoneMobile"=>POST('PhoneMobile'),
					"FAX"=>POST('FAX'),
					"Website"=>POST('Website'),
					"DateBorn"=>POST('DateBornYear')."-".POST('DateBornMonth')."-".POST('DateBornDay'),
					"UserPicture"=>$UserPicture,
					"RegistrationCode"=>GUID().GUID(),
					"UserIsRegistered"=>POST('UserIsRegistered')
				),
				$Where
			);
			$response['type'] = 'redirect';
			$response['page'] = $EntityLower.'manage';
			$response['message'] = 'Your data has been saved!';		
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}
?>