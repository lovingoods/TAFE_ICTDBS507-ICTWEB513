<?php

session_start();
ob_start();


if(isset($_SESSION['auth']))
{
  $_SESSION['message'] ="You are already logged In";
  header('Location: index.php');
  exit();
}
//include header.php file
include ('header.php');
?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <?php 
        if(isset($_SESSION['message']))
        { 
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Hey! </strong><?= $_SESSION['message'];?>.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['message']); 
        } 
        ?>
        <div class="card">
          <div class="card-header">
              <h4>LogIn Form</h4>
          </div>
          <div class="card-body">
              <form action="functions/authcode.php" method="POST">
                  
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                  </div>
                  <div class="mb-3 d-flex">
                    <button type="submit" name="login_btn" class="btn btn-primary mx-auto">Login</button> 
                  </div>
                  
                  <div class="mb-3 form-check">
                        <label class="form-check-label" for="existingAccountCheckbox">Do not have an account? <a href="register.php">Register here</a></label>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
//include footer.php file
include ("footer.php");
?>
