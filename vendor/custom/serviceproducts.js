$(document).ready(function(){

	var client_id;
	var selected_pets = [];

	//declaration for existing clients
	var existing_total_balance;
	var service_html;
	var item_html;
	var remove_service_html;
	var remove_items_html;
	var	quantity_html;
	var item_quantity_holder = [];
	var input_quantity = 0;
	var item_quantity = 0;
	var remove_quantity = 0;

	var pet_id = pet_ids.split(',');
	
	$.each(JSON.parse(items),function(i,val){
		item_quantity_holder[val.id] = 0;
	});

	//datatables initialization
   	$('#dataTables-example').DataTable({
		responsive: true,
  		order: [[ 0, "asc" ]]
   	});

   	$('#inventory-table').DataTable({
		responsive: true,
  		order: [[ 0, "asc" ]]
   	});

   	if(client_name){
   		
   		$('#pets_name').append('<option value = "">--Select Pet/s--</option>');

		$.each(JSON.parse(pets),function(index,val){
			if(client_name == val.client_id){
				$('#pets_name').append('<option value = "'+val.id+'" text-name  = "'+val.pet_name+'">'+val.pet_name+'</option>')
			}
		});
   	}   	

   	$('#client-id').val($('#client_name').val());

   	//populate pet section
   	$.each(pet_names.split(','),function(index,val){
   		//console.log(pet_id[index]);
   	
   		$('.selected_pets').css('display','block');
		$('.selected_pets_section').append('<a href = "#" class = "remove_pet'+pet_id[index]+' appended_pets" id = "'+pet_id[index]+'">'+val+'</a>'+" ");
		selected_pets.push(pet_id[index]);
   	});

	$('#client_name').on('change',function(e){
		//on change remove first the options before you fill it 
		$('#pets_name').empty();
		
		//empty selected pets
		selected_pets.length = 0;

		//empty selected pets section and hide selected pets
		$('.selected_pets_section').empty();
		$('.selected_pets').css('display','none');

		//on change fill the select box of pets
		client_id = $(this).val();
		$('#pets_name').append('<option value = "">--Select Pet/s--</option>');

		$.each(JSON.parse(pets),function(index,val){
			if(client_id == val.client_id){
				$('#pets_name').append('<option value = "'+val.id+'" text-name  = "'+val.pet_name+'">'+val.pet_name+'</option>')
			}
		});

	});	

	//select pet
	$(document).on('change', '#pets_name', function(){

		//check selected pets if it has already been selected
		if(jQuery.inArray($(this).val(),selected_pets) !== -1)
		{
			//later change to modal
			$('#warningModal').modal('show');
		}
		else
		{
			if($(this).val() !== "")
			{
				$('.selected_pets').css('display','block');
				$('.selected_pets_section').append('<a href = "#" class = "remove_pet'+$(this).val()+' appended_pets" id = "'+$(this).val()+'">'+$('#pets_name option:selected').attr('text-name')+'</a>'+" ");
				selected_pets.push($(this).val());
			}			
		}
	});

	//remove pet from selection
	$(document).on('click','.appended_pets',function(e){
		e.preventDefault();

		$('#remove-pet-btn').attr('pet-id',$(this).attr('id'));
		$('#deleteSelectedPet').modal('show');
	});

	$('#remove-pet-btn').on('click',function(e){
		e.preventDefault();
		
		selected_pets.splice($.inArray($(this).attr('pet-id'),selected_pets),1);
		$('.remove_pet' + $(this).attr('pet-id')).remove();
		$('#deleteSelectedPet').modal('hide');
		$('#pets_name').val("");
	});

	/************************************************ ADD SERVICES *************************************************/
	
	$(document).on('click','.service-add',function(e){
		e.preventDefault();

		existing_total_services = parseFloat(existing_total_services) + parseFloat($(this).attr('service-amount'));

		service_html = "<tr id = 'service-row"+$(this).attr('service-id')+"' class = 'service-row'>" + 
								"<td><input type = 'hidden' value = "+$(this).attr('service-id')+" name = 'service_id[]'>"+$(this).attr('service-name')+"</td>" +
                               	"<td>"+$(this).attr('service-size')+"</td>" +
                               	"<td><input type = 'hidden' value = "+$(this).attr('service-amount')+" name = 'service_amount[]'>"+$(this).attr('service-amount')+"</td>" +                  
                                "<td>" + 
                                	"<a href = '#' class = 'btn btn-warning remove-service-btn' service-amount = "+$(this).attr('service-amount')+" id = "+$(this).attr('service-id')+">Remove Service</a>" +
                                "</td>" +
                            "</tr>";                
     	$('#service-tbody').prepend(service_html);

     	$('#collapseThree').addClass('in');
	
     	$('#service-total').text(existing_total_services.toFixed(2));

     	$('#all-total').text(parseFloat(existing_total_services) + parseFloat(existing_total_items));
	});

	/************************************************ ADD ITEMS *************************************************/

	$(document).on('click','.item-add',function(e){
		e.preventDefault();

		if( $('#item-input'+$(this).attr('item-id')).val() == "" ){
			$('#warningText').text('Input Quantity');
			$('#warningModal').modal('show');
		}
		else{
			
			if( (parseInt(item_quantity_holder[$(this).attr('item-id')]) + parseInt($('#item-input'+$(this).attr('item-id')).val())) <= parseInt($(this).attr('item-quantity')) ){
				input_quantity = parseInt(item_quantity_holder[$(this).attr('item-id')]) + parseInt($('#item-input'+$(this).attr('item-id')).val());
				
				item_quantity_holder[$(this).attr('item-id')] = input_quantity;

				if( parseInt(item_quantity_holder[$(this).attr('item-id')]) <= parseInt($(this).attr('item-quantity')) ){
					item_quantity = parseInt($('#item-input'+$(this).attr('item-id')).val());
					item_html = "<tr class = 'item-row'>" +
									"<td><input type = 'hidden' value = "+$(this).attr('item-id')+" name = 'item_id[]'>"+$(this).attr('item-name')+"</td>" +
									"<td><input type = 'hidden' value = "+item_quantity+" name = 'item_quantity[]'>"+item_quantity+"</td>" +
									"<td><input type = 'hidden' value = "+$(this).attr('item-price')+" name = 'item_price[]'>"+$(this).attr('item-price')+"</td>" + 
									"<td><input type = 'hidden' value = "+$(this).attr('item-quantity')+" name = 'item_total_quantity[]'>" +
										"<input type = 'hidden' value = '"+item_quantity+"@"+$(this).attr('item-id')+"' name = 'items[]'><a href = '#' class = 'btn btn-warning remove-item-btn' item-id = "+$(this).attr('item-id')+" item-quantity = "+parseInt($('#item-input'+$(this).attr('item-id')).val())+" item-price = "+$(this).attr('item-price')+" >Remove Item</a>" +
									"</td>" +
								"</tr>";

					existing_total_items = parseFloat(existing_total_items) + ( parseInt($('#item-input'+$(this).attr('item-id')).val()) * parseFloat($(this).attr('item-price')) ); 

					$('#item-tbody').prepend(item_html);

					$('#collapseThree').addClass('in');
					
					$('#items-total').text(existing_total_items.toFixed(2));

					$('#all-total').text(parseFloat(existing_total_services) + parseFloat(existing_total_items));

				}
				else{
					$('#warningText').text('Insufficient Item');
					$('#warningModal').modal('show');
				}
					
			}
			else{
				$('#warningText').text('Insufficient Item');
				$('#warningModal').modal('show');
			}


		}
		$('#item-input'+$(this).attr('item-id')).val("");
	});

 		$(".numbersOnly").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
	
	/************************************************** DELETE SERVICES ****************************************/

	$(document).on('click','.remove-service-btn',function(e){
		e.preventDefault();

		if($(this).attr('old-services') == 1){
			remove_service_html = "<input type = 'hidden' value = "+$(this).attr('main-id')+" name = 'remove-service-id[]'>";

			$('.remove-previous-services').append(remove_service_html);
		}

		existing_total_services = parseFloat(existing_total_services) - parseFloat($(this).attr('service-amount'));
		
		$(this).closest('tr').remove();

		$('#service-total').text(existing_total_services.toFixed(2));

		$('#all-total').text(parseFloat(existing_total_services) + parseFloat(existing_total_items));
	});

	/************************************************* DELETE ITEMS ********************************************/

	$(document).on('click','.remove-item-btn',function(e){
		e.preventDefault();

		if($(this).attr('old-item') == 1){
			remove_items_html = "<input type = 'hidden' value = "+$(this).attr('item-quantity')+" name = 'remove-items-quantity[]'>" +
								"<input type = 'hidden' value = "+$(this).attr('item-id')+" name = 'remove-items-id[]'>" + 
								"<input type = 'hidden' value = "+$(this).attr('main-id')+" name = 'remove-transactions-inventory-id[]'>";

			$('.remove-previous-items').append(remove_items_html);
		}

		existing_total_items = parseFloat(existing_total_items) - ( parseFloat($(this).attr('item-price')) * parseInt($(this).attr('item-quantity')) );

		remove_quantity = parseInt(item_quantity_holder[$(this).attr('item-id')]) - parseInt($(this).attr('item-quantity'));

		item_quantity_holder[$(this).attr('item-id')] = parseInt(remove_quantity);

		$(this).closest('tr').remove();

		$('#items-total').text(existing_total_items.toFixed(2));

		$('#all-total').text(parseFloat(existing_total_services) + parseFloat(existing_total_items));
		
	});

	$('#confirm-btn').on('click',function(e){
		e.preventDefault();

		if($('#client_name').val() != ""){
			//check for services and items
			if( $('.service-row').length >= 1 || $('.item-row').length >= 1 ){
				
				$('#pet-id').val(selected_pets.join('@'));

				$('#total-amount').val(parseFloat(existing_total_services) + parseFloat(existing_total_items));

				$('#transactions-form').submit();
			}
			else{
				$('#warningText').text('Please Select a Service or Product');
				$('#warningModal').modal('show');			
			}
		}
		else{
			$('#warningText').text('Please select a client');
			$('#warningModal').modal('show');			
		}
	});


});