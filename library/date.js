function  DateDifferenceInDays(Date1, Date2){
	//Return type INTEGER
	
	DateDifferenceInMiliSeconds=Date1-Date2;
    DateDifferenceInDays=parseInt(DateDifferenceInMiliSeconds/86400000);
    
    return DateDifferenceInDays;
}

function DateAdd(Date1, DaysToAdd){
	//Return type DATE object
	
	MiliSecondsToAddTo=Date.parse(Date1);
	MiliSecondsToAdd=DaysToAdd*24*60*60*1000;
	ResultDate=new Date(MiliSecondsToAddTo+MiliSecondsToAdd);
	
	return ResultDate;
}

function DateFormat(DateToFormat, FormatString){
	//Return type STRING

	Year=DateToFormat.getFullYear();
	Month=DateToFormat.getMonth()+1;
	MonthWithLeadingZero=LZ(Month);
	MonthName=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'][Month-1];
	DayOfMonth=DateToFormat.getDate();
	DayOfMonthWithLeadingZero=LZ(DayOfMonth);
	DayOfWeek=DateToFormat.getDay();
	//alert(DateToFormat.getDay());
	DayNameOfWeek=['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][DayOfWeek];

    FormattedDate=FormatString;
	FormattedDate=FormattedDate.replace('YYYY', Year);
	//FormattedDate=FormattedDate.replace('YY', Year);
	//FormattedDate=FormattedDate.replace('Y', Year);

	FormattedDate=FormattedDate.replace('MMMM', MonthName);
	//FormattedDate=FormattedDate.replace('MMM', Year);
	FormattedDate=FormattedDate.replace('MM', MonthWithLeadingZero);
	FormattedDate=FormattedDate.replace('M', Month);

	FormattedDate=FormattedDate.replace('DD', DayOfMonthWithLeadingZero);
	FormattedDate=FormattedDate.replace('D', DayOfMonth);

	FormattedDate=FormattedDate.replace('EEEE', DayNameOfWeek);
	//FormattedDate=FormattedDate.replace('EEE', Year);

	return FormattedDate;
}