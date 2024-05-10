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
        <h4>User Details
        <a href="add-user.php" class="btn btn-primary float-end">Add Users</a>
        </h4>
      </div>
      <div class="car-body">

      <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM user";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
              foreach($query_run as $user)
              {
                ?>
                <tr>
                <td><?= $user['user_id'];?></td>
                <td><?= $user['firstname'];?></td>
                <td><?= $user['lastname'];?></td>
                <td><?= $user['email'];?></td>
                <td><?= $user['phone'];?></td>
                <td><?= $user['created_at'];?></td>
                <td>
                  <a href="view-user.php?id=<?= $user['user_id']; ?>" class="btn btn-info btn-sm">View</a>
                  <a href="edit-user.php?id=<?= $user['user_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                 
                  <form action="code.php" method="POST" class="d-inline">
                     <button href="" name="delete_user" value="<?= $user['user_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                  </form>

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