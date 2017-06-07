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

		        </ol>
		    </div>


		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>employees/add">
		    		<div class = "row">
			    		<h2>User Profile</h2>
			    		<hr/>	

					   <div class="form-group">
					      <label>Username: </label>
					      <span><?php echo $profile[0]->employee_username;?></span>
					   </div>

					   <div class="form-group">
					      <label>First Name: </label>
					      <span><?php echo $profile[0]->employee_firstname;?></span>
					   </div>

					   <div class="form-group">
					      <label>Last Name: </label>
					      <span><?php echo $profile[0]->employee_lastname;?></span>
					   </div>

					   <?php if($profile[0]->type == 0):?>
					   <div class="form-group">
					      <label>Contact Number: </label>
					      <span><?php echo $profile[0]->employee_contactnumber;?></span>
					   </div>

					   <div class="form-group">
					      <label>SSS ID: </label>
					      <span><?php echo $profile[0]->employee_sss;?></span>
					   </div>

					   <div class="form-group">
					      <label>TIN No. </label>
					      <span><?php echo $profile[0]->employee_tin;?></span>
					   </div>

					   <div class="form-group">
					      <label>Employee Salary: </label>
					      <span><?php echo $profile[0]->employee_salary;?></span>
					   </div>
						<?php endif;?>
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

</body>

</html>











