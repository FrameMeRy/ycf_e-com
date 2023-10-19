

            <?php 
                require("Template/headre.php"); 
                require("condb.php");
                $rs_admin = $con->query("select * from tbl_admin");

            ?>
            <?php
error_reporting( error_reporting() & ~E_NOTICE );
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
                <?php
                    if ($rs_admin->num_rows == 0) {
                ?>
                        <h1>ไม่มีข้อมูล</h1>    
                <?php
                    }else{
                ?>



        <!-- เพิ่มสมาฃิก -->
        <div class="mr-3" ALIGN ="right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">เพิ่มสมาชิก</button></p>
        </div>                   
        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h4><b>
                                            พนักงานทั้งหมด </h4></b></div>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col"><center>ลำดับ</center></th>
                        <th scope="col"><center>ชื่อ</center></th>
                        <th scope="col"><center>username</center></th>
                        <th scope="col"><center>สถานะ</center></th>
                        <th scope="col"><center>รูปภาพ</center></th>
                        <th scope="col"><center>ตั้งค่า</center></th>
                        </tr>
                    </thead>
                <?php
                $no=1;
                    foreach($rs_admin as $row){
                        $user_id = $row['a_id'];
                        $a_user = $row['a_name'];
                        $a_name = $row['a_user'];
                        $status_id = $row['status_id'];
                        $rs_stt = $conn->query("select * from tbl_status where status_id ='$status_id'");
                            foreach($rs_stt as $r){
                                $status_name = $r['status_name'];
                                session_start();
                                $_SESSION["status_name"] = "$status_name";
                            }

?>
                    <tbody>
                        <tr>
                        <td class="text-center"><?php echo $no;?></td>
                        <td class="text-center"><?php echo $a_user;?></td>
                        <td class="text-center"><?php echo $a_name;?></td>
                        <td class="text-center">
<?php
                    if ($status_id == 0) {
?>
                                    <div class="dropdown mb-4">
                                        <button class="btn btn-danger btn-block dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <?php echo $status_name;?>
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=1">admin</a>
                                            <a class="dropdown-item" href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=2">member</a>
                                        </div>
                                    </div>
<?php                        
                    }elseif($status_id == 1){
?>
                        <div class="dropdown mb-4">
                            <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php echo $status_name;?>
                            </button>
                            <div class="dropdown-menu animated--fade-in"
                                aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item " href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=2">member</a></li>
                                <li> <a class="dropdown-item" href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=3">banned</a></li>
                            </div>
                        </div>
<?php    
                    }elseif($status_id == 2){
?>
                        <div class="dropdown mb-4">
                            <button class="btn btn-info btn-block dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php echo $status_name;?>
                            </button>
                            <div class="dropdown-menu animated--fade-in "
                                aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item " href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=1">admin</a>
                                <a class="dropdown-item" href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=3">banned</a>
                            </div>
                        </div>
<?php
                    }elseif($status_id == 3){
?>
                        <div class="dropdown mb-4">
                            <button class="btn btn-secondary btn-block dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php echo $status_name;?>
                            </button>
                            <div class="dropdown-menu animated--fade-in"
                                aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=1">admin</a>
                                <a class="dropdown-item" href="chang_sst.php?a_id=<?php echo $user_id;?>&stt=2">member</a>
                            </div>
                        </div>

<?php   
                    }
?>
 </td>
 <?php

echo "<td align=center>"."<img src='p_img/".$row[p_img]."' width='100' height='100' >"."</td>";


?>



                        <td class="text-center">
                        <a href="admin_form_show.php?ID=<?php echo $row['a_id']; ?>" class="btn btn-primary" > ดู </a> 
                            <a href="admin_form_edit.php?act=edit&ID=<?php echo $row['a_id']; ?>" class="btn btn-warning" > แก้ไข </a> 
                            <a href="admin_form_del_db.php?ID=<?php echo $row['a_id']; ?>" class="btn btn-danger " onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่ 😭😭')">ลบ</a> </td>
                        </td>
                  
                        </tr>

                    </tbody>
                
    <?php
                $no++;
                    }
                    
            }        
                ?>
            
            </table>
            </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                    </div>
                    <?php require("Template/footer_copyright.php"); ?>

            </div>

<!-- Modal1 -->
<div class="modal fade col-12" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">สมัครสมาชิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form  name="addproduct" action="admin_form_add_db.php" method="post" enctype="multipart/form-data"  class="form-horizontal">

                    <div class="form-group row">
                    <!-- รูป -->
                        <div class="col-sm-12">
                            <p> รูปภาพพนักงาน </p>
                            <input type="file" name="p_img" id="p_img" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                    <!-- ชื่อผู้ใช้ -->
                        <div class="col-sm-6">
                            <label for="inputTel" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="a_user" name="a_user" placeholder="Username" required>
                        </div>
                    <!-- รหัสผ่าน -->
                        <div class="col-sm-6">
                            <label for="inputTel" class="col-form-label">Password</label>
                            <input type="text" class="form-control col-sm-16" id="a_pass" name="a_pass" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                    <!-- ชื่อ -->
                        <div class="col-sm-12">
                            <label for="inputTel" class="col-form-label">ชื่อ-สกุล</label>
                            <input type="text" class="form-control col-sm-16" id="a_name" name="a_name" placeholder="ชื่อ-สกุล" required>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <a href="member.php" class="btn btn-danger">ปิด</a>
                        <input type="submit" class="btn btn-success" name="btnadd" value="สมัครสมาชิก">       
                        </form>
                    </div>

                </div>
        </div>
    </div>
    </div>

<?php require("Template/footer.php"); ?>