<?php
	$Theme=array(
		array("Name"=>"Site", "Path"=>"site")
	);
	//$checkTheme=file_exists("./theme/".$_REQUEST["Theme"]);
	if(!isset($_REQUEST["Theme"]) || !file_exists("./theme/".$_REQUEST["Theme"]))$_REQUEST["Theme"]=$Theme[0]["Path"];
?>
