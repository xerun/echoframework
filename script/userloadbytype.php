<?php
	$UserTypeUUID=$_GET["utid"];
	$ShowEcho="<option value=''>Select User</option>";
    $sql=MySqlQuery("Select * from tbluser where UserTypeUUID='".$UserTypeUUID."' AND UserIsActive=1 Order By UserName ASC");
    while($row=$sql->fetch_object()){
        $ShowEcho .= '
            <option value="'.$row->UserUUID.'">'.$row->UserName.'</option>
        ';
    }
    echo $ShowEcho;