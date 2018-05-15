<?php
// error_reporting(0);
// session_start();
// if (isset($_SESSION['rollno'])) header('Location: index.php');
// include_once('include/_header.php');
// echo isset($_SESSION['rollno']) == true;
include '../config/db.php';
session_start();
?>

<?php
    if(isset($_POST['admin'])){
        $admin=$_POST['admin'];
        $pwd=$_POST['pwd'];
        $q=$mysqli->query("select * from admin where unm='$admin' and pwd='$pwd'");
        if($q==1){
            $_SESSION['admin']=$admin;
            
            header("Location:home.php");

        }
    }
?>