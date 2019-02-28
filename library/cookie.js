function GetCookieValue(Offset){
	var endstr = document.cookie.indexOf (";", Offset);
	if(endstr == -1)endstr = document.cookie.length;
	return unescape(document.cookie.substring(Offset, endstr));
}

function GetCookie(CookieName){
	var arg = CookieName + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;

	while(i < clen){
		var j = i + alen;
		if(document.cookie.substring(i, j)==arg)return GetCookieValue (j);
		i=document.cookie.indexOf(" ", i) + 1;
		if(i==0)break;
	}

	return null;
}

function SetCookie(CookieName, CookieValue){
	var argv = SetCookie.arguments;
	var argc = SetCookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;

	document.cookie = CookieName + "=" + escape (CookieValue) + ((expires == null) ? "" : ("; expires=" + expires.toGMTString())) + ((path == null) ? "" : ("; path=" + path)) + ((domain == null) ? "" : ("; domain=" + domain)) + ((secure == true) ? "; secure" : "");
}