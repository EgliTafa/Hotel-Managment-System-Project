<?php 
$title = "Add New Room";
include('includes/header.html');
include('includes/hotel_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = [];
        
    if(empty($_POST['roomNo'])){
        $errors[] = "You forgot to enter the number of rooms.";
    }else{
        $roomNo = mysqli_real_escape_string($dbc, trim($_POST['roomNo']));
    }
    
    if(empty($_POST['type'])){
        $errors[] = "You forgot to enter the room type.";
    }else{
        if($_POST['type']!='single' && $_POST['type']!='double' && $_POST['type']!='family' && $_POST['type']!='suite' && $_POST['type']!='presidential suite' && $_POST['type']!='standard'){
            $errors[] = "Please choose a correct room type.";
        }else{
            $type = mysqli_real_escape_string($dbc, trim($_POST['type']));
        }
    }
    
    if(empty($_POST['beds'])){
        $errors[] = "You forgot to enter the number of beds.";
    }else{
        $beds = mysqli_real_escape_string($dbc, trim($_POST['beds']));
    }

    if(empty($_POST['capacity'])){
        $errors[] = "You forgot to enter the room capacity.";
    }else{
        $capacity = mysqli_real_escape_string($dbc, trim($_POST['capacity']));
    }

    if(empty($_POST['price'])){
        $errors[] = "You forgot to enter the price.";
    }else{
        $price = mysqli_real_escape_string($dbc, trim($_POST['price']));
    }

    if(empty($_POST['internet'])){
        $errors[] = "You forgot to enter the internet information.";
    }else{
        $internet = mysqli_real_escape_string($dbc, trim($_POST['internet']));
    }

    if(empty($_POST['balcony'])){
        $errors[] = "You forgot to enter the balcony information.";
    }else{
        $balcony = mysqli_real_escape_string($dbc, trim($_POST['balcony']));
    }

    if(empty($_POST['floor'])){
        $errors[] = "You forgot to enter the floor number.";
    }else{
        $floor = mysqli_real_escape_string($dbc, trim($_POST['floor']));
    }

    if(empty($_POST['pets'])){
        $errors[] = "You forgot to enter the pets information.";
    }else{
        $pets = mysqli_real_escape_string($dbc, trim($_POST['pets']));
    }

    if(empty($_POST['status'])){
        $errors[] = "You forgot to enter the room status.";
    }else{
        $status = mysqli_real_escape_string($dbc, trim($_POST['status']));
    }

    if(!empty($errors)){
        echo '<div class="error">'.$errors[0].'</div>';
    }else{
        $sql = "INSERT INTO `dhoma`(`roomNo`, `type`, `beds`, `capacity`, `price`, `internet`, `balcony`, `floor`, `pets`, `status`) 
                VALUES ($roomNo, '$type', $beds, $capacity, $price, '$internet', '$balcony', '$floor', '$pets', '$status')";

        $result = mysqli_query($dbc,$sql);

        if (mysqli_affected_rows($dbc) == 1) {
            echo "<div class='sukses'> New  room record created successfully. </div>";
        }else{
            echo "<div class='error'>There was an error inserting data. We apologize for any inconvenience. </div>";
        } 
    }
}
?>
<h1 id='amenities'>Add New Room</h1>
            <form action="create_room.php" method="post" >
            <fieldset>
                <legend>Room information:</legend>
                <div class="controls col-md-6">
                    <h4 class="form-label">Number Of Rooms:</h4><br>
                    <input type="number" min="1" name="roomNo" class="form-control form-control-lg" value="<?php if (isset($_POST['roomNo'])) echo $_POST['roomNo']; ?>" required>
                </div>

                <div class="controls col-md-6">
                    <h4 class="form-label">Type:</h4><br>
                    <input type="text" name="type" class="form-control form-control-lg" value="<?php if (isset($_POST['type'])) echo $_POST['type']; ?>" required><br>
                </div>

                <div class="controls col-md-6">
                    <h4 class="form-label">Beds:</h4><br>
                    <input type="number" name="beds" class="form-control form-control-lg" value="<?php if (isset($_POST['beds'])) echo $_POST['beds']; ?>" required><br>
                </div>

                <div class="controls col-md-6">
                    <h4 class="form-label">Capacity:</h4><br>
                    <input type="number" name="capacity" min="1" max="12" class="form-control form-control-lg" value="<?php if (isset($_POST['capacity'])) echo $_POST['capacity']; ?>" required><br>
                </div> 

                <div class="controls col-md-4">
                    <h4 class="form-label control-label">Internet:</h4><br>
                    <div class="btn-group">
                        <label class="btn btn-sm btn-primary"> <input type="radio" name="internet" value="yes" <?php if(isset($_POST['internet'])){if($_POST['internet']=='yes'){ echo "checked"; }} ?>> YES </label>
                        <label class="btn btn-sm btn-primary"> <input type="radio" name="internet" value="no" <?php if(isset($_POST['internet'])){if($_POST['internet']=='no'){ echo "checked"; }} ?>> NO</label>
                    </div>
                </div>
            <br>
                <div class="controls col-md-4">
                    <h4 class="form-label control-label">Balcony:</h4><br>
                    <div class="btn-group">
                        <label class="btn btn-sm btn-primary"> <input type="radio" name="balcony" value="yes" <?php if(isset($_POST['balcony'])){if($_POST['balcony']=='yes'){ echo "checked"; }} ?>> YES </label>
                        <label class="btn btn-sm btn-primary"> <input type="radio" name="balcony" value="no" <?php if(isset($_POST['balcony'])){if($_POST['balcony']=='no'){ echo "checked"; }} ?>> NO</label>
                    </div>
                </div>
            <br>
            <div class="controls col-md-4">
                    <h4 class="form-label control-label">Pets:</h4><br>
                    <div class="btn-group">
                        <label class="btn btn-sm btn-primary"> <input type="radio" name="pets" value="yes" <?php if(isset($_POST['pets'])){if($_POST['pets']=='yes'){ echo "checked"; }} ?>> YES </label>
                        <label class="btn btn-sm btn-primary"> <input type="radio" name="pets" value="no" <?php if(isset($_POST['pets'])){if($_POST['pets']=='no'){ echo "checked"; }} ?>> NO</label>
                    </div>
                </div>
            <br><br>
                <div class="controls col-md-10">
                    <h4>Floor Number:</h4><br>
                    <input type="range" name="floor" id="floor" min="0" max="6" value="<?php if (isset($_POST['floor'])) {echo $_POST['floor'];} else {echo "0"; }?>" required><br>
                </div>
                <div class="controls col-md-2">
                    <span id="range-value" class="btn btn-primary" style="margin-top: 20%; color: #fff; font-size:large;"><?php if (isset($_POST['floor'])) {echo $_POST['floor'];}else {echo "0";} ?></span>
                </div>
            <br>
            <div class="controls col-md-12">
                    <h4 class="form-label">Price:</h4>
                    <input type="number" name="price" class="form-control form-control-lg"  value="<?php if (isset($_POST['price'])) echo $_POST['price'];?>" required><br>
            </div> 
            <br><br>
            <div class="controls col-md-12">
                <input  class="btn btn-primary" type="submit" value="Add" name="submit">
                <a class="btn btn-default" href="view_room.php">Cancel</a>
            </div>
            </fieldset>
        </form> 

        <script>
            $(document).ready(function(){
                $('#floor').on('input', function(){
                    $('#range-value').html($(this).val());
                });
            });
        </script>
</body>
</html>