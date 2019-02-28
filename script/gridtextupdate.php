<?php
	$Entity=$_GET["entity"];
	$UUID=$_GET["uuid"];
	$Field=$_GET["field"];
    $Value=$_GET["val"];
	//if($Val==1){$Value=0;}else{$Value=1;}
	
	$Where=$Entity."UUID='{$UUID}'";

	$TextUpdate=SQL_InsertUpdate(
		$Entity,
		$EntityAlias,
        $TextUpdateData=array(
			$Field=>$Value
	    ),
		$Where
	);