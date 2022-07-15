<?php
include "db_connect.php";
$roomName = $_GET['roomname'];
$username = $_GET['name'];
$query = "DELETE FROM `messagestorage` WHERE `messagestorage`.`room`='".$roomName."';";

$result = mysqli_query($conn, $query);
// echo $_GET['name'];
$msg = "chats deleted";
echo  "<script language = 'javascript'>";
echo  "alert('$msg');";
echo  'window.location="./room.php?room_name='. $roomName."&username=".$username.'";';
echo  "</script>";


?>