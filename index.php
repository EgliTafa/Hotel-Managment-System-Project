<?php 
$title = "Welcome";
include('includes/header.html');
if(isset($_SESSION['emp_id']) || isset($_SESSION['role'])){
    header('location: view_reservations.php');
}
include('includes/footer.html');
?>