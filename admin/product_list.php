<?php
error_reporting( error_reporting() & ~E_NOTICE );
//1. เชื่อมต่อ database:
include('condb.php'); 
include('template/h.php'); 
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
$rs = $conn->query("select * from tbl_product");

?>
<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
  
<h1><c>ใส่ if เปลี่ยนเป็นสีแดง เมื่อสินค้าเหลือ น้อยกว่ากำหนด (5) </b></h1>
 <table border="2" class="display table table-bordered" id="example1" align="center" >


    <thead>
    <tr class="info">    
    <th><center>ลำดับ</center></th>
    <th><center>บาร์โค้ด</center></th>
    <th><center>ชื่อ<center></th>
    <th><center>ประเภท</center></th>
    <th><center>ราคา</center></th>
    <th><center>จำนวนคงคลัง</center></th>
    <th><center>ภาพ</center></th>
    <th><center>แก้ไข</center></th> 
    <th><center>ลบ</center></th> 
    </tr>
    </thead>
    
    <?php
      $no=1;
      foreach($rs as $row){
          $p_id = $row['p_id'];
          $p_name = $row['p_name'];
          $p_bar = $row['p_bar'];
          $p_price = $row['p_price'];
          $p_qty = $row['p_qty'];
          $type_id = $row['type_id'];
          $rs_ty = $conn->query("select * from tbl_type where type_id ='$type_id'");
              foreach($rs_ty as $r){
                  $type_name = $r['type_name'];
                  session_start();
                  $_SESSION["type_name"] = "$type_name";
              }
    ?>

              <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $p_bar; ?></center></td>
                  <td><center><?php echo $p_name; ?></center></td>
                  <td><center><?php echo $type_name; ?></center></td>
                  <td><center><?php echo $p_price; ?></center></td>
                  <td><center><?php echo $p_qty; ?></center></td>
                  <?php echo "<td align=center>"."<img src='../admin/p_pic//".$row[p_pic]."' width='80''>"."</td>"; ?>
                  <td><a href="product_form_edit.php?ID=<?php echo $row['p_id']; ?>" class="btn btn-warning ">แก้ไข</a></td>

                  <td><a href="product_form_del_db.php?ID=<?php echo $row['p_id']; ?>" class="btn btn-danger " onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่ 😭😭')">ลบ</a></td>
              </tr>


<?php 
$no++;
} ?>
</table>

