<?php 
    require("Template/headre.php");
    include("condb.php");
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);

    
?>
        <script>
function preview_image(event) 
        {
             var reader = new FileReader();
             reader.onload = function()
             {
                  var output = document.getElementById('showimg');
                  output.src = reader.result;
             }
             reader.readAsDataURL(event.target.files[0]);
        }
        </script>

<div class="container-fluid">

<?php
    error_reporting( error_reporting() & ~E_NOTICE );
?>
        <!-- เพิ่มสินค้า -->
         <div ALIGN ="right">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter1">เพิ่มสินค้า</button></p>
        </div>  

<!-- Modal1 -->
<div class="modal fade col-12" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">สมัครสมาชิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">

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

    <div class="form-group row">
        <div class="col-md-3"></div>
        <div class="col-md-12">
            รูปภาพปก <font color="red">(ขนาดที่แนะนำ 1024 x 768 px)</font> <br>
            <img  id="showimg" alt="" width="213.99" height="160.49">
                <input type="file" class="form-control mt-2" id="showimg" name="p_pic" required accept="image/png, image/jpeg, image/gif " onchange="preview_image(event)">
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

        <div class="row">

                    <div class="col-12">

                    
                        <!-- Earnings (Monthly) Card Example -->
                            
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php include('product_list.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    </div>
                    <br>
    </div>

<?php 
require("Template/footer_copyright.php");
require("Template/footer.php"); 
?>



 