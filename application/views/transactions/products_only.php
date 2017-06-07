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
                                Edit Transaction ID No. <?php echo $transactions[0]->id;?>
                            </h1>

                        </div>
                    </div>

                <div class = "row">
                        <form role="form" method = "POST" action = "<?php echo base_url();?>transactions/edit/<?php echo $transactions[0]->id;?>" id = "product-transactions-form">
                            <input type = "hidden" name = "transaction-type" value = "1">
                            <input type = "hidden" name = "total-amount" id = "product-total-amount">
                            <input type = "hidden" name = "transaction-id" value = "<?php echo $transactions[0]->id;?>">

                            <div class = "remove-previous-items">

                            </div>

                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="product-inventory-table">
                                                <thead >
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Add Item</th>
                                                </thead>                            

                                                <tbody>
                                                    <?php foreach($items as $item):?>                               
                                                        <tr>
                                                            <td><?php echo $item->inventory_name;?></td>
                                                            <td><?php echo $item->item_quantity;?></td>
                                                            <td><?php echo $item->inventory_unit;?></td>
                                                            <td class = "center-icons">
                                                                <div class="input-group">
                                                                  <input type="text" class="form-control numbersOnly" id = "product-item-input<?php echo $item->id;?>" placeholder="Input Quantity" value = ""/>
                                                                  <span class="input-group-btn">
                                                                    <button class="btn btn-secondary btn-success product-item-add" item-id = "<?php echo $item->id;?>" item-quantity = "<?php echo $item->item_quantity;?>" item-price = "<?php echo $item->inventory_unit;?>" item-name = "<?php echo $item->inventory_name;?>" type="button" product-item-quantity-holder = "0">Add Item</button>
                                                                  </span>
                                                                </div>                                                    

                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                </tbody>

                                            </table>
                                        <!-- /.table-responsive -->                                
                                        </div>      

                                            <div class = "col-md-12" style = "margin-top:20px">
                                                <div class="panel panel-default"> 
                                                    <div class="panel-heading">Items</div> 
                                                    <table class="table table-striped table-bordered table-hover"> 
                                                        <thead>
                                                            <tr> 
                                                                <th>Item Name</th>
                                                                <th>Quantity</th> 
                                                                <th>Price</th> 
                                                                <th></th> 
                                                            </tr> 
                                                        </thead> 
                                                        <tbody id = "product-item-tbody"> 
                                                            <?php foreach($products as $product):?>
                                                                <tr class = 'product-item-row'>
                                                                    <td><?php echo $product->inventory_name;?></td>
                                                                    <td><?php echo $product->inventory_quantity;?></td>
                                                                    <td><?php echo $product->inventory_price;?></td>
                                                                    <td>
                                                                        <a href = '#' class = 'btn btn-warning product-remove-item-btn' item-id = "<?php echo $product->id;?>" item-quantity = "<?php echo $product->inventory_quantity;?>" item-price = "<?php echo $product->inventory_price;?>" old-item = "1" >Remove Item</a>         
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                            <tr>
                                                                <td>Total:</td>
                                                                <td></td>
                                                                <td><span id = "product-items-total"><?php echo $transactions[0]->total_amount;?></span></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody> 
                                                    </table> 

                                                   
                                                </div>                            
                                            </div>

                                            <button class = "btn btn-primary" style = "margin-top:20px;margin-bottom:5px;width:100%" id = "product-confirm-btn">Confirm</button>
                                            <a href = "<?php echo base_url();?>transactions" class = "btn btn-danger" style = "margin-bottom:5px;width:100%" id = "cancel-btn">Cancel</a>  
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
                                            <strong>Opps!</strong> <span id = "warningText">Pet has already been Selected.</span>
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

    <script src="<?php echo base_url();?>vendor/custom/products.js"></script>
    
    <script type = "text/javascript">

        var items = '<?php echo json_encode($items)?>';
        var product_existing_total_items = '<?php echo $transactions[0]->total_amount?>';

        $('#transactionHeader').addClass('active');
    </script>

</body>

</html>













