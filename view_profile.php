<?php 
$title = "Profile";
include('includes/header.html');
require('includes/hotel_connect.php');

if(!isset($_SESSION['emp_id'])){
    header('location: index.php');
}

$q = "SELECT * FROM staf WHERE staffID={$_SESSION['emp_id']}"; 
$r = mysqli_query($dbc, $q); 
$row = mysqli_fetch_assoc($r);
?> 

<div class="page-header">
    <h1 id="amenities" class="text-center">  Your account  </h1>
</div>
<!-- <div class="row"> -->
        <div class="col-md-12">
            <div class="well">
                <div class="row">
                    <div class=" col-md-4">
                        <img src="<?php echo "uploads/".$row['profile_pic']; ?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="info col-md-8">
                        <h1><?php echo "  ".$row['fname'].' '.$row['lname']; ?></h1>
                        <br>
                        <small><cite title="Hotel Staff"> Hotel Staff<i class="glyphicon glyphicon-map-user">
                        </i></cite></small><br><br>
                        <p>
                            <i class="glyphicon glyphicon-globe"></i> Tirana, Albania
                            <br /><br>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo " ".$row['email']; ?>
                            <br /><br>
                            <i class="glyphicon glyphicon-earphone"></i><?php echo " ".$row['tel']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->