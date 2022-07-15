<?php

include 'db_connect.php';
date_default_timezone_set("Asia/Kolkata");
$msg = $_POST['msg'];
$room = $_POST['room'];
$ip = $_POST['ip'];

$query = "INSERT INTO `messagestorage` (`room`, `msg`, `ip`, `stime`) VALUES ('$room', '$msg', '$ip', current_timestamp());";
$result = mysqli_query($conn, $query);
mysqli_close($conn);

?>