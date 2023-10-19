<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

?>

<script type='text/javascript'>
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

<div class="container">
  <div class="row">
      <form  name="addproduct" action="Product_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group row">
          <div class="col-sm-12 mt-4">
             ชื่อสินค้า
            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
             เลขบาร์โค้ด
            <input type="number"  name="p_bar" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm12">
            ประเภทสินค้า 
            <select name="type_id" class="form-control" required>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
             รายละเอียดสินค้า 
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="text" name="p_detail" id="p_detail"required></textarea>

          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
             ราคา
            <input type="text"  name="p_price" class="form-control" required placeholder="ราคา" />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
             จำนวน
            <input type="text"  name="p_qty" class="form-control" required placeholder="จำนวน" />
          </div>
        </div>
        <div class="form-group row">
          
          <div class="col-sm-12">
           ภาพสินค้า 
            <input type="file" name="p_pic" id="p_pic" class="form-control" />
          </div>

          <div class="form-group row">
              <div class="col-md-3"></div>
              <div class="col-md-12">
                รูปภาพปก <font color="red">(ขนาดที่แนะนำ 1024 x 768 px)</font> <br>
                <img  id="showimg" alt="" width="213.99" height="160.49">
                    <input type="file" class="form-control mt-2" id="showimg" name="b_img" required accept="image/png, image/jpeg, image/gif " onchange="preview_image(event)">
              </div>
          </div>


        </div>
        <div class="form-group row text-right">
          <div class="col-sm-12">
          <a href="product.php" class="btn btn-info btn-danger btn-sm2">ยกเลิก</a>
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            </p>
            
          </div>
        </div>
      </form>
    </div>
  </div>