<?php
	if($_POST){
		// response hash
		$response = array('type'=>'', 'page'=>'', 'message'=>'');
		
		try {
			// do some sort of data validations, very simple example below
			$required_fields = array('AdvertPanelName', 'AdvertPanelIdentifire', 'AdvertWidth', 'AdvertHeight', 'AdvertPanelMaxNumber');
			foreach($required_fields as $field){
				if(empty($_POST[$field])){
					$field = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $field);
					throw new Exception('Required field <strong>"'.ucfirst($field).'"</strong> missing input.');
				}
			}
		
			// ok, field validations are ok
			$Entity="AdvertPanel";
			$EntityAlias="AP";
			$EntityLower=strtolower($Entity);
			$EntityCaption="Advert Panel";
			$EntityCaptionLower=strtolower($EntityCaption);
		
			$UpdateMode=false;
			if(isset($_REQUEST["uuid"]))$UpdateMode=true;
		
			$Where="";
			if($UpdateMode)$Where="{$Entity}UUID = '".REQUEST(uuid)."'";
	
			//POST(AdvertPanelPicture)=ProcessUpload("AdvertPanelPicture", $Application["UploadPath"]);
	
			$AdvertPanel=SQL_InsertUpdate(
				$Entity,
				$EntityAlias,
				$AdvertPanelData=array(
					"AdvertPanelName"=>POST(AdvertPanelName),
					"AdvertPanelIdentifire"=>POST(AdvertPanelIdentifire),
					"AdvertWidth"=>POST(AdvertWidth),
					"AdvertHeight"=>POST(AdvertHeight),
					"AdvertPanelMaxNumber"=>POST(AdvertPanelMaxNumber),
					"AdvertPanelIsVertical"=>POST(AdvertPanelIsVertical),
					"AdvertPanelIsActive"=>POST(AdvertPanelIsActive)
			),
				$Where
			);
	
			/*$Echo.="
				".CTL_Window($Title="Advert Panel management", "The operation complete successfully and<br>
				<br>
				the $EntityCaptionLower information has been stored.<br>
				<br>
				Please click <a href=\"".ApplicationURL($Script=$EntityLower."manage")."\">here</a> to proceed.")."
				<script language=\"JavaScript\">
				<!--
					//window.location='".ApplicationURL($Script=$EntityLower."manage")."';
				-->
				</script>
			";*/
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