<?php 
include "lib/session.php";
session_start();

 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>


<?php 
if (isset($_GET['action'])==true) {
		Session::userdestroy();
}

 ?>
