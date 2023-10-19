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

<meta charset="UTF-8">
<?php
include('condb.php');

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
    $bk_id = $_REQUEST["bk_id"];
    $bk_name_bk = $_REQUEST["bk_name_bk"];
    $bk_name = $_REQUEST["bk_name"];
    $bk_num = $_REQUEST["bk_num"];
    $bk_branch = $_REQUEST["bk_branch"];
    $bk_category = $_REQUEST["bk_category"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_bank SET  
      bk_name_bk='$bk_name_bk' , 
      bk_name='$bk_name' , 
      bk_num='$bk_num' ,
      bk_branch='$bk_branch' ,
      bk_category='$bk_category' 
      WHERE bk_id='$bk_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'bank_add.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>
vghhhfhff
<meta charset="UTF-8">
<?php
include('condb.php');

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $a_id = $_REQUEST["a_id"];
  $a_user = $_REQUEST["a_user"];
  $a_pass = $_REQUEST["a_pass"];
  $a_name = $_REQUEST["a_name"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_admin SET  
      a_user='$a_user' , 
      a_pass='$a_pass' , 
      a_name='$a_name' 
      WHERE a_id='$a_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'me.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>
<?php }?>