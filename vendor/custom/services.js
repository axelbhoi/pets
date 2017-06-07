        $(document).ready(function() {
            var services = [];

            $('#servicesHeader').addClass('active');

            $('#dataTables-example').DataTable({
                responsive: true,
                order: [[ 0, "asc" ]]
            });

            $('#dataTables-example').on('click', '.service-client',function(){

                //check if checked or not
                if($(this).prop('checked')==true)
                {
                   services.push($(this).val());
                }
                else
                {
                    var searchIndex = $.inArray($(this).val(),services);

                    if(searchIndex >= 0){
                        services.splice(searchIndex,1);
                    }
                }
            });

            $('#delete-services').click(function(e){
                e.preventDefault();
                if(services.length == 0)
                {
                    $('#warningModal').modal('show');
                }
                else
                {
                    $('#services_to_delete').val(services.join());
                    $('#deleteModal').modal('show');                   
                }
            });

            $('#deleteService').click(function(e){
                $('#delete-services-form').submit();
            });  
            
        });