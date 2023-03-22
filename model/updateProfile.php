<?php
session_start();
if (!isset($_SESSION["accountId"])) {
  $_SESSION["message"] = "Logged in expired";
  header('location: ../view/user/login.php');
}

include "connect.php";

$accid = $_SESSION['accountId'];
$passwd = $_POST['profile_newPasswd'];
$fullname = $_POST['profile_fullname'];
$phone = $_POST['profile_phone'];
$address = $_POST['profile_address'];

$sql_account = $conn->prepare("UPDATE account SET passwd = (?)");
$sql_account->bind_param("s", $passwd);
if (!$sql_account->execute()) {
  $_SESSION['message'] = "update Password failed ";
}

$account = $conn->query("SELECT userID FROM account WHERE accID = $accid")->fetch_assoc();
$userID = $account['userID'];
$sql_user = $conn->prepare("UPDATE users SET 
      fullname = (?),
      phone = (?),
      address = (?)
      WHERE userID = $userID;
      ");
$sql_user->bind_param("sss", $fullname, $phone,  $address);
$sql_user->execute();



header('location: ../view/user/userProfile.php');
$_SESSION['message'] = "Update info successfully !";
$sql_user->close();
$conn->close();
