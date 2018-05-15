<?php
error_reporting(0);
session_start();
include 'config/db.php';
$midt=date("Y-m-d");
$madt=date('Y-m-d', strtotime('+7 days'));

if (!isset($_SESSION['id'])) header('Location: login.php');

include_once('include/_header.php');

?>

    <form method="POST" id="bookForm" action="book.php" class="col-md-6 col-md-push-3 well" onsubmit="return validate();" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add">
        <fieldset>
            <legend class="text-center">Book Venue</legend>
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
            <div class="form-group">
                <label for="rollno">ID.</label>
                <input type="text" name="rollno" class="form-control" id="rollno" readonly value="<?php echo $_SESSION['id'] ?>">
            </div>
           <!-- <div class="form-group">
                <label for="email">Email ID</label>
                <input type="email" required name="email" class="form-control" id="email" placeholder="Enter the email ID you want to recieve confirmation on" value="<?php echo strtolower($_SESSION['rollno']) ?>">
            </div>-->
            <div class="form-group">
                <label for="venue" class="col-md-3 control-label">Select Venue:</label>
                <div class="col-md-9">
                    <select name="venue" class="form-control" id="venue">
                        <option value="Selected" disabled selected> Select Slot</option>
                        <?php
                        $s=$mysqli->query("select * from venue");
                        while($se=mysqli_fetch_array($s)){
                            echo '
                            <option value="'.$se['slot'].'">'.$se['slot'].'</option>
                            ';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <br>
        <fieldset>
            <div class="form-group">
                <label for="date" class="col-md-3 control-label">Select Date:</label>
                <div class="col-md-9">
                    <input type="date" id="date" name="date" class="form-control" min="<?php echo $midt; ?>" max="<?php echo $madt; ?>" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                    <span class="text-danger hidden" id="dateerr">Please enter a valid time.</span>
                    <span class="text-danger hidden" id="bookerr"><br>This slot is already taken. Please choose another slot.</span>
                </div>
            </div>
        </fieldset>
        <br>
        <fieldset>
            <div class="form-group">
                <label for="from" class="col-md-3 control-label"> Select Period : </label>
                <div class="col-md-4">
                    <select class="form-control" id="from" name="period">
                    <option value="selected" disabled selected>Select Period</option>
                    <?php
                    $sec=$_SESSION['sec'];
                    $s=$mysqli->query("select * from slot where secid='$sec'");
                    while($sl=mysqli_fetch_array($s)){
                        echo '<option value="'.$sl['period'].'">'.$sl['period'].'</option>
                        ';
                    } 
                    ?>
                    </select>        
                </div>
                
            </div>
            <span class="text-danger hidden" id="timeerr">Beginning time should not be greater than the ending date</span>
        </fieldset>
        <br><!--
        <fieldset>
            <div class="form-group">
                <label for="reason" class="col-md-3 control-label">Reason for Booking:</label>
                <div class="col-md-9">
                    <textarea class="form-control" rows="3" name="reason" id="reason" placeholder="Enter reason for booking here"></textarea>
                </div>
            </div>
            <br>

        </fieldset>-->
        <fieldset>
            <div class="text-center">
                <small id="status" class="form-text hidden">Bleh</small>
                <br>
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </fieldset>
        <!-- <hr style="border-top:2px dashed #aaa; margin: 10px 50px;"> -->
  <!--      <fieldset class="text-center" style="border:2px dashed #aaa; padding: 20px; margin: 20px;">
            <a onclick="loadBookings()" class="btn btn-success btn-sm">Show existing bookings</a>
            <br>
            <br>
            <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th>Venue</th>
                        <th>Booked by</th>
                        <th>Booked on</th>
                        <th>From</th>
                        <th>To</th>
                    </tr>
                </thead>
                <tbody id="bookShow">
                </tbody>
            </table> 
            </div> 
        </fieldset>-->
    </form>

<?php
    include_once('include/_footer.php');
?>
<html>
<body style="background-image:url('login12.jpg')">
</body>
</html>