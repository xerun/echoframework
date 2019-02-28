/*
	Purpose: Various functions to perform DHTML tasks
	
	Funtion list:
	
	    SetVisibilityByElement(objElement, Visibility)
	    SetVisibilityByElementID(ElementID, Visibility)
	    ToggleVisibilityByElement(objElement)
	    ToggleVisibilityByElementID(ElementID)
	    WriteHTMLByElement(objElement, NewHTML)
	    WriteHTMLByElementID(ElementID, NewHTML)
*/

function SetVisibilityByElement(objElement, Visibility){
	/*
	    Set visibility of an object or element including the contained HTML.

	    objElement (object) = Tag or object to set the visibility of
	*/

	if(Visibility){Visibility='inline';}else{Visibility='none';}
    objElement.style.display = Visibility;
}
function SetVisibilityByElementID(ElementID, Visibility){
	/*
	    Same as SetVisibilityByElement() except for that it takes the ID to point to the object or element
	*/

    SetVisibilityByElement(document.getElementById(ElementID), Visibility);
}

function ToggleVisibilityByElement(objElement){
	/*
	    Show or hide an object or element including the contained HTML.

	    objElement (object) = Tag or object to show or hide
	*/

    Visibility=false;
    if(objElement.style.display=='none')Visibility=true;
    SetVisibilityByElement(objElement, Visibility);
}

function ToggleVisibilityByElementID(ElementID){
	/*
	    Same as ToggleVisibilityByElement() except for that it takes the ID to point to the object or element
	*/

    ToggleVisibilityByElement(document.getElementById(ElementID));
}

function WriteHTMLByElement(objElement, NewHTML){
	/*
	    Replace the contained HTML text for a given tag or element.

	    objElement (object) = Tag or object to replace the contained HTML text for
	    NewHTML (string) = The HTML text to replace with
	*/

    objElement.innerHTML=NewHTML;
}

function WriteHTMLByElementID(ElementID, NewHTML){
	/*
	    Same as WriteHTMLByElement() except for that it takes the ID to point to the object or element
	*/

    WriteHTMLByElement(document.getElementById(ElementID), NewHTML);
}