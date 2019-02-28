function InsertIntoCursorPosition(objInputControl, TextToInput){
	/*
		Inserts the TextToInput in the cursor location for the objInputControl.
		If a selection is present, it will overwrite the selection.
		
		Parameter specification:
			objInputControl:		Any valid text input control.
			TextToInput:			Any string data
	*/
	//alert ("MSG");
	if(document.selection) {
		objInputControl.focus();
		var orig = objInputControl.value.replace(/\r\n/g, "\n");
		var range = document.selection.createRange();

		if(range.parentElement() != objInputControl) {
			return false;
		}

		range.text = TextToInput;
		
		var actual = tmp = objInputControl.value.replace(/\r\n/g, "\n");

		for(var diff = 0; diff < orig.length; diff++) {
			if(orig.charAt(diff) != actual.charAt(diff)) break;
		}

		for(var index = 0, start = 0; 
			tmp.match(TextToInput) 
				&& (tmp = tmp.replace(TextToInput, "")) 
				&& index <= diff; 
			index = start + TextToInput.length
		) {
			start = actual.indexOf(TextToInput, index);
		}
	} else if(objInputControl.selectionStart) {
		var start = objInputControl.selectionStart;
		var end   = objInputControl.selectionEnd;

		objInputControl.value = objInputControl.value.substr(0, start) 
			+ TextToInput 
			+ objInputControl.value.substr(end, objInputControl.value.length);
	}
	
	if(start != null) {
		setCaretTo(objInputControl, start + TextToInput.length);
	} else {
		objInputControl.value += "%INCLUDE:" + TextToInput + "%";
	}

	return true;
}

function setCaretTo(objInputControl, CursorPosition) {
	if(objInputControl.createTextRange) {
		var range = objInputControl.createTextRange();
		range.move('character', CursorPosition);
		range.select();
	} else if(objInputControl.selectionStart) {
		objInputControl.focus();
		objInputControl.setSelectionRange(CursorPosition, CursorPosition);
	}
}
