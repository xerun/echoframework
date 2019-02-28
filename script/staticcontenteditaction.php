<?php
	/*
		Script:		
		Author:		PRITHU AHMED
		Date:		
		Purpose:	
		Note:		
	*/
	
	$UpdateMode=false;
$response = array('type'=>'', 'page'=>'', 'message'=>'');
    $StaticContent=SQL_Select($Entity="StaticContent", $Where="SC.StaticContentName = '".REQUEST(StaticContentName)."' AND L.LanguageCode = '".REQUEST(LanguageCode)."'", $OrderBy="SC.StaticContentName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
	if(count($StaticContent)>1)$UpdateMode=true;

    $Language=SQL_Select($Entity="Language", $Where="L.LanguageCode = '".REQUEST(LanguageCode)."'", $OrderBy="L.LanguageName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
	$StaticContentData=array(
	    "StaticContentName"=>REQUEST(StaticContentName),
	    "StaticContent"=>$_POST["StaticContent"],
	    "LanguageUUID"=>$Language["LanguageUUID"],
	    "StaticContentPicture"=>$StaticContent["StaticContentPicture"],
	    "StaticContentIsActive"=>1
	);

    $Where="";
	if($UpdateMode)$Where="StaticContentName = '".REQUEST(StaticContentName)."' AND LanguageUUID = '{$Language["LanguageUUID"]}'";

	SQL_InsertUpdate($Entity="StaticContent", $EntityAlias="SC", $StaticContentData, $Where);
	$response['type'] = 'reload';
	$response['page'] = 'home';
	$response['message'] = 'Content saved';
	print json_encode($response);
	/*$Echo.="
	    ".CTL_Window(
			$Title="Content manager",
			$Content="
			    The content has successfully been saved.
			"
		)."
		
		<script language=\"JavaScript\">
			$(document).ready(function(){
				parent.$.fancybox.close(\"fancymce\");
				self.parent.location.reload();
			});
		</script>
	";*/