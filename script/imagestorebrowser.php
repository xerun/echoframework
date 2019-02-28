<?php
	/*
		Script:		
		Author:		PRITHU AHMED
		Date:		
		Purpose:	
		Note:		
	*/
	
	$CurrentPath="./upload/other";
    $_POST["ActionIfFileExistsOnUpload"]="Make unique";
    
	//Upload file
	if(isset($_POST["NewFolder"])&&$_POST["NewFolder"]!=""){//Create folder
	    mkdir("$CurrentPath/{$_POST["NewFolder"]}", 0777);//Also set the permission for the new folder to 777 (CHMOD)
	    $CurrentPath.="/{$_POST["NewFolder"]}";//Update internal current path
	    //Let the user know that the folder has been created
	    $Notice[]="The new folder '{$_POST["NewFolder"]}' has successfully been created at '$CurrentPath'.";
	}

	if(isset($_FILES["FileToUpload"])&&$_FILES["FileToUpload"]["name"]!=""){//Upload file
        $NewName = $_FILES["FileToUpload"]["name"];//Hold the name for the uploaded path
        //Create a new name for the file if a file with the same name already exists or overwrite on user's choice
        if(file_exists("$CurrentPath/{$_FILES["FileToUpload"]["name"]}")&&$_POST["ActionIfFileExistsOnUpload"]=="Make unique")$NewName = md5(uniqid(rand(0, 1000),1))."_".$_FILES["FileToUpload"]["name"];
        move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], "$CurrentPath/$NewName");//Move the to the desired path
		//Let the user know that the file has been uploaded
		$Notice[]="The file '{$_FILES["FileToUpload"]["name"]}' has successfully been uploaded to '$CurrentPath' as '$NewName'.";
	}
	//End of upload file
	
	$Echo.="<form method=\"post\" action=\"".ApplicationURL($Theme=$_REQUEST["Theme"],$Script=$_REQUEST["Script"])."\" enctype=\"multipart/form-data\"><input type=\"file\" name=\"FileToUpload\">".CTL_InputSubmit($Name="", $Value="Upload")."<hr noshade></form>";
	
	$DirectoryHandle=opendir($CurrentPath);
    if($DirectoryHandle){
        $FileList=array();
		while(false!==($DirectoryEntry=readdir($DirectoryHandle)))if(!is_dir("$CurrentPath/$DirectoryEntry")&&$DirectoryEntry!="."&&$DirectoryEntry!="..")$FileList[]=$DirectoryEntry;
		foreach($FileList as $ThisFile)if(FileExtension($ThisFile)=="jpg"||FileExtension($ThisFile)=="gif")$Echo.="<img src=\"".$Application["ImageView"]."other/$ThisFile\" height=\"96\" border=\"1\">";
	}

	function FileExtension($FileName){
	    $Extension="";
	    $NamePart=explode(".", $FileName);;
	    if(count($NamePart)>1)$Extension=$NamePart[count($NamePart)-1];
	    return $Extension;
	}
?>
