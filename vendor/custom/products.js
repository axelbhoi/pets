$(document).ready(function(){

	var client_id;
	var selected_pets = [];

	//declaration for existing clients
	var existing_total_services = 0;
	var existing_total_items = 0;
	var existing_total_balance;
	var service_html;
	var item_html;
	var	quantity_html;
	var item_quantity_holder = [];
	var input_quantity = 0;
	var item_quantity = 0;
	var remove_quantity = 0;

	var product_item_html;
	var product_item_quantity_holder = [];
	var product_input_quantity = 0;
	var product_item_quantity = 0;
	var product_remove_quantity = 0;
	var remove_html;

	$.each(JSON.parse(items),function(i,val){
		item_quantity_holder[val.id] = 0;
	});

	$.each(JSON.parse(items),function(i,val){
		product_item_quantity_holder[val.id] = 0;
	});	


   	$('#product-inventory-table').DataTable({
		responsive: true,
  		order: [[ 0, "asc" ]]
   	});
   

	/************************************************ ADD ITEMS PRODUCT ONLY ************************************/

	$(document).on('click','.product-item-add',function(e){
		e.preventDefault();

		if( $('#product-item-input'+$(this).attr('item-id')).val() == "" ){
			$('#warningText').text('Input Quantity');
			$('#warningModal').modal('show');
		}
		else{
			if( ( parseInt(product_item_quantity_holder[$(this).attr('item-id')]) + parseInt($('#product-item-input'+$(this).attr('item-id')).val()) ) <= parseInt($(this).attr('item-quantity')) ){
				product_input_quantity = parseInt(product_item_quantity_holder[$(this).attr('item-id')]) + parseInt($('#product-item-input'+$(this).attr('item-id')).val());
				
				product_item_quantity_holder[$(this).attr('item-id')] = product_input_quantity;
				
				if( parseInt(product_item_quantity_holder[$(this).attr('item-id')]) <= parseInt($(this).attr('item-quantity')) ){
					product_item_quantity = parseInt($('#product-item-input'+$(this).attr('item-id')).val());
					
					product_item_html = "<tr class = 'product-item-row'>" +
									"<td><input type = 'hidden' value = "+$(this).attr('item-id')+" name = 'item_id[]'>"+$(this).attr('item-name')+"</td>" +
									"<td><input type = 'hidden' value = "+product_item_quantity+" name = 'item_quantity[]'>"+product_item_quantity+"</td>" +
									"<td><input type = 'hidden' value = "+$(this).attr('item-price')+" name = 'item_price[]'>"+$(this).attr('item-price')+"</td>" + 
									"<td><input type = 'hidden' value = "+$(this).attr('item-quantity')+" name = 'item_total_quantity[]'>" +
										"<input type = 'hidden' value = '"+product_item_quantity+"@"+$(this).attr('item-id')+"' name = 'items[]'><a href = '#' class = 'btn btn-warning product-remove-item-btn' item-id = "+$(this).attr('item-id')+" item-quantity = "+parseInt($('#product-item-input'+$(this).attr('item-id')).val())+" item-price = "+$(this).attr('item-price')+" old-item = '0'>Remove Item</a>" +
									"</td>" +
								"</tr>";

					product_existing_total_items = parseFloat(product_existing_total_items) + ( parseInt($('#product-item-input'+$(this).attr('item-id')).val()) * parseFloat($(this).attr('item-price')) ); 			
					
					$('#product-item-tbody').prepend(product_item_html);

					$('#product-items-total').text(product_existing_total_items.toFixed(2));					
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
		$('#product-item-input'+$(this).attr('item-id')).val("");
	});

	/************************************************ DELETE PRODUCT ONLY ITEMS ********************************/

	$(document).on('click','.product-remove-item-btn',function(e){
		e.preventDefault();

		if($(this).attr('old-item') == 1){
			remove_html = 	"<input type = 'hidden' value = "+$(this).attr('item-quantity')+" name = 'remove-quantity[]'>" +
							"<input type = 'hidden' value = "+$(this).attr('item-id')+" name = 'remove-id[]'>";

			$('.remove-previous-items').append(remove_html);
		}
		
		product_existing_total_items = parseFloat(product_existing_total_items) - ( parseFloat($(this).attr('item-price')) * parseInt($(this).attr('item-quantity')) );

		product_remove_quantity = parseInt(product_item_quantity_holder[$(this).attr('item-id')]) - parseInt($(this).attr('item-quantity'));
	
		product_item_quantity_holder[$(this).attr('item-id')] = parseInt(product_remove_quantity);

		$(this).closest('tr').remove();

		$('#product-items-total').text(product_existing_total_items.toFixed(2));		
				
		
	});	


	$('#product-confirm-btn').on('click',function(e){
		e.preventDefault();
		
		if($('.product-item-row').length >= 1){

			$('#product-total-amount').val(parseFloat(product_existing_total_items));
			
			$('#product-transactions-form').submit();
		}	
		else{
			$('#warningText').text('Please Select a Product');
			$('#warningModal').modal('show');				
		}
	});
	
});