<?php
	
	$Echo.="
	    <div style=\"text-align: center;\">
		    <table style=\"padding: 20px; color: black; font-size: 19px; border-style: dotted; border-width: 5px; border-color: #DEDDDA;\" width=\"100%\">
		        <tr>
					<td align=\"center\">
					<img src=\"".$Application["BaseURL"]."/theme/".$_REQUEST["Theme"]."/image/other/error_404.jpg\" style=\"height: 300px; \"><br><br>
					<span style=\"font-weight:bold;\">
						Thank you<br>
						<br>
						{$Application["Title"]} Team
					</span>
					</td>
				</tr>
			</table>
		</div>
	";
	
	//Email the webmaster that the requested page was not found!
	SendMail(
		$ToEmail=$Application["EmailSupport"],
		$Subject="Page missing!",
		$Body="
		    The '<b>./script/{$_REQUEST["Script"]}.php</b>' was missing while '<b>{$_SESSION["UserName"]}</b> ({$_SESSION["UserTypeName"]})' requested it.<br>
		    <br>
		    <a href=\"".ApplicationURL($Script="")."\">{$Application["Title"]}</a>
		",
		$FromName=$Application["Title"],
		$FromEmail = $Application["EmailContact"],
		$ReplyToName=$Application["Title"],
		$ReplyToEmail=$Application["EmailContact"],
		$ExtraHeaderParameters=""
	);
?>
