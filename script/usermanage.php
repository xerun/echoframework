<?php
    $Entity="User";
    $EntityAlias="U";
    $EntityLower=strtolower($Entity);
    $EntityCaption="User";
    $EntityCaptionLower=strtolower($EntityCaption);

    $Where="1 = 1";
	//Allow administrator to list all the users available in the system
	if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDAdmin"]){
		$Where="U.UserTypeUUID IN ('".$Application["UserTypeIDMember"]."','".$Application["UserTypeIDAdmin"]."')";
	}else if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDSuperAdmin"]){
		$Where="U.UserTypeUUID IN ('".$Application["UserTypeIDAdmin"]."','".$Application["UserTypeIDMember"]."')";
	}


	$Echo.=CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Email", "{$Entity}TypeName","UserName","Name","PhoneMobile",  "{$Entity}IsActive", "DateInserted"),
		$ColumnTitle=array("Email",  "User Type","UserName","Name","Mobile", "Active?", "Joined"),
		$ColumnShort=array("false","true","true","true", "false", "false", "false"),
		$ColumnAlign=array("center", "left","left","left", "center","center","left"),
		$ColumnType=array("email",  "text","text","text","text", "yes/no", "datetime"),
		$Where,
		$AddButton=true,
		$SearchValue=array("U.{$Entity}Email", "UT.{$Entity}TypeName","U.UserName","U.PhoneMobile","U.DateInserted"),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="8",
    	$SortType="desc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>