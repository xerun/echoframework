<?php
	/*
		Script:		
		Author:		PRITHU AHMED
		Date:		
		Purpose:	
		Note:		
	*/
	$response = array('type'=>'', 'page'=>'', 'message'=>'');
	SessionUnsetUser();
/*
	$Echo.="
	    ".CTL_Window(
			$Title="System Security",
			$Content="
				Dear user,<br>
				<br>
				You have successfully logged off the system, click <a href=\"".ApplicationURL()."\">here</a> to proceed.<br>
				<br>
				{$Application["Title"]}
			"
		)."
		<script language=\"JavaScript\">
		<!--
			    window.location.href='".ApplicationURL($Theme=$_REQUEST["Theme"],$Script="login")."';
		-->
		</script>
	";*/

$response['type'] = 'redirect';
$response['page'] = 'login';
$response['message'] = 'Logged out';
print json_encode($response);