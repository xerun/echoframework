<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			// $required_fields = array('UserEmail', 'FirstName', 'LastName');
			// foreach($required_fields as $field){
			// 	if(empty($_POST[$field])){
			// 		$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
			// 		throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
			// 	}
			// }
		
			// ok, field validations are ok

			$Entity="UserProfile";
			$EntityLower=strtolower($Entity);
			$UserType=POST('UserTypeUUID');
			$User=POST('UserUUID');
			$FileName = $_POST["permissionfile"];
			MySQLQuery("Delete from tblpermission WHERE UserTypeUUID='".$UserType."' and UserUUID = '".$User."'");
			foreach ($FileName as $key => $value) {
				if(!empty($value)) {
					MySQLQuery("Insert into tblpermission (PermissionUUID,UserTypeUUID,UserUUID,Page,DateInserted)values('" . GUID() . "','" . $UserType . "','" . $User . "','" . $value . "',NOW())");
				}
			}
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
			$response['message'] = 'Permission has been saved!';	
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}
?>
