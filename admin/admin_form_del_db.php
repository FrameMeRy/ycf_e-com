<?php session_start();?>
    <?php 

    if (!$_SESSION["a_id"]){ 
    ?>
        <script>
            alert("ดูเหมือนว่าคุณยังไม่ได้เข้าสู่ระบบนะ 😭😭😭");
            window.location.href="../login.php";
        </script>
        <?php
        }else{?>

<meta charset="UTF-8">
<?php
include('../condb.php');  
$a_id = $_REQUEST["ID"];

$sql = "DELETE FROM tbl_admin WHERE a_id ='$a_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

if($result){
  echo "<script type='text/javascript'>";
  echo "window.location = 'member.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>
<?php }?>