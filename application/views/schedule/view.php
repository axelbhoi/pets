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

    <!-- Full Calendar CSS -->
    <link href="<?php echo base_url();?>vendor/fullcalendar/css/fullcalendar.css" rel="stylesheet">    

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
                        <div class="row" style = "margin-left:0px;margin-right:0px">
                            <div class="col-xs-12" style = "padding:0px">
                                <h1 class="page-header">
                                    Schedule <button class = "btn btn-primary" id = "addSchedule-btn"><i class="fa fa-plus"></i> Add Schedule</button>
                                </h1>

                            </div>
                        </div>

                    <div id='calendar'></div>
            </div>


            <div id="addScheduleModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Schedule</h4>
                  </div>
                  <div class="modal-body">
                        <form role = "form" id = "scheduleForm">
                            <div class = "row" style = "padding-left:15px;padding-right:15px">
                                <div class="form-group">
                                  <label for="name">Date </label>
                                        <div class='input-group date datepicker'>
                                            <input type='text' class="form-control" name = "schedule_dates" id = "schedule_dates" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" name = "schedule_clientname" class="form-control" id="schedule_clientname" placeholder="Client Name"/>
                                </div>

                                <div class="form-group">
                                    <label>Schedule Pets</label>
                                    <input type="text" name = "schedule_pets" class="form-control" id="schedule_pets" placeholder="Pet Name/s"/>
                                </div>

                                <div class="form-group">
                                    <label>Services</label>
                                    <input type="text" name = "schedule_services" class="form-control" id="schedule_services" placeholder="Services"/>
                                </div>
                            </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id = "saveSchedule">Save</button>
                    <button type="button" class="btn btn-default" id = "closeSchedule">Close</button>
                  </div>
                </div>

              </div>
            </div>


            <div id="EditScheduleModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Schedule / Delete Schedule</h4>
                  </div>
                  <div class="modal-body">
                        <form role = "form" id = "EditscheduleForm">
                            <div class = "row" style = "padding-left:15px;padding-right:15px">
                                <div class="form-group">
                                  <label for="name">Date</label>
                                        <div class='input-group date datepicker'>
                                            <input type='text' class="form-control" name = "schedule_dates" id = "Editschedule_dates" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" name = "schedule_clientname" class="form-control" id="Editschedule_clientname" placeholder="Client Name"/>
                                </div>

                                <div class="form-group">
                                    <label>Schedule Pets</label>
                                    <input type="text" name = "schedule_pets" class="form-control" id="Editschedule_pets" placeholder="Pet Name/s"/>
                                </div>

                                <div class="form-group">
                                    <label>Services</label>
                                    <input type="text" name = "schedule_services" class="form-control" id="Editschedule_services" placeholder="Services"/>
                                </div>

                                <input type = "hidden" id = "schedule_id" name = "schedule_id">
                            </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id = "EditsaveSchedule">Save</button>
                    <button type="button" class="btn btn-danger" id = "DeleteSchedule">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            <form role = "form" id = "deleteForm">
                <input type = "hidden" id = "delete_id" name = "delete_id">
            </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="<?php echo base_url();?>vendor/datepicker/js/moment.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Full Calendar -->
    <script src="<?php echo base_url();?>vendor/fullcalendar/js/fullcalendar.min.js"></script>    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>dist/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url();?>dist/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>dist/js/schedule.js"></script>
    
    <script type = "text/javascript">
        var base_url = "<?php echo base_url();?>";
        $('#schedulesHeader').addClass('active');        
    </script>


</body>

</html>











