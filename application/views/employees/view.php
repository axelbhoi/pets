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

        <!-- Navigation -->
        <?php echo $this->load->view('header');?>

        <div id="page-wrapper">
	                <div class="row" style = "margin-left:0px;margin-right:0px">
	                    <div class="col-xs-12" style = "padding:0px">
	                        <h1 class="page-header">
	                            Employees&nbsp;<a href="<?php echo base_url();?>employees/add" class="btn btn-primary" id="add-client"><i class="fa fa-plus"></i> Add Employees</a>&nbsp;<a href="#" class="btn btn-primary" id="delete-employees"><i class="fa fa-trash"></i> Delete Employee/s</a>
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
        						<thead>
        							<th>Employee Name</th>
        							<th>Username</th>
        							<th>Contact Number</th>
        							<th>SSS ID</th>
        							<th>TIN No</th>
        							<th>Salary</th>
        							<th>Edit</th>
        							<th>Delete</th>
        						</thead>	                		

        						<tbody>
                                    <?php foreach($mine as $row):?>
                                        <tr>
                                                <td><?php echo $row->employee_firstname;?>&nbsp;<?php echo $row->employee_lastname;?></td>
                                                <td><?php echo $row->employee_username;?></td>
                                                <td><?php echo $row->employee_contactnumber;?></td>
                                                <td><?php echo $row->employee_sss;?></td>
                                                <td><?php echo $row->employee_tin?></td>
                                                <td><?php echo $row->employee_salary;?></td>
                                                <td class = "center-icons">
                                                    <a href = "<?php echo base_url();?>employees/edit/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                                    </a>
                                                </td>
                                                <td class = "center-icons">
                                                    <input type = "checkbox" name = "employee-client[]" value = "<?php echo $row->id;?>" class = "employee-client">
                                                </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php if($employees):?>
            		                    <?php foreach($employees as $employee):?>    
                        					<tr>
                								<td><?php echo $employee->employee_firstname;?>&nbsp;<?php echo $employee->employee_lastname;?></td>
                								<td><?php echo $employee->employee_username;?></td>
                								<td><?php echo $employee->employee_contactnumber;?></td>
                								<td><?php echo $employee->employee_sss;?></td>
                								<td><?php echo $employee->employee_tin?></td>
                								<td><?php echo $employee->employee_salary;?></td>
                								<td class = "center-icons">
                									<a href = "<?php echo base_url();?>employees/edit/<?php echo $employee->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true">	</i>
                									</a>
                								</td>
                								<td class = "center-icons">
                									<input type = "checkbox" name = "employee-client[]" value = "<?php echo $employee->id;?>" class = "employee-client">
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
                                    <h4 class="modal-title">Delete Employee/s</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-danger" role="alert"> 
                                            <strong>Are you sure?</strong> Employee/s will be deleted. 
                                        </div>

                                    <form id = "delete-employees-form" role = "form" action = "<?php echo base_url();?>employees/delete" method = "POST">
                                        <input type = "hidden" name = "employees_to_delete" id = "employees_to_delete"/>
                                    </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id = "deleteEmployee">Delete</button>
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
                                            <strong>Opps!</strong> Please Select an Employee to Delete.
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
    <script src="<?php echo base_url();?>vendor/custom/employees.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>















