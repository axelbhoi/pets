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
		        <ol class="breadcrumb bread-primary " style = "background-color: #ffffff !important">
		          <a href="<?php echo base_url();?>dashboard" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
		            <li><a href="<?php echo base_url();?>inventory">Inventory</a></li>
		            <li class="active">Edit <?php echo $items[0]->inventory_name;?></li>
		        </ol>
		    </div>


		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>inventory/edit/<?php echo $items[0]->id;?>">
		    		<div class = "row">
			    		<h2>Edit <?php echo $items[0]->inventory_name;?></h2>
			    		<hr/>	

			    		<input type = "hidden" name = "inventory_id" value  = "<?php echo $items[0]->id;?>">

					   <div class="form-group">
					      <label>Product Name</label>
					      <input type="text" name = "inventory_name" class="form-control" placeholder="Inventory Name" value = "<?php echo $items[0]->inventory_name;?>">
					   </div>

					   <div class = "form-group">
					   		<label>Supplier/s</label>
							<select class="form-control" name = "supplier" id = "supplier">
								<option value = "0001">--Select--</option>
								<?php if($suppliers):?>
									<?php foreach($suppliers as $supplier):?>
										<option value = "<?php echo $supplier->id;?>"><?php echo $supplier->supplier_name;?></option>
									<?php endforeach;?>
								<?php endif;?>
							</select>
					   </div>

					   <div class="form-group">
					      <label>Item Description</label>
					      <input type="text" name = "inventory_description" class="form-control" placeholder="Item Description" value = "<?php echo $items[0]->inventory_description;?>">
					   </div>		

						<div class="form-group">
						    <label>Location</label>
							  	<select class="form-control" name = "inventory_location" >
							  		<option value = "storage">Storage Room</option>
							  	</select>
						</div>

						<div class="form-group">
						    <label>Unit of Measurement</label>
							  	<select class="form-control" name = "inventory_measurement" >
							  		<option value = "-">-</option>
							  		<option value = "grams">grams</option>
							  		<option value = "kgs">Kgs</option>
							  		<option value = "pipette">pipette</option>
							  	</select>
						</div>

					   <div class="form-group">
					      <label>Quantity</label>
					      <input type="text" name = "inventory_level" id = "inventory_level" class="form-control" placeholder="Critical Level" value = "<?php echo $items[0]->inventory_level;?>">
					   </div>

					   <div class="form-group">
					      <label>Unit Price</label>
					      <input type="text" name = "inventory_unit" class="form-control" placeholder="Unit Price" value = "<?php echo $items[0]->inventory_unit;?>"/>
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
    <script src="<?php echo base_url();?>vendor/custom/editinventory.js"></script>

    <script type = "text/javascript">
    	 var suppID = "<?php echo $items[0]->suppID?>";

    </script>
</body>

</html>
