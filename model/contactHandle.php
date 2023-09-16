<?php
include "./connect.php";
$fullname = $_POST['contact_name'];
$phone = $_POST['contact_mail'];
$email = $_POST['contact_phone'];
$message = $_POST['contact_message'];

$sql_contact = $conn->prepare("INSERT INTO contact (phone,name,mail,feedback)VALUES (?,?,?,?) ");
$sql_contact->bind_param("ssss", $phone, $fullname, $email, $message);

if ($sql_contact->execute()) {
  $_SESSION["message"] = "Thank for your concern!";
  header('../view/user/contact.php');
} else {
  $_SESSION["message"] = "Failed!";
  header('../view/user/contact.php');
}
