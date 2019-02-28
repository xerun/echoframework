<?php

	//require ("db.php");
	
	$pcID=$_POST["pcid"];
	$qbnk="select PhotosAlbumUUID, PhotosAlbumName from tblphotosalbum WHERE PhotosCategoryUUID='".$pcID."'";
	$rm = MySqlQuery($qbnk);
	while($rsta = sqlsrv_fetch_array($rm)){
	echo "
		<option value=\"{$rsta["PhotosAlbumUUID"]}\">{$rsta["PhotosAlbumName"]}</option>	
	";
	}
?>