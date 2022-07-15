<?php

function sendOTP($email, $otp){

    require 'phpMail/class.phpmailer.php';
    require 'phpMail/class.smtp.php';
    require 'phpMail/PHPMailerAutoload.php';

    $msg = "One Time Password for Signup is: ".$otp;

    // $mail = new PHPMailer();
    // $mail->setFrom('bhagyesh096@gmail.com', 'Bhagyesh');
    // $mail->AddAddress($email);
    // $mail->Subject="OTP to Signup";
    // $mail->MsgHTML($msg);
    // $result = $mail->Send();

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPDebug=0;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure="tls";
    $mail->Port=587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username="mychatapplication85@gmail.com";
    $mail->Password='mychat@1234';
    $mail->AddAddress($email);
    $mail->setFrom('mychatapplication85@gmail.com', 'chatroom');
    $mail->isHTML(true);
    $mail->Subject="OTP to Signup";
    $mail->MsgHTML($msg);
    $result = $mail->Send();

    if(!$result){
        echo "Mailer error: ". $mail->ErrorInfo;
    }
    else{
        return $result;
    }
}
?>