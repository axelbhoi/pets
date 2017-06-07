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
	            <li class="active">Edit <?php echo $clients[0]->client_firstname;?>&nbsp;<?php echo $clients[0]->client_lastname;?>&nbsp;Profile</li>
	        </ol>
	    </div>
	
	    <div class = "row" style = "padding-left:30px;padding-right:30px">
	    
			<form id = "client_form" role="form" method = "POST" action = "<?php echo base_url();?>clients/edit/<?php echo $clients[0]->id;?>">
				<div class = "row">
		    		
		    		<h2><?php echo $clients[0]->client_firstname;?>&nbsp;<?php echo $clients[0]->client_lastname;?>&nbsp;Information</h2>
		    		<hr/>

		    		<input type = "hidden" name = "client_id" value = "<?php echo $clients[0]->id;?>">

				   <div class="form-group">
				      <label >Last Name</label>
				      <input type="text" class="form-control" id="client_lastname" name = "client_lastname" placeholder="Client Name" value = "<?php echo $clients[0]->client_lastname;?>">
				   </div>

				   <div class="form-group">
				      <label >First Name</label>
				      <input type="text" class="form-control" id="client_firstname" name = "client_firstname" placeholder="Client Name" value = "<?php echo $clients[0]->client_firstname;?>">
				   </div>				   


				   <div class="form-group">
				      <label>Contact Number</label>
				      <input type="text" class="form-control" id="client_contactnumber" name = "client_contactnumber" placeholder="Contact Number" value = "<?php echo $clients[0]->client_contactnumber;?>">
				   </div>
				   <div class="form-group">
				      <label>Address</label>
				      <input type="text" class="form-control" id="client_address" name = "client_address" placeholder="Address" value = "<?php echo $clients[0]->client_address;?>">
				   </div>
				   <div class="form-group">
				      <label>Email</label>
				      <input type="text" class="form-control" id="client_email" name = "client_email" placeholder="Email" value = "<?php echo $clients[0]->client_email;?>">
				   </div>
			    </div>
			

				<?php if($pets):?>
						<div class = "pet-division">
						    <?php foreach($pets as $pet):?>	
							    <div class = "row" id = "petRow<?php echo $pet->id;?>">	
					    			<h2>Pet/s Information<button pet-id = "<?php echo $pet->id;?>" class = 'btn btn-danger pull-right dynamic-remove-btn'>Remove</button></h2>
					    			<hr/>
							    	<div class = "col-xs-6">
									   	<div class="form-group">
									      <label>Pet Name</label>
									      <input type="text" class="form-control pet-name" id="pet_name" name = "pet_name[]" placeholder="Pet Name" value = "<?php echo $pet->pet_name;?>">
									   	</div>

									   	<input type = "hidden" name = "pet_id[]" value = "<?php echo $pet->id;?>" />

									   	<div class="form-group">
									      <label>Species</label>
									      <select class="form-control pet_species" pet-species-selector = "<?php echo $pet->pet_species;?>" name = "pet_species[]">
									      	<option value = "Dog">Dog</option>
									      	<option value = "Cat">Cat</option>
									      	<option value = "Others">Others</option>
									      </select>
									   	</div>
									   	<div class="form-group">
									      <label>Breed</label>
									      <input type="text" class="form-control" name = "pet_breed[]" placeholder="Pet Breed" value ="<?php echo $pet->pet_breed;?>">
									   	</div>
									   	<div class="form-group">
									      <label>Sex</label>
									      <select class="form-control pet_sex" name = "pet_sex[]" pet-sex-selector = "<?php echo $pet->pet_sex;?>">
									      	<option value = "Male">Male</option>
									      	<option value = "Female">Female</option>
									      </select>
									   	</div>
									   	<div class="form-group">
									      <label>Color</label>
									      <input type="text" class="form-control" name = "pet_color[]" placeholder="Pet Color" value = "<?php echo $pet->pet_color;?>">
									   	</div>
							    	</div>

							    	<div class = "col-xs-6">
									   	<div class="form-group">
									      <label >Microchip No.</label>
									      <input type="text" class="form-control" id="pet_microchip" name = "pet_microchip[]" placeholder="Microchip No." value = "<?php echo $pet->pet_microchip;?>">
									   	</div>
									   	<div class="form-group">
									      <label>Adult Weight</label>
									      <input type="text" class="form-control" id="pet_weight" name = "pet_weight[]" placeholder="Adult Weight" value = "<?php echo $pet->pet_weight;?>">
									   	</div>
									   	<div class="form-group">
									      <label for="name">Date of Birth</label>
				                                <div class='input-group date datepicker'>
				                                    <input type='text' class="form-control" name = "pet_birth[]" value = "<?php echo $pet->pet_birth;?>" />
				                                    <span class="input-group-addon">
				                                        <span class="glyphicon glyphicon-calendar"></span>
				                                    </span>
				                                </div>
									   	</div>
									   	<div class="form-group">
									      <label>Vaccination Cycle</label>
									      <input type="text" class="form-control" id="pet_cycle" name = "pet_cycle[]" placeholder="Vaccination Cycle" value = "<?php echo $pet->pet_cycle;?>">
									   	</div>					   	
							    	</div>			    	
							    </div>	
							<?php endforeach;?>			
						</div>
				<?php else:?>
						<div class = "pet-division">

						</div>
				<?php endif;?>

				</form>    


                            <div id="deleteModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-alert">
                                    <h4 class="modal-title">Remove Pet</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-danger" role="alert"> 
                                            <strong>Are you sure?</strong> Pet will be removed. 
                                        </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id = "deletePet">Remove</button>
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
                                            <strong>Opps!</strong><span id = "warning-text"></span>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
	    </div>
				    <button class = "btn btn-default" style = "margin-bottom:5px;width:100%;" id = "new-pet-btn">New Pet</button>
				    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%;" id = "confirm-btn">Confirm</button>
				    <a href = "<?php echo base_url();?>clients" class = "btn btn-danger" style = "margin-bottom:5px;width:100%;" id = "cancel-btn">Cancel</a>   
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
    <script src="<?php echo base_url();?>dist/js/jquery.blockUI.js"></script>

    <!-- Custom JavaScript -->
    <script src = "<?php echo base_url();?>vendor/custom/editclients.js"></script>


    <script>
    	var base_url = "<?php echo base_url()?>";
    </script>
</body>

</html>







