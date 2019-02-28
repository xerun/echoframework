<?php
	/*
		Template:   htmldb.php
		Purpose:    Wrap the HTML objects into PHP fuctions to embed them directly into the PHP code with minimal effort. These objects
		            also automatically adopts the current application theme. These objcts are meant to interact directly with the database
		Risk:       Normal
		Author:     PRITHU AHMED
		Date:       February 1, 2012
	*/

	//A combo box control to load data from database
	function CTL_DBCombo($Name="", $Rows=array(), $ValueColumn, $CaptionColumn, $ValueSelected=0, $PrependBlankOption=false, $BlankItemCaption="", $Required=false,$Class="FormComboBox", $Style="", $Event=""){
		if($Required)$RequiredHTML=" required";
		$HTML="<div class=\"col-sm-9\"><select name=\"$Name\" id=\"$Name\" data-search=\"true\" $RequiredHTML class=\"$Class\" style=\"$Style\" $Event >";
		if($PrependBlankOption)$HTML.="<option value=\"\">$BlankItemCaption</option>";
		foreach($Rows as $Row){
			$HTML.="<option value=\"".$Row[$ValueColumn]."\"";
			if($Row[$ValueColumn]==$ValueSelected)$HTML.=" selected";
			$HTML.=">".$Row[$CaptionColumn]."</option>";
		}
		$HTML.="</select></div>";
		return $HTML;
	}

	//Combo box with recursive child nodes
	function CTL_DBComboRecursive(
		$Name,
		$EntityName="",
		$EntityAlias="",
		$Where="",
		$SelectionValue=0,
		$PrependBlankItem=false,
		$BlankItemValue="0",
		$BlankItemCaption="",
		$TableName="",
		$ColumnPrimaryKey="",
		$ColumnCaption="",
		$ColumnForeignKeyParent="",
		$RootValue=0,
		$IndentPrefix="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
		$CiteParent=true,
		$CitationSuffix="> ",
		$DirectFunctionCall=true
	){
		DebugFunctionTrace($FunctionName="CTL_DBComboRecursive()", $Parameter=array("Name"=>$Name, "EntityName"=>$EntityName, "EntityAlias"=>$EntityAlias, "Where"=>$Where, "SelectionValue"=>$SelectionValue, "PrependBlankItem"=>$PrependBlankItem, "BlankItemValue"=>$BlankItemValue, "BlankItemCaption"=>$BlankItemCaption, "TableName"=>$TableName, "ColumnPrimaryKey"=>$ColumnPrimaryKey, "ColumnCaption"=>$ColumnCaption, "ColumnForeignKeyParent"=>$ColumnForeignKeyParent, "RootValue"=>$RootValue, "IndentPrefix"=>$IndentPrefix, "CiteParent"=>$CiteParent, "CitationSuffix"=>$CitationSuffix, "DirectFunctionCall"=>$DirectFunctionCall), $UseURLDebugFlag=true);

	    global $Application;

	    if($TableName=="")$TableName="{$Application["DatabaseTableNamePrefix"]}tbl".strtolower($EntityName)."";
	    if($ColumnPrimaryKey=="")$ColumnPrimaryKey="".$EntityName."ID";
	    if($ColumnCaption=="")$ColumnCaption="".$EntityName."Name";
	    if($ColumnForeignKeyParent=="")$ColumnForeignKeyParent="".$EntityName."IDParent";
		
		$Where2="$EntityAlias.$ColumnForeignKeyParent = $RootValue";
		if($Where!="")$Where2.=" AND $Where";

		$Row=SQL_Select($EntityName, $Where2);

		$HTML_Items="";
		foreach($Row as $ThisRow){
		    $l_IndentPrefix=$IndentPrefix;
		    if($DirectFunctionCall){
		        SetFormVariable($VariableName=$Name, $DefaultValue=$SelectionValue);
		        $l_IndentPrefix="";
			}

		    $Selected="";
		    if($ThisRow[$ColumnPrimaryKey]==$SelectionValue)$Selected=" selected";

		    $HTML_Items.="<option value=\"{$ThisRow[$ColumnPrimaryKey]}\"$Selected>".$l_IndentPrefix."{$ThisRow[$ColumnCaption]}</option>";
		    $HTML_Items.=CTL_DBComboRecursive($Name, $EntityName, $EntityAlias, $Where, $SelectionValue, $PrependBlankItem, $BlankItemValue, $BlankItemCaption, $TableName, $ColumnPrimaryKey, $ColumnCaption, $ColumnForeignKeyParent, $ThisRow[$ColumnPrimaryKey], $l_IndentPrefix.$IndentPrefix, $CiteParent, $CitationSuffix, false);
		}

	    if($DirectFunctionCall){
		    $BlankItem="";
		    if($PrependBlankItem)$BlankItem="<option value=\"$BlankItemValue\">$BlankItemCaption</option>";
		    $HTML_Output="<select name=\"$Name\" id=\"$Name\">".$BlankItem."".$HTML_Items."</select>";
			return $HTML_Output;
		}else{
		    return $HTML_Items;
		}
	}

	function CTL_DBCheckBoxRecursive(
		$Name,
		$EntityName="",
		$EntityAlias="",
		$Where="", 
		$CheckedItem=array(),
		$TableName="",
		$ColumnPrimaryKey="",
		$ColumnCaption="",
		$ColumnForeignKeyParent="",
		$RootValue=0,
		$IndentPrefix="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
	){
		DebugFunctionTrace(
			$FunctionName="CTL_DBCheckBoxRecursive()", 
			$Parameter=array(
				"Name"=>$Name, 
				"EntityName"=>$EntityName, 
				"EntityAlias"=>$EntityAlias, 
				"Where"=>$Where, 
				"CheckedItem"=>$CheckedItem, 
				"TableName"=>$TableName, 
				"ColumnPrimaryKey"=>$ColumnPrimaryKey, 
				"ColumnCaption"=>$ColumnCaption, 
				"ColumnForeignKeyParent"=>$ColumnForeignKeyParent, 
				"RootValue"=>$RootValue, 
				"IndentPrefix"=>$IndentPrefix
			), 
			$UseURLDebugFlag=true
		);

		global $Application;

		if($TableName=="")$TableName="{$Application["DatabaseTableNamePrefix"]}tbl".strtolower($EntityName)."";
		if($ColumnPrimaryKey=="")$ColumnPrimaryKey="{$EntityName}ID";
		if($ColumnCaption=="")$ColumnCaption="{$EntityName}Name";
		if($ColumnForeignKeyParent=="")$ColumnForeignKeyParent="{$EntityName}IDParent";

		//$Row=SQL_
		$Row=MySQLRows(
			$SQL="
			    SELECT *
			    FROM $TableName
			    WHERE $ColumnForeignKeyParent = $RootValue
			    ORDER BY $ColumnCaption
			",
			$SingleRow=false, $Link="", $Debug=false
		);

		$HTML="";
		foreach($Row as $ThisRow){
			$ExpansionLink="";
		    $HTML_Child=CTL_DBCheckBoxRecursive($Name, $EntityName, $EntityAlias, $Where, $CheckedItem, $TableName, $ColumnPrimaryKey, $ColumnCaption, $ColumnForeignKeyParent, $ThisRow[$ColumnPrimaryKey], $IndentPrefix);
		    if($HTML_Child!=""){
				$ExpansionLink="<a href=\"###\" onclick=\"ToggleVisibilityByElementID('ChildItemContainerFor_{$ThisRow[$ColumnPrimaryKey]}')\"><img src=\"./theme/{$_REQUEST["Theme"]}/image/icon_expand.gif\"></a>";
				$HTML_Child="
			            <table cellspacing=\"0\" id=\"ChildItemContainerFor_{$ThisRow[$ColumnPrimaryKey]}\" style=\"display: none;\">
			                <tr>
								<td style=\"width: 1px;\">$IndentPrefix</td>
								<td>$HTML_Child</td>
							</tr>
						</table>
				";
			}

			$Checked="";
			if((isset($_POST[$Name])&&in_array($ThisRow[$ColumnPrimaryKey], $_POST[$Name]))||in_array($ThisRow[$ColumnPrimaryKey], $CheckedItem)){
			    $Checked=" checked";
				$HTML.="
				    <script language=\"JavaScript\">
				    <!--
				        SetVisibilityByElementID('ChildItemContainerFor_$RootValue', true);
				    //-->
					</script>
				";
			}
		    $HTML.="
		        <div style=\"border-style: solid; border-color: red; border-width: 0px; padding 0px;\">
		            <input type=\"checkbox\" name=\"{$Name}[]\" value=\"{$ThisRow[$ColumnPrimaryKey]}\" $Checked> $ExpansionLink {$ThisRow[$ColumnCaption]}<br>
		            $HTML_Child
				</div>
			";
		}

		return $HTML;
	}
?>