<?php

session_start();
include('../config/dbcon.php');


if(isset($_POST['add_product_btn']))
{
  $item_id = $_POST['item_id'];

  $item_name = $_POST['item_name'];
  $item_brand = $_POST['item_brand'];
  $item_price = $_POST['item_price'];
  $stock_on_hand = $_POST['stock_on_hand'];
  $item_register = $_POST['item_register'];
  $product_detail = $_POST['product_detail'];

  $item_image = $_FILES['item_image']['name'];

  $path = "../uploads";

  $image_ext = pathinfo($item_image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;

  $product_query = "INSERT INTO product (item_id, item_brand, item_name, item_price, item_image, item_register, stock_on_hand, product_detail) VALUES ('$item_id', '$item_brand', '$item_name', '$item_price', '$filename', '$item_register', '$stock_on_hand', '$product_detail')"; 
 
  $product_query_run = mysqli_query($con, $product_query);

  if($product_query_run)
  {
    move_uploaded_file($_FILES['item_image']['tmp_name'], $path.'/'.$filename);

    $_SESSION['message'] = "Product Added Successfully";
    header("Location: ../admin/add-product.php");
    exit(0);
  }
  else
  {
    $_SESSION['message'] = "Product Not Added";
    header("Location: ../admin/add-product.php");
    exit(0);
  }
}

if(isset($_POST['delete_user']))
{
  $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

  $query =" DELETE FROM user WHERE user_id = '$user_id' ";
  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
    $_SESSION['message'] = "User Deleted Successfully";
    header("Location: ../admin/index.php");
    exit(0);
  }
  else
  { $_SESSION['message'] = "User Not Deleted";
    header("Location: ../admin/index.php");
    exit(0);
  }
}

if(isset($_POST['update_user']))
{
  $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $email = mysqli_real_escape_string($con, $_POST['email']);


  $query =" UPDATE user SET firstname='$firstname', lastname='$lastname', phone='$phone', email='$email' WHERE user_id = '$user_id' ";

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
    $_SESSION['message'] = "User Updated Successfully";
    header("Location: ../admin/index.php");
    exit(0);
  }
  else
  { $_SESSION['message'] = "User Not Updated";
    header("Location: ../admin/index.php");
    exit(0);
  }
}

if(isset($_POST['save_user']))
{
  $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $username = $firstname . ' ' . $lastname;
  $role_as = mysqli_real_escape_string($con, $_POST['role']);

  //Check if email already registered
  $check_role_query = "SELECT * FROM user WHERE role_as = 2 ";
  $check_role_query_run = mysqli_query($con, $check_role_query);

  if (mysqli_num_rows($check_role_query_run) > 0) 
  {
      $insert_query = "INSERT INTO user (firstname, lastname, phone, email, user_password, username, role_as ) VALUE ('$firstname', ' $lastname', ' $phone', ' $email', '$password', ' $username', '$role_as')";
      $insert_query_run = mysqli_query($con, $insert_query);

      if($insert_query_run)
      {
      $_SESSION['message'] = "User added Successfully";
      header('Location: add-user.php');
      }
      else
      {
      $_SESSION['message'] = "Something went wrong";
       header('Location: ../admin/index.php');
      }
  
  }
  else
  {
        $_SESSION['message'] = "You do not have right to access";
        header('Location: ../admin/index.php');

  }  
}


?>