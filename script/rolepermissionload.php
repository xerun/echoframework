<?php
	$UserTypeUUID=$_GET["utid"];
    $User=$_GET["uid"];
	$ShowEcho="";
	$dir = new DirectoryIterator("script/");
	$f=1;
    foreach ($dir as $fileinfo) {
        if($fileinfo->getFilename() != "." and $fileinfo->getFilename() != ".."){
            $sql=MySqlQuery("Select * from tblpermission where UserTypeUUID='".$UserTypeUUID."' and UserUUID LIKE '%".$User."%' AND Page='".substr($fileinfo->getFilename(),0,-4)."'");
            if($sql->num_rows>0){
    $ShowEcho.='
                                            <li class="selected">
                                                <label style="width:100%;display:block;cursor:pointer"><input type="checkbox" data-checkbox="icheckbox_square-blue" class="permission" onchange="highlight(this.id)" name="permissionfile[]" id="file-'.$f.'" value="'.substr($fileinfo->getFilename(),0,-4).'" checked="true" /><span>'.substr($fileinfo->getFilename(),0,-4).'</span></label>
                                            </li>
    ';
        	}else{
    $ShowEcho.='
                                            <li>
                                                <label style="width:100%;display:block;cursor:pointer"><input type="checkbox" data-checkbox="icheckbox_square-blue" class="permission" onchange="highlight(this.id)" name="permissionfile[]" id="file-'.$f.'" value="'.substr($fileinfo->getFilename(),0,-4).'" /><span>'.substr($fileinfo->getFilename(),0,-4).'</span></label>
                                            </li>
    ';   		
        	}
        	$f++;
    	}
    }
    echo $ShowEcho;    
?>