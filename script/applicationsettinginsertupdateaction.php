<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'page'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('ApplicationSettingName');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok
			$Entity="ApplicationSetting";
			$EntityAlias="APS";
			$EntityLower=strtolower($Entity);
			$EntityCaption="Application Setting";
			$EntityCaptionLower=strtolower($EntityCaption);
		
			$UpdateMode=false;
			if(isset($_REQUEST["uuid"]))$UpdateMode=true;
		
			$Where="";
			if($UpdateMode){
				$Where="{$Entity}UUID = '".REQUEST('uuid')."'";
				$ApplicationSetting=SQL_InsertUpdate(
					$Entity,
					$EntityAlias,
					$ApplicationSettingData=array(
						"ApplicationSettingValue"=>POST('ApplicationSettingValue'),
						"ApplicationSettingDescription"=>POST('ApplicationSettingDescription'),
						//"ApplicationSettingInputTypeName"=>POST(ApplicationSettingInputTypeName),
						//"ApplicationSettingIsHidden"=>POST(ApplicationSettingIsHidden),
						//"ApplicationSettingIsLocked"=>POST(ApplicationSettingIsLocked),
						"ApplicationSettingIsActive"=>POST('ApplicationSettingIsActive')
				),
					$Where
				);
			}else{
				$ApplicationSetting=SQL_InsertUpdate(
					$Entity,
					$EntityAlias,
					$ApplicationSettingData=array(
						"ApplicationSettingName"=>POST('ApplicationSettingName'),
						"ApplicationSettingValue"=>POST('ApplicationSettingValue'),
						"ApplicationSettingDescription"=>POST('ApplicationSettingDescription'),
						//"ApplicationSettingInputTypeName"=>POST(ApplicationSettingInputTypeName),
						//"ApplicationSettingIsHidden"=>POST(ApplicationSettingIsHidden),
						//"ApplicationSettingIsLocked"=>POST(ApplicationSettingIsLocked),
						"ApplicationSettingIsActive"=>POST('ApplicationSettingIsActive')
				),
					$Where
				);
			}
	
			// let's assume everything is ok, setup successful response
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