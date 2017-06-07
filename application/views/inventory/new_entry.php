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

    <!-- Date Picker -->
    <link href="<?php echo base_url();?>vendor/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

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

              <div class="row">
                  <hr class="hr-primary" style = "height: 4px;margin-left: 15px;margin-bottom:-3px;">
                  <ol class="breadcrumb bread-primary " style = "background-color: #ffffff !important" >
                    <button href="#" class="btn btn-primary"><i class="fa fa-home"></i> Home</button>
                      <li><a href="<?php echo base_url();?>inventory">Inventory</a></li>
                      <li class="active">New Entry for <?php echo $code[0]->inventory_name;?></li>
                  </ol>
              </div>

	                <div class="row" style = "margin-left:0px;margin-right:0px">
	                    <div class="col-xs-12" style = "padding:0px">
	                        <h1 class="page-header">
	                            <?php echo $code[0]->inventory_name;?>&nbsp;<?php if($this->session->userdata('user_type') == 1):?><a href="#" class="btn btn-primary" id="add-inventory"><i class="fa fa-plus"></i> Add Item</a>&nbsp;<a href="#" class="btn btn-primary" id="delete-items"><i class="fa fa-trash"></i> Delete Item/s</a><?php endif;?>
	                        </h1>

	                    </div>
	                </div>

           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            						<thead >
            							<th>Item Name</th>
                          <th>Quantity</th>
                          <th>Expiry Date</th>
                          <?php if($this->session->userdata('user_type') == 1):?>
            							   <th>Options</th>
                          <?php endif;?>
            						</thead>	                		

            						<tbody>
                          <?php if($items):?>
                            <?php foreach($items as $item):?>
          										<tr>
                                  <td><?php echo $item->inventory_name;?></td>
                                  <td><?php echo $item->item_quantity;?></td>
                                  <td><?php echo $item->item_expiry;?></td>
                                    <?php if($this->session->userdata('user_type') == 1):?>
                                        <td class = "center-icons">

                                            <a href = "#" class = "edit-entries-btn" id = "<?php echo $item->id;?>" item-quantity = "<?php echo $item->item_quantity;?>" item-expiry = "<?php echo $item->item_expiry;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                                
                                          <input type = "checkbox" name = "inventory-item[]" value = "<?php echo $item->id;?>" class = "inventory-item">

                                        </td>
                                    <?php endif;?>
          										</tr>
                            <?php endforeach;?>
                          <?php endif;?>
            						</tbody>

                      </table>
                            <!-- /.table-responsive -->
                            <div id="deleteModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-alert">
                                    <h4 class="modal-title">Delete Item/s</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-danger" role="alert"> 
                                            <strong>Are you sure?</strong> Item/s will be deleted. 
                                        </div>

                                        <form id = "delete-items-form" role = "form" action = "<?php echo base_url();?>inventory/entries_delete" method = "POST">
                                            <input type = "hidden" name = "items_to_delete" id = "items_to_delete"/>
                                            <input type = "hidden" name = "inventory_id" value = "<?php echo $code[0]->id;?>">
                                        </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id = "deleteItem">Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
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
                                            <strong>Opps!</strong> Please Select an Item to Delete.
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>


                            <div id="addModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Add Item</h4>
                                  </div>
                                  <div class="modal-body">

                                  <div class="alert alert-danger alert-dismissible fade in alert-class" style = "display:none"role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Oh Snap!</strong> Both Quantity and Expiry Date are required.
                                  </div>

                                    <form role="form" method = "POST" action = "<?php echo base_url();?>inventory/entries/<?php echo $code[0]->id;?>" id = "item-form">

                                     <div class="form-group">
                                        <label >Quantity</label>

                                        <input type="text" class="form-control numbersOnly" id="item_quantity" name = "item_quantity" placeholder="Quantity">

                                        <input type = "hidden" value = "<?php echo $code[0]->id;?>" name = "inventory_id">
                                     </div>


                                    <div class="form-group">
                                        <label>Expiration Date</label>
                                          <select class="form-control" name = "expiration_date" id = "expiration_date">
                                            <option value = "none">None</option>
                                            <option value = "0">Choose Date</option>
                                          </select>
                                    </div>  

                                    <div class="form-group" id = "expiry_date">
                                      <label for="name">Expiry Date</label>
                                                      <div class='input-group date datepicker'>
                                                          <input type='text' class="form-control" name = "item_expiry" id = "item_expiry"/>
                                                          <span class="input-group-addon">
                                                              <span class="glyphicon glyphicon-calendar"></span>
                                                          </span>
                                                      </div>
                                    </div>
                                    </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type = "button" class = "btn btn-primary" id = "add-btn">Confirm</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>


                            <div id="editModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id = "edit-modal-title"></h4>
                                  </div>
                                  <div class="modal-body">

                                  <div class="alert alert-danger alert-dismissible fade in alert-class" style = "display:none"role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Oh Snap!</strong> Both Quantity and Expiry Date are required.
                                  </div>

                                    <form role="form" method = "POST" action = "<?php echo base_url();?>inventory/entries/edit/<?php echo $code[0]->id;?>" id = "edit-item-form">

                                     <div class="form-group">
                                        <label >Quantity</label>

                                        <input type="text" class="form-control numbersOnly" id="edit_item_quantity" name = "edit_item_quantity" placeholder="Quantity">

                                        <input type = "hidden" value = "<?php echo $code[0]->id;?>" name = "edit_inventory_id">

                                        <input type = "hidden" value = "" name = "item-id" id = "edit-item-id">
                                     </div>

                                    <div class="form-group">
                                        <label>Expiration Date</label>
                                          <select class="form-control" name = "expiration_date" id = "edit_expiration_date">
                                            <option value = "none">None</option>
                                            <option value = "0">Choose Date</option>
                                          </select>
                                    </div>

                                    <div class="form-group" id = "edit_expiry_date">
                                      <label for="name">Expiry Date</label>
                                                      <div class='input-group date datepicker'>
                                                          <input type='text' class="form-control" name = "edit_item_expiry" id = "edit_item_expiry"/>
                                                          <span class="input-group-addon">
                                                              <span class="glyphicon glyphicon-calendar"></span>
                                                          </span>
                                                      </div>
                                    </div>
                                    </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type = "button" class = "btn btn-primary" id = "edit-btn">Confirm</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->	                
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

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>vendor/custom/newinventory.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>
