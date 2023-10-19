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
include('..\condb.php');

$txt_cy = $_POST['txt_cy'];
$txt_name = $_POST['txt_name'];
$txt_num = $_POST['txt_num'];
$txt_branch = $_POST['txt_branch'];
$txt_category = $_POST['txt_category'];

$check = "
	SELECT bk_name 
	FROM tbl_bank  
	WHERE bk_name = '$txt_num' 
	";
    $result1 = mysqli_query($conn, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{ 

$sql ="INSERT INTO tbl_bank
    
    (bk_name_bk, bk_name, bk_num, bk_branch, bk_category) 

    VALUES 

    ('$txt_cy', '$txt_name', '$txt_num', '$txt_branch', '$txt_category')";
    
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($conn);
    }
    
    if($result){
      echo "<script>";
      echo "alert('เพิ่มธนาคารสำเร็จ');";
      echo "window.location ='bank_add.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('เกิดข้อผิดพลาดลองใหม่อีกครั้ง');";
      echo "window.location ='bank_add.php'; ";
      echo "</script>";
    }
?>
<?php }?>