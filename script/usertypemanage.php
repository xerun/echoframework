<?php
    $Entity="UserType";
    $EntityAlias="UT";
    $EntityLower=strtolower($Entity);
    $EntityCaption="User Type";
    $EntityCaptionLower=strtolower($EntityCaption);

    if($_SESSION["UserTypeUUID"]==$Application["UserTypeIDAdmin"]){
		$Where="UT.UserTypeUUID NOT IN ('".$Application["UserTypeIDGuest"]."', '".$Application["UserTypeIDSuperAdmin"]."', '".$Application["UserTypeIDAdmin"]."')";
	}else{
		$Where="UT.UserTypeUUID NOT IN ('".$Application["UserTypeIDGuest"]."', '".$Application["UserTypeIDSuperAdmin"]."')";
	}
	
	$Echo.= CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Picture", "{$Entity}Name", "{$Entity}IsActive", "DateInserted"),
		$ColumnTitle=array("Image", "Type", "Active?", "Inserted"),
		$ColumnShort=array("false","true", "false", "false"),
		$ColumnAlign=array("center", "left", "center", "left"),
		$ColumnType=array("imagelink", "text", "yes/no", "datetime"),
		$Where,
		$AddButton=true,
		$SearchValue=array("{$Entity}Picture", "{$Entity}Name", "{$Entity}IsActive", "UI.DateInserted"),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="5",
    	$SortType="desc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>