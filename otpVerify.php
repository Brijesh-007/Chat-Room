<?php
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$generated_otp = $_POST['generated_otp'];
$otp = $_POST['otp'];

if($otp == $generated_otp){
    include 'db_connect.php';
    $query = "INSERT INTO `register_user` (`username`, `password`) VALUES ('$name','".$_POST['pwd']."');";
    $result = mysqli_query($conn, $query);
    $msg = "Signup Successfully...Plz Login";
    echo  "<script language = 'javascript'>";
    echo  "alert('$msg');";
    echo  'window.location="./login.php";';
    echo  "</script>";
}
else{
    $msg = "Invalid OTP";
    echo  "<script language = 'javascript'>";
    echo  "alert('$msg');";
    echo  'window.location="./otpVerify.php";';
    echo  "</script>";
}
?>