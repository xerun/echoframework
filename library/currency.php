<?php
	function CTL_PreCharge_FigureWithCurrencyConverter($Amount=0, $SourceCurrency="GBP", $DecimalDigits=2){
	    DebugFunctionTrace($FunctionName="CTL_PreCharge_FigureWithCurrencyConverter", $Parameter=array("Amount"=>$Amount, "SourceCurrency"=>$SourceCurrency, "DecimalDigits"=>$DecimalDigits), $UseURLDebugFlag=true);
	    
	    return "
	        <span class=\"PreCharge_CurrencyConverter\" title=\"Click to convert to your own currency\">
				<span class=\"precharge_convert\" _amount=\"$Amount\" _options=\"base_currency: $SourceCurrency, decimals: $DecimalDigits, pre: (, post:)\">$SourceCurrency $Amount</span>
			</span>
		";
	}
	
	function CTL_AquariusSoft_CurrencyConverter($FromText="Convert", $ToText="to", $StyleSourceList="font-size: 9px;", $StyleSourceAmount="width: 152px;", $StyleTargetList="font-size: 9px;", $StyleTargetAmount="width: 152px;"){
	    return "
			<FORM name=curconvert onLoad=lastupdate()>
			    $FromText
				<SELECT NAME=\"covertfrom\" style=\"$StyleSourceList\" onChange=calculate(0)>
					<OPTION VALUE=\"USD\">US Dollars</OPTION>
					<OPTION VALUE=\"EUR\">EURO</OPTION>
					<OPTION VALUE=\"GBP\" selected>United Kingdom Pounds</OPTION>
					<OPTION VALUE=\"JPY\">Japan Yen</OPTION>
					<OPTION VALUE=\"CAD\">Canada Dollars</OPTION>
					<OPTION VALUE=\"AUD\">Australia Dollars</OPTION>
					<OPTION VALUE=\"CNY\">China Yuan Renminbi</OPTION>
					<OPTION VALUE=\"HKD\">Hong Kong Dollars</OPTION>
					<OPTION VALUE=\"SGD\">Singapore Dollars</OPTION>
					<OPTION VALUE=\"CHF\">Switzerland Francs</OPTION>
					<OPTION VALUE=\"SEK\">Sweden Kronor</OPTION>
					<OPTION VALUE=\"ZAR\">South Africa Rand</OPTION>
					<OPTION VALUE=\"NZD\">New Zealand Dollars</OPTION>
					<OPTION VALUE=\"MXN\">Mexico Pesos</OPTION>
					<OPTION VALUE=\"\">-------------------------------
					<OPTION VALUE=\"AFA\">Afghanistan Afghanis</OPTION>
					<OPTION VALUE=\"ALL\">Albania Leke</OPTION>
					<OPTION VALUE=\"DZD\">Algeria Dinars</OPTION>
					<OPTION VALUE=\"ARS\">Argentina Pesos</OPTION>
					<OPTION VALUE=\"AUD\">Australia Dollars</OPTION>
					<OPTION VALUE=\"ATS\">Austria Schillings</OPTION>
					<OPTION VALUE=\"BSD\">Bahamas Dollars</OPTION>
					<OPTION VALUE=\"BDT\">Bangladesh Taka</OPTION>
					<OPTION VALUE=\"BBD\">Barbados Dollars</OPTION>
					<OPTION VALUE=\"BEF\">Belgium Francs</OPTION>
					<OPTION VALUE=\"BMD\">Bermuda Dollars</OPTION>
					<OPTION VALUE=\"BRL\">Brazil Reals</OPTION>
					<OPTION VALUE=\"BND\">Brunei Dollars</OPTION>
					<OPTION VALUE=\"BGL\">Bulgaria Leva</OPTION>
					<OPTION VALUE=\"CAD\">Canada Dollars</OPTION>
					<OPTION VALUE=\"KYD\">Cayman Islands Dollars</OPTION>
					<OPTION VALUE=\"XOF\">CFA Franc (BCEAO)</OPTION>
					<OPTION VALUE=\"XAF\">CFA Franc (BEAC)</OPTION>
					<OPTION VALUE=\"CLP\">Chile Pesos</OPTION>
					<OPTION VALUE=\"CNY\">China Yuan Renminbi</OPTION>
					<OPTION VALUE=\"COP\">Colombia Pesos</OPTION>
					<OPTION VALUE=\"CRC\">Costa Rica Colones</OPTION>
					<OPTION VALUE=\"CYP\">Cyprus Pounds</OPTION>
					<OPTION VALUE=\"CZK\">Czech Republic Koruny</OPTION>
					<OPTION VALUE=\"DKK\">Denmark Kroner</OPTION>
					<OPTION VALUE=\"EGP\">Egypt Pounds</OPTION>
					<OPTION VALUE=\"EUR\">Euro</OPTION>
					<OPTION VALUE=\"FJD\">Fiji Dollars</OPTION>
					<OPTION VALUE=\"FIM\">Finland Markkaa</OPTION>
					<OPTION VALUE=\"FRF\">France Francs</OPTION>
					<OPTION VALUE=\"DEM\">Germany Deutsche Marks</OPTION>
					<OPTION VALUE=\"GRD\">Greece Drachmae</OPTION>
					<OPTION VALUE=\"HKD\">Hong Kong Dollars</OPTION>
					<OPTION VALUE=\"HUF\">Hungary Forints</OPTION>
					<OPTION VALUE=\"ISK\">Iceland Kronur</OPTION>
					<OPTION VALUE=\"INR\">India Rupees</OPTION>
					<OPTION VALUE=\"IDR\">Indonesia Rupiahs</OPTION>
					<OPTION VALUE=\"IQD\">Iraq Dinars</OPTION>
					<OPTION VALUE=\"IEP\">Ireland Pounds</OPTION>
					<OPTION VALUE=\"ILS\">Israel New Shekels</OPTION>
					<OPTION VALUE=\"ITL\">Italy Lire</OPTION>
					<OPTION VALUE=\"JMD\">Jamaica Dollars</OPTION>
					<OPTION VALUE=\"JPY\">Japan Yen</OPTION>
					<OPTION VALUE=\"JOD\">Jordan Dinars</OPTION>
					<OPTION VALUE=\"KWD\">Kuwait Dinars</OPTION>
					<OPTION VALUE=\"LBP\">Lebanon Pounds</OPTION>
					<OPTION VALUE=\"LUF\">Luxembourg Francs</OPTION>
					<OPTION VALUE=\"MOP\">Macau Patacas</OPTION>
					<OPTION VALUE=\"MYR\">Malaysia Ringgits</OPTION>
					<OPTION VALUE=\"MTL\">Malta Liri</OPTION>
					<OPTION VALUE=\"MRO\">Mauritania Ouguiyas</OPTION>
					<OPTION VALUE=\"MUR\">Mauritius Rupees</OPTION>
					<OPTION VALUE=\"MXN\">Mexico Pesos</OPTION>
					<OPTION VALUE=\"MAD\">Morocco Dirhams</OPTION>
					<OPTION VALUE=\"NLG\">Netherlands Guilders</OPTION>
					<OPTION VALUE=\"NZD\">New Zealand Dollars</OPTION>
					<OPTION VALUE=\"NGN\">Nigeria Nairas</OPTION>
					<OPTION VALUE=\"NOK\">Norway Kroner</OPTION>
					<OPTION VALUE=\"OMR\">Oman Rial</OPTION>
					<OPTION VALUE=\"XPF\">Pacific Franc</OPTION>
					<OPTION VALUE=\"PKR\">Pakistan Rupees</OPTION>
					<OPTION VALUE=\"PGK\">Papua New Guinea Kina</OPTION>
					<OPTION VALUE=\"PHP\">Philippines Pesos</OPTION>
					<OPTION VALUE=\"PLN\">Poland Zlotych</OPTION>
					<OPTION VALUE=\"PTE\">Portugal Escudos</OPTION>
					<OPTION VALUE=\"ROL\">Romania Lei</OPTION>
					<OPTION VALUE=\"RUR\">Russia Rubles</OPTION>
					<OPTION VALUE=\"SAR\">Saudi Arabia Riyals</OPTION>
					<OPTION VALUE=\"SGD\">Singapore Dollars</OPTION>
					<OPTION VALUE=\"SKK\">Slovakia Koruny</OPTION>
					<OPTION VALUE=\"ZAR\">South Africa Rand</OPTION>
					<OPTION VALUE=\"KRW\">South Korea Won</OPTION>
					<OPTION VALUE=\"ESP\">Spain Pesetas</OPTION>
					<OPTION VALUE=\"SDD\">Sudan Dinars</OPTION>
					<OPTION VALUE=\"SYD\">Syria Pounds</OPTION>
					<OPTION VALUE=\"SEK\">Sweden Kronor</OPTION>
					<OPTION VALUE=\"CHF\">Switzerland Francs</OPTION>
					<OPTION VALUE=\"TWD\">Taiwan New Dollars</OPTION>
					<OPTION VALUE=\"THB\">Thailand Baht</OPTION>
					<OPTION VALUE=\"TTD\">Trinidad and Tobago Dollars</OPTION>
					<OPTION VALUE=\"TRL\">Turkey Liras</OPTION>
					<OPTION VALUE=\"UGX\">Uganda Shillings</OPTION>
					<OPTION VALUE=\"UAH\">Ukraine Hryvnia</OPTION>
					<OPTION VALUE=\"AED\">United Arab Emirates Dirham</OPTION>
					<OPTION VALUE=\"GBP\">United Kingdom Pounds</OPTION>
					<OPTION VALUE=\"USD\">United States Dollars</OPTION>
					<OPTION VALUE=\"VEB\">Venezuela Bolivares</OPTION>
					<OPTION VALUE=\"VND\">Vietnam Dong</OPTION>
					<OPTION VALUE=\"ZMK\">Zambia Kwacha</OPTION>
					<OPTION VALUE=\"ZWD\">Zimbabwe Dollars</OPTION>
				</SELECT>
				<INPUT NAME=\"amount\" VALUE=\"1.00\" style=\"$StyleSourceAmount\" onKeyup=calculate(0) >
				$ToText
				<SELECT NAME=\"covertto\" style=\"$StyleTargetList\" onChange=calculate(0)>
					<OPTION VALUE=\"USD\">US Dollars</OPTION>
					<OPTION VALUE=\"EUR\">EURO</OPTION>
					<OPTION VALUE=\"GBP\">United Kingdom Pounds</OPTION>
					<OPTION VALUE=\"JPY\">Japan Yen</OPTION>
					<OPTION VALUE=\"CAD\">Canada Dollars</OPTION>
					<OPTION VALUE=\"AUD\">Australia Dollars</OPTION>
					<OPTION VALUE=\"CNY\">China Yuan Renminbi</OPTION>
					<OPTION VALUE=\"HKD\">Hong Kong Dollars</OPTION>
					<OPTION VALUE=\"SGD\">Singapore Dollars</OPTION>
					<OPTION VALUE=\"CHF\">Switzerland Francs</OPTION>
					<OPTION VALUE=\"SEK\">Sweden Kronor</OPTION>
					<OPTION VALUE=\"ZAR\">South Africa Rand</OPTION>
					<OPTION VALUE=\"NZD\">New Zealand Dollars</OPTION>
					<OPTION VALUE=\"MXN\">Mexico Pesos</OPTION>
					<OPTION VALUE=\"\" selected>-------------------------------
					<OPTION VALUE=\"AFA\">Afghanistan Afghanis</OPTION>
					<OPTION VALUE=\"ALL\">Albania Leke</OPTION>
					<OPTION VALUE=\"DZD\">Algeria Dinars</OPTION>
					<OPTION VALUE=\"ARS\">Argentina Pesos</OPTION>
					<OPTION VALUE=\"AUD\">Australia Dollars</OPTION>
					<OPTION VALUE=\"ATS\">Austria Schillings</OPTION>
					<OPTION VALUE=\"BSD\">Bahamas Dollars</OPTION>
					<OPTION VALUE=\"BDT\">Bangladesh Taka</OPTION>
					<OPTION VALUE=\"BBD\">Barbados Dollars</OPTION>
					<OPTION VALUE=\"BEF\">Belgium Francs</OPTION>
					<OPTION VALUE=\"BMD\">Bermuda Dollars</OPTION>
					<OPTION VALUE=\"BRL\">Brazil Reals</OPTION>
					<OPTION VALUE=\"BND\">Brunei Dollars</OPTION>
					<OPTION VALUE=\"BGL\">Bulgaria Leva</OPTION>
					<OPTION VALUE=\"CAD\">Canada Dollars</OPTION>
					<OPTION VALUE=\"KYD\">Cayman Islands Dollars</OPTION>
					<OPTION VALUE=\"XOF\">CFA Franc (BCEAO)</OPTION>
					<OPTION VALUE=\"XAF\">CFA Franc (BEAC)</OPTION>
					<OPTION VALUE=\"CLP\">Chile Pesos</OPTION>
					<OPTION VALUE=\"CNY\">China Yuan Renminbi</OPTION>
					<OPTION VALUE=\"COP\">Colombia Pesos</OPTION>
					<OPTION VALUE=\"CRC\">Costa Rica Colones</OPTION>
					<OPTION VALUE=\"CYP\">Cyprus Pounds</OPTION>
					<OPTION VALUE=\"CZK\">Czech Republic Koruny</OPTION>
					<OPTION VALUE=\"DKK\">Denmark Kroner</OPTION>
					<OPTION VALUE=\"EGP\">Egypt Pounds</OPTION>
					<OPTION VALUE=\"EUR\">Euro</OPTION>
					<OPTION VALUE=\"FJD\">Fiji Dollars</OPTION>
					<OPTION VALUE=\"FIM\">Finland Markkaa</OPTION>
					<OPTION VALUE=\"FRF\">France Francs</OPTION>
					<OPTION VALUE=\"DEM\">Germany Deutsche Marks</OPTION>
					<OPTION VALUE=\"GRD\">Greece Drachmae</OPTION>
					<OPTION VALUE=\"HKD\">Hong Kong Dollars</OPTION>
					<OPTION VALUE=\"HUF\">Hungary Forints</OPTION>
					<OPTION VALUE=\"ISK\">Iceland Kronur</OPTION>
					<OPTION VALUE=\"INR\">India Rupees</OPTION>
					<OPTION VALUE=\"IDR\">Indonesia Rupiahs</OPTION>
					<OPTION VALUE=\"IQD\">Iraq Dinars</OPTION>
					<OPTION VALUE=\"IEP\">Ireland Pounds</OPTION>
					<OPTION VALUE=\"ILS\">Israel New Shekels</OPTION>
					<OPTION VALUE=\"ITL\">Italy Lire</OPTION>
					<OPTION VALUE=\"JMD\">Jamaica Dollars</OPTION>
					<OPTION VALUE=\"JPY\">Japan Yen</OPTION>
					<OPTION VALUE=\"JOD\">Jordan Dinars</OPTION>
					<OPTION VALUE=\"KWD\">Kuwait Dinars</OPTION>
					<OPTION VALUE=\"LBP\">Lebanon Pounds</OPTION>
					<OPTION VALUE=\"LUF\">Luxembourg Francs</OPTION>
					<OPTION VALUE=\"MOP\">Macau Patacas</OPTION>
					<OPTION VALUE=\"MYR\">Malaysia Ringgits</OPTION>
					<OPTION VALUE=\"MTL\">Malta Liri</OPTION>
					<OPTION VALUE=\"MRO\">Mauritania Ouguiyas</OPTION>
					<OPTION VALUE=\"MUR\">Mauritius Rupees</OPTION>
					<OPTION VALUE=\"MXN\">Mexico Pesos</OPTION>
					<OPTION VALUE=\"MAD\">Morocco Dirhams</OPTION>
					<OPTION VALUE=\"NLG\">Netherlands Guilders</OPTION>
					<OPTION VALUE=\"NZD\">New Zealand Dollars</OPTION>
					<OPTION VALUE=\"NGN\">Nigeria Nairas</OPTION>
					<OPTION VALUE=\"NOK\">Norway Kroner</OPTION>
					<OPTION VALUE=\"OMR\">Oman Rial</OPTION>
					<OPTION VALUE=\"XPF\">Pacific Franc</OPTION>
					<OPTION VALUE=\"PKR\">Pakistan Rupees</OPTION>
					<OPTION VALUE=\"PGK\">Papua New Guinea Kina</OPTION>
					<OPTION VALUE=\"PHP\">Philippines Pesos</OPTION>
					<OPTION VALUE=\"PLN\">Poland Zlotych</OPTION>
					<OPTION VALUE=\"PTE\">Portugal Escudos</OPTION>
					<OPTION VALUE=\"ROL\">Romania Lei</OPTION>
					<OPTION VALUE=\"RUR\">Russia Rubles</OPTION>
					<OPTION VALUE=\"SAR\">Saudi Arabia Riyals</OPTION>
					<OPTION VALUE=\"SGD\">Singapore Dollars</OPTION>
					<OPTION VALUE=\"SKK\">Slovakia Koruny</OPTION>
					<OPTION VALUE=\"ZAR\">South Africa Rand</OPTION>
					<OPTION VALUE=\"KRW\">South Korea Won</OPTION>
					<OPTION VALUE=\"ESP\">Spain Pesetas</OPTION>
					<OPTION VALUE=\"SDD\">Sudan Dinars</OPTION>
					<OPTION VALUE=\"SYD\">Syria Pounds</OPTION>
					<OPTION VALUE=\"SEK\">Sweden Kronor</OPTION>
					<OPTION VALUE=\"CHF\">Switzerland Francs</OPTION>
					<OPTION VALUE=\"TWD\">Taiwan New Dollars</OPTION>
					<OPTION VALUE=\"THB\">Thailand Baht</OPTION>
					<OPTION VALUE=\"TTD\">Trinidad and Tobago Dollars</OPTION>
					<OPTION VALUE=\"TRL\">Turkey Liras</OPTION>
					<OPTION VALUE=\"UGX\">Uganda Shillings</OPTION>
					<OPTION VALUE=\"UAH\">Ukraine Hryvnia</OPTION>
					<OPTION VALUE=\"AED\">United Arab Emirates Dirham</OPTION>
					<OPTION VALUE=\"GBP\">United Kingdom Pounds</OPTION>
					<OPTION VALUE=\"USD\">United States Dollars</OPTION>
					<OPTION VALUE=\"VEB\">Venezuela Bolivares</OPTION>
					<OPTION VALUE=\"VND\">Vietnam Dong</OPTION>
					<OPTION VALUE=\"ZMK\">Zambia Kwacha</OPTION>
					<OPTION VALUE=\"ZWD\">Zimbabwe Dollars</OPTION>
				</SELECT>
				<input name=\"amount2\" style=\"$StyleTargetAmount\" onKeyup=calculate(1)>
				<SCRIPT LANGUAGE=\"Javascript\">
				    /*
				    TagLastUpdatedID='lastupdate_ie';
					if((navigator.appName.indexOf(\"Netscape\") != -1)&& (parseInt(navigator.appVersion) == 4))TagLastUpdatedID='lastupdate';
		            document.write('<DIV ID=\"'+TagLastUpdatedID+'\" CLASS=\"lastupdate\"></DIV>');
					lastupdate();
					*/
				</SCRIPT>
			</FORM>
		";
	}
?>