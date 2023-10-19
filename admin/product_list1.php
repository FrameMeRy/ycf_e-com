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
  

 <table border="2" class="display table table-bordered" id="example1" align="center" >


    <thead>
    <tr class="info">    
    <th>ลำดับ</th>
    <th>บาร์โค้ด</th>
    <th>ประเภท</th>
    <th>ชื่อ</th>
    <th>ภาพ</th>
    <th>แก้ไข</th> 
    <th>ลบ</th> 
    </tr>
    </thead>
    
    <?php
      $no=1;
      foreach($rs as $row){
          $p_id = $row['p_id'];
          $p_name = $row['p_name'];
          $p_bar = $row['p_bar'];
          $type_id = $row['type_id'];
          $rs_ty = $conn->query("select * from tbl_type where type_id ='$type_id'");
              foreach($rs_ty as $r){
                  $type_name = $r['type_name'];
                  session_start();
                  $_SESSION["type_name"] = "$type_name";
              }
    ?>

              <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $p_bar; ?></td>
                  <td><?php echo $p_name; ?></td>
                  <td><?php echo $type_name; ?></td>
                  <?php echo "<td align=center>"."<img src='../admin/p_pic//".$row[p_pic]."' width='80''>"."</td>"; ?>
                  <?php echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>edit</a></td> ";?>
                  <?php echo "<td><a href='product_form_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> ";?>
              </tr>


<?php 
$no++;
} ?>
</table>
