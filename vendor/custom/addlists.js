$(document).ready(function(){

            $('#operatingHeader').addClass('active');

            $('#confirm-btn').on('click',function(e){
                e.preventDefault();

                //validate
                if($('#expense_name').val() != ""){
                	if($('.expense_field').val()){
                		$('#new_expense_form').submit();
                	}
                	else{
                		alert('none');
                	}
                }
                else{
                	alert("x")
                }
                
            });

            var expense_html = "<div class = 'form-group'>" +
                                    "<label>Field Name </label><button class = 'btn btn-danger pull-right remove-btn' value = '0' style = 'margin-bottom:10px'>Remove</button>" +
                                    "<input type = 'text' class = 'form-control expense_field' name = 'operating_expense_name[]'>" +
                                "</div>";

            $('#new-btn').on('click',function(e){
                e.preventDefault();

                $('#new_div').append(expense_html);
            });

	$(document).on('keypress', '#expense_name', function (event) {
	    var regex = new RegExp("^[a-zA-Z ]+$");
	    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	    if (!regex.test(key)) {
	        event.preventDefault();
	        return false;
	    }
	});

	$(document).on('keypress', '.expense_field', function (event) {
	    var regex = new RegExp("^[a-zA-Z ]+$");
	    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	    if (!regex.test(key)) {
	        event.preventDefault();
	        return false;
	    }
	});


	$(document).on('click', '.remove-btn',function(event){
		event.preventDefault();
		if($(this).val() == 0){
			$(this).closest('div.form-group').remove();
		}
	});
});