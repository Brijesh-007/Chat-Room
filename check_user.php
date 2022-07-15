<?php

include "db_connect.php";

$name = $_POST['name'];
$pwd = $_POST['pwd'];
$dbpwd = "";

$query = "SELECT `password` FROM `register_user` WHERE `username` = '$name' ";
$result = mysqli_query($conn, $query);

if($result){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $dbpwd = $dbpwd.$row['password'];

        if(strcmp($dbpwd, $_POST['pwd'])){
            $msg = "invalid password";
            echo  "<script language = 'javascript'>";
            echo  "alert('$msg');";
            echo  'window.location="./login.php";';  
            echo  "</script>";
            
        }
        else{
            echo  "<script language = 'javascript'>";
            echo  'window.location="./home1.php?username='.$name.'";';
            echo  "</script>";
        }
    }
    else{
        $msg = "invalid user - plz sign up";
        echo  "<script language = 'javascript'>";
        echo  "alert('$msg');";
        echo  'window.location="./signup.php";';  
        echo  "</script>";
    }
}
?>

