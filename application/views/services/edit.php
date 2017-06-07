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
		            <li><a href="<?php echo base_url();?>services">Services</a></li>
		            <li class="active">Edit <?php echo $services[0]->service_name;?></li>
		        </ol>
		    </div>


		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>services/edit/<?php echo $services[0]->service_name;?>">
		    		<div class = "row">
			    		<h2>Edit <?php echo $services[0]->service_name;?></h2>
			    		<hr/>	

			    		<input type = "hidden" name = "service_id" value  = "<?php echo $services[0]->id;?>">

					   <div class="form-group">
					      <label>Service Name</label>
					      <input type="text" name = "service_name" class="form-control" id="service_name" placeholder="Service Name" value = "<?php echo $services[0]->service_name;?>">
					   </div>

					   <div class="form-group">
					      <label>Service Details</label>
					      <textarea class = "form-control" name = "service_details" id = "service_details" style = "height:150px;resize:none"><?php echo $services[0]->service_details;?></textarea>
					   </div>

						<div class="form-group">
						    <label>Petsize</label>
							  	<select class="form-control" name = "service_size" id = "service_size" service-selector = "<?php echo $services[0]->service_size;?>" >
							  		<option value = "ALL">ALL</option>
							      	<option value = "Small/Medium" >Small/Medium</option>
							      	<option value = "Large">Large</option>
							      	<option value = "Giant">Giant</option>
							  	</select>
						</div>

					   <div class="form-group">
					      <label>Service Amount</label>
					      <input type="text" name = "service_amount" id = "service_amount" class="form-control" id="service_amount" placeholder="Service Amount" value = "<?php echo $services[0]->service_amount;?>">
					   </div>

					    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%;" id = "confirm-btn">Confirm</button>
					    <a href = "<?php echo base_url();?>services" class = "btn btn-danger" style = "margin-bottom:5px;width:100%;" id = "cancel-btn">Cancel</a>	

		    		</div>    	

		    	</form>


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
    	$(document).ready(function(){
    		$('#service_size').val($('#service_size').attr('service-selector'));

            $('#servicesHeader').addClass('active');

            $('#service_amount').keypress(function(event) {
              if (event.which > 31 && (event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });            
    	});
    </script>

</body>

</html>
