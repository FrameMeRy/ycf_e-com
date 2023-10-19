<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YC Fishing everyday</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <font face="kanit">
</head>
<body class="bg-gradient-primary">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

      <!-- <div class="containers">
          <div class="row">

              <div class="col-3">

              </div>

              <div class="col-6">
                <div class="card border-left-primary">
                    <div class="card-body "><h4><b><center><font color="#4e73df">เข้าสู่ระบบ</center></font></b></h4>
                      <hr>

                          <form action="chk_login.php" method="post" >
                            <label><font color="#330066"><b>ขื่อผู้ใช้</b></label>
                            <input type="text" class="form-control mb-2"placeholder="ป้อนขื่อผู้ใช้" name="txt_user" required></input>
                        
                            <label><b>รหัสผ่าน</b></label>
                            <input type="password" class="form-control mb-3"placeholder="ป้อนรหัสผ่าน" name="txt_password" required></input>

                           <div ALIGN ="right">
                                <button type="submit" false class="btn btn-primary" style="width: 150px;" name="BUT"aria-disabled="true" >เข้าสู่ระบบ</button> 
                            </div>
                          </form>
                    </div>
                </div>
              </div>

              <div class="col-3">
              </div>

          </div>
      </div> -->
<br>
      <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">
    <form action="chk_login.php" method="post" >
        <div class="card o-hidden border-0 shadow-lg my-3">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block ">
                    <img src="img\login(195).JPG">
                    </div>

                    <div class="col-lg-6">
                    <br><br><br><br><br>
                        <div class="p-5">
                            <div class="text-center">
                                <img src="img\logo_login.jpg">
                                <!-- <h2 class="mb-3 text-primary"><b>YC Fishing everyday</b></h2> -->
                            </div>

                            <form class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user mt-2"
                                        id="text" aria-describedby="emailHelp" name="txt_user"
                                        placeholder="ป้อนขื่อผู้ใช้...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="txt_password"
                                        id="exampleInputPassword" placeholder="ป้อนรหัสผ่าน...">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block mb-5">
                                    เข้าสู่ระบบ 
                                </button>
                                <p>pp<?php echo $_SESSION["u_name"];?></p>
                                

      </form>
                            <!-- <div class="text-center">
                                <a class="small" href="register.html">สมัครสมาชิก</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
</font>
</body>
</html>