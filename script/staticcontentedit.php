<?php
	/*
		Script:		
		Author:		PRITHU AHMED
		Date:		
		Purpose:	
		Note:		
	*/

	$UpdateMode=false;
	$ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="staticcontenteditaction?StaticContentName={$_REQUEST["StaticContentName"]}");
	$ButtonCaption="Insert";

    $StaticContent=SQL_Select($Entity="StaticContent", $Where="SC.StaticContentName = '".REQUEST(StaticContentName)."' AND L.LanguageCode = '".REQUEST(LanguageCode)."'", $OrderBy="SC.StaticContentName", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false);
	if(count($StaticContent)>1)$UpdateMode=true;

	if($UpdateMode){
		$ButtonCaption="Update";
	}else{
	    $StaticContent=array(
	        "StaticContent"=>""
		);
	}

	$Echo.="
	".FormInsertUpdate(
		$EntityName="StaticContent",
		$FormTitle="Update Content",
		$Input=array(
		    array("VariableName"=>"StaticContent", "Caption"=>"Content", "DefaultValue"=>$StaticContent["StaticContent"], "Required"=>false, "ControlHTML"=>CTL_InputTextArea($Name="StaticContent", $Value=$StaticContent["StaticContent"], $Columns=150, $Rows=25,true,"form-control tmce"))
		),
		$ButtonCaption,
		$ActionURL
	);
?>