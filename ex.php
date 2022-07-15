<?php
$servername = "remotemysql.com";
$username = "zJASk1OFni";
$pwd = "xxGExl6VzO";
$dbname = "zJASk1OFni";

$conn = mysqli_connect($servername, $username, $pwd, $dbname);

if(!$conn){
    die("We fail to connect the with database<br>");
}


?>
