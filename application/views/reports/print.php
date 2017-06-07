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

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/styles.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <div class = "container">
            <table class="table table-hover">
            <thead>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Item Critical Level</th>
                <th>Item Quantity</th>
                <th>Item Price</th>
                <th>Item Expiry</th>
            </thead>
            <tbody>
                <?php if($prints):?>
                    <?php foreach($prints as $print):?>
                        <tr>
                            <td><?php echo $print->id;?></td>
                            <td><?php echo $print->inventory_name;?></td>
                            <td><?php echo $print->inventory_level;?></td>
                            <td><?php echo $print->item_quantity;?></td>
                            <td><?php echo $print->inventory_unit;?></td>
                            <td><?php echo $print->item_expiry;?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
            </tbody>
            </table>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script type = "text/javascript">
        $(document).ready(function(){


        });
    </script>

</body>

</html>
