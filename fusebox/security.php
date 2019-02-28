<?php
	//Set the publicly accessible pages
	if(empty($_SESSION["UserTypeUUID"])){
		$UserTypeID=$Application["UserTypeUUID"];
	}else{
		$UserTypeID=$_SESSION["UserTypeUUID"];
	}
	$Permission=SQL_Select($Entity="Permission", $Where="P.UserTypeUUID = '".$UserTypeID."'", $OrderBy="P.Page ASC", $SignleRow=false, $Debug=false);
    $AccessiblePage=array();
	foreach($Permission as $rowPermission){
        $AccessiblePage[$rowPermission["Page"]]=$rowPermission["Page"];
	}
	if(!isset($_REQUEST["Script"])){$_REQUEST["Script"]=$AccessiblePage["login"];$_REQUEST["Theme"]="site";}
	if(!in_array($_REQUEST["Script"], $AccessiblePage)){$_REQUEST["Script"]=$AccessiblePage["login"]; $_REQUEST["Theme"]="site";}