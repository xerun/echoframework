<?php
	/*
		Script:		
		Author:		PRITHU AHMED
		Date:		
		Purpose:	
		Note:		
	*/
	if($_POST){
		// response hash
		$response = array('type'=>'', 'page'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('UserName','Password');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
			$userName=POST(UserName);
			$password=$Encryption->encrypt($_POST["Password"]);
		
			$User=SQL_Select($Entity="User", $Where="(U.UserName = '{$userName}' OR U.PhoneMobile = '{$userName}' OR U.UserEmail = '{$userName}') AND U.UserPassword = '{$password}' AND U.UserIsActive = 1 AND U.UserIsRegistered = 1", $OrderBy="U.UserName", $SingleRow=false, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
			if(count($User)<1)throw new Exception('login failed!');
		
			SessionSetUser($UserRow=$User[0]);
			// let's assume everything is ok, setup successful response
			$response['type'] = 'redirect';
			$response['page'] = 'home';
			$response['message'] = 'login successful';
		} catch(Exception $e){
			$response['type'] = 'error';
			$response['message'] = $e->getMessage();
		}
		// now we are ready to turn this hash into JSON
		print json_encode($response);
		exit;
	}
?>