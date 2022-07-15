<?php
date_default_timezone_set("Asia/Kolkata");
$room = $_POST['roombox'];
$username = $_POST['name'];
include "db_connect.php";
$query = "SELECT `msg`, `stime` ,`ip` FROM `messagestorage` WHERE `room`='$room'";  
$chatBox = ""; 
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){

        if($_POST['name'] == $row['ip']){
            $chatBox = $chatBox.'<div class="container" style="background-color: lightgreen;">';
            // $chatBox = $chatBox.'<div class="anyClass">';
            $chatBox = $chatBox.'<span class="time-right" style="color: black;">'.'You ';
            $chatBox = $chatBox.'Says </span><br><span class="time-right" style="color: black;">'.$row['msg'];
            $chatBox = $chatBox.'</span><br><span class="time-left">'. $row["stime"]. '</span></div>';
        }
        else{
            $chatBox = $chatBox.'<div class="container" style="background-color: lightskyblue;">';
            // $chatBox = $chatBox.'<div class="anyClass">';
            $chatBox = $chatBox.$row['ip'];
            $chatBox = $chatBox." Says <p>".$row['msg'];
            $chatBox = $chatBox.'</p> <span class="time-right">'. $row["stime"]. '</span></div>';
        }
        
    }
}
echo $chatBox; 
?>