<?php 

include('../config/dbcon.php');
include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>
<div class="container">
 <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Products Details
        <a href="add-product.php" class="btn btn-primary float-end">Add Products</a>
        </h4>
      </div>
      <div class="car-body">

      <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Item Brand</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Image</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM product";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
              foreach($query_run as $user)
              {
                ?>
                <tr>
                <td><?= $product['item_id'];?></td>
                <td><?= $product['item_brand'];?></td>
                <td><?= $product['item_name'];?></td>
                <td><?= $product['item_price'];?></td>
                <td><?= $product['item_image'];?></td>
              
                <td>
                  <a href="view-user.php?id=<?= $user['item_id']; ?>" class="btn btn-info btn-sm">View</a>
                  <a href="edit-user.php?id=<?= $user['item_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
                  <form action="code.php"></form>

                </td>
                </tr>
                <?php
              }
            }
            else
            {
              echo "<h5> No Record Found </h5>";
            }
          ?>
          
        </tbody>
      </table>
      </div>
    </div>
  </div>
 </div>
</div>


<?php include('includes/footer.php');?>