<?php require("Template/headre.php"); ?>
</head>

<body>
<div class="container">
<div class="row">
<div class="col-12">
  <?php
  //connect db
 
  include("connect.php");
  $sql = "SELECT * FROM tbl_product as p
  INNER JOIN tbl_type as t
  ON p.type_id = t.type_id
  ORDER BY p.p_id ASC";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result_pro =mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
  ?><div class="row" >
  
  <?php
  while($row_pro = mysqli_fetch_array($result_pro))
  {?>
  	<div class="card mt-5 ml-3" style="width: 16rem;">
            <img class="card-img-top" width='400' height='300'  src="../admin/p_pic/<?php echo $row_pro['p_pic'];?>" alt="Card image cap"   >
            <div class="card-body">
                <h5 class="card-title"><?php echo $row_pro['p_name'];?></h5>
                <p class="card-text">
                 ประเภท : <?php echo $row_pro['type_name']; ?>
                </p>
                <p class="card-text">
                 ราคา : <?php echo $row_pro['p_price']; ?> 
                </p>
                <a href="product_detail.php?p_id=<?php echo $row_pro['p_id']?>" class="btn btn-primary">สั่งซื้อ</a>
                <a href="product_detail1.php?id=<?php echo $row_pro['p_id']?>" class="btn btn-primary">รายละเอียด</a>
                
            </div>
            </div>
            <!-- &nbsp;
            &nbsp;  &nbsp; -->
            <?php
  }
  ?>

</div>
            </div>
            </div>

</div>

<!-- <a href="show.php" class="btn btn-warning btn-xs"> รายการสินค้าที่สั่ง </a> -->
</div>
<?php require("Template/footer_copyright.php"); ?>
<?php require("Template/footer.php"); ?>