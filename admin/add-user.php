<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');

;?>

<div class="container mt-5">
 <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Add User
          <a href="../admin/index.php" class="btn btn-danger float-end">back</a>
        </h4>
      </div>
      <div class="card-body">
        <form action="code.php" method="POST">

          <div class="mb-3">
            <label for="">First Name </label>
          <input type="text" name="firstname" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">Last Name </label>
          <input type="text" name="lastname" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">User Email </label>
          <input type="email" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">User Phone </label>
          <input type="text" name="phone" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">User password </label>
          <input type="password" name="password" class="form-control">
          </div>
          <div class="mb-3">
            <label for="">User roles </label>
          <input type="number" min="0" max="2" required name="role" class="form-control">
          </div>
          <div class="mb-3">
            <button type="submit" name="save_user" class="btn btn-primary">Save User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 </div>
</div>

<?php include('includes/footer.php');?>