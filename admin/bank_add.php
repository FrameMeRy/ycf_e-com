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
    require("condb.php");
    $rs = $conn->query("select * from tbl_bank");
?>
<?php
    if ($rs->num_rows == 0) {
?>
    <h1>ไม่มีข้อมูล</h1>    
<?php
}else{
?>
        <!-- เพิ่มสมาฃิก -->
        <div class="mr-3" ALIGN ="right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">เพิ่มธนาคาร</button></p>
        </div>

        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h4><b> รายชื่อธนาคาร </h4></b></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th ><center><b>ลำดับที่</b></center></th>
                                        <th ><center><b>ธนาคาร</b></center></th>
                                        <th ><center><b>เลขที่บัญชี</b></center></th>
                                        <th ><center><b>ชื่อบัญชี</b></center></th>
                                        <th ><center><b>สาขา</b></center></th>
                                        <th ><center><b>ประเภท</b></center></th>   
                                        <th align="left"><b>แก้ไข</b></th> 
                                        </tr>
                                    </thead>

                                    <?php
                                    $no=1;
                                        foreach($rs as $row){
                                            $bk_id = $row['bk_id'];
                                            $bk_name_bk = $row['bk_name_bk'];
                                            $bk_name = $row['bk_name'];
                                            $bk_num = $row['bk_num'];
                                            $bk_branch = $row['bk_branch'];
                                            $bk_category = $row['bk_category'];
                                    ?>
                                    <tbody>
                                        <tr>
                                        <td class="text-center"><?php echo $no;?></td>
                                        <td class="text-center"><?php echo $bk_name_bk;?></td>
                                        <td class="text-center"><?php echo $bk_name;?></td>
                                        <td class="text-center"><?php echo $bk_num;?></td>
                                        <td class="text-center"><?php echo $bk_branch;?></td>
                                        <td class="text-center"><?php echo $bk_category;?></td>

                                        <td class="text-center">
                                            <a href="admin_form_show.php?ID=<?php echo $row['bk_id']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2"> ดู </a>
                                            <a href="bank_edit.php?act=edit&ID=<?php echo $row['bk_id']; ?>" class="btn btn-warning" > แก้ไข </a> 
                                            <a href="bank_del_db.php?ID=<?php echo $row['bk_id']; ?>" class="btn btn-danger " onclick="return confirm('ต้องการลบข้อมูล ใช่หรือไม่ 😭😭')">ลบ</a> </td>
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

        <!-- Modal1 -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มธนาคาร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                    <form  name="admin" action="bank_add_db.php" method="POST" id="admin" class="form-horizontal">

                            <!-- ธนาคาร -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">ธนาคาร</label>
                                        <div class="col-sm-9">
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
                                        <label for="gs_name" class="col-sm-3 control-label mt-2">ชื่อบัญชี</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="txt_name" class="form-control mt-1" placeholder="ชื่อบัญชี"required>
                                        </div>
                                    </div>
                                </div>

                            <!-- เลขบัญชี -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">เลขบัญชี</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="txt_num" class="form-control mt-1" placeholder="เลขบัญชี" required>
                                    </div>
                                </div>
                            </div>

                          <!-- สาขา -->
                          <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">สาขา</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="txt_branch" class="form-control mt-1" placeholder="สาขา" required>
                                    </div>
                                </div>
                            </div>

                            <!-- ประเภท -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">ประเภท</label>
                                        <div class="col-sm-9">
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

                            <!-- ปุ่มล้าง -->
                            <div class="form-group">
                                <div class="col-sm-3"> </div>
                                <div class="col-sm-12" align="right">
                                    <a href="member.php" class="btn btn-danger" > ยกเลิก  </a>     
                                    <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> เพิ่มสมาฃิก  </button>    
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <!-- Modal2 -->
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มธนาคาร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                    <form  name="admin" action="bank_add_db.php" method="POST" id="admin" class="form-horizontal">

                            <!-- ธนาคาร -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">ธนา</label>
                                        <div class="col-sm-9">
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
                                        <label for="gs_name" class="col-sm-3 control-label mt-2">ชื่อบัญชี</label>
                                        <div class="col-sm-9">
                                            <div class="col-sm-3" align="right"> ชื่อบัญชี <?=$a_user;?> </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- เลขบัญชี -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">เลขบัญชี</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="txt_num" class="form-control mt-1" placeholder="เลขบัญชี" required>
                                    </div>
                                </div>
                            </div>

                          <!-- สาขา -->
                          <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">สาขา</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="txt_branch" class="form-control mt-1" placeholder="สาขา" required>
                                    </div>
                                </div>
                            </div>

                            <!-- ประเภท -->
                            <div class="form-group ">
                                <div class="row col-sm-12">
                                    <label for="gs_name" class="col-sm-3 control-label mt-2">ประเภท</label>
                                        <div class="col-sm-9">
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

                            <!-- ปุ่มล้าง -->
                            <div class="form-group">
                                <div class="col-sm-3"> </div>
                                <div class="col-sm-12" align="right">
                                    <a href="member.php" class="btn btn-danger" > ยกเลิก  </a>     
                                    <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> เพิ่มสมาฃิก  </button>    
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
<?php require("Template/footer.php"); ?>

<?php }?>