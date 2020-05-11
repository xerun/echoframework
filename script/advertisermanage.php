<?php
    $Entity="Advertiser";
    $EntityAlias="A";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advertiser List";
    $EntityCaptionLower=strtolower($EntityCaption);

    $Where="1 = 1";
	if($_POST["AdvertiserUUID"]!="")$Where.=" AND {$EntityAlias}.{$Entity}UUID = ".POST('AdvertiserUUID')."";

	$Echo.= CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Name","{$Entity}IsActive", "DateInserted"),
		$ColumnTitle=array("Name","Active?","Inserted"),
		$ColumnShort=array("true","false","true"),
		$ColumnAlign=array("left","center","left"),
		$ColumnType=array("text","yes/no","date"),
		$Where,
		$AddButton=true,
		$SearchValue=array("{$Entity}Name","{$Entity}IsActive", "DateInserted"),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="4",
    	$SortType="desc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>