<?php

$timestamp = strtotime('2018-05-02');
$day = date('D', $timestamp);
echo '<br />'.$day;
$timestamp = strtotime('2018-05-03');
$day = date('D', $timestamp);
echo '<br />'.$day;
$timestamp = strtotime('2018-05-04');
$day = date('D', $timestamp);
echo '<br />'.$day;
$timestamp = strtotime('2018-05-05');
$day = date('D', $timestamp);
echo '<br />'.$day;
$timestamp = strtotime('2018-05-06');
$day = date('D', $timestamp);
echo '<br />'.$day;
$timestamp = strtotime('2018-05-07');
$day = date('D', $timestamp);
echo '<br />'.$day;
$timestamp = strtotime('2018-05-08');
$day = date('D', $timestamp);
echo '<br />'.$day;


$day = date('D', $timestamp);
//var_dump($day);
//echo $day;

include 'config/db.php';
$d=array();
$da=$mysqli->query("select day from tt where secid=1");
while($day=mysqli_fetch_array($da)){
	$d[]=$day['day'];
}
for($i=0;$i<count($d);$i++){
	//echo $d[$i];
}
$a="Thu";
if(in_array($a,$d)){
	echo $y="YES";
}
else{
	echo 'NO';
}


$rightnow = date('Y-m-d h-i-s');
$add7days = date('Y-m-d h-i-s', strtotime('+7 days'));
echo "$rightnow : $add7days";
echo '<br>';
echo $dt=date("Y-m-d");
if(isset($_POST['submit'])){
	echo $date=$_POST['date'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="POST">
	<input type="date" name="date" value="yyyy-mm-dd">
	<input type="submit" name="submit">
</form>

</body>
</html>