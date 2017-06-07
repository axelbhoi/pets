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

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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
	                <div class="row" style = "margin-left:0px;margin-right:0px">
	                    <div class="col-md-12" style = "padding:0px">
	                        <h1 class="page-header">
	                            Utilities&nbsp;<a href="<?php echo base_url();?>expenses/create_utilities_expenses" class="btn btn-primary" id="add-client"><i class="fa fa-plus"></i> Create Utilities</a>
	                        </h1>

	                    </div>
	                </div>

                    <div class = "col-md-12" style = "padding:0px">
                        <form method = "POST" action = "<?php echo base_url();?>expenses/utilities" id = "utilities_form">
                            <div class = "col-md-6">
                               <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control" name = "month" id = "month">
                                        
                                        <option value = "01">01</option>
                                        <option value = "02">02</option>
                                        <option value = "03">03</option>
                                        <option value = "04">04</option>
                                        <option value = "05">05</option>
                                        <option value = "06">06</option>
                                        <option value = "07">07</option>
                                        <option value = "08">08</option>
                                        <option value = "09">09</option>
                                        <option value = "10">10</option>
                                        <option value = "11">11</option>
                                        <option value = "12">12</option>
                                    </select>
                               </div>                            
                            </div>

                            <div class = "col-md-6">
                               <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" name = "year" id = "years">
                                        <?php if($years):?>
                                            <?php foreach($years as $year):?>
                                                <option value = "<?php echo $year->year;?>"><?php echo $year->year;?></option>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </select>
                               </div>                            
                            </div>
                        </form>
                        <button type = "button" class = "btn btn-primary col-md-12 col-xs-12" id = "search_btn">Search</button>
                    </div>

            <?php if($utilities != "none"):?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <th>Utility Name</th>
                                        <th>Amount</th>
                                        <th>Options</th>
                                    </thead>                            

                                    <tbody>
                                        <?php if($utilities):?>
                                            <?php foreach($utilities as $utility):?>
                                                <tr>
                                                    <td><?php echo $utility->utility_name;?></td>
                                                    <td><?php echo $utility->utility_amount;?></td>
                                                    <td>
                                                        <a href = "#" class = "delete-expenses" id = "<?php echo $utility->id;?>" month = "<?php echo $utility->month;?>" year = "<?php echo $utility->year;?>"><i class = "fa fa-trash"></i></a>                                                    
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </tbody>

                                </table>
                                <!-- /.table-responsive -->
                                <?php if(isset($totals)):?>
                                   <table width="100%" class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td ><b>Total:</b></td>
                                                <td ><span class = "pull-right"><?php echo $totals[0]->total_utility;?></span></td>
                                            </tr>
                                        </tbody>
                                   </table>
                                <?php endif;?>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->

                           <div id="deleteModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-alert">
                                    <h4 class="modal-title">Delete Utilities</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-danger" role="alert"> 
                                            <strong>Are you sure?</strong> you want to delete this?. 
                                        </div>

                                    <form id = "delete-expenses-form" role = "form" action = "<?php echo base_url();?>expenses/delete_utilities" method = "POST">
                                        <input type = "hidden" name = "delete_id" id = "delete_id"/>
                                        <input type = "hidden" name = "month" id = "delete_month"/>
                                        <input type = "hidden" name = "year" id = "delete_year"/>
                                    </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id = "deleteBTN">Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->
            <?php else:?>
                <h3>No Data</h3>
            <?php endif;?>
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

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script type = "text/javascript">
        <?php if(isset($month)):?>
            var month = "<?php echo $month?>";
        <?php endif;?>

        <?php if(isset($yer)):?>
            var year = "<?php echo $yer?>";
        <?php endif;?>

        $(document).ready(function(){
            $('#operatingHeader').addClass('active');

            $('#search_btn').on('click',function(e){
                e.preventDefault();

                if($('#years').val() == null){
                    alert("no data available");
                }
                else{
                    $('#utilities_form').submit();
                }
            });

            $('#dataTables-example').DataTable({    
                responsive: true,
                order: [[ 0, "desc" ]]
            });

            if(month){
                $('#month').val(month);  
            }

            if(year){
                $('#years').val(year);
            }

            $(document).on('click','.delete-expenses',function(e){
                e.preventDefault();

                $('#delete_month').val($(this).attr('month'));
                $('#delete_year').val($(this).attr('year'));
                $('#delete_id').val($(this).attr('id'));

                $('#deleteModal').modal('show');
            });

            $('#deleteBTN').on('click',function(e){
                e.preventDefault();

                $('#delete-expenses-form').submit();
            });    
        });
    </script>

</body>

</html>















