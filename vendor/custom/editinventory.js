$(document).ready(function(){
	$('#inventoryHeader').addClass('active');
	
    $('.datepicker').datetimepicker({
    	format: 'MM/DD/YYYY'
   	});		

			$('#inventory_unit').keypress(function(event) {
			  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			    	event.preventDefault();
			  	}
			});

		  $("#inventory_quantity").keypress(function (e) {
		     //if the letter is not digit then display error and don't type anything
		     	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		        	e.preventDefault();
		    	}
		   });

		  $('#expiration_date').on('change',function(){
		  		if($(this).val() == 0){
		  			$('#expiry_date').css('display','block');
		  		}
		  		else{
		  			$('#expiry_date').css('display','none');
		  		}
		  });

		  $('#supplier').val(suppID);
});