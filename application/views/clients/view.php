<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dogs N Us, Pet Supplies & Vet Clinic, Inc.</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>dist/css/styles.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php echo $this->load->view('header');?>

        <div id="page-wrapper">
	                <div class="row" style = "margin-left:0px;margin-right:0px">
	                    <div class="col-xs-12" style = "padding:0px">
	                        <h1 class="page-header">
	                            Clients&nbsp;<a href="<?php echo base_url();?>clients/add" class="btn btn-primary" id="add-client"><i class="fa fa-plus"></i> Add Client/s</a>&nbsp;<a href="#" class="btn btn-primary" id="delete-clients"><i class="fa fa-trash"></i> Delete Client/s</a>
	                        </h1>

	                    </div>
	                </div>

           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        						<thead >
        							<th>Name</th>
        							<th>Contact Number</th>
                                    <th>Address</th>
        							<th>E-mail</th>
        							<th>Pet Names</th>
        							<th>Options</th>
        						</thead>	                		

        						<tbody>
                                    <?php foreach($clients as $client):?>
            							<tr>
            								<td><?php echo $client->client_firstname." ".$client->client_lastname;?></td>
            								<td><?php echo $client->client_contactnumber;?></td>
            								<td><?php echo $client->client_address;?></td>
            								<td><?php echo $client->client_email;?></td>
            								<td><?php echo $client->pet_name;?></td>
            								<td class = "center-icons"><a href = "<?php echo base_url();?>clients/history/<?php echo $client->id;?>"><i class="fa fa-history" aria-hidden="true"></i></a>
                                            <a href = "<?php echo base_url();?>clients/edit/<?php echo $client->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <input type = "checkbox" name = "delete-client[]" class = "delete-client" value = "<?php echo $client->id;?>">
                                            </td>
            							</tr>
                                    <?php endforeach;?>
        						</tbody>

                            </table>
                            <!-- /.table-responsive -->

                            <form id = "delete-clients-form" role = "form" action = "<?php echo base_url();?>clients/delete" method = "POST">
                                <input type = "hidden" name = "clients_to_delete" id = "clients_to_delete"/>
                            </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->	                
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        var clients = [];

        $('#clientHeader').addClass('active');

        $('#dataTables-example').DataTable({
            responsive: true,
            order: [[ 0, "asc" ]]
        });

            $('#dataTables-example').on('click', '.delete-client',function(){

                //check if checked or not
                if($(this).prop('checked')==true)
                {
                   clients.push($(this).val());
                }
                else
                {
                    var searchIndex = $.inArray($(this).val(),clients);

                    if(searchIndex >= 0){
                        clients.splice(searchIndex,1);
                    }
                }
            });

            $('#delete-clients').click(function(e){
                e.preventDefault();
                if(clients.length == 0)
                {
                    alert("Please Select a Client to Delete");
                }
                else
                {
                    $('#clients_to_delete').val(clients.join());
                    var r = confirm("Are you sure you want to delete this client/s");
                    if (r == true) {
                        $('#delete-clients-form').submit();
                    }                    
                }
            }); 

    });
    </script>

</body>

</html>













