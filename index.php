<?php
session_start();
ob_start();
//include header.php file
include ('header.php');
?>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
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
      </div>
    </div>
  </div>
</div>
<?php    
/*include banner area*/
 include ('Template/_banner-area.php');
 /*include banner area*/

/*include top-sale section*/
 include ('Template/_top-sale.php');
 /*include top-sale section*/

/*include special-price section*/
 include ('Template/_special-price.php');
 /*include special-price section*/

/*include banner-ads section*/
 include ('Template/_banner-ads.php');
 /*include banner-ads section*/

/*include new-phones section*/
 include ('Template/_new-phones.php');
 /*include new-phones section*/

/*include blogs area*/
 include ('Template/_blogs.php');
/*include blogs area*/

?>

<?php
//include footer.php file
include ("footer.php");
?>