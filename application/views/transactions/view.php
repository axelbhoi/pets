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
	                            Transactions&nbsp;<a href="<?php echo base_url();?>transactions/add" class="btn btn-primary" id="add-transaction"><i class="fa fa-plus"></i> New Transaction</a>
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
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Client Name</th>
                                        <th>Pet Name</th>
                                        <th>Remarks</th>
                                        <th>Total Amount</th>
                                        <th>Options</th>
                                    </thead>                            

                                    <tbody>
                                        <?php foreach($transactions as $transaction):?>
                                            <tr>
                                                <td><?php echo $transaction->created_at;?></td>
                                                <td><?php echo $transaction->employee_firstname;?>&nbsp;<?php echo $transaction->employee_lastname;?></td>
                                                <td>
                                                    <?php if($transaction->type == 1):?>
                                                        Walk-in
                                                    <?php else:?>
                                                        <?php echo $transaction->client_firstname.' '.$transaction->client_lastname;?>
                                                    <?php endif;?>
                                                </td>
                                                <td><?php echo $transaction->pet_name;?></td>
                                                <td><?php echo $transaction->remarks;?></td>
                                                <td><?php echo number_format($transaction->total_amount,2);?></td>
                                                <td>
                                                    <a href = "<?php echo base_url();?>transactions/history/<?php echo $transaction->id;?>"><i class="fa fa-history" aria-hidden="true"></i></a>

                                                    <a href = "<?php echo base_url();?>transactions/edit/<?php echo $transaction->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <?php if($this->session->userdata('user_type') == 1):?>
                                                        <a href = "#" transaction-id = "<?php echo $transaction->id;?>" class = "delete-transaction-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    <?php endif;?>

                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>

                                </table>
                            <!-- /.table-responsive -->
                          
                            <form id = "delete-transaction-form" action = "<?php echo base_url();?>transactions/delete" method = "POST">
                                <input type = "hidden" name = "transaction-id" id = "transaction-id">
                            </form>

                            <div id="warningModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header modal-header-warning">
                                    <h4 class="modal-title">Warning!!!</h4>
                                  </div>
                                  <div class="modal-body">
                                        <div class="alert alert-warning" role="alert"> 
                                            <strong>Opps!</strong> Are you sure you want to delete this transacton?
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type = "button" class = "btn btn-primary" data-dismiss="modal" id = "submit-btn">OK</button>
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

        $('#transactionHeader').addClass('active');
    
            $('#dataTables-example').DataTable({
                responsive: true,
                order: [[ 0, "desc" ]]
            });
    
        $(document).on('click','.delete-transaction-btn',function(e){
            e.preventDefault();

            $('#transaction-id').val($(this).attr('transaction-id'));

            $('#warningModal').modal('show');
        });
    
        $('#submit-btn').on('click',function(e){
            e.preventDefault();

            $('#delete-transaction-form').submit();
        });
    </script>
    
</body>

</html>













