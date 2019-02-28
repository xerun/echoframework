<?php
	/*
		Template:   numeric.php
		Purpose:    Custom numeric functions
		Risk:       Normal
		Author:     Prithu Ahmed
		Date:       February 1, 2012
	*/

	//Check if the given number is negative
	//Return type BOOLEAN
	//      TRUE = Negative number
	//      FALSE = Positive number
	function IsNegative($Number){
		DebugFunctionTrace($FunctionName="IsNegative", $Parameter=array("Number"=>$Number), $UseURLDebugFlag=true);

	    $IsNegative=false;
	    if($Number/abs($Number)==-1)$IsNegative=true;
	    return $IsNegative;
	}

	//Check if the specified is an odd number
	function IsOdd($Number){
		if($Number>floor($Number/2)*2){return true;}else{return false;}
	}
?>
