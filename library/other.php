<?php
	// hight the words that has been used in the search	
	function hightlight($str, $keywords = ''){
		$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter
		
		$style = 'highlight';
		$style_i = 'highlight_important';
		
		/* Apply Style */
		
		$var = '';
		
		foreach(explode(' ', $keywords) as $keyword)
		{
		$replacement = "<span class='".$style."'>".$keyword."</span>";
		$var .= $replacement." ";
		
		$str = str_replace($keyword, $replacement, $str);
		}
		
		/* Apply Important Style */
		
		$str = str_replace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
		
		return $str;
	}

	// show a portion of the full text
	function mb_substrws($text, $length = 180) { 
		if((mb_strlen($text) > $length)) { 
		 $whitespaceposition = mb_strpos($text, ' ', $length) - 1; 
		 if($whitespaceposition > 0) { 
			 $chars = count_chars(mb_substr($text, 0, ($whitespaceposition + 1)), 1); 
			 if ($chars[ord('<')] > $chars[ord('>')]) { 
				 $whitespaceposition = mb_strpos($text, ">", $whitespaceposition) - 1; 
			 } 
			 $text = mb_substr($text, 0, ($whitespaceposition + 1)); 
		 } 
		 // close unclosed html tags 
		 if(preg_match_all("|(<([\w]+)[^>]*>)|", $text, $aBuffer)) { 
			 if(!empty($aBuffer[1])) { 
				 preg_match_all("|</([a-zA-Z]+)>|", $text, $aBuffer2); 
				 if(count($aBuffer[2]) != count($aBuffer2[1])) { 
					 $closing_tags = array_diff($aBuffer[2], $aBuffer2[1]); 
					 $closing_tags = array_reverse($closing_tags); 
					 foreach($closing_tags as $tag) { 
							 $text .= '</'.$tag.'>'; 
					 } 
				 } 
			 } 
		 } 
		
		} 
		return $text; 
	}
	
	function EPLS_Record($SSNName, $SSNTIN, $Status="current", $Start="ssn", $SSN="true"){
		$Response=strip_tags(file_get_contents("http://www.epls.gov/epls/search.do?ssn_name=$SSNName&ssn_tin=$SSNTIN&status=$Status&start=$Start&ssn=$SSN"));
		$Found=true;
		if(!strpos($Response, "Your search returned no results"))$Found=false;
		return array("HTML"=>$Response, "Found"=>$Found);
	}

	//Build the application URL specially formatted to fit the FuseBox manner
	if($Application["ShortURL"]==true){
		function ApplicationURL($Theme="",$Script="", $OtherParameter="", $Section="", $PathOnly=false){
			global $Application;
			DebugFunctionTrace($FunctionName="ApplicationURL", $Parameter=array("Script"=>$Script, "OtherParameter"=>$OtherParameter, "Section"=>$Section, "PathOnly"=>$PathOnly), $UseURLDebugFlag=true);
	
			$URL="http";
			if(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)=="HTTPS"){$URL.="s";}
			$URL.="://";
			$URL.=$_SERVER["HTTP_HOST"];
			if(!$PathOnly){
				$AddressRoot=explode("/index.php", $_SERVER["PHP_SELF"]);
				$URL.= $AddressRoot[0];
			}else{
				$URL.=ScriptPath();
			}
			if($Application["MultipleTemplates"]=="true"){
				if($Theme!=""){
					$URL.="/$Theme";
				}else{
					$URL.="/tiger";
				}
			}
			if($Script!="")$URL.="/$Script";
			if($OtherParameter!=""){$URL.="?$OtherParameter";}
			if(isset($_REQUEST["Debug"])){$URL.="&Debug";}
			if(isset($_REQUEST["MainContentOnly"])){$URL.="&MainContentOnly";}
			if(isset($_REQUEST["NoHeader"])){$URL.="&NoHeader";}
			if(isset($_REQUEST["NoFooter"])){$URL.="&NoFooter";}
			if($Section!=""){$URL.="#$Section";}
			
			return $URL;
		}
	}else{
		function ApplicationURL($Theme="",$Script="", $OtherParameter="", $Section="", $PathOnly=false){
	
			DebugFunctionTrace($FunctionName="ApplicationURL", $Parameter=array("Script"=>$Script, "OtherParameter"=>$OtherParameter, "Section"=>$Section, "PathOnly"=>$PathOnly), $UseURLDebugFlag=true);
	
			$URL="http";
			if(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)=="HTTPS"){$URL.="s";}
			$URL.="://";
			$URL.=$_SERVER["HTTP_HOST"];
			if(!$PathOnly){$URL.=$_SERVER["PHP_SELF"];}else{$URL.=ScriptPath();}
			$URL.="?NoParameter";
			if($Theme!=""){
				$URL.="&Theme=$Theme";
			}else{
				$URL.="&Theme={$_REQUEST["Theme"]}";
			}
			//if(isset($_REQUEST["Theme"]))$URL.="&Theme={$_REQUEST["Theme"]}";
			if($Script!="")$URL.="&Script=$Script";
			if($OtherParameter!=""){$URL.="&$OtherParameter";}
			if(isset($_REQUEST["Debug"])){$URL.="&Debug";}
			if(isset($_REQUEST["MainContentOnly"])){$URL.="&MainContentOnly";}
			if(isset($_REQUEST["NoHeader"])){$URL.="&NoHeader";}
			if(isset($_REQUEST["NoFooter"])){$URL.="&NoFooter";}
			if($Section!=""){$URL.="#$Section";}
			
			return $URL;
		}
	}

	function paging($page, $records, $url, $totalPages) {
		$printPages = $records; //Show only X pages
		$i = 1;
		$previous_page = ($page > 1) ? $page - 1 : 1;
		$next_page = $page + 1;
		if($totalPages < $printPages) {
			$printPages = $totalPages;
		}
		if($totalPages>1){
			$EchoPage= '<ol>';
			if($page > 1) {
				$EchoPage.= ' <li><a href="'.$url.'&p=1">&laquo;&laquo; First</a></li> ';
				$EchoPage.= ' <li><a href="'.$url.'&p='.$previous_page.'">&laquo; Prev</a></li> ';
				if($totalPages > 0) {
				//Nothing for now, used to have a | separator here
				}
			}
			if($page - $printPages <= 0)
			{
				$currentPage = 1;
			}
			elseif($page > 3 && $page + ($printPages -1) < $totalPages)
			{
				$currentPage = $page;
			}
			else
			{
				$currentPage = $totalPages - ($printPages - 1);
			}
			while($i <= $printPages)
			{
				$EchoPage.= '<li';
				if($page == $currentPage) {
					$EchoPage.= ' class="current" ><span>'.$currentPage.'</span></li>&nbsp;';
				}else{
					$EchoPage.= '><a href="'.$url.'&p='.$currentPage.'"> '.$currentPage.' </a></li>&nbsp;';							
				}
				
				$currentPage++;
				$i++;
			}
			if($page < $totalPages)
			{
				$next = $page + 1;
				$EchoPage.= '&nbsp;<li><a href="'.$url.'&p='.$next.'">Next &raquo;</a></li> ';
				$EchoPage.= ' <li> <a href="'.$url.'&p='.$totalPages.'">Last &raquo;&raquo;</a></li> ';
			}
			$EchoPage.= '</ol>';
		}
		return $EchoPage;
	}
?>
