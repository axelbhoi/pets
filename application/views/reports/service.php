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

            <div class = "row">
                <h1>Monthly Services Report</h1>
            
                    <div class = "col-md-12" style = "padding:0px">
                        <form method = "POST" action = "<?php echo base_url();?>reports/services_report" id = "service-form">
                            <div class = "col-md-6">
                               <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control" name = "month" id = "month">
                                        <option value = "01">January</option>
                                        <option value = "02">February</option>
                                        <option value = "03">March</option>
                                        <option value = "04">April</option>
                                        <option value = "05">May</option>
                                        <option value = "06">June</option>
                                        <option value = "07">July</option>
                                        <option value = "08">August</option>
                                        <option value = "09">September</option>
                                        <option value = "10">October</option>
                                        <option value = "11">November</option>
                                        <option value = "12">December</option>
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

            </div>
            <hr/>
            <div class="row" >
            <?php if(empty($reports) != 1 && $reports != "select"):?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            						<thead >
                                        <th>Transaction No.</th>
                                        <th>Date & Time</th>
                                        <th>Service Name</th>
                                        <th>Service Size</th>
                                        <th>Service Amount</th>
                                        <th>Total Amount</th>
            						</thead>	                		

            						<tbody>
                                        <?php foreach($reports as $report):?>
                                            <tr>
                                                <td><?php echo $report->transaction_id;?></td>
                                                <td><?php echo $report->created_at;?></td>
                                                <td><?php echo $report->service_name;?></td>
                                                <td><?php echo $report->service_size;?></td>
                                                <td><?php echo $report->service_amount;?></td>
                                                <td><?php echo number_format($report->total_amount,2);?></td>
                                            </tr>
                                        <?php endforeach;?>

            						</tbody>

                                </table>
                            <!-- /.table-responsive -->
                                   <table width="100%" class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan = "4"><b>Total:</b></td>
                                                <td ><span class = "pull-right"><?php echo number_format($grand_total,2)?></span></td>
                                            </tr>
                                        </tbody>
                                   </table>                            
                                                 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <?php else:?>
                <?php if($reports == "select"):?>
                    <h1>Please Select Month and Year</h1>
                <?php else:?>
                    <h1>No Data</h1>
                <?php endif;?>
            <?php endif;?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->	                
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
        $(document).ready(function(){

        <?php if(isset($month)):?>
            var month = "<?php echo $month?>";
        <?php endif;?>

        <?php if(isset($yer)):?>
            var year = "<?php echo $yer?>";
        <?php endif;?>

            $('#reportsHeader').addClass('active');

            $('#dataTables-example').DataTable({
                responsive: true,
                order: [[ 0, "desc" ]]
            });

            $('#search_btn').on('click',function(e){
                e.preventDefault();
                if($('#years').val() == null || $('#month').val() == null){
                    alert("choose needed data");
                }
                else{
                    $('#service-form').submit();    
                }

            });

            if(month){
                $('#month').val(month);  
            }

            if(year){
                $('#years').val(year);
            }

        });
    </script>

</body>

</html>
