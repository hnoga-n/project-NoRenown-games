<?php
session_start();


if (!isset($_COOKIE["accountId"])) {
  $_COOKIE["message"] = "Logged in expired";
  header('location: ../view/user/login.php');
}

switch ($_GET['query']) {
  case "updatecustomer":
    updateCustomerProfile();
    break;
  case "updateemployee":
    updateEmployeeProfile();
    break;
}

function updateCustomerProfile()
{
  include "connect.php";
  $accid = $_COOKIE['accountId'];
  $passwd = $_POST['profile_newPasswd'];
  $fullname = $_POST['profile_fullname'];
  $phone = $_POST['profile_phone'];
  $address = $_POST['profile_address'];

  $sql_account = $conn->prepare("UPDATE account SET passwd = (?) WHERE accid=$accid");
  $sql_account->bind_param("s", $passwd);
  if (!$sql_account->execute()) {
    $_SESSION['message'] = "update Password failed ";
    header('location: ../view/user/userProfile.php');
  }

  $account = $conn->query("SELECT userID FROM account WHERE accID = $accid");
  while ($row = $account->fetch_assoc()) {
    $userID = $row['userID'];
    $sql_user = $conn->prepare("UPDATE users SET 
          fullname = (?),
          phone = (?),
          address = (?)
          WHERE userID = $userID;
          ");
    $sql_user->bind_param("sss", $fullname, $phone,  $address);
    $sql_user->execute();
  }
  $_SESSION['message'] = "Update info successfully !";
  $sql_user->close();
  $conn->close();
  header('location: ../view/user/userProfile.php');
}


function updateEmployeeProfile()
{
  include "connect.php";
  $accid = $_COOKIE['accountId'];
  $fullname = $_COOKIE['fullname'];
  $passwd = $_POST['user_passwd'];
  $phone = $_POST['user_phone'];
  $address = $_POST['user_address'];

  $sql_account = $conn->prepare("UPDATE account SET passwd = (?) WHERE accid=$accid");
  $sql_account->bind_param("s", $passwd);
  if (!$sql_account->execute()) {
    $_SESSION['message'] = "update Password failed ";
    header('location: ../view/admin/employee.php?page=employee-profile');
  }

  $account = $conn->query("SELECT userID FROM account WHERE accID = $accid");
  while ($row = $account->fetch_assoc()) {
    $userID = $row['userID'];
    $sql_user = $conn->prepare("UPDATE users SET 
          fullname = (?),
          phone = (?),
          address = (?)
          WHERE userID = $userID;
          ");
    $sql_user->bind_param("sss", $fullname, $phone,  $address);
    $sql_user->execute();
  }
  $sql_user->close();
  $conn->close();
  $_SESSION['message'] = "Update info successfully !";
  header('location: ../view/admin/employee.php?page=employee-profile');
}
