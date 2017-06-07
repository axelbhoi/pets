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

        <?php echo $this->load->view('header');?>

        <div id="page-wrapper">
	                <div class="row" style = "margin-left:0px;margin-right:0px">
	                    <div class="col-xs-12" style = "padding:0px">
	                        <h1 class="page-header">
	                            Transaction Details of Transaction ID No. <?php echo $transactions[0]->id;?>
	                        </h1>

	                    </div>
	                </div>
                    <?php 
                        $pet_n = array();
                        $pet_b = array();
                        foreach($clients as $client){
                            array_push($pet_n,$client->pet_name);
                            array_push($pet_b,$client->pet_breed);
                        }
                    ?>
                    <div class="row" style = "margin-left:0px;margin-right:0px;margin-bottom:15px;">
                        <h3>Client Name: <?php echo $clients[0]->client_firstname.' '.$clients[0]->client_lastname;?></h3>
                        <h3>Pet/s: <?php echo implode(',',$pet_n);?></h3>
                        <h3>Pet Breed/s: <?php echo implode(',',$pet_b);?></h3>
                    </div>

                    <div class="row" style = "margin-left:0px;margin-right:0px">
                        <?php if($services):?>
                           <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead >
                                    <th>Date</th>
                                    <th>Employee</th>
                                    <th>Service Name</th>
                                    <th>Service Details</th>
                                    <th>Service Price</th>
                                </thead>   
                                <tbody>
                                    <?php   $total_services = 0;
                                            foreach($services as $service):?>
                                        <tr>
                                            <td><?php echo $service->created_at;?></td>
                                            <td><?php echo $service->employee_firstname;?>&nbsp;<?php echo $service->employee_lastname;?></td>
                                            <td><?php echo $service->service_name;?></td>
                                            <td><?php echo $service->service_details;?></td>
                                            <td><?php echo number_format($service->service_amount,2);
                                                $total_services = $total_services + $service->service_amount;?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <td><span style = "font-weight: bold">TOTAL:</span></td>
                                        <td colspan = "3"></td>
                                        <td><span class = "pull-left" style = "font-weight:bold"><?php echo number_format($total_services,2);?></span></td>
                                    </tr>
                                </tbody>                             
                            </table>
                        <?php endif;?>
                    </div>

                     <div class="row" style = "margin-left:0px;margin-right:0px">
                        <h3>Items Bought:</h3>
                        <?php if($items):?> 
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead >
                                    <th>Date</th>
                                    <th>Employee</th>
                                    <th>Item Name</th>
                                    <th>Item Quantity</th>
                                    <th>Item Price</th>
                                    <th>Sub-Total</th>
                                </thead>   
                                <tbody>
                                    <?php   $total_items = 0;
                                            foreach($items as $item):?>
                                        <tr>
                                            <td><?php echo $item->created_at;?></td>
                                            <td><?php echo $item->employee_firstname;?>&nbsp;<?php echo $item->employee_lastname;?></td>
                                            <td><?php echo $item->inventory_name;?></td>
                                            <td><?php echo $item->quantity;?></td>
                                            <td><?php echo $item->inventory_price;?></td>
                                            <td><?php echo number_format( ($item->inventory_price * $item->quantity) ,2); 
                                                $total_items = $total_items + ($item->inventory_price * $item->quantity);?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <td><span style = "font-weight: bold">TOTAL:</span></td>
                                        <td colspan = "4"></td>
                                        <td><span class = "pull-left" style = "font-weight:bold"><?php echo number_format($total_items,2)?></span></td>
                                    </tr>
                                </tbody>                             
                            </table>
                        <?php endif;?>
                           
                        <h3>Total Amount:<span class = "pull-right"><?php echo $transactions[0]->total_amount;?></span></h3>
                            <a href = "<?php echo base_url();?>transactions" class = "btn btn-default" style = "margin-bottom:5px;width:100%" id = "cancel-btn">Back to Transactions Table</a> 

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
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    
    <script type = "text/javascript">

        $('#transactionHeader').addClass('active');
    </script>

</body>

</html>













