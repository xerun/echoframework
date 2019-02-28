/*
	Purpose: Fetch contents dynamically using HTTP protocol
	Author: PRITHU AHMED
	Date : Monday, November 20, 2011

	Funtion list:

	    HTTPGet(HTTPURL, UseOwnDomain)
*/

function HTTPGet(HTTPURL, UseOwnDomain){
	/*
	    Implementation of AJAX to fetch the output of a given URL for HTPP GET method.

	    HTTPURL (string) = URL to navigate to for HTTP output in GET method
	    UseOwnDomain (boolean) = Will prepend current domain name part before the given url and the output will be "http://" + www.domainname.com + "/" + URL
	*/

	var pageRequest = false; //variable to hold ajax object
	/*@cc_on
	   @if (@_jscript_version >= 5)
	      try {
	      pageRequest = new ActiveXObject("Msxml2.XMLHTTP")
	      }
	      catch (e){
	         try {
	         pageRequest = new ActiveXObject("Microsoft.XMLHTTP")
	         }
	         catch (e2){
	         pageRequest = false
	         }
	      }
	   @end
	@*/

	if(!pageRequest && typeof XMLHttpRequest != 'undefined')pageRequest = new XMLHttpRequest();

	if(pageRequest){ //if pageRequest is not false
	    if(UseOwnDomain)HTTPURL='http://'+window.location.hostname+'/'+HTTPURL;
		pageRequest.open('GET', HTTPURL, false); //get page synchronously
		pageRequest.send(null);
		//if viewing page offline or the document was successfully retrieved online (status code=2000)
		if(window.location.href.indexOf("http")==-1 || pageRequest.status==200)return pageRequest.responseText;
	}
}