<?php 

include('../config/dbcon.php');
include('includes/header.php');
include('../middleware/adminMiddleware.php');

;?>

<div class="container mt-5">
 <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>View User Details
          <a href="../admin/index.php" class="btn btn-danger float-end">back</a>
        </h4>
      </div>
      <div class="card-body">
        <?php
        if($_GET['id'])
        {
          $user_id = mysqli_real_escape_string($con, $_GET['id']) ;
          $query = "SELECT * FROM user WHERE user_id ='$user_id' ";
          $query_run = mysqli_query($con, $query);

          if(mysqli_num_rows($query_run) > 0)
          {
            $user = mysqli_fetch_array($query_run);
            ?>
              <div class="mb-3">
                <label>User First Name</label>
                <p class="form-control">
                  <?=$user['firstname']; ?>
                </p>
              </div>
              <div class="mb-3">
                <label>User Last Name </label>
                 <p class="form-control">
                 <?=$user['lastname']; ?>
                </p>
              </div>
              <div class="mb-3">
                <label>User Email </label>
                <p class="form-control">
                  <?=$user['email']; ?>
                </p>
              </div>
              <div class="mb-3">
                <label>User Phone </label>
                <p>
                  <?=$user['phone']; ?>
                </p>
              </div>
            <?php
          }
          else
          {
            echo "<h4>No Such Id Found</h4>";
          }
        }
        ?>
       
      </div>
    </div>
  </div>
 </div>
</div>

<?php include('includes/footer.php');?>