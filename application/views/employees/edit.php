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
 	
			<div class="row">
		        <hr class="hr-primary" style = "height: 4px;margin-left: 15px;margin-bottom:-3px;">
		        <ol class="breadcrumb bread-primary " style = "background-color: #ffffff !important">
		          <a href="<?php echo base_url();?>dashboard" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
		            <li><a href="<?php echo base_url();?>employees">Employees</a></li>
		            <li class="active">Edit <?php echo $employees[0]->employee_firstname;?>&nbsp;<?php echo $employees[0]->employee_lastname;?></li>
		        </ol>
		    </div>

		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>employees/edit/<?php echo $employees[0]->id;?>" id = "emp-form">
		    		<div class = "row">
			    		<h2>Edit <?php echo $employees[0]->employee_firstname;?>&nbsp;<?php echo $employees[0]->employee_lastname;?>&nbsp;Profile</h2>
			    		<hr/>	

			    		<input type = "hidden" name = "employee_id" value  = "<?php echo $employees[0]->id;?>">

					   <div class="form-group">
					      <label>Username</label>
					      <input type="text" name = "employee_username" class="form-control" id="employee_username" placeholder="Username" value = "<?php echo $employees[0]->employee_username;?>">
					   </div>

					   <div class="form-group">
					      <label>Password</label>
					      <input type="password" name = "employee_password" class="form-control" id="employee_password" placeholder="Password" value = "<?php echo $employees[0]->employee_password;?>">
					   </div>


					   <div class="form-group">
					      <label>First Name</label>
					      <input type="text" name = "employee_firstname" class="form-control" id="employee_firstname" placeholder="First Name" value = "<?php echo $employees[0]->employee_firstname;?>">
					   </div>

					   <div class="form-group">
					      <label>Last Name</label>
					      <input type="text" name = "employee_lastname" class="form-control" id="employee_lastname" placeholder="Last Name" value = "<?php echo $employees[0]->employee_lastname;?>">
					   </div>

					   <div class="form-group">
					      <label>Contact Number</label>
					      <input type="text" name = "employee_contactnumber" class="form-control" id="employee_contactnumber" placeholder="Contact Number" value = "<?php echo $employees[0]->employee_contactnumber;?>">
					   </div>

					   <div class="form-group">
					      <label>SSS ID</label>
					      <input type="text" name = "employee_sss" class="form-control" id="employee_sss" placeholder="SSS ID" value = "<?php echo $employees[0]->employee_sss;?>">
					   </div>

					   <div class="form-group">
					      <label>TIN No.</label>
					      <input type="text" name = "employee_tin" class="form-control" id="employee_tin" placeholder="TIN ID" value = "<?php echo $employees[0]->employee_tin;?>">
					   </div>
					   <?php if($this->session->userdata('user_type') == 0):?>
					   <div class="form-group">
					      <label>Employee Salary</label>
					      <input type="text" name = "employee_salary" class="form-control" id="employee_salary" placeholder="Employee Salary" value = "<?php echo $employees[0]->employee_salary;?>">
					   </div>
					   <?php endif;?>


					    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%" id = "confirm-btn">Confirm</button>
					    <a href = "<?php echo base_url();?>employees" class = "btn btn-danger" style = "margin-bottom:5px;width:100%" id = "cancel-btn">Cancel</a>	

		    		</div>
    	

		    	</form>

                            <div id="warningModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-warning">
                                    <h4 class="modal-title">Warning!!!</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-warning" role="alert"> 
                                            <strong>Opps!</strong><span id = "text-alert"></span>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>


		    </div>


           
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

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

    <script>
    	$('#employeeHeader').addClass('active');

    	var users = '<?php echo json_encode($users)?>';
    	var ctr;

    	var original = '<?php echo $employees[0]->employee_username?>';

    	$(document).ready(function(){
    		/*
			$('#employee_contactnumber').keypress(function(event) {
				if ((event.which != 46 || $(this).val().indexOf('.') == -1) && (event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
			});    		
			*/
			
			$('#employee_sss').keypress(function(event) {
				if (event.which > 31 && (event.which != 46 || $(this).val().indexOf('.') == -1) && (event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
			}); 


			$('#employee_salary').keypress(function(event) {
				if (event.which > 31 && (event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
			}); 


            $('#confirm-btn').click(function(e){
                e.preventDefault();

                if( $('#employee_username').val() != "" && $('#employee_firstname').val() != "" && $('#employee_lastname').val() != "" ){
                    //$('#emp-form').submit();
                
                    //check if username has duplicates
                    ctr = 0;
					$.each(JSON.parse(users),function(i,val){
						if(val.employee_username == $('#employee_username').val()){
							ctr = ctr + 1;
						}
					});                    
                	
                	if(ctr == 1 && original != $('#employee_username').val()){
                		$('#text-alert').text('Username is already taken');
                		$('#warningModal').modal('show');
                	}
                	else{
                		$('#emp-form').submit();
                	}
                }
                else{
                	$('#text-alert').text('Username, First Name and Last Name are all required');
                    $('#warningModal').modal('show');
                }

            });	
			
    	});

    </script>

</body>

</html>











