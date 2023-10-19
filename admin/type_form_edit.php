<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$type_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_type WHERE type_id='$type_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
  <div class="col mr-2">
      <h5 class="card-header">แก้ไข ข้อมูลประเภทสินค้า</h5>
  </div>

<div class="container">
  <p> </p>
    <div class="row">
      <div class="col-md-12">
        <form  name="admin" action="type_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
          <input type="hidden" name="type_id" value="<?php echo $type_id; ?>" />
          <div class="form-group">
            <div class="col-sm-12" align="left">
              <input  name="type_name" type="text" required class="form-control" id="type_name" value="<?=$type_name;?>"  minlength="2"  />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12" align="right">
              <a href="type.php?act=add" class="btn btn-success btn-sm2">บันทึก</a>
              <a href="type.php" class="btn btn-info btn-danger btn-sm2">ยกเลิก</a>
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>