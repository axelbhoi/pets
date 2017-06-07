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
                                Alerts
                            </h1>

                        </div>
                    </div>

                <div class = "row">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#existing" aria-controls="existing" role="tab" data-toggle="tab">Expiry Dates</a></li>
                    <li role="presentation"><a href="#newclient" aria-controls="newclient" role="tab" data-toggle="tab">Critical Level</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content" style = "padding:15px;">
                    <div role="tabpanel" class="tab-pane active" id="existing">
                        
                        <div class = "row">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="product-inventory-table">
                                                <thead >
                                                    <th>Code</th>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Expiry</th>
                                                </thead>                            

                                                <tbody>
                                                    <?php if($expiry):?>
                                                        <?php foreach($expiry as $expire):?>
                                                            <tr>
                                                                <td><?php echo $expire->inventory_id;?></td>
                                                                <td><?php echo $expire->inventory_name;?></td>
                                                                <td><?php echo $expire->item_quantity;?></td>
                                                                <td><?php echo $expire->item_expiry;?></td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </tbody>

                                            </table>
                                        <!-- /.table-responsive -->                                
                                        </div>  
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="newclient">
                        <div class = "row">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="level-table">
                                                <thead >
                                                    <th>Item Code</th>
                                                    <th>Item Name</th>
                                                    <th>Total Quantity</th>
                                                    <th>Critical Level</th>
                                                </thead>                            

                                                <tbody>
                                                    <?php if($levels):?>
                                                        <?php foreach($levels as $level):?>
                                                            <tr>
                                                                <td><?php echo $level->inventory_id;?></td>
                                                                <td><?php echo $level->inventory_name;?></td>
                                                                <td><?php echo $level->item_quantity;?></td>
                                                                <td><?php echo $level->level;?></td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </tbody>

                                            </table>
                                        <!-- /.table-responsive -->                                
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

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    
    <script type = "text/javascript">

        $('#alertsHeader').addClass('active');

        $(document).ready(function(){
            $('#product-inventory-table').DataTable({
                responsive: true,
                order: [[ 0, "asc" ]]
            });  

            $('#level-table').DataTable({
                responsive: true,
                order: [[ 0, "asc" ]]
            }); 

        });
    </script>

</body>

</html>













