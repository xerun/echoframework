function setupAjaxForm(form_id, form_validations){
	var form = '#' + form_id;
	var page_name = js(form).attr('class'); 
	var form_message = form + '-message';
	
	// en/disable submit button
	var disableSubmit = function(val){
		js(form + ' input[type=submit]').attr('disabled', val);
	};
	
	// setup loading message
	js(form).ajaxSend(function(){
		js(form_message).removeClass().addClass('loading').html('Please wait...').fadeIn();
	});
	
	// setup js Plugin 'ajaxForm' 	
	var options = {
		dataType:  'json',
		beforeSubmit: function(){
			// run form validations if they exist
			var validateForm = form_validations();
			if(validateForm!=true) {
				// this will prevent the form from being subitted
				return false;
			}
			disableSubmit(true);
		},
		success: function(json){
			js(form_message).hide();
			js(form_message).removeClass().addClass(json.type).html(json.message).slideDown('slow');
			disableSubmit(false);
			if(json.type == 'successclear'){ // clear form after successfull insert
				js(form).clearForm();
			}
			if(json.type == 'success'){ // do not clear form after successfull insert
				//js(form).clearForm();
			}
			if(json.type == 'redirect'){ // redirect the page to the stated page
				//var alertcheck = jAlert('Data saved successfully', 'Alert Dialog');
				setTimeout("window.location='"+json.page+"';", 1000);
			}
		},
        error: function() {
            js(form_message).hide();
            js(form_message).removeClass().addClass('error').html('There was an error. Try again please!').slideDown('slow');
            disableSubmit(false);
        }
	};
	js(form).ajaxForm(options);
}
/*js(document).ready(function() {  
    new setupAjaxForm('app-form');
});*/