<?php
session_start();
include "connect.php";
if (!empty($_POST['signin_mail']) && !empty($_POST['signin_pw'])) {
  $user = $_POST['signin_mail'];
  $passwd = $_POST['signin_pw'];

  $sql = $conn->prepare("SELECT * FROM account WHERE mail= (?) AND passwd= (?)");
  $sql->bind_param("ss", $user, $passwd);
  $sql->execute();
  $result = $sql->get_result();
  if ($result->num_rows <= 0) {
    $_SESSION["message"] = "Invalid username or password";
    header('location: ../view/user/login.php');
  } else {
    $account_info = $result->fetch_assoc();

    $sql_userinfo = "SELECT * FROM users WHERE userID = " . $account_info['userID'] . " ";
    $result = $conn->query($sql_userinfo);
    $user_info = $result->fetch_assoc();

    setcookie("fullname", $user_info['fullname'], time() + (86400 * 10), "/");
    setcookie("accountId", $account_info['accid'], time() + (86400 * 1), "/");

    header('location: ../index.php');
  }
}
