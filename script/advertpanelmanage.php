<?php
    $Entity="AdvertPanel";
    $EntityAlias="AP";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advert Panel";
    $EntityCaptionLower=strtolower($EntityCaption);

    $Where="1=1";

	$Echo.= CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Name", "{$Entity}IsVertical", "{$Entity}IsActive"),
		$ColumnTitle=array("Name", "Vertical?", "Active?"),
		$ColumnShort=array("true","false", "false"),
		$ColumnAlign=array("left", "center", "center"),
		$ColumnType=array("text", "yes/no", "yes/no"),
		$Where,
		$AddButton=true,
		$SearchValue=array("{$Entity}Name", "{$Entity}IsVertical", "{$Entity}IsActive"),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="2",
    	$SortType="asc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>