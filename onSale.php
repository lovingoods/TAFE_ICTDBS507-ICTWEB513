<?php
ob_start();
//include header.php file
include ('header.php');
?>
<?php

/*include top-sale section*/
 include ('Template/_top-sale.php');
 /*include top-sale section*/

/*include special-price section*/
 include ('Template/_special-price.php');
 /*include special-price section*/
?>

<?php
//include footer.php file
include ("footer.php");
?>