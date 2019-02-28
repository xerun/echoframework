<?php

	//Save Page as static page in script folder
	function staticPage($msg,$file){
		if ($fp = fopen('./script/'.$file, 'w')) {    // Open and write
			$message="<? \$Echo.='".$msg."'; ?>";
			fwrite($fp, $message);
			fclose($fp);
		}
	}
	
	//Save something in a disk file
    function file_put_contents2($FileName, $Content=""){
		//DebugFunctionTrace($FunctionName="file_put_contents2", $Parameter=array("FileName"=>$FileName, "Content"=>$Content), $UseURLDebugFlag=true);

        $File=fopen($FileName, "w");
        fwrite($File, $Content);
        fclose($File);
    }

	//Move the file from the temporary location of the PHP's upload path & rename the file accordingly. Returns the new filename on a
	//successful operation. Designed for application's internal purpose
    function FileUpload($RemoteFile, $LocalPath){//Uploads a file
        //DebugFunctionTrace($FunctionName="FileUpload", $Parameter=array("RemoteFile"=>$RemoteFile, "LocalPath"=>$LocalPath), $UseURLDebugFlag=true);
        $file=$_FILES[$RemoteFile]["name"];
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $NewName =  Alias($fileName).'.'.$extension;
        if($_FILES[$RemoteFile]["name"]!=""){
            if(!file_exists($LocalPath)){@mkdir($LocalPath,0777);}
            @chmod($LocalPath,0777);
            if(file_exists($LocalPath.$NewName)){
                $NewName = md5(uniqid(rand(0, 1000),1))."_".$NewName;
            }else{$NewName = $NewName;}

            move_uploaded_file($_FILES[$RemoteFile]["tmp_name"], $LocalPath.$NewName);
            return $NewName;
        }else{return "";}
    }
    
	//Process the upload of a user posted file, delete the existing file if requested
    function ProcessUpload($FieldName, $UploadPath){
		
		//DebugFunctionTrace($FunctionName="ProcessUpload", $Parameter=array("FieldName"=>$FieldName, "UploadPath"=>$UploadPath), $UseURLDebugFlag=true);

        $Document=FileUpload($FieldName."New", $UploadPath);
        if(($_POST[$FieldName]!="" and $Document!="") or isset($_POST[$FieldName."Delete"])){@unlink($UploadPath.$_POST[$FieldName]);}
        if($_POST[$FieldName]!="" and $Document=="" and !isset($_POST[$FieldName."Delete"])){$Document=$_POST[$FieldName];}
        
        return $Document;
	}
	
	function getExtension($str) {
		 $i = strrpos($str,".");
		 if (!$i) { return ""; } 
		 $l = strlen($str) - $i;
		 $ext = substr($str,$i+1,$l);
		 return $ext;
	}

    // Upload image with resized image
    function AlbumResize ($FieldName, $UploadPath, $Width="", $Height=""){
        define ("MAX_SIZE","8024");
        $errors=true;
        $reply="";
        $image =strtolower($_FILES[$FieldName]["name"]);
        $uploadedfile = $_FILES[$FieldName]['tmp_name'];
        if ($image)
        {
            $filename = stripslashes($image);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
            {
                $reply= ' Unknown Image extension ';
                $errors=false;
            }
            $size=filesize($_FILES[$FieldName]['tmp_name']);
            if ($size > MAX_SIZE*2024)
            {
                $reply= "You have exceeded the size limit";
                $errors=false;
            }
            if($errors)
            {
                if($extension=="jpg" || $extension=="jpeg" )
                {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'];
                    $src = imagecreatefromjpeg($uploadedfile);
                }
                else if($extension=="png")
                {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'];
                    $src = imagecreatefrompng($uploadedfile);
                }
                else
                {
                    $src = imagecreatefromgif($uploadedfile);
                }
                list($width,$height)=getimagesize($uploadedfile);
                $wRatio = $Width / $width;
                $hRatio = $Height / $height;
                // Calculate a proportional width and height no larger than the max size.
                if ( ($width <= $Width) && ($height <= $Height) )
                {
                    // Input is smaller than thumbnail, do nothing
                    $newwidth=$width;
                    $newheight=$height;
                }
                elseif ( ($wRatio * $height) < $Width )
                {
                    // Image is horizontal
                    $newheight = ceil($wRatio * $height);
                    $newwidth = $Width;
                }
                else
                {
                    // Image is vertical
                    $newwidth = ceil($hRatio * $width);
                    $newheight = $Height;
                }
                $tmp=imagecreatetruecolor($newwidth,$newheight);
                $bg = imagecolorallocate ( $tmp, 255, 255, 255 );
                imagefill ( $tmp, 0, 0, $bg );
                /*$newheight1=60;
                $newwidth1=($width/$height)*$newheight1;
                $tmp1=imagecreatetruecolor($newwidth1,$newheight1);*/

                imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);

                //imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, $width,$height);

                $photo = basename($image);
                $file_ext = preg_split("/\./",$photo);
                $allowed_ext = preg_split("/\,/",$allowed_ext);
                $NUM = time();
                $front_name = substr($file_ext[0], 0, 15);
                $newphotoname = $front_name."_".$NUM.".".end($file_ext);

                $filename = $UploadPath.$newphotoname;
                //$filename1 = "./upload/gallery/thumbs/". $_FILES['GalleryImageNew']['name'];
                //cropImage($width,$height,"384","263",$filename,$src,80,$extension);
                imagejpeg($tmp,$filename,90);
                //imagejpeg($tmp1,$filename1,100);

                //watermark($filename);
                imagedestroy($src);
                imagedestroy($tmp);
                //imagedestroy($tmp1);
                $reply=$newphotoname;
            }
            return $reply;
        }
    }
	
	// Upload image with resized image
	function ImageResize ($FieldName, $UploadPath, $Width="", $Height=""){
		define ("MAX_SIZE","8024");
		$errors=true;
        $reply="";
		$image =strtolower($_FILES[$FieldName]["name"]);
		$uploadedfile = $_FILES[$FieldName]['tmp_name'];
		if ($image) 
		{
			$filename = stripslashes($image);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
                $reply= ' Unknown Image extension ';
				$errors=false;
			}
            $size=filesize($_FILES[$FieldName]['tmp_name']);
            if ($size > MAX_SIZE*2024)
            {
                $reply= "You have exceeded the size limit";
                $errors=false;
            }
            if($errors)
            {
                if ($extension == "jpg" || $extension == "jpeg") {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'];
                    $src = imagecreatefromjpeg($uploadedfile);
                } else if ($extension == "png") {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'];
                    $src = imagecreatefrompng($uploadedfile);
                } else {
                    $src = imagecreatefromgif($uploadedfile);
                }
                list($width, $height) = getimagesize($uploadedfile);
                $wRatio = $Width / $width;
                $hRatio = $Height / $height;
                // Calculate a proportional width and height no larger than the max size.
                if (($width <= $Width) && ($height <= $Height)) {
                    // Input is smaller than thumbnail, do nothing
                    $newwidth = $width;
                    $newheight = $height;
                } elseif (($wRatio * $height) < $Width) {
                    // Image is horizontal
                    $newheight = ceil($wRatio * $height);
                    $newwidth = $Width;
                } else {
                    // Image is vertical
                    $newwidth = ceil($hRatio * $width);
                    $newheight = $Height;
                }
                $tmp = imagecreatetruecolor($newwidth, $newheight);
                $bg = imagecolorallocate($tmp, 255, 255, 255);
                imagefill($tmp, 0, 0, $bg);
                /*$newheight1=60;
                $newwidth1=($width/$height)*$newheight1;
                $tmp1=imagecreatetruecolor($newwidth1,$newheight1);*/

                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                //imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, $width,$height);

                $photo = basename($image);
                $file_ext = preg_split("/\./", $photo);
                $allowed_ext = preg_split("/\,/", $allowed_ext);
                $NUM = time();
                $front_name = substr($file_ext[0], 0, 15);
                $newphotoname = Alias($front_name) . "_" . $NUM . "." . end($file_ext);

                $filename = $UploadPath . $newphotoname;
                //$filename1 = "./upload/gallery/thumbs/". $_FILES['GalleryImageNew']['name'];
                //cropImage($width,$height,"1500","1000",$filename,$src,80,$extension);
                imagejpeg($tmp, $filename, 100);
                //imagejpeg($tmp1,$filename1,100);

                //watermark($filename);
                imagedestroy($src);
                imagedestroy($tmp);
                //imagedestroy($tmp1);
                $reply=$newphotoname;
            }
            return $reply;
		}
	}
	
	
	// Upload image with resized image and resized thumb
	function ImageThumbResize ($FieldName, $UploadPath, $UploadThumbPath, $Width="", $Height="", $ThumbSize){
		define ("MAX_SIZE","8024");
        $errors=true;
        $reply="";
		$image =strtolower($_FILES[$FieldName]["name"]);
		$uploadedfile = $_FILES[$FieldName]['tmp_name'];
		if ($image) 
		{
			$filename = stripslashes($image);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
			{
                $reply= 'Unknown Image extension';
				$errors=false;
			}
            $size=filesize($_FILES[$FieldName]['tmp_name']);
            if ($size > MAX_SIZE*2024)
            {
                $reply= "You have exceeded the size limit";
                $errors=false;
            }
            if($errors) {
                if ($extension == "jpg" || $extension == "jpeg") {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'];
                    $src = imagecreatefromjpeg($uploadedfile);
                } else if ($extension == "png") {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'];
                    $src = imagecreatefrompng($uploadedfile);
                } else {
                    $src = imagecreatefromgif($uploadedfile);
                }
                list($width, $height) = getimagesize($uploadedfile);
                $newwidth = $Width;
                $wRatio = $Width / $width;
                $hRatio = $Height / $height;
                // Calculate a proportional width and height no larger than the max size.
                if (($width <= $Width) && ($height <= $Height)) {
                    // Input is smaller than Original Image, do nothing
                    $newwidth = $width;
                    $newheight = $height;
                } elseif (($wRatio * $height) < $Width) {
                    // Image is horizontal
                    $newheight = ceil($wRatio * $height);
                    $newwidth = $Width;
                } else {
                    // Image is vertical
                    $newwidth = ceil($hRatio * $width);
                    $newheight = $Height;
                }
                /*if($Width==""){
                    $newwidth=($width/$height)*$newheight;
                }else{
                    $newwidth=$Width;
                }
                if($Height=="0"){
                    $newheight=($height/$width)*$newwidth;
                }else{
                    $newheight=$Height;
                }*/
                $tmp = imagecreatetruecolor($newwidth, $newheight);
                $bg = imagecolorallocate($tmp, 255, 255, 255);
                imagefill($tmp, 0, 0, $bg);

                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                $photo = basename($image);
                $file_ext = preg_split("/\./", $photo);
                $allowed_ext = preg_split("/\,/", $allowed_ext);
                $NUM = time();
                $front_name = substr($file_ext[0], 0, 15);
                $newphotoname = $front_name . "_" . $NUM . "." . end($file_ext);

                $filename = $UploadPath . "big_".$newphotoname;
                $filename1 = $UploadThumbPath . $newphotoname;

                cropImage($width, $height, $ThumbSize, $ThumbSize, $filename1, $src, 80, $extension);

                imagejpeg($tmp, $filename, 80);

                watermark($filename);
                imagedestroy($src);
                imagedestroy($tmp);
                $reply=$newphotoname;
            }
            return $reply;
        }
	}

    function ImageThumbResizeArray ($FieldName,$Array, $UploadPath, $UploadThumbPath, $Width="", $Height="", $ThumbSize){
        define ("MAX_SIZE","8024");
        $errors=true;
        $reply="";
        $image =strtolower($_FILES[$FieldName]["name"][$Array]);
        $uploadedfile = $_FILES[$FieldName]['tmp_name'][$Array];
        if ($image)
        {
            $filename = stripslashes($image);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
            {
                $reply= ' Unknown Image extension ';
                $errors=false;
            }
            $size=filesize($_FILES[$FieldName]['tmp_name'][$Array]);
            if ($size > MAX_SIZE*2024)
            {
                $reply= "You have exceeded the size limit";
                $errors=false;
            }
            if($errors) {
                if ($extension == "jpg" || $extension == "jpeg") {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'][$Array];
                    $src = imagecreatefromjpeg($uploadedfile);
                } else if ($extension == "png") {
                    $uploadedfile = $_FILES[$FieldName]['tmp_name'][$Array];
                    $src = imagecreatefrompng($uploadedfile);
                } else {
                    $src = imagecreatefromgif($uploadedfile);
                }
                list($width, $height) = getimagesize($uploadedfile);
                $newwidth = $Width;
                $wRatio = $Width / $width;
                $hRatio = $Height / $height;
                // Calculate a proportional width and height no larger than the max size.
                if (($width <= $Width) && ($height <= $Height)) {
                    // Input is smaller than Original Image, do nothing
                    $newwidth = $width;
                    $newheight = $height;
                } elseif (($wRatio * $height) < $Width) {
                    // Image is horizontal
                    $newheight = ceil($wRatio * $height);
                    $newwidth = $Width;
                } else {
                    // Image is vertical
                    $newwidth = ceil($hRatio * $width);
                    $newheight = $Height;
                }
                /*if($Width==""){
                    $newwidth=($width/$height)*$newheight;
                }else{
                    $newwidth=$Width;
                }
                if($Height=="0"){
                    $newheight=($height/$width)*$newwidth;
                }else{
                    $newheight=$Height;
                }*/
                $tmp = imagecreatetruecolor($newwidth, $newheight);
                $bg = imagecolorallocate($tmp, 255, 255, 255);
                imagefill($tmp, 0, 0, $bg);

                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                $photo = basename($image);
                $file_ext = preg_split("/\./", $photo);
                $allowed_ext = preg_split("/\,/", $allowed_ext);
                $NUM = time();
                $front_name = substr($file_ext[0], 0, 15);
                $newphotoname = $front_name . "_" . $NUM . "." . end($file_ext);

                $filename = $UploadPath . "big_".$newphotoname;
                $filename1 = $UploadThumbPath .$newphotoname;

                cropImage($width, $height, $ThumbSize, $ThumbSize, $filename1, $src, 90, $extension);

                imagejpeg($tmp, $filename, 90);

                watermark($filename);
                imagedestroy($src);
                imagedestroy($tmp);
                $reply=$newphotoname;
            }
            return $reply;
        }
    }

	//This function corps image to create exact square images, no matter what its original size!
	function cropImage($CurWidth,$CurHeight,$wSize,$hSize,$DestFolder,$SrcImage,$Quality,$ImageType)
	{	 
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0) 
		{
			return false;
		}
		
		//abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
		//http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
		if($CurWidth>$CurHeight)
		{
			$y_offset = 0;
			$x_offset = ($CurWidth - $CurHeight) / 2;
			$square_size 	= $CurWidth - ($x_offset * 2);
		}else{
			$x_offset = 0;
			$y_offset = ($CurHeight - $CurWidth) / 2;
			$square_size = $CurHeight - ($y_offset * 2);
		}
		
		$NewCanves 	= imagecreatetruecolor($wSize, $hSize);
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $wSize, $hSize, $CurWidth, $CurHeight))
		{
			switch(strtolower($ImageType))
			{
				case 'png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'jpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				case 'jpg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;	
				case 'pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
				return false;
			}
			if(is_resource($NewCanves)) 
			{ 
		      imagedestroy($NewCanves); 
		    } 
		return true;
		}
		  
	}

    function watermark($image){
        $overlay = 'theme/site/image/watermark.png';
        $opacity = "20";
        //echo $image;
        if (!file_exists($image)) {
            die("Image does not exist.");
        }
        // Set offset from bottom-right corner
        $w_offset = 0;
        $h_offset = 150;
        $extension = strtolower(substr($image, strrpos($image, ".") + 1));
        // Load image from file
        switch ($extension)
        {
            case 'jpg':
                $background = imagecreatefromjpeg($image);
                break;
            case 'jpeg':
                $background = imagecreatefromjpeg($image);
                break;
            case 'png':
                $background = imagecreatefrompng($image);
                break;
            case 'gif':
                $background = imagecreatefromgif($image);
                break;
            default:
                die("Image is of unsupported type.");
        }
        // Find base image size
        //list($swidth,$sheight)=getimagesize($background);
        //$swidth = imagesx($background);
        //$sheight = imagesy($background);
        // Turn on alpha blending
        imagealphablending($background, true);
        // Create overlay image
        //$overlay = imagecreatefrompng($overlay);
        // Get the size of overlay
        //list($owidth,$oheight)=getimagesize($overlay);
        //$owidth = $width;
        //$oheight = $height;

        $photo = imagecreatefromjpeg($image);
        $watermark = imagecreatefrompng($overlay);
        // This is the key. Without ImageAlphaBlending on, the PNG won't render correctly.
        imagealphablending($photo, true);
        // Copy the watermark onto the master, $offset px from the bottom right corner.
        $offset = 90;
        imagecopy($photo, $watermark, imagesx($photo) - imagesx($watermark) - $w_offset, imagesy($photo) - imagesy($watermark) - $h_offset, 0, 0, imagesx($watermark), imagesy($watermark));
        // Output to the browser
        //header("Content-Type: image/jpeg");
        imagejpeg($photo,$image);
        // Overlay watermark
        // Destroy the images
        imagedestroy($background);
        //imagedestroy($overlay);
    }

?>
