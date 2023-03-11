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
  echo $result->num_rows;
  if ($result->num_rows <= 0) {
    $_SESSION["message"] = "Invalid username or password";
    header('location: ../view/user/login.php');
  } else {
    $row = $result->fetch_assoc();
    setcookie("fullname", $row['fullname'], time() + (86400 * 10), "/");

    $_SESSION['accountId'] = $row['accid'];
    header('location: ../index.php');
  }
}
