<?php
//1. เชื่อมต่อ database:
require("Template/headre.php");
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="admin_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <p> Username</p>
            <input type="text"  name="a_user" class="form-control" required placeholder="Username" />
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-12">
            <p> Password</p>
            <input type="password"  name="a_pass" class="form-control" required placeholder="Password" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อ-สกุล</p>
            <input type="text"  name="a_name" class="form-control" required placeholder="ชื่อ-สกุล" />
          </div>
        </div>

        <div class="form-group">
          
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>