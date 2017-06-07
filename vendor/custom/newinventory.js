    $(document).ready(function() {
        var items = [];

        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY'
        }); 

        $('#inventoryHeader').addClass('active');

        $('#dataTables-example').DataTable({
            responsive: true,
            order: [[ 0, "asc" ]]
        });
        
            $('#dataTables-example').on('click', '.inventory-item',function(){

                //check if checked or not
                if($(this).prop('checked')==true)
                {
                   items.push($(this).val());
                }
                else
                {
                    var searchIndex = $.inArray($(this).val(),items);

                    if(searchIndex >= 0){
                        items.splice(searchIndex,1);
                    }
                }
            });

            $('#add-btn').on('click',function(e){
                e.preventDefault();

                if($('#item_quantity').val() != ""){
                    $('.alert-class').css('display','none');
                
                    $('#item-form').submit();
                }
                else{
                    $('.alert-class').css('display','block');
                }
            });

            $(document).on('click','.edit-entries-btn',function(e){
                e.preventDefault();

                $('#edit-modal-title').text("Edit Item with Code No. "+$(this).attr('id')+"");
                $('#edit_item_quantity').val($(this).attr('item-quantity'));
                $('#edit-item-id').val($(this).attr('id'));
                
                if($(this).attr('item-expiry') == "none"){
                    $('#edit_expiry_date').css('display','none');
                    $('#edit_expiration_date').val('none');
                }
                else{
                    $('#edit_expiration_date').val(0);
                    $('#edit_expiry_date').css('display','block');
                    $('#edit_item_expiry').val($(this).attr('item-expiry'));
                }

                $('#editModal').modal('show');
            });

            $('#edit_expiration_date').on('change',function(){
                if($(this).val() == 0){
                    $('#edit_expiry_date').css('display','block');
                }
                else{
                    $('#edit_expiry_date').css('display','none');
                }
            });

            $('#edit-btn').on('click',function(e){
                e.preventDefault();

                if($('#edit_item_quantity').val() != "" && $('#edit_item_expiry').val() != ""){
                    $('.alert-class').css('display','none');
                
                    $('#edit-item-form').submit();
                }
                else{
                    $('.alert-class').css('display','block');
                }
            });            

            
            $('#delete-items').click(function(e){
                e.preventDefault();
                if(items.length == 0)
                {
                    $('#warningModal').modal('show');
                }
                else
                {
                    $('#items_to_delete').val(items.join());
                    $('#deleteModal').modal('show');                                     
                }
            });    

            $('#deleteItem').click(function(e){
                $('#delete-items-form').submit();
            });  
        
            

        $(document).on("keypress keyup blur",'.numbersOnly',function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

            $('#add-inventory').on('click',function(e){
                e.preventDefault();

                $('#addModal').modal('show');
            });

          $('#expiry_date').css('display','none');

          $('#expiration_date').on('change',function(){
                if($(this).val() == 0){
                    $('#expiry_date').css('display','block');
                }
                else{
                    $('#expiry_date').css('display','none');
                }
          });

    });