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

        <?php echo $this->load->view('header');?>

        <div id="page-wrapper">
	                <div class="row" style = "margin-left:0px;margin-right:0px">
	                    <div class="col-xs-12" style = "padding:0px">
	                        <h1 class="page-header">
	                            <?php echo $clients[0]->client_name.' Detailed History';?>
	                        </h1>

	                    </div>
	                </div>

                    <div class = "row" style = "margin-left:0px;margin-right:0px">
                        <h1>Transaction ID No. <?php echo $transactions[0]->id;?></h1>
                        <h4>Employee: <?php echo $transactions[0]->employee_firstname.' '.$transactions[0]->employee_lastname;?></h4>
                        <?php if($transactions[0]->remarks != ""):?>
                            <h4>Remarks: <?php echo $transactions[0]->remarks;?></h4>
                        <?php endif;?>
                        <h4>Total Amount: <?php echo $transactions[0]->total_amount;?></h4>
                        <h4>Transaction Date: <?php echo $transactions[0]->created_at;?></h4>
                    </div>

                    <?php if($services):?>
                        <h1>Services Acquired:</h1>
                        <h4>Pets: <?php echo $clients[0]->pet_name;?></h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" >
                                            <thead >
                                                <th>Service Name</th>
                                                <th>Service Size</th>
                                                <th>Service Amount</th>
                                            </thead>                            

                                            <tbody>
                                                <?php foreach($services as $service):?>
                                                    <tr>
                                                        <td><?php echo $service->service_name;?></td>
                                                        <td><?php echo $service->service_size;?></td>
                                                        <td><?php echo $service->service_amount;?></td>
                                                    </tr>
                                                <?php endforeach;?>

                                                    <tr>
                                                        <td colspan = "2">Total:</td>
                                                        <td ><span id = "service-total"><?php echo $total_service;?></span></td>
                                                    </tr>

                                            </tbody>

                                        </table>
                                        <!-- /.table-responsive -->

                                        <form id = "delete-clients-form" role = "form" action = "<?php echo base_url();?>clients/delete" method = "POST">
                                            <input type = "hidden" name = "clients_to_delete" id = "clients_to_delete"/>
                                        </form>

                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>

                    <?php endif;?>


                    <?php if($items):?>
                        <h1>Items Acquired</h1>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" >
                                            <thead >
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>
                                                <th>Item Price</th>
                                            </thead>                            

                                            <tbody>
                                                <?php foreach($items as $item):?>
                                                    <tr>
                                                        <td><?php echo $item->inventory_name;?></td>
                                                        <td><?php echo $item->inventory_quantity;?></td>
                                                        <td><?php echo $item->inventory_price;?></td>
                                                    </tr>
                                                <?php endforeach;?>

                                                    <tr>
                                                        <td colspan = "2">Total:</td>
                                                        <td ><span id = "service-total"><?php echo $total_items;?></span></td>
                                                    </tr>

                                            </tbody>

                                        </table>
                                        <!-- /.table-responsive -->

                                        <form id = "delete-clients-form" role = "form" action = "<?php echo base_url();?>clients/delete" method = "POST">
                                            <input type = "hidden" name = "clients_to_delete" id = "clients_to_delete"/>
                                        </form>

                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>

                    <?php endif;?>
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
    <script>
    $(document).ready(function() {
        var clients = [];

        $('#clientHeader').addClass('active');

    });
    </script>

</body>

</html>













