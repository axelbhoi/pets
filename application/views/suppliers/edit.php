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
		            <li><a href="<?php echo base_url();?>suppliers">Suppliers</a></li>
		            <li class="active">Edit <?php echo $suppliers[0]->supplier_name;?></li>
		        </ol>
		    </div>


		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>suppliers/edit/<?php echo $suppliers[0]->id;?>">
		    		<div class = "row">
			    		<h2>Edit <?php echo $suppliers[0]->supplier_name;?></h2>
			    		<hr/>	

			    		<input type = "hidden" name = "supplier_id" value  = "<?php echo $suppliers[0]->id;?>">

					   <div class="form-group">
					      <label>Supplier Name</label>
					      <input type="text" name = "supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name" value = "<?php echo $suppliers[0]->supplier_name;?>">
					   </div>

					   <div class="form-group">
					      <label>Contact Number</label>
					      <input type="text" name = "supplier_contactnumber" class="form-control" id="supplier_contactnumber" placeholder="Contact Number" value = "<?php echo $suppliers[0]->supplier_contactnumber;?>">
					   </div>

					   <div class="form-group">
					      <label>Address</label>
					      <input type="text" name = "supplier_address" class="form-control" id="supplier_address" placeholder="Address" value = "<?php echo $suppliers[0]->supplier_address;?>">
					   </div>

					   <div class="form-group">
					      <label>Email</label>
					      <input type="text" name = "supplier_email" class="form-control" id="supplier_email" placeholder="Email" value = "<?php echo $suppliers[0]->supplier_email;?>">
					   </div>

					   <div class="form-group">
					      <label>TIN No.</label>
					      <input type="text" name = "supplier_tin" class="form-control" id="supplier_tin" placeholder="TIN ID" value = "<?php echo $suppliers[0]->supplier_tin;?>">
					   </div>

					   <div class="form-group">
					      <label>Supply Type</label>
					      <input type="text" name = "supplier_type" class="form-control" id="supplier_type" placeholder="Supply Type" value = "<?php echo $suppliers[0]->supplier_type;?>">
					   </div>

					   <div class="form-group">
					      <label>Main Products</label>
					      <input type="text" name = "supplier_products" class="form-control" id="supplier_products" placeholder="Main Products" value = "<?php echo $suppliers[0]->supplier_products;?>">
					   </div>

					    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%" id = "confirm-btn">Confirm</button>
					    <a href = "<?php echo base_url();?>suppliers" class = "btn btn-danger" style = "margin-bottom:5px;width:100%" id = "cancel-btn">Cancel</a>	

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
    	$('#suppliersHeader').addClass('active');
    </script>

</body>

</html>











