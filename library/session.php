<?php
	function SessionSet(){
	    global $Application;
        /*session_save_path('/nfs/c01/h15/mnt/10808/domains/alkanphotography.com/html/admin/library/session');
        ini_set('session.gc_maxlifetime', 3*60*60); // 3 hours
        ini_set('session.gc_probability', 1);
        ini_set('session.gc_divisor', 100);
        ini_set('session.cookie_secure', FALSE);
        ini_set('session.use_only_cookies', TRUE);*/
		session_start();
		if(!isset($_SESSION["UserTypeUUID"]))		$_SESSION["UserTypeUUID"]=	$Application["UserTypeUUIDGuest"];
		if(!isset($_SESSION["UserTypeName"]))	$_SESSION["UserTypeName"]=	$Application["UserTypeNameGuest"];
		if(!isset($_SESSION["UserUUID"]))		$_SESSION["UserUUID"]=		$Application["UserUUIDGuest"];
		if(!isset($_SESSION["UserName"]))		$_SESSION["UserName"]=		$Application["UserNameGuest"];
		if(!isset($_SESSION["UserPassword"]))	$_SESSION["UserPassword"]=		"";
		if(!isset($_SESSION["UserEmail"]))		$_SESSION["UserEmail"]=			"";
		if(!isset($_SESSION["FirstName"]))		$_SESSION["FirstName"]=			"";
		if(!isset($_SESSION["LastName"]))		$_SESSION["LastName"]=			"";
		//Date & time stamp of the last operation, works in association with $_SESSION["SessionTimeout"] to implement the automatic session expiration
		if(!isset($_SESSION["DateTimeLastUserAction"])){$_SESSION["DateTimeLastUserAction"]=  date("m/d/y H:i:s");}
		//Force user log off if the current session is timed out
	    SessionTimeout();
	}
	
	function SessionSetTimeStamp(){
		$_SESSION["DateTimeLastUserAction"]=date("m/d/y H:i:s");
	}
	
	function SessionTimeout(){
	    global $Application;

		$DateTimeActivityDifference=FN_DateTimeDifference(date("m/d/y H:i:s"), $_SESSION["DateTimeLastUserAction"]);
		if($DateTimeActivityDifference["Minutes"]>$Application["SessionTimeout"])SessionUnsetUser();
	}
	
	function SessionSetUser($UserRow){
	    //$User (array of colum values)

	    $_SESSION["UserTypeUUID"]=	$UserRow["UserTypeUUID"];
	    $_SESSION["UserTypeName"]=	$UserRow["UserTypeName"];
	    $_SESSION["UserUUID"]=		$UserRow["UserUUID"];
	    $_SESSION["UserName"]=		$UserRow["UserName"];
	    $_SESSION["UserEmail"]=		$UserRow["UserEmail"];
	    $_SESSION["UserPassword"]=	$UserRow["UserPassword"];
	    $_SESSION["FirstName"]=		$UserRow["FirstName"];
	    $_SESSION["LastName"]=		$UserRow["LastName"];
	}
	
	function SessionUnsetUser(){
	    global $Application;
	    
		$_SESSION["UserTypeUUID"]=	$Application["UserTypeUUIDGuest"];
		$_SESSION["UserTypeName"]=	$Application["UserTypeNameGuest"];
		$_SESSION["UserUUID"]=		$Application["UserUUIDGuest"];
		$_SESSION["UserName"]=		$Application["UserNameGuest"];
		$_SESSION["UserPassword"]=	$Application["UserPasswordGuest"];
		$_SESSION["UserEmail"]=		$Application["UserEmailGuest"];
	}
?>
