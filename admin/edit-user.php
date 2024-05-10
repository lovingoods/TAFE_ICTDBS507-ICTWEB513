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
        <h4>Edit User
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
            <form action="code.php" method="POST">
              <input type="text" name="user_id" value="<?= $user['user_id']; ?>">

              <div class="mb-3">
                <label for="">First Name </label>
              <input type="text" name="firstname" value="<?=$user['firstname']; ?>" class="form-control">
              </div>
              <div class="mb-3">
                <label for="">Last Name </label>
              <input type="text" name="lastname" value="<?=$user['lastname']; ?>"  class="form-control">
              </div>
              <div class="mb-3">
                <label for="">User Email </label>
              <input type="email" name="email" value="<?=$user['email']; ?>"  class="form-control">
              </div>
              <div class="mb-3">
                <label for="">User Phone </label>
              <input type="text" name="phone" value="<?=$user['phone']; ?>"  class="form-control">
              </div>
              <div class="mb-3">
                <button type="submit" name="update_user" class="btn btn-primary">Save User</button>
              </div>
            </form>
            
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