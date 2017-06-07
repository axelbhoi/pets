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

    <!-- Date Picker -->
    <link href="<?php echo base_url();?>vendor/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

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
	        <ol class="breadcrumb bread-primary " style = "background-color: #ffffff !important" >
	          <button href="#" class="btn btn-primary"><i class="fa fa-home"></i> Home</button>
	            <li><a href="<?php echo base_url();?>clients">Clients</a></li>
	            <li class="active">Add Clients</li>
	        </ol>
	    </div>
	
	    <div class = "row" style = "padding-left:30px;padding-right:30px">
	    
			<form role="form" method = "POST" action = "<?php echo base_url();?>clients/add" id = "client_form">
				<div class = "row">
		    		
		    		<h2>Client Information</h2>
		    		<hr/>
		    		<!--
				   <div class="form-group">
				      <label >Name</label>
				      <input type="text" class="form-control" id="client_name" name = "client_name" placeholder="Client Name">
				   </div>
					-->

				   <div class="form-group">
				      <label >Last Name</label>
				      <input type="text" class="form-control" id="client_lastname" name = "client_lastname" placeholder="Last Name">
				   </div>

				   <div class="form-group">
				      <label >First Name</label>
				      <input type="text" class="form-control" id="client_firstname" name = "client_firstname" placeholder="First Name">
				   </div>

				   <div class="form-group">
				      <label>Contact Number</label>
				      <input type="text" class="form-control" id="client_contactnumber" name = "client_contactnumber" placeholder="Contact Number">
				   </div>
				   <div class="form-group">
				      <label>Address</label>
				      <input type="text" class="form-control" id="client_address" name = "client_address" placeholder="Address">
				   </div>
				   <div class="form-group">
				      <label>Email</label>
				      <input type="text" class="form-control" id="client_email" name = "client_email" placeholder="Email">
				   </div>
			    </div>
			

			
				<div class = "pet-division">
				    <div class = "row">	
		    			<h2>Pet/s Information</h2>
		    			<hr/>
				    	<div class = "col-xs-6">
						   	<div class="form-group">
						      <label>Pet Name</label>
						      <input type="text" class="form-control pet-name" id="pet_name" name = "pet_name[]" placeholder="Pet Name">
						   	</div>
						   	<div class="form-group">
						      <label>Species</label>
						      <select class="form-control" name = "pet_species[]" >
						      	<option value = "Dog">Dog</option>
						      	<option value = "Cat">Cat</option>
						      	<option value = "Others">Others</option>
						      </select>
						   	</div>
						   	<div class="form-group">
						      <label>Breed</label>
						      <input type="text" class="form-control" id="pet_breed[]" name = "pet_breed[]" placeholder="Pet Breed">
						   	</div>
						   	<div class="form-group">
						      <label>Sex</label>
						      <select class="form-control" name = "pet_sex[]" >
						      	<option value = "Male">Male</option>
						      	<option value = "Female">Female</option>
						      </select>
						   	</div>
						   	<div class="form-group">
						      <label>Color</label>
						      <input type="text" class="form-control" name = "pet_color[]" placeholder="Pet Color">
						   	</div>
				    	</div>

				    	<div class = "col-xs-6">
						   	<div class="form-group">
						      <label >Microchip No.</label>
						      <input type="text" class="form-control" id="pet_microchip" name = "pet_microchip[]" placeholder="Microchip No.">
						   	</div>
						   	<div class="form-group">
						      <label>Adult Weight</label>
						      <input type="text" class="form-control" id="pet_weight" name = "pet_weight[]" placeholder="Adult Weight">
						   	</div>
						   	<div class="form-group">
						      <label for="name">Date of Birth</label>
	                                <div class='input-group date datepicker'>
	                                    <input type='text' class="form-control" name = "pet_birth[]" />
	                                    <span class="input-group-addon">
	                                        <span class="glyphicon glyphicon-calendar"></span>
	                                    </span>
	                                </div>
						   	</div>
						   	<div class="form-group">
						      <label>Vaccination Cycle</label>
						      <input type="text" class="form-control" id="pet_cycle" name = "pet_cycle[]" placeholder="Vaccination Cycle">
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
                                            <strong>Opps!</strong><span id = "warning-text"></span>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>

				    <button class = "btn btn-default" style = "margin-bottom:5px;width:100%;" id = "new-pet-btn">New Pet</button>
				    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%;" id = "confirm-btn">Confirm</button>
				    <a href = "<?php echo base_url();?>clients" class = "btn btn-danger" style = "margin-bottom:5px;width:100%;" id = "cancel-btn">Cancel</a>
			</form>    
	    </div>


           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Date Picker -->
    <script src="<?php echo base_url();?>vendor/datepicker/js/moment.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

    <!-- Custom JavaScript -->
    <script src = "<?php echo base_url();?>vendor/custom/clients.js"></script>


</body>

</html>







