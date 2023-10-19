<?php
      include('template/h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_type ORDER BY type_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table border="2" class="display table table-bordered" id="example1" align="center"  >
  <thead>
    <tr class="info">    
    <th><center>ลำดับที่</center></th>
    <th><center>ชื่อ</center></th>
    <th><center>แก้ไข</center></th>
    <th><center>ลบ</center></th>
  
  </tr>
</thead>
<?php
      $no=1;
?>
  <?php do { ?>
  
    <tr>
      <td><center><?php echo $no; ?></center></td>
      <td><center><?php echo $row_am['type_name']; ?></center></td>
      <td><center><a href="type.php?act=edit&ID=<?php echo $row_am['type_id']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a></center></td>
       <td><center><a href="type_form_delete_db.php?ID=<?php echo $row_am['type_id']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a></center></td>
    </tr>
<?php $no++; ?>
    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 
