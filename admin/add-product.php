<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');

;?>

<div class="container mt-5">
 <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Add Product
          <a href="../admin/index.php" class="btn btn-danger float-end">back</a>
        </h4>
      </div>
      <div class="card-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
          <div class="col-md-12">
              <label for="">Item Id </label>
            <input type="text" name="item_id" class="form-control">
            </div>
            <div class="col-md-12">
              <label for="">Item Name </label>
            <input type="text" name="item_name" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="">Item Brand </label>
            <input type="text" name="item_brand" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="">Item Price </label>
            <input type="text" name="item_price" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="">Stocks On Hand </label>
            <input type="number" name="stock_on_hand" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="">Item Register</label>
            <input type="date"  name="item_register" class="form-control">
            </div>
            <div class="col-md-12">
              <label for="">Item Image </label>
            <input type="file" name="item_image" class="form-control">
            </div>
            <div class="col-md-12">
              <label for="">Product Details</label>
            <textarea type="row=3" name="product_detail" class="form-control"></textarea>
            </div>
            
            <div class="mb-3">
              <button type="submit" name="add_product_btn" class="btn btn-primary">Save Product</button>
            </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
 </div>
</div>

<?php include('includes/footer.php');?>