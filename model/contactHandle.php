<?php
include "./connect.php";
$fullname = $_POST['contact_name'];
$phone = $_POST['contact_mail'];
$email = $_POST['contact_phone'];
$message = $_POST['contact_message'];

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// Include library files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include 'dotenv.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $_ENV['HOST_EMAIL'];
$mail->Password = $_ENV['APP_PASSWORD'];
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
$mail->isHTML(true);
$mail->setFrom($_ENV['HOST_EMAIL'], 'Norenown Game');
$mail->addReplyTo($_ENV['HOST_EMAIL'], 'Norenown Game');
$mail->addAddress($_ENV['HOST_EMAIL']);
$mail->Subject = "FEEDBACK FROM USER $fullname";
$mail->Body = "
<html>
<p>Name: <strong>$fullname</strong>\n</p> <br>
<p>Phone: <strong>$phone</strong>\n</p> <br>
<p>Mail: <strong>$email</strong>\n</p> <br>
<p>Message: <strong>$message</strong>\n</p> <br>
</html>
";
// Send email 
if ($mail->send()) {
  $_SESSION['message'] = 'Check your new password in mail';
} else {
  $_SESSION['message'] = 'Can regenerate password, maybe your gmail is not valid.';
}

header('location: ../view/user/contact.php');


// $sql_contact = $conn->prepare("INSERT INTO contact (phone,name,mail,feedback)VALUES (?,?,?,?) ");
// $sql_contact->bind_param("ssss", $phone, $fullname, $email, $message);

// if ($sql_contact->execute()) {
//   header('location: ../view/user/contact.php');
//   $_SESSION["message"] = "Thank for your concern!";
// } else {
//   $_SESSION["message"] = "Failed!";
//   header('location: ../view/user/contact.php');
// }
