<!DOCTYPE html>
<html lang="en">
<head>
<style>
p {
  float: right;
  line-height: 3.0;
  text-indent: 50px;

}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
//require "index.html";
if (isset($_POST['formsub'])) {
    # code...
    $user=$_POST['email'];
    //$pass=$_POST['pass'];
    $to = "keylupet@gmail.com";
    $subject = "Hello world!";
    $message = $_POST['msg'];
  $headers = "From: $user\r\n";
    // if (mail($to, $subject, $message, $headers)) {
    //    echo "Email Sent!";
    // } else {
    //    echo "ERROR";
    // }

    require 'PHPMailer\PHPMailerAutoload.php';

$mail = new PHPMailer;
//$log=$mail->SMTPDebug = 4;

                             

$mail->setFrom($user, $user);
$mail->addAddress($to, $to);     // Add a recipient
//$mail->addAddress('@example.com');               // Name is optional
$mail->addReplyTo($user, 'Information');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo '<center><h5><font color=red>Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo. '</font></h5>';
} else {
    echo '<center><font color=green>*Message has been sent*</font>';
}

}elseif (isset($_POST['out'])) {
    $path = $_SERVER['localhost'].'/PHPVSCODE/databases/sqlitedatabase';
    echo "<br>Welcome! Login Success!";
    header("Location:$path/loginsqlite.php"); 
}
