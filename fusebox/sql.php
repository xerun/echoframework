<?php
	$SQL_SelectStatement=array(
	    "ApplicationSetting"=>"
	        SELECT APS.* FROM tblapplicationsetting AS APS
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = APS.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = APS.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = APS.UserUUIDLocked
		",

		"Permission"=>"
	        SELECT		P.*,
						UT.UserTypeName
			FROM		tblpermission AS P
	        LEFT JOIN	tblusertype AS UT ON UT.UserTypeUUID = P.UserTypeUUID
		",

	    "User"=>"
	        SELECT		U.*,
						UT.UserTypeName,
						C.CountryName
			FROM		tbluser AS U
	        LEFT JOIN	tblcountry AS C ON C.CountryUUID = U.CountryUUID
	        LEFT JOIN	tblusertype AS UT ON UT.UserTypeUUID = U.UserTypeUUID
		",

	    "UserType"=>"
	        SELECT UT.* FROM tblusertype AS UT
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = UT.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = UT.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = UT.UserUUIDLocked
		",

	    "Country"=>"
	        SELECT CN.* FROM tblcountry AS CN
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = CN.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = CN.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = CN.UserUUIDLocked
		",

	    "Payment"=>"
	        SELECT P.* FROM tblpayment AS P
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = P.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = P.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = P.UserUUIDLocked
		",

		"Language"=>"
	        SELECT L.* FROM tbllanguage AS L
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = L.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = L.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = L.UserUUIDLocked
		",


		"StaticContent"=>"
	        SELECT SC.*, L.LanguageCode
			FROM tblstaticcontent AS SC
   	        LEFT JOIN tbllanguage AS L ON L.LanguageUUID = SC.LanguageUUID
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = SC.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = SC.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = SC.UserUUIDLocked
		",

		"AdvertPanel"=>"
	        SELECT AP.*,
	        CONCAT(AP.AdvertPanelName, ' (', AP.AdvertWidth, 'x', AP.AdvertHeight,')') AS AdvertPlacementName
			FROM tbladvertpanel AS AP
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = AP.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = AP.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = AP.UserUUIDLocked
		",

		"Advert"=>"
	        SELECT A.*,
	        AP.AdvertPanelName
			FROM tbladvert AS A
	        LEFT JOIN tbladvertpanel AS AP ON AP.AdvertPanelUUID = A.AdvertPanelUUID
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = A.UserUUIDInserted
	        LEFT JOIN tbluser AS UU ON UU.UserUUID = A.UserUUIDUpdated
	        LEFT JOIN tbluser AS UL ON UL.UserUUID = A.UserUUIDLocked
		",

		"Menu"=>"
	        SELECT M.*,MM.MenuName ParentName
			FROM tblmenu AS M
			LEFT JOIN tblmenu AS MM ON MM.MenuUUID = M.MenuParentUUID
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = M.UserUUIDInserted
		",

		"OnlineAd"=>"
	        SELECT O.*,V.VendorName,V.VendorConversionURL,A.FirstName
			FROM tblonlinead AS O
			INNER JOIN tblvendor AS V ON V.VendorUUID = O.OnlineAdVendor
			INNER JOIN tbluser AS A ON A.UserUUID = O.OnlineAdAdvertiser
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = O.UserUUIDInserted
		",

		"Vendor"=>"
	        SELECT V.*
			FROM tblvendor AS V
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = V.UserUUIDInserted
		",

		"Advertiser"=>"
	        SELECT A.*
			FROM tbladvertiser AS A
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = A.UserUUIDInserted
		",

		"PermissionMenu"=>"
			Select M.MenuName,M.MenuUrl
			FROM tblmenu M
			LEFT JOIN tblpermission P ON P.Page=M.MenuUrl
		",

		"ContentCategory"=>"
	        SELECT CC.*
			FROM tblcontentcategory AS CC
	        LEFT JOIN tbluser AS UI ON UI.UserUUID = CC.UserUUIDInserted
		",

        

	);

//	        CONCAT(AP.AdvertPanelName, ' (', AP.AdvertWidth, 'x', AP.AdvertHeight,')') AS AdvertPlacementName


	function SQL_CleanUp($Where="", $CleanUp=true, $Debug=false){
	    //Clean up orphan records and uploaded files
	}
?>