<?php
session_start();
include "connect.php";
if (!empty($_POST['signin_mail']) && !empty($_POST['signin_pw'])) {
  $user = $_POST['signin_mail'];
  $passwd = $_POST['signin_pw'];

  $sql = $conn->prepare("SELECT acc_status,userID,accid,groupID FROM account WHERE mail=(?) AND passwd=(?)");
  $sql->bind_param("ss", $user, $passwd);
  $sql->execute();
  $result = $sql->get_result();

  if ($result->num_rows <= 0) {
    $_SESSION["message"] = "Invalid username or password";
    header('location: ../view/user/login.php');
  } else {
    $account_info = $result->fetch_assoc();
    if (is_null($account_info['groupID'])) {
      $_SESSION['message'] = "Your account not been authorized";
      header('location: ../view/user/login.php');
    } else
      // check if account has been blocked
      if ($account_info['acc_status'] == 0) {
        $_SESSION['message'] = "Your account had been locked !";
        header('location: ../view/user/login.php');
      } else {
        $sql_user_info = "SELECT fullname,usertypeID  FROM users WHERE userID = " . $account_info['userID'] . " ";
        $result = $conn->query($sql_user_info);
        $user_info = $result->fetch_assoc();
        setcookie("fullname", $user_info['fullname'], time() + (86400 * 1), "/");
        setcookie("accountId", $account_info['accid'], time() + (86400 * 1), "/");
        setcookie("usertype", $user_info['usertypeID'], time() + (86400 * 1), "/");
        if ($user_info['usertypeID'] == 2) {
          header('location: ../view/admin/employee.php?page=employee-profile');
        } else {
          header('location: ../index.php');
        }
      }
  }
}
