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
		    	<form role="form" method = "POST" action = "<?php echo base_url();?>profile/change_password" id = "form_submit">

                <?php if($confirmation == "submitted"):?>
                    <div class="alert alert-success alert-dismissible fade in" role = "alert" > 
                        <strong>Yes!</strong> You have successfully Changed your password.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>                    
                    </div>
                <?php endif;?>

		    		<div class = "row">
			    		<h2>User Change Password</h2>
			    		<hr/>	

    <div id = "pwd-container">
                       <div class="form-group">
                          <label>New Password</label>
                          <input type="password" name = "new_password" class="form-control" id="new_password" placeholder="Password">
                       </div>



            <div class="pwstrength_viewport_progress"></div>
    </div>
                       <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" name = "confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                       </div>

                        <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%" id = "confirm-btn">Confirm</button>

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
                                            <strong>Opps!</strong><span id = "warning_message"></span>
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

    <script src="<?php echo base_url();?>vendor/custom/pwstr.js"></script>

    <script type = "text/javascript">
        $(document).ready(function(){
            $('#confirm-btn').on('click',function(e){
                e.preventDefault();

                if($('#new_password').val() != "" && $('#confirm_password').val() != "" ){
                    if($('#new_password').val() != $('#confirm_password').val()){
                        $('#warning_message').text('Password and Confirm Password Does not Match');
                        
                        $('#warningModal').modal('show');
                    }
                    else{
                        $('#form_submit').submit();
                    }
                }
                else{
                    $('#warning_message').text("New Passwrod and Confirm Password Field is Required");
                    
                    $('#warningModal').modal('show');
                }
            });

            var options = {};
            options.ui = {
                container: "#pwd-container",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            /*options.common = {
                debug: true,
                onLoad: function () {
                    $('#messages').text('Start typing password');
                }
            };*/
            $('#new_password').pwstrength(options);

        });
    </script>

</body>

</html>











