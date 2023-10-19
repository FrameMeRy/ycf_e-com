<?php 
    require("Template/headre.php");
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

<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$p_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT p.*,t.type_name
FROM tbl_product as p 
INNER JOIN tbl_type as t ON p.type_id = t.type_id
WHERE p.p_id = '$p_id'
ORDER BY p.type_id asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>

  <div class="container-fluid">
    <div class="row ">
      <div class="col-12">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
            <form  name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12 mt-4">
             ชื่อสินค้า
            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" / value="<?php echo $p_name; ?>">
          </div>
        </div>
         <div class="form-group">
          <div class="col-sm-12">
            ประเภทสินค้า 
            <select name="type_id" class="form-control" required>
              <option value="<?php echo $row["type_id"];?>">
                <?php echo $row["type_name"]; ?>
              </option>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
             รายละเอียดสินค้า 
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="text" name="p_detail" id="p_detail"><?php echo $p_detail; ?></textarea>
          </div>
          </div>
          <div class="form-group">
          <div class="col-sm-12">
             ราคา
            <input type="text"  name="p_price" class="form-control" required placeholder="ราคา" / value="<?php echo $p_price; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
             จำนวน
            <input type="text"  name="p_qty" class="form-control" required placeholder="จำนวน" / value="<?php echo $p_qty; ?>">
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-12">
             ภาพสินค้า เดิม <br>
            <img src="p_pic/<?php echo $row['p_pic'];?>" width="100px">
            <br>
          </div>
        </div>

        <div class="form-group ">
              <div class="col-md-3"></div>
              <div class="col-md-12">
              ภาพสินค้า ใหม่ <br>
                <img  id="showimg" alt="" width="100" height="100">
                    <input type="file" class="form-control mt-2" id="showimg" name="p_pic"  accept="image/png, image/jpeg, image/gif " onchange="preview_image(event)">
              </div>
          </div>

        <div class="form-group  text-right">
          <div class="col-sm-12">
             <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
             <input type="hidden" name="img2" value="<?php echo $p_pic; ?>" />
             <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
             <a href="product.php" class="btn btn-info btn-danger btn-sm2">ยกเลิก</a>
          </div>
        </div>
      </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
  <?php 
require("Template/footer_copyright.php");
require("Template/footer.php"); 
?>
