<?php

	//Return the date and time difference among two literally (e.g.: mm/dd/yy hh:mm:ss) expressed dates.
	//The function returns an array as follows;
	//   $Difference["Seconds"] = The second difference
	//   $Difference["Minutes"] = The minute difference
	//   $Difference["Hours"]   = The hour difference
	//   $Difference["Days"]    = The day difference
	//   $Difference["Months"]  = The month difference
	//   $Difference["Years"]   = The year difference
	function FN_DateTimeDifference($LaterDate, $EarlierDate){
		DebugFunctionTrace($FunctionName="FN_DateTimeDifference", $Parameter=array("LaterDate"=>$LaterDate, "EarlierDate"=>$EarlierDate), $UseURLDebugFlag=true);

		$DifferenceInSecends=strtotime($LaterDate)-strtotime($EarlierDate);
		$DifferenceInMinutes=floor($DifferenceInSecends/60);
		$Difference["Seconds"]=$DifferenceInSecends-($DifferenceInMinutes*60);
		$DifferenceInHours=floor($DifferenceInMinutes/60);
		$Difference["Minutes"]=$DifferenceInMinutes-($DifferenceInHours*60);
		$DifferenceInDays=floor($DifferenceInHours/24);
		$Difference["Hours"]=$DifferenceInHours-($DifferenceInDays*24);
		$DifferenceInMonths=floor($DifferenceInDays/30);
		$Difference["Days"]=$DifferenceInDays-($DifferenceInMonths*30);
		$DifferenceInYears=floor($DifferenceInMonths/12);
		$Difference["Months"]=$DifferenceInMonths-($DifferenceInYears*12);
		$Difference["Years"]=$DifferenceInYears;
		return $Difference;
	}

	//Return the date formatted to LONG DATE manner
	function FN_FormattedDate($vDate=""){
	    if($vDate=="")$vDate=getdate();
	    return $vDate["month"]." ".$vDate["mday"].", ".$vDate["year"];
	}

	//Format a date to a MySQL datetime field
	function FN_MySQLDateTime($vDate=""){
	    if($vDate=="")$vDate=getdate();
	    return $vDate["year"]."-".str_pad($vDate["mon"], 2, "0", "STR_PAD_LEFT")."-".str_pad($vDate["mday"], 2, "0", "STR_PAD_LEFT")." ".str_pad($vDate["hours"], 2, "0", "STR_PAD_LEFT").":".str_pad($vDate["minutes"], 2, "0", "STR_PAD_LEFT").":".str_pad($vDate["seconds"], 2, "0", "STR_PAD_LEFT");
	}
?>