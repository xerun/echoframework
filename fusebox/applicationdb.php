<?php
	$Application["DatabaseLink"] = new mysqli($Application["DatabaseServer"], $Application["DatabaseUsername"], $Application["DatabasePassword"]);
	if ($Application["DatabaseLink"]->connect_errno) {
	    printf("Connect failed: %s\n", $Application["DatabaseLink"]->connect_error);
	    exit();
	}
	$Application["DatabaseLink"]->select_db($Application["DatabaseName"]);
	//Load Application settings from the database
	$ApplicationSetting=MySQLRows($SQL="SELECT APS.* FROM {$Application["DatabaseTableNamePrefix"]}tblapplicationsetting AS APS WHERE APS.ApplicationSettingIsActive = 1 ORDER BY APS.ApplicationSettingName", $SingleRow=false, $Link="", $Debug=false);
	foreach($ApplicationSetting as $ThisApplicationSetting){
		$Application[$ThisApplicationSetting["ApplicationSettingName"]]=$ThisApplicationSetting["ApplicationSettingValue"];
	}
?>
