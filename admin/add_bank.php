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

<?php require("Template/headre.php");
require_once('condb.php');

if (isset($_REQUEST['btn_insert'])) {
    $txt_cy = $_REQUEST['txt_cy'];
    $txt_name = $_REQUEST['txt_name'];
    $txt_num = $_REQUEST['txt_num'];
    $txt_branch = $_REQUEST['txt_branch'];
    $txt_category = $_REQUEST['txt_category'];



    if (empty($txt_cy)) {
        $errorMsg = "กรุณาลองใหม่อีกครั้ง";
    } else if (empty($txt_name)) {
        $errorMsg = "กรุณาลองใหม่อีกครั้ง";
    } else if (empty($txt_num)) {
        $errorMsg = "กรุณาลองใหม่อีกครั้ง";
    } else if (empty($txt_branch)) {
        $errorMsg = "กรุณาลองใหม่อีกครั้ง";
    } else if (empty($txt_category)) {
        $errorMsg = "กรุณาลองใหม่อีกครั้ง";       

    } else {
        try {
            if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO tbl_bank(bk_name_bk, bk_name, bk_num, bk_branch, bk_category) VALUES (:bnb, :bn, :bm, :bb, :bc)");
                $insert_stmt->bindParam(':bnb', $txt_cy);
                $insert_stmt->bindParam(':bn', $txt_name);
                $insert_stmt->bindParam(':bm', $txt_num);
                $insert_stmt->bindParam(':bb', $txt_branch);
                $insert_stmt->bindParam(':bc', $txt_category);

               
               if ($insert_stmt->execute()) {
                    $insertMsg = "สมัครสมาชิกสำเร็จ";
                    header("refresh:1;bank.php");
                    // <script>
                    // window.location.href="chicken_sh.php";
                    // </script>
                    
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>

    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
        <li class="breadcrumb-item"><a href="member.php">จัดการสมาชิก</a></li>
        <li class="breadcrumb-item active" aria-current="page">เพิ่มสมาชิก</li>
    </ol>
    </nav>
    <!-- end Breadcrumb -->

    <!-- หัวข้อบน -->
    <div class="mb-11 mt-11">
        <font size="7"><center>cheecare</center></font>
        <p><center>สมัครสมาชิก</center></p>
    </div>
<hr>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>เหมือนจะเกิดข้อผิดพลาดนะ! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong> <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <div class="containers">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <form method="post" class="form-horizontal mt-1">
                            <!-- ธนาคาร -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-2 control-label mt-2">ธนาคาร</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="txt_cy" required>
                                                <option selected>เลือกธนาคาร</option>
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
                                        <label for="gs_name" class="col-sm-2 control-label mt-2">ชื่อบัญชี</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="txt_name" class="form-control mt-1" placeholder="ชื่อบัญชี"required>
                                        </div>
                                    </div>
                                </div>

                            <!-- เลขบัญชี -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-2 control-label mt-2">เลขบัญชี</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="txt_num" class="form-control mt-1" placeholder="เลขบัญชี" required>
                                    </div>
                                </div>
                            </div>

                          <!-- สาขา -->
                          <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-2 control-label mt-2">สาขา</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="txt_branch" class="form-control mt-1" placeholder="สาขา" required>
                                    </div>
                                </div>
                            </div>

                            <!-- ประเภท -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-2 control-label mt-2">ประเภท</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="txt_category" required>
                                                <option selected>เลือกธนาคาร</option>
                                                    <option value="ออมทรัพย์">ออมทรัพย์</option>
                                                    <option value="สะสมทรัพย์">สะสมทรัพย์</option>
                                                    <option value="กระแสรายวัน">กระแสรายวัน</option>
                                                    <option value="ฝากประจำ">ฝากประจำ</option>
                                                    <option value="เผื่อเรียก">เผื่อเรียก</option>
                                            </select>
                                        </div>              
                                </div>
                            </div>
                                <!-- ปุ่ม-->
                            <div class="form-group text-center">
                                <div class="col-md-12 mt-3">
                                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                                    <a href="member.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                </div>
                <div class="col-lg-3">
                </div>
                </div>
 
<br><br><br>
<?php require("Template/footer.php");?>
<?php }?>
