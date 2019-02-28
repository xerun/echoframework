<?php
    $Entity="ApplicationSetting";
    $EntityAlias="APS";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Application Setting";
    $EntityCaptionLower=strtolower($EntityCaption);

	// Query condition
	$Where="1=1";

	$Echo.= CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Name", "{$Entity}Value","{$Entity}IsActive" ),
		$ColumnTitle=array("Name", "Value", "Active?"),
		$ColumnShort=array("true", "true", "false"),
		$ColumnAlign=array("left", "left","center"),
		$ColumnType=array("text", "text","yes/no"),
		$Where,
		$AddButton=true,
		$SearchValue=array("{$Entity}Name", "{$Entity}Value","{$Entity}IsActive" ),
		$RecordShowUpTo= $Application["DatagridRowsDefault"],
		$SortBy="2",
		$SortType="asc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>