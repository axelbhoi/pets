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
                    <li><a href="<?php echo base_url();?>expenses/lists">lists</a></li>
                    <li class="active">New Expense</li>
                </ol>
            </div>

            <div class = "row" style = "padding-left:30px;padding-right:30px">

                <form role="form" id = "new_expense_form" method = "POST" action = "<?php echo base_url();?>expenses/add">

                    <h2>New Expense</h2>

                    <hr/>

                       <div class="form-group">
                          <label >Expense Name</label>
                          <input type="text" class="form-control" id="expense_name" name = "expense_name" placeholder="Expense Name">
                       </div>

                    <hr/>

                    <h2>Expense Fields</h2>

                    <hr/>

                    <div id = "new_div">

                    </div>

                    <button class = "btn btn-default" style = "margin-bottom:5px;width:100%;" id = "new-btn">New Field</button>
                    <button class = "btn btn-primary" style = "margin-bottom:5px;width:100%;" id = "confirm-btn">Confirm</button>
                    <a href = "<?php echo base_url();?>expenses/lists" class = "btn btn-danger" style = "margin-bottom:5px;width:100%;" id = "cancel-btn">Cancel</a>

                </form>
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
                                            <strong>Opps!</strong> Only overtime is not required.
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
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

    <script src = "<?php echo base_url();?>vendor/custom/addlists.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>


</body>

</html>















