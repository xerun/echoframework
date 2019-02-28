<?php
	/*
		Template:   string.php
		Purpose:    Other custom string functions
		Risk:       Critical
		Author:     Prithu Ahmed
		Date:       February 1, 2012
	*/
	function mysqli_escape($str)
	{
	    global $Application;
		return mysqli_real_escape_string($Application["DatabaseLink"],$str);
	}
	function sqlsrv_escape($str)
	{
	    if(get_magic_quotes_gpc())
	    {
	        $str= stripslashes($str);
	    }
	    return str_replace("'", "''", $str);
	}
	//Generate a random string. Generally, as a password
	function RandomPassword(){
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while($i <= 7){
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass.$tmp;
			$i++;
		}
		return $pass;
	}
	
	//Escape any String from POST
	function POST ($val){
		global $Application;
		$Post= mysqli_real_escape_string($Application["DatabaseLink"],$_POST[$val]);
		return $Post;
	}
	
	//Escape any String from REQUEST
	function REQUEST ($val){
		global $Application;
		$Request= mysqli_real_escape_string($Application["DatabaseLink"],$_REQUEST[$val]);
		return $Request;
	}
	
	//Escape any String from GET
	function GET ($val){
		global $Application;
		$Get= mysqli_real_escape_string($Application["DatabaseLink"],$_GET[$val]);
		return $Get;
	}

	function getIP()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
    function Alias($string)
    {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

	//Translate all the blank spaces to HTML blank spaces '&nbsp;'
	function UnWrap($TextToUnWrap){
		return str_replace(" ", "&nbsp;", $TextToUnWrap);
	}

	function CRLFToBR($TextToTranslate){
		return str_replace(chr(13).chr(10), "<br>", $TextToTranslate);
	}

	//An extended string search function
    function SearchStringEx($LookFor, $LookIn, $StringComparisonMode="SCTM_PARTIAL"){
        $MatchPosition=-1;

        if($StringComparisonMode=='SCTM_EXACT'){
            if($LookIn==$LookFor){$MatchPosition=0;}
        }elseif($StringComparisonMode=='SCTM_PARTIAL'){
            if(strpos($LookIn, $LookFor)){$MatchPosition=strpos($LookIn, $LookFor);}
        }elseif($StringComparisonMode=='SCTM_LEFT'){
            if(substr($LookIn, 0, strlen($LookFor))){$MatchPosition=0;}
        }elseif($StringComparisonMode=='SCTM_RIGHT'){
            if(substr($LookIn, strlen($LookIn)-strlen($LookFor), strlen($LookFor))){$MatchPosition=strlen($LookIn)-strlen($LookFor);}
        }

        //if($MatchPosition>-1){print "Match found! Looking for '$LookFor' in '$LookIn' as '$StringComparisonMode'<br>";}

        return $MatchPosition;
    }

	function getOAHit($tid,$network,$trackurl)
	{
		$url="";
		if(strtolower($network)=="kimia")
		{
			$url=$trackurl.$tid;
		}
		if($url!="")
		{
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$data = curl_exec($ch);
			curl_close($ch);
		}
		if(strtolower($network)=="kimia"){
			$data="";
		}
		return $data;
	}
	function getOAID()
	{
		$parameter=$_REQUEST["kp"];
		return $parameter;
	}
	function getOANetwork()
	{
		$network="";
		if(!empty($_REQUEST["kp"])){
			$network="kimia";
		}
		return $network;
	}