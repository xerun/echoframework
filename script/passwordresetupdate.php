<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('CurrentPassword', 'NewPassword', 'ConfirmPassword');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok
			$Entity="PasswordReset";
			$EntityLower=strtolower($Entity);
			
			$userPassword=trim($_POST["NewPassword"]);
			$userPasswordConfirm=trim($_POST["ConfirmPassword"]);
			
			if(($userPassword!="") && ($userPasswordConfirm!="")){
				if($userPassword!=$userPasswordConfirm){
					throw new Exception('The new and retyped passwords didn\'t match!');
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
			
			$User=SQL_Select($Entity="User", $Where="U.UserUUID = '".$_SESSION["UserUUID"]."' AND U.UserPassword = '".$Encryption->encrypt($_POST["CurrentPassword"])."'", $OrderBy="U.UserName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
			if($User > 0){
				$Where="UserUUID = '".$_SESSION["UserUUID"]."'";
				SQL_InsertUpdate(
					$Entity="User",
					$EntityAlias="U",
					$UserData=array(
						"UserPassword"	=>	$Encryption->encrypt($_POST["NewPassword"])
					),
					$Where
				);
				// let's assume everything is ok, setup successful response
				$response['type'] = 'successclear';
				$response['message'] = 'Your password has been changed!';	
			}else{
				throw new Exception('The Old Password didn\'t match!');
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
