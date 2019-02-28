<?php
	$Entity=$_GET["entity"];
	$UUID=$_GET["uuid"];
	$Field=$_GET["field"];
	$Val=$_GET["val"];
	if($Val==1){$Value=0;}else{$Value=1;}
	
	$Where=$Entity."UUID='{$UUID}'";

	$ActiveToggle=SQL_InsertUpdate(
		$Entity,
		$EntityAlias,
		$ActiveToggleData=array(
			$Field=>$Value
	),
		$Where
	);
?>