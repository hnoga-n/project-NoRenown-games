<?php
session_start();
if (!isset($_SESSION["accountid"])) {
  $_SESSION["message"] = "Logged in expired";
  header('location: ../view/user/login.php');
}
include "connect.php";
if (!empty($_POST['profile_fullname']) && !empty($_POST['profile_phone']) && !empty($_POST['profile_address']) && !empty($_POST['profile_newPasswd'])) {
  $passwd = $_POST['profile_newPasswd'];
  $fullname = $_POST['profile_fullname'];
  $phone = $_POST['profile_phone'];
  $address = $_POST['profile_address'];
  $accid = $_SESSION['accountid'];
  $sql = $conn->prepare("UPDATE TABLE account SET 
      fullname = (?),
      passwd = (?),
      phone = (?),
      address = (?),
    WHERE accid = $accid;
      ");
  $sql->bind_param("ssss", $fullname, $passwd, $phone,  $address);
  $sql->execute();
  $conn->close();
}
