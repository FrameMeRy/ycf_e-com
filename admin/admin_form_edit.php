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
require("Template/headre.php"); 
include('condb.php');
$a_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_admin WHERE a_id='$a_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>


<div class="containers">
  <div class="row">
  
    <div class="col-3">

    </div>

      <div class="col-6">
        <div class="card shadow mb-2">
            <p><h2 class="ml-3">แก้ไขข้อมูลสมาชิก</h2></p>
        </div>
            <div class="card shadow mb-4 ">
                <div class="card-body">
                  <div class="table-responsive">

                    <form  name="admin" action="admin_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
                      <input type="hidden" name="a_id" value="<?php echo $a_id; ?>">

                        <div class="form-group">
                          <div align="center"> Username  </div>
                          <div class="col-sm-12" align="left">
                            <input  name="a_user" type="text" required class="form-control" id="a_user" value="<?=$a_user;?>" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div align="center"> Password  </div>
                          <div class="col-sm-12" align="left">
                            <input  name="a_pass" type="password" required class="form-control" id="a_pass" value="<?=$a_pass;?>" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div align="center"> ชื่อ-สกุล  </div>
                          <div class="col-sm-12" align="left">
                            <input  name="a_name" type="text" required class="form-control" id="a_name" value="<?=$a_name;?>" placeholder="ชื่อ-สกุล" />
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-3"> </div>
                          <div class="mr-3" align="right">
                            <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึกข้อมูล </button>  
                            <a href="member.php" class="btn btn-danger" > ยกเลิก  </a>         
                          </div> 
                        </div>
                    </form>
                  </div>
                </div>
              </div>
      </div>
    <div class="col-3">

    </div>
  </div>

<?php 
require("Template/footer.php"); 
?>
<?php }?>