<?php
    $Entity="Menu";
    $EntityAlias="M";
    $EntityLower=strtolower($Entity);
    $EntityCaption="Menus";
    $EntityCaptionLower=strtolower($EntityCaption);

    $Where="1 = 1";
	if($_POST["MenuUUID"]!="")$Where.=" AND {$EntityAlias}.{$Entity}UUID = ".POST('MenuUUID')."";

	$Echo.= CTL_Datagrid(
		$Entity,
		$EntityAlias,
		$ColumnName=array("{$Entity}Position","{$Entity}Name","ParentName","{$Entity}IsActive","DateInserted" ),
		$ColumnTitle=array("Position","Name","Parent","Active?","Insert Date"),
		$ColumnShort=array("true","true","false","false","false"),
		$ColumnAlign=array("left","left","center","center","center"),
		$ColumnType=array("text","text","text","yes/no","date"),
		$Where,
		$AddButton=true,
		$SearchValue=array("M.{$Entity}Position","M.{$Entity}Name","MM.MenuName","M.{$Entity}IsActive","M.DateInserted" ),
    	$RecordShowUpTo= $Application["DatagridRowsDefault"],
   		$SortBy="3",
    	$SortType="asc",
		$AdditionalLinks=array(),
		$AdditionalActionParameter="",
		$ActionLinks=true,
		$EntityCaption
	);
?>