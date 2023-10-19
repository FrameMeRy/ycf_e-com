

<div class="container">
  <p> </p>
    <div class="row">
      <div class="col-12">
        <form  name="admin" action="type_form_add_db.php" method="POST" id="admin" class="form-horizontal">
          <div class="form-group row">
            <div class="col-12">
              <input  name="type_name" type="text" required class="form-control" id="type_name" placeholder="ประเภทสินค้า"   minlength="2"  />
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12" align="right">
              <a href="type.php" class="btn btn-info btn-danger btn-sm2">ยกเลิก</a>
              <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>