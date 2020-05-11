<?php
	//Connect to the databae if the application is suppose to use a database and make the database connection available to the
	//entire application anytime.
	//Build the page HTML
	//Set HTML content variables
	$Echo=$BeforeEcho=$AfterEcho="";
	//Set the global User input error flags
	$ErrorUserInput=array("_Error"=>false, "_Message"=>"");
	//Start managing session
	SessionSet();
	//Proceed to load rest of the application
	include "./fusebox/customcontrol.php";
	include "./fusebox/customerrorcode.php";
	include "./fusebox/sql.php";
	include "./fusebox/security.php";
	include "./fusebox/theme.php";
	include "./fusebox/language.php";

	//Build the page HTML
	$BeforeEcho.="<!DOCTYPE html><html dir=\"ltr\" lang=\"en-US\"><meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\"><head>";
	include "./theme/{$_REQUEST["Theme"]}/template/html_head.php";
	$BeforeEcho.="</head><body>";
	//Print optioanl header
	$showHeader=true;$showFooter=true;
	if($_REQUEST["mco"]=="t"){
		$showHeader=false;$showFooter=false;
	}
	if($_REQUEST["Script"]=="conversion") {
		$showHeader=false;$showFooter=false;
	}
	if($_REQUEST["Script"]=="advertisement") {
		$showHeader=false;$showFooter=false;
	}
	if($_REQUEST["Script"]=="login"){
		$showHeader=false;$showFooter=false;
	}
	if($_REQUEST["Script"]=="signup"){
		$showHeader=false;$showFooter=false;
	}
	if(!isset($_REQUEST["Script"]))
	{
		$showHeader=false;$showFooter=false;
	}
	if($_REQUEST["nh"]=="t"){
		$showHeader=false;
	}
	if($_REQUEST["nf"]=="t"){
		$showFooter=false;
	}
	if($showHeader){
		include "./theme/{$_REQUEST["Theme"]}/template/header.php";
	}
	//Process the main page
	$Script="./theme/{$_REQUEST["Theme"]}/template/error_404.php";
	if(file_exists("./script/{$_REQUEST["Script"]}.php"))$Script="./script/{$_REQUEST["Script"]}.php";
	include $Script;
	//Print the optional footer
	if($showFooter){
		include "./theme/{$_REQUEST["Theme"]}/template/footer.php";
	}
	//Print debugging information

	if(isset($_REQUEST["Debug"]))$Echo.=DebugOutput();
	//End the output page
	$AfterEcho.="
			</body>
		</html>
	";
	if($_REQUEST["mco"]=="t"){$BeforeEcho="";$AfterEcho="";}
	if($_REQUEST["d"]=="1"){$BeforeEcho="";$AfterEcho="";}
	if($_REQUEST["Script"]=="conversion"){$BeforeEcho="";$AfterEcho="";}
	if($_REQUEST["Script"]=="advertisement"){$BeforeEcho="";$AfterEcho="";}


	if($Application["UseDatabase"]){
		//Output the page
		print $BeforeEcho.$Echo.$AfterEcho;
	}else{
		print "<div style=\"padding-top: 30px; text-align:center; font-family: tahoma; font-size: 18px; color: #218FBD; font-weight:bold;\">".$Application["Title"]."<br><img src=\"".$Application["BaseURL"]."/theme/{$_REQUEST["Theme"]}/image/window/maintenance.jpg\"><br>
		Please check again later.
		</div>";
	}