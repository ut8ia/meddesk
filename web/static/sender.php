<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);


// start session
//session_start();
//$s_captcha=$_SESSION['captcha'];

// load mailer library
require_once "class.phpmailer.php";


function smtpmailer($to, $from, $from_name, $subject, $body, $attachment) {
    global $error;
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = "mobigift.tech.public@gmail.com";
    $mail->Password = "4>#HP,k:_h5\pnvv";
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}

$p_captcha=htmlspecialchars ($_POST['feedbackCode']);
$user_comment=htmlspecialchars ($_POST['message']);
$userTel=htmlspecialchars ($_POST['phone']);
$userEmail=htmlspecialchars ($_POST['email']);
$userName=htmlspecialchars ($_POST['name']);

// mail parameters
$message="User  ".$userName.PHP_EOL
    .'Phone :'.$userTel.PHP_EOL
    .'Email :'.$userEmail.PHP_EOL
    .'Message :'.$user_comment.PHP_EOL;

$head= 'Message from positive landing page!';
$from='mobigift.tech.public@gmail.com';
$to='welcome@mymobi.gift';
$name='Mobigift landing sender';


if (smtpmailer($to, $from,$name,$head, $message ,$upload['filename'])) {
    // redirect to sunny page !
    header("Location:https://www.mymobi.gift");
}


?>