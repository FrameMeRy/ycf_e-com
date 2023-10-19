<?php 
    require("Template/headre.php");
    include("condb.php");
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);

    
?>

<?php
    error_reporting( error_reporting() & ~E_NOTICE );
?>
 
    <div class="container">
        <div class="row">
            <div class="col-5">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-12 col-md-6 mb-1">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">

                                        <h4 class="m-0 font-weight-bold text-primary">เพิ่มสินค้า</h4></p><hr>
                                        <form  name="addproduct" action="Product_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">

                                        <!-- เลขบาร์โค้ด -->
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                เลขบาร์โค้ด
                                                <input type="number"  name="p_bar" class="form-control" required placeholder="ชื่อสินค้า" />
                                            </div>
                                        </div>

                                            <!-- ชื่อสินค้า -->
                                            <div class="form-group row">
                                                <div class="col-12">
                                                     ชื่อสินค้า
                                                    <input type="text" name="p_name" class="form-control " required placeholder="ชื่อสินค้า" />
                                                </div>
                                            </div>

                                            <!-- ประเภทสินค้า -->
                                            <div class="form-group row">
                                                <div class="col-sm-6 mt-2">
                                                     ประเภทสินค้า  
                                                </div>

                                                <div class="col-sm-6 text-right">
                                                    <a class="btn btn-primary " href="type.php" role="button">เพิ่มประเภทสินค้า</a>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
   
                                                        <select name="type_id" id="type_id" class="form-control" required>
                                                            <option value="type_id">
                                                                ประเภทสินค้า
                                                            </option>
                                                                <?php foreach($result as $results){?>
                                                                    <option value="<?php echo $results["type_id"];?>">
                                                                        <?php echo $results["type_name"]; ?>
                                                                    </option>
                                                                <?php } ?>
                                                        </select>
                                                </div>
                                            </div>

                                            <!-- รายละเอียดสินค้า -->
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                     รายละเอียดสินค้า 
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" type="text" name="p_detail" id="p_detail"required></textarea>
                                                </div>
                                            </div>

                                            <!-- ภาพประจำตัว -->
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">ภาพสินค้า</label>
                                                        <div class="input-group mb-3">
                                                            <input name="p_img" id="p_img" type="file" class="form-control" id="inputGroupFile01">
                                                        </div>
                                                </div>
                                            </div>

                                            <!-- ราคา-->
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    ราคา
                                                    <input type="text"  name="p_price" class="form-control" required placeholder="ราคา" />
                                                </div>
                                            </div>

                                            <!-- จำนวน-->
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    จำนวน
                                                    <input type="text"  name="p_qty" class="form-control" required placeholder="จำนวน" />
                                                </div>
                                            </div>

                                            <!-- บันทึกข้อมูล -->
                                            <div class="form-group text-right">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-success text-right" name="btnadd"> บันทึก </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <?php
                        $act = $_GET['act'];
                        if($act == 'add'){
                        include('product_form_add.php');
                        }elseif ($act == 'edit') {
                        include('product_form_edit.php');
                        }
                        ?>
                    </div>

            </div>

            
                    <div class="col-7">

                    
                        <!-- Earnings (Monthly) Card Example -->
                            
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php include('product_list1.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    </div>
                    

        </div>
        <?php require("Template/footer_copyright.php");?>
    </div>

<?php 
require("Template/footer.php"); 
?>



 