<?php
session_start();
include '../config/db.php';
?>
<?php
if(isset($_SESSION['admin'])){
	session_destroy();
	header("Location:index.php");
}
?>