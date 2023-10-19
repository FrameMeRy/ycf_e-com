<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	//รับค่าไฟล์จากฟอร์ม
$p_name = $_POST['p_name'];
$p_bar = $_POST['p_bar'];
$type_id = $_POST['type_id'];
$p_detail = $_POST['p_detail'];
$p_price = $_POST['p_price'];
$p_qty = $_POST['p_qty'];
$p_img =(isset($_POST['p_pic']) ? $_POST['p_pic'] :'');
//img
	$upload=$_FILES['p_pic'];
	if($upload <> '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path="p_pic/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_pic']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='p_pic'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="p_pic/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_pic']['tmp_name'],$path_copy);
	}
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		$sql = "INSERT INTO tbl_product
		(
		p_name,
		p_bar,
		type_id,
		p_detail,
		p_price,
		p_qty,
		p_pic
		)
		VALUES
		(
		'$p_name',
		'$p_bar',
		'$type_id',
		'$p_detail',
		'$p_price',
		'$p_qty',
		'$newname')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'product.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'product.php'; ";
echo "</script>";
}
?>