//****************** YOUR CUSTOMIZED JAVASCRIPT **********************//
$('#app-form').validate({
    submitHandler: function (form) {
        var l = Ladda.create(document.querySelector('.ladda-button'));
        $(form).ajaxSubmit({
            dataType: "json",
            beforeSubmit: function(){
                l.start();
            },
            success: function(data){
                l.stop();
                var alertType="success";
                if(data.type == 'error'){
                    alertType="error";
                }
                swal({
                    title:data.message,text:"", type:alertType,timer: 2000
                }).then(
                    function() {},
                    function(dismiss) {
                        if(data.type == 'successclear'){ // clear form after successfull insert
                            $(form).clearForm();
                        }
                        if(data.type == 'success'){ // do not clear form after successfull insert
                            //js(form).clearForm();
                        }
                        if(data.type == 'redirect'){ // redirect the page to the stated page
                            //var alertcheck = jAlert('Data saved successfully', 'Alert Dialog');
                            window.location=data.page;
                        }
                        if(data.type == 'reload'){ // reload the page
                            window.location.reload();
                        }
                    }
                );
            }
        });
    }
});
$('body').on('click', '.edit-content',function(e){
    $(".static-edit").removeClass("hide");
    $(".static-view").addClass("hide");
});
$('body').on('click', '.static-edit .cancel',function(e){
    $(".static-edit").addClass("hide");
    $(".static-view").removeClass("hide");
});
$('body').on('click', '.load-page',function(e){
    e.preventDefault();
    var page = $(this).attr('href');
    $.ajax({
        url: page,
        type: "POST",
        dataType: 'json',
        success: function (data) {
            var alertType="success";
            if(data.type == 'error'){
                alertType="error";
            }
            swal(data.message,"", alertType);
            if(data.type == 'successclear'){ // clear form after successfull insert
                $(form).clearForm();
            }
            if(data.type == 'success'){ // do not clear form after successfull insert
                //js(form).clearForm();
            }
            if(data.type == 'redirect'){ // redirect the page to the stated page
                //var alertcheck = jAlert('Data saved successfully', 'Alert Dialog');
                setTimeout("window.location='"+data.page+"';", 1000);
            }
            if(data.type == 'reload'){ // reload the page
                window.location.reload();
            }
        }
    });
});
$('.date').datetimepicker({format: 'YYYY-MM-DD'});$('.datetime').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});