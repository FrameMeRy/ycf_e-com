<?php session_start();?>
    <?php 

    if (!$_SESSION["a_id"]){  //check session
    ?>
        <script>
            alert("ดูเหมือนว่าคุณยังไม่ได้เข้าสู่ระบบนะ 😭😭😭");
            window.location.href="../login.php";
        </script>
        <?php
        }else{?>

<?php 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_admin WHERE a_id=$ID";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<h4> Form Reset Password </h4>
<form action="admin_form_rwd_db.php" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Username :
    </div>
    <div class="col-sm-3">
      <input type="text" name="a_user" required class="form-control" autocomplete="off" value="<?php echo $row['a_user'];?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-3 control-label">
     New Password :
    </div>
    <div class="col-sm-3">
      <input type="password" name="a_pass1" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-3 control-label">
     Confirm Password :
    </div>
    <div class="col-sm-3">
      <input type="password" name="a_pass2" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="a_id" value="<?php echo $row['a_id'];?>">
      <button type="submit" class="btn btn-success">บันทึก</button>
    </div>
  </div>
</form>
<?php }?>