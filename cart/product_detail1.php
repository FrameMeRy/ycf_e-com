<?php require("Template/headre.php"); ?>
<?php

include("connect.php");
$p_id = $_GET["id"];
?>
<!DOCTYPE html>
<head>
  <title>ระบบร้านค้าออนไลน์</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

     <style>
        div.polaroid {
          width: 80%;
          background-color: white;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          margin-bottom: 25px;
        }

        div.container_di {
          text-align: center;
          padding: 10px 20px;
        }
      </style>
</head>
<body>
  
  <div class="container">
    <?php include('navbar.php'); ?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM tbl_product as p 
              INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
               WHERE p_id = $p_id ";
      $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);

      ?>
      <div class="col-md-10">
        <div class="container" style="margin-top: 50px">
          <div class="row">
            <div class="col-md-6">
              <div class="polaroid">
                <?php echo"<img src='../admin/p_pic/".$row['p_pic']."'width='100%'>";?>
                  <div class="container_di">
                    <p><?php echo $row["p_name"];?></p>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <h3><b><?php echo $row["p_name"];?></b></h3> <br>
              <p>
               <b> ประเภท </b><?php echo $row["type_name"];?>
              </p>
              <b> รายละเอียด </b>  <br><br><?php echo $row["p_detail"];?>
                 <p><br>
                <b>ราคา</b> <?php echo number_format($row['p_price'],2); ?> บาท
               
                
            </div>
            <a href="product.php" class="btn btn-danger">กลับหน้าหลัก</a> 
            <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99"></script>
          <div class="addthis_inline_share_toolbox_sf2w" style="margin-left: 400px"></div> -->
                  </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>