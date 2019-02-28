<?php
    $Entity="Advert";
    $EntityAlias="A";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Advert";
    $EntityCaptionLower=strtolower($EntityCaption);

    $Where="1 = 1";
	if($_POST["AdvertPanelUUID"]!="")$Where.=" AND {$EntityAlias}.{$Entity}PanelUUID = ".POST(AdvertPanelUUID)."";

	$Echo.= CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Picture", "{$Entity}Type", "{$Entity}Name", "{$Entity}PanelName", "{$Entity}IsActive"),
		$ColumnTitle=array("Image", "Type", "Name", "Panel Name", "Active?"),
		$ColumnShort=array("false","true","true", "true", "false"),
		$ColumnAlign=array("center", "left", "left", "left", "center"),
		$ColumnType=array("imagelink", "text", "text", "text", "yes/no"),
		$Where,
		$AddButton=true,
		$SearchValue=array("{$Entity}Picture", "{$Entity}Type", "{$Entity}Name", "{$Entity}PanelName", "{$Entity}IsActive"),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="4",
    	$SortType="asc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>