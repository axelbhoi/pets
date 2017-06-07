    $(document).ready(function() {
        var items = [];

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
        

    });