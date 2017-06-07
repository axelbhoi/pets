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
		            <li class="active">Add Supplier/s</li>
		        </ol>
		    </div>


		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>suppliers/add" id = "supplier-form">
		    		<div class = "row">
			    		<h2>Add Supplier</h2>
			    		<hr/>	

					   <div class="form-group">
					      <label>Supplier Name</label>
					      <input type="text" name = "supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name">
					   </div>

					   <div class="form-group">
					      <label>Contact Number</label>
					      <input type="text" name = "supplier_contactnumber" class="form-control" id="supplier_contactnumber" placeholder="Contact Number">
					   </div>

					   <div class="form-group">
					      <label>Address</label>
					      <input type="text" name = "supplier_address" class="form-control" id="supplier_address" placeholder="Address">
					   </div>

					   <div class="form-group">
					      <label>Email</label>
					      <input type="text" name = "supplier_email" class="form-control" id="supplier_email" placeholder="Email">
					   </div>

					   <div class="form-group">
					      <label>TIN No.</label>
					      <input type="text" name = "supplier_tin" class="form-control" id="supplier_tin" placeholder="TIN ID">
					   </div>

					   <div class="form-group">
					      <label>Supply Type</label>
					      <input type="text" name = "supplier_type" class="form-control" id="supplier_type" placeholder="Supply Type">
					   </div>

					   <div class="form-group">
					      <label>Main Products</label>
					      <input type="text" name = "supplier_products" class="form-control" id="supplier_products" placeholder="Main Products">
					   </div>

					    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%" id = "confirm-btn">Confirm</button>
					    <a href = "<?php echo base_url();?>suppliers" class = "btn btn-danger" style = "margin-bottom:5px;width:100%" id = "cancel-btn">Cancel</a>	

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
                                            <strong>Opps!</strong> <span id = "warning-text"></span>
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
    	$('#suppliersHeader').addClass('active');

    	$('#confirm-btn').on('click',function(e){
    		e.preventDefault();

    		if($('#supplier_name').val() == ""){
    			$('#warning-text').text('Supplier Name is required.');
    			$('#warningModal').modal('show');
    		}
    		else{
    			/*if(validateEmail($('#supplier_email').val())){
    				$('#supplier-form').submit();
    			}
    			else{
    				$('#warning-text').text('Invalid Email.');
    				$('#warningModal').modal('show');    				
    			}*/
                $('#supplier-form').submit();
    			
    		}

			function validateEmail(email) {
			  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			  return re.test(email);
			}

    	});
    </script>

</body>

</html>











