<?php

	function SQL_Select($Entity="", $Where="", $OrderBy="", $SingleRow=false, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug=false){
	    global $SQL_SelectStatement;

		DebugFunctionTrace($FunctionName="SQL_Select", $Parameter=array("Entity"=>$Entity, "Where"=>$Where, "OrderBy"=>$OrderBy, "SingleRow"=>$SingleRow, "RecordShowFrom"=>$RecordShowFrom, "RecordShowUpTo"=>$RecordShowUpTo), $UseURLDebugFlag=true);

	    $SQL=$SQL_SelectStatement["$Entity"];
		if($Where!="")$SQL.=" WHERE $Where";//Attach custom WHERE clause
		if($OrderBy!="")$SQL.=" ORDER BY $OrderBy";//Attach custom ORDER BY clause
		if($RecordShowUpTo>0&&$RecordShowUpTo!=""&&$RecordShowFrom>0&&$RecordShowFrom!="")$SQL.=" LIMIT ".($RecordShowFrom-1).", $RecordShowUpTo";

		//Return the records to the caller
	    return MySQLRows(
	        $SQL=$SQL,
			$SingleRow=$SingleRow,
			$Link="",
			$Debug=$Debug
		);
	}

	function SQL_InsertUpdate($Entity="", $EntityAlias="", $Data=array(), $Where="", $Debug=false){
	    //Insert new data or update existing data into the database table
	    //$Entity		=	Database entity name (e.g.: User where table name will be tbluser)
	    //$Data			=	Array of data where each element is Key = Field Name & Value = Value
	    //$Where=       =   Determines the records to be updated for an UPDATE SQL statement
	    
		DebugFunctionTrace($FunctionName="SQL_InsertUpdate", $Parameter=array("Entity"=>$Entity, "Data"=>$Data, "Where"=>$Where), $UseURLDebugFlag=true);
		
	    $EntityLower=strtolower($Entity);

		$UpdateMode=true;
		if($Where=="")$UpdateMode=false;
		
		$SQL_SET=$SQL_FieldName=$SQL_FieldValue="";
	
	    $Field=MySQLRows($SQL="SHOW COLUMNS FROM tbl$EntityLower");
	    foreach($Field as $ThisField){
	        if($ThisField["Field"]!="{$Entity}UUID"&&$ThisField["Field"]!="UserUUIDInserted"&&$ThisField["Field"]!="UserUUIDUpdated"&&$ThisField["Field"]!="UserUUIDLocked"&&$ThisField["Field"]!="DateInserted"&&$ThisField["Field"]!="DateUpdated"&&$ThisField["Field"]!="DateLocked"){
	            $StringMarker="'";
	            if(
					substr($ThisField["Type"], 0, 3)=="int"||
					substr($ThisField["Type"], 0, 7)=="tinyint"||
					substr($ThisField["Type"], 0, 8)=="smallint"||
					substr($ThisField["Type"], 0, 9)=="mediumint"||
					substr($ThisField["Type"], 0, 7)=="integer"||
					substr($ThisField["Type"], 0, 6)=="bigint"||
					substr($ThisField["Type"], 0, 4)=="real"||
					substr($ThisField["Type"], 0, 6)=="double"||
					substr($ThisField["Type"], 0, 5)=="float"||
					substr($ThisField["Type"], 0, 7)=="decimal"||
					substr($ThisField["Type"], 0, 7)=="numeric"||
					1==0
				)$StringMarker="";

				if(isset($Data["{$ThisField["Field"]}"])){
					//Take care of single quotes and PHP's POST slashes
					$Data["{$ThisField["Field"]}"]=str_replace("'", "''", stripslashes($Data["{$ThisField["Field"]}"]));
					
					//For UPDATE SQL
				    $SQL_SET.="{$ThisField["Field"]} = $StringMarker{$Data["{$ThisField["Field"]}"]}$StringMarker, ";
					
					//For INSERT SQL
				    $SQL_FieldName.="{$ThisField["Field"]}, ";
				    $SQL_FieldValue.="$StringMarker{$Data["{$ThisField["Field"]}"]}$StringMarker, ";
				}
			}
		}

		if($UpdateMode){//UPDATE SQL
		    $SQL="UPDATE tbl$EntityLower SET $SQL_SET UserUUIDUpdated = '".$_SESSION["UserUUID"]."', UserUUIDLocked = 0, DateUpdated = GETDATE(), DateLocked = GETDATE() WHERE 1 = 1";
		    if($Where!="")$SQL.=" AND $Where";
		}else{//INSERT SQL
		    $Entity_Value_UUID=GUID();
		    if(isset($Data["{$Entity}UUID"]))$Entity_Value_UUID=$Data["{$Entity}UUID"];
		    $SQL="INSERT INTO tbl$EntityLower ({$Entity}UUID, $SQL_FieldName UserUUIDInserted, UserUUIDUpdated, UserUUIDLocked, DateInserted, DateUpdated, DateLocked) VALUES ('$Entity_Value_UUID', $SQL_FieldValue '".$_SESSION["UserUUID"]."', '".$_SESSION["UserUUID"]."', 0, GETDATE(), GETDATE(), GETDATE())";
		}
		
		MySQLQuery($SQL, $Link="", $Debug);
		
		if($UpdateMode){
			//return SQL_Select($Entity, $Where, $OrderBy="", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug);
			return 0;
		}else{
			return SQL_Select($Entity, $Where="$EntityAlias.{$Entity}UUID = '$Entity_Value_UUID'", $OrderBy="", $SingleRow=true, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug);
		}
		
		if($Debug)DebugFunctionTrace($FunctionName="SQL_InsertUpdate", $Parameter=array("SQL"=>$SQL), $UseURLDebugFlag=true);
	}

	function SQL_Delete($Entity="", $Where="", $CleanUp=true, $Debug=false){
	    global $Application;

		DebugFunctionTrace($FunctionName="SQL_Delete", $Parameter=array("Entity"=>$Entity, "Where"=>$Where, "CleanUp"=>$CleanUp), $UseURLDebugFlag=true);

	    $EntityLower=strtolower($Entity);
	    //$RecordSet=SQL_Select($Entity, $Where, $OrderBy="", $SingleRow=false, $RecordShowFrom=0, $RecordShowUpTo=0, $Debug);
		//$FileField=array("Picture", "Image", "Thumbnail", "File");
		//$EntityIDList=array(0);
		//foreach($RecordSet as $ThisRecordSet){
		    //$EntityUUIDList[]=$ThisRecordSet["{$Entity}UUID"];
			//foreach($FileField as $ThisFileField)@unlink($Application["UploadPath"].$ThisRecordSet["{$Entity}$ThisFileField"]);
		//}
		$SQL="DELETE FROM tbl{$EntityLower}";
		if($Where!="")$SQL.=" WHERE {$Where}";
		MySQLQuery($SQL);
		if($CleanUp)SQL_CleanUp();
	}


	//Fetch a recordset off a MySQL database's table using SQL including SELECT, INSERT, UPDATE & DELETE commands
	//   $SQL =  SQL statement to pull the records from
	//   $Link = Specifies the database to works on, if not supplied, assumes the current application database
	//Returns a MySQL recordset
	function MySQLQuery($SQL, $Link="", $Debug=false){
		global $Application, $Echo;

	    //DebugFunctionTrace($FunctionName="MySQLQuery", $Parameter=array("SQL"=>$SQL, "Link"=>$Link, "Debug"=>$Debug), $UseURLDebugFlag=true);

		$DebugResponse="
		    <span class=\"DebugBackground\">
		        <span class=\"DebugReservedWord\">function</span> <span class=\"DebugIdentifier\">MySQLQuery</span> <span class=\"DebugSymbol\">(</span>
		            <span class=\"DebugVariable\">\$SQL</span> <span class=\"DebugSymbol\">=</span> <span class=\"DebugSymbol\">\"</span><span class=\"DebugString\">$SQL</span><span class=\"DebugSymbol\">\"</span>,
		            <span class=\"DebugVariable\">\$Link</span> <span class=\"DebugSymbol\">=</span> <span class=\"DebugReservedWord\">$Link</span>
				<span class=\"DebugSymbol\">)</span>
            </span>
			<hr>
		";

		if(!$Link)$Link=$Application["DatabaseLink"];
		if($Debug)$Echo.=$DebugResponse;
		SQLQuery("SET character_set_client=utf8", $Link);
		SQLQuery("SET character_set_connection=utf8", $Link);
		$Query = SQLQuery($SQL, $Link) or die($DebugResponse);
		SQLQuery("SET character_set_results=utf8");
		return $Query;
	}

	//Fetch rows from a MySQL database in an array in array(array("colum_name"=>"value"),...) manner
	//    $SQL = SQL Statement to use to fetch the recordset
	//    $Link = Specifies the database to works on, if not supplied, assumes the current application database
	//    $Debaug = While set to "true", it will output the passed SQL directly to the browser
	//Returns an array that contains arrays for each row.
	function MySQLRows($SQL, $SingleRow=false, $Link="", $Debug=false){

		//DebugFunctionTrace($FunctionName="MySQLRows", $Parameter=array("SQL"=>$SQL, "SingleRow"=>$SingleRow, "Link"=>$Link, "Debug"=>$Debug), $UseURLDebugFlag=true);

	    if($Debug)print "
		    <span class=\"DebugBackground\">
		        <span class=\"DebugReservedWord\">function</span> <span class=\"DebugIdentifier\">MySQLRows</span> <span class=\"DebugSymbol\">(</span>
		            <span class=\"DebugSymbol\">\"</span><span class=\"DebugString\">$SQL</span><span class=\"DebugSymbol\">\"</span>,
		            <span class=\"DebugReservedWord\">$SingleRow</span>,
		            <span class=\"DebugReservedWord\">$Link</span>
				<span class=\"DebugSymbol\">)</span>
            </span>
			<hr>
		";

	    $Query=MySQLQuery($SQL, $Link, $Debug);
	    $Rows=array();
	    if($SingleRow){
			$Rows=sqlsrv_fetch_array($Query);
		}else{
			while($ThisRow=sqlsrv_fetch_array($Query))$Rows[]=$ThisRow;
		}
	    return $Rows;
	}
?>