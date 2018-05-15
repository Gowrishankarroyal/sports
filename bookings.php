<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['id'])) header('Location: login.php');
include_once('include/_header.php');
require_once('config/db.php');

if(isset($_GET['del']))
{
    if(intval($_GET['del']))
    {
        // echo $_GET['del'];
        $statement = $link->query("SELECT file FROM $tablename WHERE id = ".$_GET['del']);
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);
        // print_r($res[0]['file']);
        if(!empty($res) && $res !== 'none')
        {
            unlink($res[0]['file']);
            $statement = $link->query("DELETE FROM $tablename WHERE id = ".$_GET['del']);
            $link->execute();
            header('location: bookings.php');
        }
    }
}
?>

    <div class="container">
        <legend class="text-center">Current bookings for <?php echo $_SESSION['rollno'] ?></legend>
                    <?php
if(isset($_GET['m'])){
    if($_GET['m']=='exists'){
        echo '<h4>Slot is not Empty!</h4>';
    }
        if($_GET['m']=='s'){
        echo '<h4>Succesfully Booked!</h4>';
    }
    //$m=$_GET['m'];
    //echo $m;
}
?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>ID</th>
                    <th>Section</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Period</th>
                </tr>
            </thead>
            <tbody>
                <?php

          $q=$mysqli->query("select * from bkgs");
          $s=0;
            if(empty($q))
            {
                echo "<div class=\"well well-lg\">Oops. You have no bookings. <a href=\"booknew.php\">Create a booking request</a></div>";
            }

while($qu=mysqli_fetch_array($q)){
$s=$s+1;
echo '
<tr>
<td>'.$s.'</td>
<td>'.$qu['crid'].'</td>

<td>'.$qu['secid'].'</td>

<td>'.$qu['venue'].'</td>
<td>'.$qu['date'].'</td>
<td>'.$qu['period'].'</td>
</tr>';
}
            foreach($bookings as $id => $booking)
            {
                // print_r($booking);
                echo "
                <tr>
                    <td>".($id+1)."</td>
                    <td>".$booking['date']."</td>
                    <td>".$booking['fromTime']." - ".$booking['toTime']."</td>
                    <td>".$booking['reason']."</td>
                    <td><a href=\"".$booking['file']."\">Click here</a></td>
                    <td>".($apprStatus[$booking['approved']])."</td>
                    <td><a class=\"btn btn-danger\" href=\"bookings.php?del=".$booking['id']."\">Delete Request</a></td>
                </tr>";
            }
                ?>
            </tbody>
        </table>
    </div>

    <?php
include_once('include/_footer.php');
?>