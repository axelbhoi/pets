    $(document).ready(function() {
        var employees = [];

        $('#employeeHeader').addClass('active');

        $('#dataTables-example').DataTable({
            responsive: true,
            order: [[ 0, "asc" ]]
        });
            $('#dataTables-example').on('click', '.employee-client',function(){

                //check if checked or not
                if($(this).prop('checked')==true)
                {
                   employees.push($(this).val());
                }
                else
                {
                    var searchIndex = $.inArray($(this).val(),employees);

                    if(searchIndex >= 0){
                        employees.splice(searchIndex,1);
                    }
                }
            });

            $('#delete-employees').click(function(e){
                e.preventDefault();
                if(employees.length == 0)
                {
                    $('#warningModal').modal('show');
                }
                else
                {
                    $('#employees_to_delete').val(employees.join());
                    $('#deleteModal').modal('show');                   
                }
            });

            $('#deleteEmployee').click(function(e){
                $('#delete-employees-form').submit();
            });          
    

    });