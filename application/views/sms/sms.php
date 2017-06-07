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

		    <div class = "row" style = "padding-left:30px;padding-right:30px">
		    	<form role="form" method = "POST" action = "#" id = "service-form">
		    		<div class = "row">

			    		<h2>Send SMS</h2>
			    		<hr/>	


                        <div  id = "success-div" style = "display:none" class="alert alert-success alert-dismissible fade in" role = "alert" > 
                            <strong>Yes!</strong> You have successfully sent the message.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>                    
                        </div>

                        <div id = "danger-div" style = "display:none" class="alert alert-danger alert-dismissible fade in" role = "alert" > 
                            <strong>Tsk!</strong> Message was not sent.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>                    
                        </div>

					<label for="basic-url">Cellphone Number</label>
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon3">+63</span>
					  <input type="text" class="form-control numbersOnly" id="cpnum" name = "cpnum" aria-describedby="basic-addon3">
					</div>

					   <div class="form-group">
					      <label>SMS Message</label>
					      <textarea class = "form-control" name = "msg" id = "msg" style = "height:150px;resize:none"></textarea>
					   </div>


					    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%;" id = "confirm-btn">Send</button>
					    <a href = "<?php echo base_url();?>" class = "btn btn-danger" style = "margin-bottom:5px;width:100%;" id = "cancel-btn">Cancel</a>	

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
                                            <strong>Opps!</strong> Both Cellphone Number and Message are required.
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
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
    <script src="<?php echo base_url();?>dist/js/jquery.blockUI.js"></script>

    <script>
    	$('#smsHeader').addClass('active');
    	var base_url = "<?php echo base_url()?>";

        var cpnum;
        var msg;
 		$(document).on("keypress keyup blur",'.numbersOnly',function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if (event.which > 31 && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    	
 		$(document).ready(function(e){

 			$('#confirm-btn').on('click',function(e){
 				e.preventDefault();

                $('#success-div').css('display','none');
                $('#danger-div').css('display','none');

                cpnum = $('#cpnum').val();
                msg = $('#msg').val();
                
                if(cpnum != "" && msg != ""){
                    $.ajax({
                        type: "POST",
                        url: base_url + "sms/send",
                        data: { cpnum:cpnum, msg:msg },
                        beforeSend : function(){
                            $.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
                        },   
                        success: function(data) {
                            if(data == "Success"){
                                $('#success-div').css('display','block');
                                $('#cpnum').val("");
                                $('#msg').val("");
                            }
                            else{
                                $('#danger-div').css('display','block');
                            }
                        },
                        complete : function (){
                            $.unblockUI();
                            
                        }            
                    });                     
                }
                else{
                    $('#warningModal').modal('show');
                }          
 			});
 		});

    </script>

</body>

</html>
