        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Dogs N Us, Pet Supplies & Vet Clinic, Inc.</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id = "profileHeader">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url();?>profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?php echo base_url();?>profile/change_password"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if($this->session->userdata('user_type') == 1):?>
                            <li >
                                <a href="<?php echo base_url();?>dashboard" >Dashboard</a>
                            </li>
                        <?php endif;?>
                        <li>
                            <a href="transactionHeader">Transactions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>transactions">View</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>transactions/add">Add</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#" id = "clientHeader"></i>Clients<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>clients">View</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>clients/add">Add</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#" id = "inventoryHeader"></i>Inventory<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>inventory">View</a>
                                </li>
                                <?php if($this->session->userdata('user_type') == 1):?>
                                    <li>
                                        <a href="<?php echo base_url();?>inventory/add">Add</a>
                                    </li>
                                <?php endif;?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#" id = "servicesHeader">Services<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>services">View</a>
                                </li>
                                <?php if($this->session->userdata('user_type') == 1):?>
                                    <li>
                                        <a href="<?php echo base_url();?>services/add">Add</a>
                                    </li>
                                <?php endif;?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php if($this->session->userdata('user_type') == 1):?>
                            <li>
                                <a href="#" id = "suppliersHeader">Suppliers<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url();?>suppliers">View</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>suppliers/add">Add</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        <?php endif;?>

                        <li>
                            <a href="<?php echo base_url();?>schedule" id = "schedulesHeader">Schedule</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>sms" id = "smsHeader">SMS</a>
                        </li>                        
                        <?php if($this->session->userdata('user_type') == 1):?>
                            <li>
                                <a href="#" id = "reportsHeader">Reports<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url();?>reports/services_report">Services Report</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url();?>reports/sales_report">Sales Report</a>
                                    </li> 

                                    <li>
                                        <a href="<?php echo base_url();?>reports/inventory_report">Inventory Report</a>
                                    </li> 

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        <?php endif;?>
                        <li>
                        <?php 
                            $expiry = count($this->commonmodel->alertExpiry());

                            $level = count($this->commonmodel->alertLevel());
                        
                            $aTotal = $expiry + $level;
                        ?>
                            <?php if($aTotal == 0):?>
                                <a href="<?php echo base_url();?>alerts" id = "alertsHeader">Alerts</a>
                            <?php else:?>
                                <a href="<?php echo base_url();?>alerts" id = "alertsHeader">Alerts <i class="fa fa-bell pull-right" style = "color:#FF0000"></i></a>
                            <?php endif;?>
                            
                        </li>  

                        <?php if($this->session->userdata('user_type') == 1):?>
                            <li>
                                <a href="#" id = "employeeHeader">Employees<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url();?>employees">View</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>employees/add">Add</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        <?php endif;?>
                        
                        <?php if($this->session->userdata('user_type') == 1):?>
                            <li>
                                <a href="#" id = "operatingHeader">Operating Expense<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                <li>
                                    <a href = "<?php echo base_url();?>expenses/lists">Expense Lists</a>
                                </li>
                                <?php
                                    $lists = $this->commonmodel->getAll('operating_expense_list');
                                ?>

                                <?php foreach($lists as $list):?>
                                    <li>
                                        <a href="<?php echo base_url();?>expenses/<?php echo str_replace(' ','_',$list->operating_expense_name);?>"><?php echo $list->operating_expense_name;?></a>
                                    </li>
                                <?php endforeach;?>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        <?php endif;?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>