<<?php
session_start();
ob_start();
//include header.php file
include ('header.php');
?>

<?php

/*include special-price section*/
include ('Template/_all-products.php');
/*include special-price section*/

?>

<?php
//include footer.php file
include ("footer.php");
?>
