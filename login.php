<!DOCTYPE html>

<?php
session_start();
include 'config/db.php';
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $pwd=$_POST['pwd'];
    $lo=$mysqli->query("select * from cr where sid='$id' and pwd='$pwd'") or die($mysqli->error);
    //$l=mysqli_fetch_array($lo);
    $c=$lo->num_rows;
    if($c==1){
        $qu=mysqli_fetch_array($lo);
        $sec=$qu['secid'];
        $_SESSION['sec']=$sec;
        $_SESSION['id']=$id;
        header("Location:index.php");
    }
    else{
        echo 'Wrong Username or Password!';
    }
}
?>

<?php
//error_reporting(0);

if (isset($_SESSION['id'])) header('Location: index.php');
include_once('include/_header.php');
echo isset($_SESSION['rollno']) == true;
?>
    <form method="POST" action="#" class="col-md-6 col-md-push-3">
        <fieldset>
            <legend class="text-center">Log In</legend>
            <div class="form-group">
                <label for="rollno">ID .</label>
                <input type="text" name="id" class="form-control" id="rollno" placeholder="Enter your roll no.">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="pwd" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="text-center">
                <small id="errLogin" class="form-text text-danger hidden">Incorrect details</small>
                <br>
                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit" />
            </div>
        </fieldset>
    </form>

<?php
    include_once('include/_footer.php');
?>
<html>
<body style="background-image:url('login.jpg')"style="width:600px;height:377px;">
</body>
</html>
