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

<!DOCTYPE html>
<html>
    <head>
        <?php include('template/h.php');
        // ปิดโร๊ตไม่ได้    
            error_reporting( error_reporting() & ~E_NOTICE );
        ?>
    </head>
        <body>
            <div class="container">
                <?php include('template/navbar.php');?>
                <p></p>
                <div class="row">

                    <div class="col-md-3">
                    <h3> สวัสดี คุณ <?php echo $a_name; ?></h3>
                        <?php include('template/menu_left.php');?>
                    </div>
                        <!-- ตารางadmin -->
                        <div class="col">
                            <a href="admin.php?act=add" class="btn btn-info btn-sm2">เพิ่ม</a></p>
                                <?php
                                $act = $_GET['act'];
                                if($act == 'add'){
                                include('admin_form_add.php');
                                }elseif ($act == 'edit') {
                                include('admin_form_edit.php');
                                }elseif ($act == 'rwd') {
                                    include('admin_form_rwd.php');
                                    }
                                else {
                                include('admin_list.php');
                                }
                                ?>
                        </div>

                </div>
        </div>
        </body>
</html>
<?php }?>