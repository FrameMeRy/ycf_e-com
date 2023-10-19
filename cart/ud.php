<?php
    session_start();  
 
 /*
 echo "<pre>";
 print_r($_SESSION);
 echo "<hr>";
 print_r($_POST);
 echo "</pre>";
 exit();
 */
  
    
?>
 
 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
    require("Template/headre.php"); 
require_once('connect.php');
 
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
 
 $member_firstname = $_POST["member_firstname"]; 
 $member_address = $_POST["member_address"];
 $member_email = $_POST["member_email"];
 $member_phone = $_POST["member_phone"];
 $member_username=$_POST["member_username"];
 $p_qty = $_POST["p_qty"];
 $total = $_POST["total"];
 $order_date = date("Y-m-d H:i:s");
 $status = 1;
 
 
 //บันทึกการสั่งซื้อลงใน order_detail
 mysql_db_query($conn, "BEGIN"); 
 $sql1 = "INSERT  INTO order_head VALUES
 (NULL,  
 '$o_name',
 '$o_addr',
 '$o_email',
 '$o_phone',
 '$o_dttm' 
 )";
 
 $query1 = mysql_db_query($conn, $sql1) or die ("Error in query: $sql1 " . mysql_error());
 
  
 
 
 $sql2 = "SELECT MAX(order_id) AS order_id FROM tb_order  WHERE member_phone='$member_phone'";
 $query2 = mysql_db_query($conn, $sql2);
 $row = mysql_fetch_array($query2);
 $order_id = $row['order_id'];
 
 
 foreach($_SESSION['shopping_cart'] as $product_id=>$p_qty)
  
 {
  echo $product_id;
  $sql3 = "SELECT * FROM tbl_product where product_id=$product_id";
  $query3 = mysql_db_query($conn, $sql3);
  $row3 = mysql_fetch_array($query3);
  $total=$row3['product_price']*$p_qty;
  $count=mysql_num_rows($query3);

 
  $sql4 = "INSERT INTO  tb_order_detail 
  values(null, 
  '$order_id', 
  '$product_id', 
  '$p_qty', 
  '$total')";
  $query4 = mysql_db_query($conn, $sql4);
  
  
  //ตัดสต๊อก
  for($i=0; $i<$count; $i++){
  $have =  $row3['product_total'];
  
  $stc = $have - $p_qty;
  
  $sql9 = "UPDATE tbl_product SET  
     product_total=$stc
     WHERE  product_id=$product_id ";
  $query9 = mysql_db_query($conn, $sql9);  
  }
    
  /*   stock  */
 }
 if($query1 && $query4){
  mysql_db_query($conn, "COMMIT");
  $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
  foreach($_SESSION['shopping_cart'] as $product_id)
  { 
   unset($_SESSION['shopping_cart']);
  }
 }
 else{
  mysql_db_query($conn, "ROLLBACK");  
  $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ "; 
 }
 
 mysql_close($dbfreshcoffee);
?>
 
 
<script type="text/javascript">
 alert("<?php echo $msg;?>");
 window.location ='product.php';
</script>
 
 
 
</body>
</html>