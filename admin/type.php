<?php 
                require("Template/headre.php"); 
                require("condb.php");
                
            ?>
    <?php  
            error_reporting( error_reporting() & ~E_NOTICE );
        ?>
 
        <body>
            <div class="container">
                <p></p>
                    <div class="row">
                        <div class="col-4">
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h5 class="m-0 font-weight-bold text-primary">ประเภทสินค้าทั้งหมด</h5>
                                    </div>
                                        <div>
                                            <?php
                                            $act = $_GET['act'];
                                            if($act == 'edit'){
                                            include('type_form_edit.php');
                                            }elseif ($act == 'add') {
                                            include('type_form_add.php');
                                            } else  {
                                                include('type_form_add.php');
                                                }
                                            
                                            ?>
                                        </div>
                                </div>
                            </div>

                            <div class="col-8">

                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">ประเภทสินค้าทั้งหมด</h5>
                            </div>
                            
                            <div class="card-body">
                            <?php include('type_list.php'); ?>
                            </div>
                        </div>
                                </div>
                            </div>       
                        </div>



                </div>
                <?php include('template/footer_copyright.php');?>
                <?php include('template/footer.php');?>