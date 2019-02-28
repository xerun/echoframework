<?
	include "./library/database.php";	//Custom MySQL functions
	include "./fusebox/applicationdb.php"; //Load the application setting from database
	include "./library/session.php";	//Session related functions
	include "./library/datetime.php";	//Custom date time functions
	include "./library/email.php";		//Email functions e.g.: Sending emails in HTML format
	include "./library/file.php";		//File system related functions
	include "./library/html.php";		//HTML object wrapping functions to use of HTML objects directly into PHP with minimal effort
	include "./library/htmldb.php";		//HTML object wrapping functions to use with database resources, like DataGrid
	include "./library/http.php";		//Custom HTTP functions like fetching the contents of an URL silently in the background
	include "./library/numeric.php";	//Custom numeric functions
	include "./library/string.php";		//Custom string functions
	//include "./library/zodiacsign.php";		//Custom string functions
	include "./library/other.php";		//Other miscellanious functions
	include "./library/encryption.php";		//Call the encryption class for url value encrypting
	//include "./library/mooncalendar.php";
	include "./library/staticcontent.php";
	include "./library/form.php";
	//include "./library/googlecheckout.php";
	include "./library/paypal.php";
	//include "./library/interfax.php";	//FAX functions e.g.: Sending FAX in HTML format by InterFAX
	include "./library/debug.php";		//Debug output routines
?>
