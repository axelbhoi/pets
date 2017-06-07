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
	                            Suppliers&nbsp;<a href="<?php echo base_url();?>suppliers/add" class="btn btn-primary" id="add-client"><i class="fa fa-plus"></i> Add Supplier/s</a>&nbsp;<a href="<?php echo base_url();?>" class="btn btn-primary" id="delete-suppliers"><i class="fa fa-trash"></i> Delete Supplier/s</a>
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
						<thead style = "color:#221517;background-color:#FFFFFF">
							<th>Name</th>
							<th>Contact Number</th>
                            <th>Address</th>
							<th>E-mail</th>
							<th>TIN</th>
							<th>Type</th>
							<th>Main Products</th>
							<th>Options</th>
						</thead>	                		

						<tbody>
                        <?php if($suppliers):?>
                            <?php foreach($suppliers as $supplier):?>
    							<tr>
    								<td><?php echo $supplier->supplier_name;?></td>
    								<td><?php echo $supplier->supplier_contactnumber;?></td>
    								<td><?php echo $supplier->supplier_address;?></td>
    								<td><?php echo $supplier->supplier_email;?></td>
    								<td><?php echo $supplier->supplier_tin;?></td>
    								<td><?php echo $supplier->supplier_type;?></td>
    								<td><?php echo $supplier->supplier_products;?></td>
    								<td class = "center-icons">
                                        <a href = "<?php echo base_url();?>suppliers/edit/<?php echo $supplier->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                    
    									<input type = "checkbox" name = "service-client[]" value = "<?php echo $supplier->id;?>" class = "supplier-client">
    								</td>
    							</tr>
                            <?php endforeach;?>
                        <?php endif;?>
						</tbody>

                            </table>
                            <!-- /.table-responsive -->                            

                            <div id="deleteModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-alert">
                                    <h4 class="modal-title">Delete Supplier/s</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-danger" role="alert"> 
                                            <strong>Are you sure?</strong> Supplier/s will be deleted. 
                                        </div>

                                        <form id = "delete-suppliers-form" role = "form" action = "<?php echo base_url();?>suppliers/delete" method = "POST">
                                            <input type = "hidden" name = "suppliers_to_delete" id = "suppliers_to_delete"/>
                                        </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id = "deleteSupplier">Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div id="warningModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-warning">
                                    <h4 class="modal-title">Warning!!!</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-warning" role="alert"> 
                                            <strong>Opps!</strong> Please Select a Service to Delete.
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>

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
    <script src="<?php echo base_url();?>vendor/custom/suppliers.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
</body>

</html>













