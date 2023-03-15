<?php
session_start();
if (!isset($_SESSION["accountId"])) {
  $_SESSION["message"] = "Logged in expired";
  header('location: ../view/user/login.php');
}

include "connect.php";

$passwd = $_POST['profile_newPasswd'];
$fullname = $_POST['profile_fullname'];
$phone = $_POST['profile_phone'];
$address = $_POST['profile_address'];
$accid = $_SESSION['accountId'];
$sql = $conn->prepare("UPDATE account SET 
      fullname = (?),
      passwd = (?),
      phone = (?),
      address = (?)
    WHERE accid = $accid;
      ");
$sql->bind_param("ssss", $fullname, $passwd, $phone,  $address);
$sql->execute();
header('location: ../view/user/userProfile.php');
$_SESSION['message'] = "Update info successfully !";
$sql->close();
$conn->close();
