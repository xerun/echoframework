function AddOptionToSelectList(SelectControl, OptionValue, OptionCaption){
    SelectControl.options[SelectControl.options.length]=new Option(OptionValue, OptionCaption);
}

function SetNumberOfDaysInDropDown(DropDownList, DropDownListWeekDays, Month, Year){
	Month=parseFloat(Month);
	Year=parseInt(Year);

	LastDayInList=parseInt(DropDownList.options[DropDownList.options.length-1].value);
	//Make sure the list has at least 30 days
	if(LastDayInList<30){for(i=LastDayInList+1;i<31;i++)AddOptionToSelectList(DropDownList, i, i);}
	//Trim the list to 30 days
	if(LastDayInList>30){for(i=DropDownList.options.length;i>30;i--)DropDownList.options[i-1]=null;}
    LastDayInList=30;

	//Add 31th days for appropriate months
	if((Month/2)>Math.floor(Month/2) && Month<8)AddOptionToSelectList(DropDownList, 31, 31);
	if((Month/2)==Math.floor(Month/2) && Month>7)AddOptionToSelectList(DropDownList, 31, 31);

    //Check for leap year and February
    if(Month==2 && parseInt(Year/4)!=(Year/4)){
        DropDownList.options[DropDownList.options.length-1]=null;
        DropDownList.options[DropDownList.options.length-1]=null;
	    LastDayInList=28;
	}
    if(Month==2 && parseInt(Year/4)==(Year/4)){
        DropDownList.options[DropDownList.options.length-1]=null;
	    LastDayInList=29;
	}
	
	SetDayOfWeekInDropDown(DropDownListWeekDays, DropDownList.value, Month, Year);
}

function SetDayOfWeekInDropDown(DropDownList, Day, Month, Year){
	DateToEvaluate=new Date(Year, Month-1, Day, 12, 0, 0, 0);
    DropDownList.value = New_DateFormat(DateToEvaluate, 'EEEE');
}