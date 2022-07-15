<?php
$room = $_GET['roomname'];
include "db_connect.php";
$query = "SELECT `msg`, `stime` ,`ip` FROM `messagestorage` WHERE `room`='$room'";
$result = mysqli_query($conn, $query);
$data = '<table><tr><td>Name</td><td>Chat</td><td>Time</td></tr>';
while($row = mysqli_fetch_assoc($result)){
    $data.='<tr><td>'.$row['ip'].'</td><td>'.$row['msg'].'</td><td>'.$row['stime'].'</td></tr>';
}
$data.='</table>';
header('Content-Type: application/xls');
header('Content-Disposition:attachment;filename=chat.xls');
echo $data;
?>