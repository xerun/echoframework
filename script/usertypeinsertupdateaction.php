<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'page'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('UserTypeName');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok

			$Entity="UserType";
			$EntityAlias="UT";
			$EntityLower=strtolower($Entity);
			$EntityCaption="User Type";
			$EntityCaptionLower=strtolower($EntityCaption);
		
			$UpdateMode=false;
			if(isset($_REQUEST["uuid"]))$UpdateMode=true;
		
			$Where="";
			if($UpdateMode)$Where="{$Entity}UUID = '".REQUEST('uuid')."'";
	
			$_POST["UserTypePicture"]=ProcessUpload("UserTypePicture", $Application["UploadPath"]);
	
			$UserType=SQL_InsertUpdate(
				$Entity,
				$EntityAlias,
				$UserTypeData=array(
					"UserTypeName"=>POST('UserTypeName'),
					"UserTypeDescription"=>POST('UserTypeDescription'),
					"UserTypePicture"=>POST('UserTypePicture'),
					"UserTypeIsActive"=>POST('UserTypeIsActive')
			),
				$Where
			);
	
			/*$Echo.="
				<script language=\"JavaScript\">
				<!--
					//window.location='".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$EntityLower."manage")."';
				-->
				</script>
			";*/
	
			// let's assume everything is ok, setup successful response
			$response['type'] = 'redirect';
			$response['page'] = 'usertypemanage';
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