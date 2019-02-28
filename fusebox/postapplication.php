<?php
	//Close the live connection to the database
	if($Application["UseDatabase"]){$Application["DatabaseLink"]->close();}
	//Set the date & time stamp of the last user activity
	SessionSetTimeStamp();
?>
