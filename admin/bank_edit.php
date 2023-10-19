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
$bk_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_bank WHERE bk_id='$bk_id' ";
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
            <p><h2 class="ml-3">แก้ไขข้อมูลธนาคาร</h2></p>
        </div>
            <div class="card shadow mb-4 ">
                <div class="card-body">
                  <div class="table-responsive">

                    <form  name="admin" action="bank_edit_db.php" method="POST" id="admin" class="form-horizontal">
                      <input type="hidden" name="a_id" value="<?php echo $bk_id; ?>">

                            <!-- ธนาคาร -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">ธนาคาร</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="bk_name_bk" required>
                                                <option selected><?php echo $bk_name_bk;?></option>
                                                    <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                                    <option value="ธนาคารซีไอเอ็มบี">ธนาคารซีไอเอ็มบี</option>
                                                    <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                                    <option value="ธนาคารธนชาติ">ธนาคารธนชาติ</option>
                                                    <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                                    <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                                                    <option value="ธนาคารอาคารสงเคราะห์">ธนาคารอาคารสงเคราะห์</option>
                                                    <option value="ธนาคารอิสลาม">ธนาคารอิสลาม</option>
                                                    <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                                                    <option value="ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
                                                    <option value="ธนาคารเอสเอ็มอีแบงก์">ธนาคารเอสเอ็มอีแบงก์</option>
                                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                                    <option value="ธนาคารไอซีบีซี">ธนาคารไอซีบีซี</option>
                                            </select>
                                        </div>              
                                </div>
                            </div>

                                <!-- ชื่อบัญชี -->
                                <div class="form-group ">
                                    <div class="row col-sm-12">
                                        <label for="gs_name" class="col-sm-3 control-label mt-2">ชื่อบัญชี</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bk_name" class="form-control mt-1" value="<?=$bk_name;?>" placeholder="ชื่อบัญชี" required>

                                        </div>
                                    </div>
                                </div>

                            <!-- เลขบัญชี -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">เลขบัญชี</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bk_num" class="form-control mt-1" value="<?=$bk_num;?>" placeholder="เลขบัญชี" required>
                                    </div>
                                </div>
                            </div>

                          <!-- สาขา -->
                          <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">สาขา</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bk_branch" class="form-control mt-1" value="<?=$bk_branch;?>" placeholder="สาขา" required>
                                    </div>
                                </div>
                            </div>

                            <!-- ประเภท -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">ประเภท</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="bk_category" required>
                                                <option selected><?php echo $bk_category;?></option>
                                                    <option value="ออมทรัพย์">ออมทรัพย์</option>
                                                    <option value="สะสมทรัพย์">สะสมทรัพย์</option>
                                                    <option value="กระแสรายวัน">กระแสรายวัน</option>
                                                    <option value="ฝากประจำ">ฝากประจำ</option>
                                                    <option value="เผื่อเรียก">เผื่อเรียก</option>
                                            </select>
                                        </div>              
                                </div>
                            </div>

                            <!-- ปุ่มล้าง -->
                            <div class="form-group">
                                <div class="col-sm-3"> </div>
                                <div class="col-sm-12" align="right">
                                    <a href="bank_add.php" class="btn btn-danger" > ยกเลิก  </a>     
                                    <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> เพิ่มสมาฃิก  </button>    
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
</div>

<?php 
require("Template/footerphp"); 
?>
<?php }?>