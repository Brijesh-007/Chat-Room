<?php
$room = $_GET['room'];
$username = $_GET['username'];
// echo $username;
// echo $room;
include "db_connect.php";

$query = "SELECT * FROM `claimed_rooms` WHERE room_name = '$room'";
// echo $query;
$result = mysqli_query($conn, $query);
if($result){
    if(mysqli_num_rows($result)>0){
        echo  "<script language = 'javascript'>";
        echo  'window.location="./room.php?room_name='. $room."&username=".$_GET['username'].'";';
        echo  "</script>";
    }
    else{

        // $msg = "This room doesn't exist...";
        // echo  "<script language = 'javascript'>";
        // // echo  "alert('$msg');";
        // echo  'window.location="./home2.php?username='.$_GET['username'].'";';
        // echo  "</script>";

        $msg = "invalid chatroom - plz create once";
        echo  "<script language = 'javascript'>";
        echo  "alert('$msg');";
        echo  'window.location="./home2.php?username='.$_GET['username'].'";';  
        echo  "</script>";
    }
}

?>
