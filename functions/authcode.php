<?php

session_start();

include('../config/dbcon.php');
include('myfunctions.php');


if (isset($_POST['register_btn'])) {
   
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
  $username = $firstname . ' ' . $lastname;

  //Check if email already registered
  $check_email_query = "SELECT * FROM user WHERE email = '$email'";
  $check_email_query_run = mysqli_query($con, $check_email_query);

  if (mysqli_num_rows($check_email_query_run) > 0) 
  {
    $_SESSION['message'] = "Email already registered";
    header('Location: ../register.php');
    exit;
  }
  else
  {
    if($password == $cpassword)
    {
        
        $insert_query = "INSERT INTO user (firstname, lastname, phone, email, user_password, username ) VALUE ('$firstname', ' $lastname', ' $phone', ' $email', '$password', ' $username')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $_SESSION['message'] = "Registered Successfully";
            header('Location: ../login.php');
        }
        else
        {
            $_SESSION['message'] = "Something went wrong";
            header('Location: ../register.php');
        }
    }
    else
    {
        $_SESSION['message'] = "Passwords do not match";
        header('Location: ../register.php');
    }

  }  

}
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query =  "SELECT * FROM user WHERE email = '$email' AND user_password = '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) >0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['username'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'username' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if(in_array($role_as, [1, 2]))
        {
        redirect("../admin/index.php", "Welcome to Dashboard");
        }
        else
        {
        redirect("../index.php", "Logged In Successfully");
        }

    }
    else
    {
        redirect("../login.php", "Invalid Credentials");
    }
}

?>