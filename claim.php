<?php
$room = $_GET['room'];
$username = $_GET['username'];

if(strlen($room)>20 or strlen($room)<2){
    $msg = "Please choose a name between 2 to 20 characters";
    echo  '<script language="javascript">';
    echo  "alert('$msg');";
    echo  'window.location="http://{$_SERVER['SERVER_NAME']}//home2.php";';
    echo  "</script>";
}

else if(!ctype_alnum($room)){
    $msg = "Please choose an alphanumeric room name";
    echo  "<script language = 'javascript'>";
    echo  "alert('$msg');";
    echo  'window.location="./home2.php";';
    echo  "</script>";
}

else{
    include "db_connect.php";
}

$query = "SELECT * FROM `claimed_rooms` WHERE room_name = '$room'";
$result = mysqli_query($conn, $query);

if($result){
    if(mysqli_num_rows($result)>0){
        $msg = "This name is claimed...";
        echo  "<script language = 'javascript'>";
        echo  "alert('$msg');";
        echo  'window.location="./home2.php";';
        echo  "</script>";
    }
    else{
        $query = "INSERT INTO `claimed_rooms` (`room_name`, `time`) VALUES ('$room', current_timestamp());";
        $result = mysqli_query($conn, $query);
        $msg = "Your room is ready, go and have fun...";
        echo  "<script language = 'javascript'>";
        echo  "alert('$msg');";
        echo  'window.location="./room.php?room_name='. $room."&username=".$_GET['username'].'";';
        echo  "</script>";
    }
}
else{
}
?>