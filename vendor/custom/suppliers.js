    $(document).ready(function() {
        var suppliers = [];

        $('#suppliersHeader').addClass('active');

        $('#dataTables-example').DataTable({
            responsive: true,
            order: [[ 0, "asc" ]]
        });

            $('#dataTables-example').on('click', '.supplier-client',function(){

                //check if checked or not
                if($(this).prop('checked')==true)
                {
                   suppliers.push($(this).val());
                }
                else
                {
                    var searchIndex = $.inArray($(this).val(),suppliers);

                    if(searchIndex >= 0){
                        suppliers.splice(searchIndex,1);
                    }
                }
            });

            $('#delete-suppliers').click(function(e){
                e.preventDefault();
                if(suppliers.length == 0)
                {
                    $('#warningModal').modal('show');
                }
                else
                {
                    $('#suppliers_to_delete').val(suppliers.join());
                    $('#deleteModal').modal('show');                                     
                }
            });    

            $('#deleteSupplier').click(function(e){
                $('#delete-suppliers-form').submit();
            });  

    });