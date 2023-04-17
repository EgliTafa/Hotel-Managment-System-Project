<?php 
include('includes/header.html'); 
require('includes/hotel_connect.php');

$error = true;
$colVal = '';
$colIndex = 0;
$rowId = 0;
$update_field='';

$msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

if(isset($_POST)){
    if((isset($_POST['val'])) && (!empty($_POST['val'])) && $error) {
        $error = false;
    }else {
        $error = true;
    }
    if((isset($_POST['index'])) && ($_POST['index'] >= 0) &&  $error) {
        $error = false;
    } else {
        $error = true;
    }
    if((isset($_POST['id'])) && ($_POST['id'] > 0) && $error) {
        $error = false;
    }else {
        $error = true;
    }

    if(!$error) {
        if($_POST['index'] == 2){
            $q = "SELECT clientID FROM rezervim WHERE resID = '{$_POST['id']}'";
            $r = @mysqli_query($dbc, $q);
            $row = mysqli_fetch_array($r, MYSQLI_NUM);
            $s = $_POST['val'];
            $array = explode(" ",$s);
            $query = "UPDATE klient 
                      SET name='{$array[0]}',lName='{$array[1]}' 
                      WHERE clientID='{$row[0]}'";
        }
        else {
            if($_POST['index'] == 3){
                $update_field = "resDate='{$_POST['val']}'";
            }
            if($_POST['index'] == 4){
                $update_field = "checkIn='{$_POST['val']}'";
            }
            if($_POST['index'] == 5){
                $update_field = "checkOut='{$_POST['val']}'";
            }
            if($_POST['index'] == 6){
                $update_field = "guests={$_POST['val']}";
            }
            if($_POST['index'] == 7){
                $update_field = "price={$_POST['val']}";
            }
            
            $query = "UPDATE rezervim SET $update_field WHERE resID = '{$_POST['id']}' ";
        }
        $status = mysqli_query($dbc, $query);
        $msg = array('status' => !$error, 'msg' => 'Success! updation in mysql');
    }
}
echo json_encode($msg);
?>