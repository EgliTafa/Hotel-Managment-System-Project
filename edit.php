<?php
$title = "Edit Profile";
include('includes\header.html');
if(!isset($_SESSION['emp_id']) || !isset($_SESSION['role'])){
    header('location: index.php');
}else{
    $id = $_SESSION['emp_id'];
    $role = $_SESSION['role'];

    require('includes/hotel_connect.php');
    echo '
    <div class="box"> 
        <div class="page-header">
        <h1 id="amenities" class="text-center">Edit profile</h1>
        </div>
    ';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = [];
        
        if(empty($_POST['first_name'])){
            $errors = "You forgot to enter first name.";
        }else{
            $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
        }
    
        if(empty($_POST['last_name'])){
            $errors = "You forgot to enter last name.";
        }else{
            $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
        }
    
        if (empty($_POST['email'])) {
            $errors[] = 'Email address cannot be empty.';
        } else {
            $e = mysqli_real_escape_string($dbc,trim($_POST['email']));
            if(!filter_var($e,FILTER_VALIDATE_EMAIL)){
                $errors[] = "Invalid email";
            }
        }

        $phone = mysqli_real_escape_string($dbc,trim($_POST['phone']));

        if(empty($errors)){
            $q = "SELECT staffID FROM staf WHERE email='$e' AND staffID != '$id'";
            $r = @mysqli_query($dbc, $q);
            $num = mysqli_num_rows($r);
            if($num == 0){
                $q = "UPDATE staf SET
                      fname='$fn', lname='$ln', email='$e', tel='$phone'
                      WHERE staffID=$id
                      LIMIT 1";
                $r = @mysqli_query($dbc, $q);
                if(mysqli_affected_rows($dbc) == 1){
                    echo '<div class="sukses">The user has been edited.</div>';
                }else{
                    echo '<div class="error">The user could not be edited due to a system error.<br>
                            We apologize for any inconvenience. </div>'; 
                }
            }else{
                echo '<div class="error"> This email is already in use. </div>';
            }
        }else{
            echo '<div class="error">'.$errors[0].'</div>';
        }
    }
    $q = "SELECT fname, lname, email, tel
          FROM staf
          WHERE staffID='$id'";
    $r = @mysqli_query($dbc, $q);
    if(mysqli_num_rows($r) == 1){
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        echo '<form action="edit.php" method="POST" enctype="multipart/form-data"> 
            <label> First Name: </label><br>
            <input type="text" class="form-control form-control-lg" name="first_name" maxlength="20" size="20" value="'.$row['fname'].'"><br>
            <label> Last Name: </label><br>
            <input type="text" class="form-control form-control-lg" name="last_name" maxlength="30" size="20" value="'.$row['lname'].'"><br>
            <label> Email: </label><br>
            <input type="email" class="form-control form-control-lg" name="email" maxlength="60" size="25" value="'.$row['email'].'"><br>
            <label> Contact Number: </label><br>
            <input type="text" class="form-control form-control-lg" name="phone" maxlength="20" size="20" value="'.$row['tel'].'"><br>
            <br>
            ';
            echo'
            <button class="btn btn-info" type="submit" name="submit" value="submit">Save</button>
            <a class="btn btn-default" href="user_settings.php">Cancel</a>
            <input type="hidden" name="id" value="'.$id.'">
            </form>';
    }
}

mysqli_close($dbc);
include('includes\footer.html'); 

?>