<?php
	/*
		Script:     mooncalendar.php
		Author:		PRITHU AHMED
		Purpose:	Various moon related date functions
		Date:		Last updated 02-12-11
		Note:		
	*/

	function MoonAge($Year=0, $Month=0, $Day=0, $Debug=false){
		
		DebugFunctionTrace($FunctionName="MoonAge", $Parameter=array("Year"=>$Year, "Month"=>$Month, "Day"=>$Day, "Debug"=>$Debug), $UseURLDebugFlag=true);

		//Determine age of the moon
		
		if($Year==0)$Year=date("Y"); 
		if($Month==0)$Month=date("n");
		if($Day==0)$Day=date("j");

		$MoonMonthCycleDays=29.53;
		$MoonYearCycleDays=365.25;
		$EarthMonthCycleDays=30.6;
		$X_Factor_1=694039.09;
		$X_Factor_2=0.5;

	    if($Month<3){
	        $Year--;
	        $Month+=12;
	    }
	    ++$Month;

	    $Century = $MoonYearCycleDays*$Year;
	    $DaysElapsed = $EarthMonthCycleDays*$Month;
	    $DaysElapsedTotal = $Century+$DaysElapsed+$Day-$X_Factor_1;  /* $DaysElapsedTotal is total days elapsed */
	    $MoonAge=fmod($DaysElapsedTotal, $MoonMonthCycleDays)+$X_Factor_2;
	    
	    if($Debug)print "
			function MoonAge(\$Year=$Year, \$Month=$Month, \$Day=$Day, \$Debug=$Debug){<br>
			    \$MoonAge = $MoonAge;<br>
			}<br>
			<hr>
		";

	    return $MoonAge;
	}
	
	function MoonAgeName($MoonAge=0, $Debug=false){

		DebugFunctionTrace($FunctionName="MoonAgeName", $Parameter=array("MoonAge"=>$MoonAge, "Debug"=>$Debug), $UseURLDebugFlag=true);

		//Determine name for the moon phase
		if($MoonAge==0)$MoonAge=MoonAge($Year=0, $Month=0, $Day=0, $Debug);

		if($MoonAge>=0&&$MoonAge<4)		$MoonAgeName="New Moon";
		if($MoonAge>=4&&$MoonAge<7)		$MoonAgeName="Waxing Crescent";
		if($MoonAge>=7&&$MoonAge<10)	$MoonAgeName="First Quarter";
		if($MoonAge>=10&&$MoonAge<14)	$MoonAgeName="Waxing Gibbous";
		if($MoonAge>=14&&$MoonAge<18)	$MoonAgeName="Full Moon";
		if($MoonAge>=18&&$MoonAge<22)	$MoonAgeName="Waning Gibbous";
		if($MoonAge>=22&&$MoonAge<26)	$MoonAgeName="Last Quarter";
		if($MoonAge>=26)				$MoonAgeName="Waning Crescent";
		
		return $MoonAgeName;
	}
?>
