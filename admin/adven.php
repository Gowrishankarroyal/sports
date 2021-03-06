<?php
session_start();
include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sports Booking</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">Booking - Sports@Presidency</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../home.php">Home</a></li>
   
      </ul>
      <ul class="nav navbar-nav navbar-right">

      <!-- <li><a style="text-decoration: none; font-size: 130%;"><span class="text-danger glyphicon glyphicon-warning-sign"></span><span class="text-danger">  Site under construction</span></a></li> -->
      <?php
            
            if(isset($_SESSION['admin']))
            {
                echo '
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome, '.$_SESSION['admin'].' <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="logout.php">Log Out</a></li>
                  </ul>
                </li>';
            } else
            {
                echo '
                <li><a href="login.php">Please Log In</a></li>';
            }
          ?>
      </ul>
    </div>
  </div>
</nav>
    <form method="POST" action="#" class="col-md-6 col-md-push-3">
        <fieldset>
            <legend class="text-center">Add Venue</legend>
            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" name="venue" class="form-control" id="venue" placeholder="Venue Name">
            </div>
            <div class="text-center">
                <small id="errLogin" class="form-text text-danger hidden">Incorrect details</small>
                <br>
                <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit" />
            </div>
        </fieldset>
    </form>
    </body>
    </html>

   <?php
   if(isset($_POST['venue'])){
   	$ven=$_POST['venue'];
   	$q=$mysqli->query("insert into venue (`slot`) values ('$ven')");
   	if($q==1){
   		echo '<br><h5>Succesfully Added Venue!</h5>';
   	}
   	else{
   		echo '<br><h5>Unable to Add venue!</h5>';
   	}
   }
   ?>