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
	                            Transactions
	                        </h1>

	                    </div>
	                </div>

                <div class = "row">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#existing" aria-controls="existing" role="tab" data-toggle="tab">Existing</a></li>
                    <li role="presentation"><a href="#newclient" aria-controls="newclient" role="tab" data-toggle="tab">Products Only</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content" style = "padding:15px;">
                    <div role="tabpanel" class="tab-pane active" id="existing">
                        <form role="form" method = "POST" action = "<?php echo base_url();?>transactions/add" id = "transactions-form">
                        <input type = "hidden" name = "quantities"  id = "inventory_total_quantities" />
                        <input type = "hidden" name = "pet-id" id = "pet-id">
                        <input type = "hidden" name = "total-amount" id = "total-amount">
                        <input type = "hidden" name = "transaction-type" value = "0">
                            <div class="form-group">
                              <label>Client Name</label>
                                <?php if($clients):?>
                                      <select class="form-control" name = "client_name" id = "client_name">
                                        <option value = "">--Select Client--</option>
                                        <?php foreach($clients as $client):?>
                                            <option value = "<?php echo $client->id;?>"><?php echo $client->client_firstname." ".$client->client_lastname;?></option>
                                        <?php endforeach;?>
                                      </select>
                                <?php else:?>
                                <?php endif;?>
                            </div>

                            <div class = "form-group">
                                <label>Pets Name</label>
                                <select class = "form-control" name = "pets_name" id = "pets_name">
                                    
                                </select>
                                <label class = "selected_pets">Selected Pets: <span class = "selected_pets_section"></span></label>
                            </div>
                        
                            <div class = "row">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style = "padding:15px;">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Services Offered
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead >
                                                    <th>Grooming Name</th>
                                                    <th>Details</th>
                                                    <th>Pet Size</th>
                                                    <th>Amount of Service</th>
                                                    <th>Options</th>
                                                </thead>                            

                                                <tbody>
                                                    <?php foreach($services as $service):?>
                                                        <tr>
                                                            <td><?php echo $service->service_name;?></td>
                                                            <td><?php echo $service->service_details;?></td>
                                                            <td><?php echo $service->service_size;?></td>
                                                            <td><?php echo $service->service_amount;?></td>
                                                            <td class = "center-icons">
                                                                <a href = "#" class = "btn btn-success service-add" value = "<?php echo $service->service_amount?>" service-id = "<?php echo $service->id;?>" service-size = "<?php echo $service->service_size;?>" service-name = "<?php echo $service->service_name;?>" service-amount = "<?php echo $service->service_amount;?>">Add Service</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                </tbody>

                                            </table>
                                        <!-- /.table-responsive -->                                
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Products/Items
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="inventory-table">
                                                <thead >
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Item Expiry</th>
                                                    <th>Price</th>
                                                    <th>Add Item</th>
                                                </thead>                            

                                                <tbody>
                                                    <?php foreach($items as $item):?>                               
                                                        <tr>
                                                            <td><?php echo $item->inventory_name;?></td>
                                                            <td><?php echo $item->item_quantity;?></td>
                                                            <td><?php echo $item->item_expiry?></td>
                                                            <td><?php echo $item->inventory_unit;?></td>
                                                            <td class = "center-icons">
                                                                <div class="input-group">
                                                                  <input type="text" class="form-control numbersOnly" id = "item-input<?php echo $item->id;?>" placeholder="Input Quantity" value = ""/>
                                                                  <span class="input-group-btn">
                                                                    <button class="btn btn-secondary btn-success item-add" item-id = "<?php echo $item->id;?>" item-quantity = "<?php echo $item->item_quantity;?>" item-price = "<?php echo $item->inventory_unit;?>" item-name = "<?php echo $item->inventory_name;?>" item-expiry = "<?php echo $item->item_expiry;?>"type="button" item-quantity-holder = "0">Add Item</button>
                                                                  </span>
                                                                </div>                                                    

                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                </tbody>

                                            </table>
                                        <!-- /.table-responsive -->                                
                                        </div>                            
                                      </div>
                                    </div>
                                  </div>

                                  <div class = "panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Transaction/s
                                        </a>
                                      </h4>
                                    </div>   

                                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                      <div class="panel-body">
                                        
                                            <!-- Services -->
                                            <div class = "col-md-12">
                                                <div class="panel panel-default"> 
                                                    <div class="panel-heading">Services</div> 
                                                    <table class="table table-striped table-bordered table-hover"> 
                                                        <thead>
                                                            <tr> 
                                                                <th>Service Name</th> 
                                                                <th>Pet Size</th>
                                                                <th>Price</th> 
                                                                <th></th> 
                                                            </tr> 
                                                        </thead> 
                                                        <tbody id = "service-tbody"> 


                                                            <tr>
                                                                <td colspan = "2">Total:</td>
                                                                <td ><span id = "service-total"></span></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody> 
                                                    </table> 
                                                </div>                            
                                            </div>
                                            <!-- Items -->

                                            <div class = "col-md-12" style = "margin-top:20px">
                                                <div class="panel panel-default"> 
                                                    <div class="panel-heading">Items</div> 
                                                    <table width="100%" class="table table-striped table-bordered table-hover"> 
                                                        <thead>
                                                            <tr> 
                                                                <th>Item Name</th>
                                                                <th>Quantity</th> 
                                                                <th>Expiry Date</th>
                                                                <th>Price</th> 
                                                                <th></th> 
                                                            </tr> 
                                                        </thead> 
                                                        <tbody id = "item-tbody"> 

                                                            <tr>
                                                                <td>Total:</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><span id = "items-total"></span></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody> 
                                                    </table> 

                                                    <h4 style = "padding-left:10px;padding-right:10px">Total:<span id = "all-total" class = "pull-right">0.00</span></h4>

                                                    <div class="form-group" style = "padding-left:10px;padding-right:10px">
                                                      <label>Remarks</label>
                                                      <textarea name = "remarks" style = "resize:none;height:150px" class = "form-control"></textarea>
                                                    </div>

                                                </div>                            
                                            </div>

                                            <button class = "btn btn-primary" style = "margin-top:20px;margin-bottom:5px;width:100%" id = "confirm-btn">Confirm</button>
                                            <a href = "<?php echo base_url();?>transactions" class = "btn btn-danger" style = "margin-bottom:5px;width:100%" id = "cancel-btn">Cancel</a>  

                                        </form>    
                                      </div>
                                    </div>

                                  </div>

                                </div>
                            </div>

                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="newclient">
                        <form role="form" method = "POST" action = "<?php echo base_url();?>transactions/add" id = "product-transactions-form">
                            <input type = "hidden" name = "transaction-type" value = "1">
                            <input type = "hidden" name = "total-amount" id = "product-total-amount">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="product-inventory-table">
                                                <thead >
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Item Expiry</th>
                                                    <th>Price</th>
                                                    <th>Add Item</th>
                                                </thead>                            

                                                <tbody>
                                                    <?php foreach($items as $item):?>                               
                                                        <tr>
                                                            <td><?php echo $item->inventory_name;?></td>
                                                            <td><?php echo $item->item_quantity;?></td>
                                                            <td><?php echo $item->item_expiry;?></td>
                                                            <td><?php echo $item->inventory_unit;?></td>
                                                            <td class = "center-icons">
                                                                <div class="input-group">
                                                                  <input type="text" class="form-control numbersOnly" id = "product-item-input<?php echo $item->id;?>" placeholder="Input Quantity" value = ""/>
                                                                  <span class="input-group-btn">
                                                                    <button class="btn btn-secondary btn-success product-item-add" item-id = "<?php echo $item->id;?>" item-quantity = "<?php echo $item->item_quantity;?>" item-price = "<?php echo $item->inventory_unit;?>" item-name = "<?php echo $item->inventory_name;?>" item-expiry = "<?php echo $item->item_expiry;?>"  type="button" product-item-quantity-holder = "0">Add Item</button>
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
                                                                <th>Expiry Date</th>
                                                                <th>Price</th> 
                                                                <th></th> 
                                                            </tr> 
                                                        </thead> 
                                                        <tbody id = "product-item-tbody"> 

                                                            <tr>
                                                                <td>Total:</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><span id = "product-items-total"></span></td>
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
                  </div>

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


                            <div id="deleteSelectedPet" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-warning">
                                    <h4 class="modal-title">Warning!!!</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-warning" role="alert"> 
                                            <strong>Opps!</strong> Do you want to remove selected pet?.
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type = "button" class = "btn btn-primary" id = "remove-pet-btn" pet-id = "">OK</button>
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

    <script src="<?php echo base_url();?>vendor/custom/transactions.js"></script>
    
    <script type = "text/javascript">
        var pets = '<?php echo json_encode($pets)?>';

        var items = '<?php echo json_encode($items)?>';

        $('#transactionHeader').addClass('active');
    </script>

</body>

</html>













