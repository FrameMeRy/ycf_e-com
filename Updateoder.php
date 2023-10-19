<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	error_reporting( error_reporting() & ~E_NOTICE );
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
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
require_once('condb.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$mem_id = $_POST['mem_id'];
	$name = $_POST["name"]; 
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$p_qty = $_POST["p_qty"];
	$total = $_POST['total'];
	$order_date = date("Y-m-d H:i:s");
	$status = 1;

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysql_db_query($conn, "BEGIN"); 
	$sql1 = "INSERT  INTO tbl_order VALUES
	(NULL,
	'$mem_id',  
	'$name',
	'$address',
	'$email',
	'$phone',
	'$status',
	'$order_date' 
	)";
	
	$query1	= mysql_db_query($conn, $sql1) or die ("Error in query: $sql1 " . mysql_error());
	

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM tbl_order  WHERE mem_id='$mem_id'";
	$query2	= mysql_db_query($conn, $sql2);
	$row = mysql_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	 
	{
		$sql3	= "SELECT * FROM tbl_product where p_id=$p_id";
		$query3 = mysql_db_query($conn, $sql3);
		$row3 = mysql_fetch_array($query3);
		$total=$row3['p_price']*$p_qty;
		$count=mysql_num_rows($query3);
		
		
		
		$sql4	= "INSERT INTO  tbl_order_detail 
		values(null, 
		'$order_id', 
		'$p_id', 
		'$p_qty', 
		'$total')";
		$query4	= mysql_db_query($conn, $sql4);
	
	
	//ตัดสต๊อก
  for($i=0; $i<$count; $i++){  
  $have =  $row3['p_qty']; 
  $stc = $have - $p_qty;  
  $sql5 = "UPDATE tbl_product SET  p_qty=$stc WHERE  p_id=$p_id ";
  $query9 = mysql_db_query($conn, $sql5);  
    
    }
 
 }

	
	if($query1 && $query4){
		mysql_db_query($conn, "COMMIT");
		foreach($_SESSION['shopping_cart'] as $p_id)
		{	
			unset($_SESSION['shopping_cart']);
			echo "<script>";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='index.php'; ";
			echo "</script>";
		}
	}
	else{
		mysql_db_query($conn, "ROLLBACK");  
			echo "<script>";
			echo "alert('บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ');";
			echo "window.location ='confirm_order.php'; ";
			echo "</script>";	
	}

	mysql_close($condb);
?>
<br>