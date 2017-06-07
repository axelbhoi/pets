$(document).ready(function(){
    $('.datepicker').datetimepicker({
    	format: 'MM/DD/YYYY'
   	});	
	
    var petID;

	var new_pet = "<div class = 'row'>" +	
		    				"<h2>Pet/s Information <button class = 'btn btn-danger pull-right remove-btn'>Remove</button></h2>" +
		    				"<hr/>" +
		    				"<input type = 'hidden' name = 'pet_id[]' value = '0' />" +
				    		"<div class = 'col-xs-6'>" +
						   		"<div class='form-group'>" +
						      		"<label>Pet Name</label>" +
						      		"<input type='text' class='form-control pet-name' id='pet_name' name = 'pet_name[]' placeholder='Pet Name'>" +
						   		"</div>" +
						   		"<div class='form-group'>" +
						      		"<label>Species</label>" +
						      		"<select class='form-control' name = 'pet_species[]' >" +
						      			"<option value = 'Dog'>Dog</option>" +
						      			"<option value = 'Cat'>Cat</option>" +
						      			"<option value = 'Other'>Others</option>" +
						      		"</select>" +
						   		"</div>" +
						   		"<div class='form-group'>" +
						      		"<label >Breed</label>" +
						      		"<input type='text' class='form-control' id='pet_breed' name = 'pet_breed[]' placeholder='Pet Breed'>" +
						   		"</div>" +
						   		"<div class='form-group'>" +
						      		"<label >Sex</label>" +
						      		"<select class='form-control' name = 'pet_sex[]' >" +
						      			"<option value = 'Male'>Male</option>" +
						      			"<option value = 'Female'>Female</option>" +
						      		"</select>" +
						   		"</div>" +
						   		"<div class='form-group'>" +
						      		"<label>Color</label>" +
						      		"<input type='text' class='form-control' id='pet_color' name = 'pet_color[]' placeholder='Pet Color'>" +
						   		"</div>" +
				    		"</div>" +

				    		"<div class = 'col-xs-6'>" +
							   	"<div class='form-group'>" +
							      "<label>Microchip No.</label>" +
							      "<input type='text' class='form-control' id='pet_microchip' name = 'pet_microchip[]' placeholder='Microchip No.'>" +
							   	"</div>" +
							   	"<div class='form-group'>" +
							      "<label>Adult Weight</label>" +
							      "<input type='text' class='form-control' id='pet_weight' name = 'pet_weight[]' placeholder='Adult Weight'>" +
							   	"</div>" +
						   		"<div class='form-group'>" +
						      		"<label>Date of Birth</label>" +
	                                "<div class='input-group date datepicker'>" +
	                                    "<input type='text' class='form-control' name = 'pet_birth[]' />" +
	                                    "<span class='input-group-addon'>" +
	                                        "<span class='glyphicon glyphicon-calendar'></span>" +
	                                    "</span>" +
	                                "</div>" +
						   		"</div>" +
						   		"<div class='form-group'>" +
						      		"<label>Vaccination Cycle</label>" +
						      		"<input type='text' class='form-control' id='pet_cycle' name = 'pet_cycle[]' placeholder='Vaccination Cycle'>" +
						   		"</div>" +					   	
				    		"</div>" +			    	
				    	"</div>";	

	$('#new-pet-btn').on('click',function(e){
		e.preventDefault();				    	
		$('.pet-division').append(new_pet);
	    $('.datepicker').datetimepicker({
	    	format: 'MM/DD/YYYY'
	   	});			
	});


	$(document).on('click','.remove-btn',function(e){
		e.preventDefault();

		$(this).closest('div.row').remove();
	});

	$('.dynamic-remove-btn').on('click',function(e){
		e.preventDefault();	
		petID = $(this).attr('pet-id');
		//check if you want to delete
       	$('#deleteModal').modal('show');		
	});

	$('#deletePet').on('click',function(e){
		e.preventDefault();
        	
        	$.ajax({
               	type: "POST",
              	url: base_url + "clients/deletePet",
                data: { petID : petID },
                beforeSend : function(){
                	$.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
               	},   
                success: function(docs) {
                   	if(docs){
                   		$('#petRow' + petID).remove();
                  	}
                },
                complete : function (){
                  	$.unblockUI();
                  	$('#deleteModal').modal('hide');
                }            
            });
	});

	$('.pet_species').each(function(e){
		$(this).val($(this).attr('pet-species-selector'));
	});

	$('.pet_sex').each(function(e){
		$(this).val($(this).attr('pet-sex-selector'));
	});

	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}


	$('#confirm-btn').on('click',function(e){
		e.preventDefault();
		var total = 0;

		$('.pet-name').each(function(){
			if($(this).val() == ""){
				total = total + 1;
			}
		});

		if($('#client_firstname').val() != "" && $('#client_lastname').val() != "" && total == 0){
			if($('#client_email').val() == ""){
				$('#client_form').submit();
			}
			else{
				if(validateEmail($('#client_email').val())){
					$('#client_form').submit();
				}
				else{
					$('#warning-text').text('Invalid Email');

					$('#warningModal').modal('show');
				}
			}
		}
		else{
			$('#warning-text').text('Client First Name, Client Last Name and Pet Name are required');

			$('#warningModal').modal('show');
		}
	});

});