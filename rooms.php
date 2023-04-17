<?php 
$title = "Rooms & Suites";
include('includes/header.html');
require('includes/hotel_connect.php');

$q = "SELECT * FROM dhoma"; 
$r = mysqli_query($dbc, $q); 
echo '
    <div class="page-header">
        <h1 id="amenities" class="text-center">  Rooms & Suites  </h1>
    </div>
    <div id="amenities1"> 
        Whether you choose a simple room or one with energizing city view, 
        expect a host of amenities, spacious size, and extra comforts for rest-filled evenings and exciting days. <br> Scroll down to explore more of what 
        we have to offer.
    </div>
    <hr>
';