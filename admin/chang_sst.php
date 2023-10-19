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

    if (!$_SESSION["a_id"]){  //check session
    ?>
        <script>
            alert("login");
            window.location.href="../index.php";
        </script>
        <?php
        }else{?>

<?php 
    require("condb.php");
    $user_id = $_GET['a_id'];
    $status_id = $_GET['stt'];
    $rs = $con->query("update tbl_admin set status_id = '$status_id' where a_id = '$user_id'");
    
    if($rs){
?>

    <script>
    alert("แก้ไขสิทธิ์แล้ว");
    window.location.href="member.php";
    </script>

<?php
    }else {
?>
    <script>
    alert("ลองใหม่อีกครั้ง");
    window.location.href="member.php";
    </script>

<?php
    }
?>

<?php }?>
<?php }?>