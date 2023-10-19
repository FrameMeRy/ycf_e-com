<?php 
      require("condb.php");
    $user = $_POST['txt_username'];
    $password = $_POST['txt_pass'];

    $rs = $conn->query("select * from tbl_admin where a_user = '$user' and  a_pass = '$password'");
    $rs_stt = $conn->query("select * from status where status_id ='$status_id'");

    if ($rs->num_rows == 1) {
        foreach($rs as $row){
            $user_id = $row['a_id'];
            $a_name = $row['a_name'];
            $status_id = $row['status_id'];
            $status_name = $row['status_name'];
        }
        if ($status_id == 1) {
            session_start();
            $_SESSION["a_id"] = "$user_id";
            $_SESSION["a_name"] = "$a_name";
            $_SESSION["status_id"] = "$status_id";
            $_SESSION["status_name"] = "$status_name";

?>
        <script>
            alert("ยินดีต้อนรับ <?php echo $_SESSION["a_name"];?>");
            window.location.href="admin/index.php";
        </script>
<?php
        }elseif ($status_id == 2) {
            session_start();
            $_SESSION["a_id"] = "$user_id";
            $_SESSION["a_name"] = "$u_name";
            $_SESSION["status_id"] = "$status_id";

?>
        <script>
            alert("ยินดีต้อนรับ <?php echo $_SESSION["a_name"];?>");
            window.location.href="admin_low/index.php";
        </script>
<?php
        }elseif ($status_id == 3) {
            session_start();
            $_SESSION["a_id"] = "$user_id";
            $_SESSION["a_name"] = "$u_name";
            $_SESSION["status_id"] = "$status_id";

?>
        <script>
            window.location.href="banned.php";
        </script>
<?php
        }elseif ($status_id == 0) {
            session_start();
            $_SESSION["a_id"] = "$user_id";
            $_SESSION["a_name"] = "$u_name";
            $_SESSION["status_id"] = "$status_id";

?>
        <script>
            window.location.href="waiting_for_approval.php";
        </script>

<?php
        }
    }else {
?>
        <script>
            alert("ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง");
            window.location.href="login.php";
        </script>
<?php
}
?>
