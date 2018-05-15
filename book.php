<?php
include 'config/db.php';
session_start();

?>
<?php
if(isset($_POST['venue'])){

	$cr=$_SESSION['id'];
	$venue=$_POST['venue'];
	$sec=$_SESSION['sec'];
	$date=$_POST['date'];
	$period=$_POST['period'];

	$chk=$mysqli->query("select * from bkgs where venue='$venue' and date='$date' and period='$period'");
	$rows=$chk->num_rows;
	if($rows<=0){


	$b=$mysqli->query("insert into bkgs (`crid`,`secid`,`venue`,`date`,`period`) values('$cr','$sec','$venue','$date','$period')");
	if($b==1){
		header("Location:bookings.php?m=s");

	}
	else{
		header("Location:booknew.php?m=u");
	}
}
else{
	header("Location:booknew.php?m=exists");
}
}
?>