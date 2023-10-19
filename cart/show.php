<?php 

require("Template/headre.php"); 
include('Template/h.php');
include('connect.php');
$rs = $conn->query("select * from order_head");
?>

<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
    <div class="col-xl-12 col-md-12 mb-1">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text-primary">ช้อมูลการสั่งสินค้า ใส่ปุ่มดู (แก้ไขได้ ออกใบเสร็จ/ใบจัดส่ง)</h5>
        </div>

          <div class="card-body">
                                      
            <table border="2" class="display table table-bordered" id="example1" align="center"  >
              <thead>
                <tr class="info">    
                  <th><center>ลำดับ</center></th>
                  <th><center>วันที่สั่ง</center></th>
                  <th><center>สินค้าที่สั่ง</center></th>
                  <th><center>ชื่อผู้สั่ง</center></th>
                  <th><center>ที่อยู่</center></th>
                  <th><center>อีเมลล์</center></th>
                  <th><center>เบอร์โทรศัพท์</center></th>
                  <th><center>จำนวน</center></th>
                  <th><center>ราคารวม</center></th>
                  <th><center>ลบ</center></th>  
                </tr>
            </thead>
<?php
    $no=1;
    foreach($rs as $row){
        $o_id = $row['o_id'];
        $o_dttm = $row['o_dttm'];
        $o_name = $row['o_name'];
        $o_addr = $row['o_addr'];
        $o_email = $row['o_email'];
        $o_phone = $row['o_phone'];
        $o_qty = $row['o_qty'];
        $o_total = $row['o_total'];
        $p_id = $row['p_id'];
          $rs_p = $conn->query("select * from tbl_product where p_id ='$p_id'");
            foreach($rs_p as $r){
                $p_name = $r['p_name'];
            }
?>
   
              <tr>
                <td><center><?php echo $no; ?></center></td>
                <td><center><?php echo $o_dttm; ?></center></td>
                <td><center><?php echo $p_name; ?></center></td>
                <td><center><?php echo $o_name; ?></center></td>
                <td><center><?php echo $o_addr; ?></center></td>
                <td><center><?php echo $o_email; ?></center></td>
                <td><center><?php echo $o_phone; ?></center></td>
                <td><center><?php echo $o_qty; ?></center></td>
                <td><center><?php echo $o_total; ?></center></td>
                <td><center><a href="del.php?ID=<?php echo $row['o_id']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่')">ลบ</a></center></td>
              </tr>
            <?php $no++ ?>
  <?php }?>

            </table>
            <a href="product.php" class="btn btn-warning btn-xs"> หน้าหลัก </a>

            </div>
          </div>
        </div>
      </div> 

<?php
require("Template/footer_copyright.php"); 
require("Template/footer.php"); 
?>