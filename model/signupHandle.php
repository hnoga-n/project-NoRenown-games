<?php
include 'connect.php';
if (!empty($_POST["signup_name"]) && !empty($_POST["signup_phone"]) && !empty($_POST["signup_mail"]) && !empty($_POST["signup_passwd"])) {
  // insert value into users 
  $fullname = $_POST['signup_name'];
  $phone = $_POST['signup_phone'];
  $address = "Address hasn't been set ";
  $usertype = 1;
  $sql_user = $conn->prepare("INSERT INTO users (phone,fullname,address,usertypeID)	 VALUES (?,?,?,?) ");
  $sql_user->bind_param("sssi", $phone, $fullname, $address, $usertype);

  if ($sql_user->execute()) {
    // if insert value into users  sucessed
    // insert value into account with userID just inserted 
    $passwd = $_POST['signup_passwd'];
    $mail = $_POST['signup_mail'];
    $groupid = 2;
    $last_insert_userID = $conn->insert_id;
    $date_create = date("Y/m/d");
    $acc_status = true;

    // start insert into account
    $sql_account = $conn->prepare("INSERT INTO account (passwd,	mail,	groupID,userID,date_create,acc_status)	 VALUES (?,?,?,?,?,?) ");
    $sql_account->bind_param("ssiiss", $passwd, $mail, $groupid, $last_insert_userID, $date_create, $acc_status);
    $sql_account->execute();
  } else {
    $_SESSION["message"] = "Sign up failed !";
    header('../view/user/login.php');
  }

  $conn->close();
}
?>
<html>

<head>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
  <div class="loggin-message">
    <div class="message-container">
      <div class="message">Sign up successfully !</div>
      <input id="confirm-button" type="button" value="Confirm">
    </div>
  </div>
</body>
<script>
  const logginMess = document.querySelector('.loggin-message ');
  const confirmBtn = document.getElementById('confirm-button');
  // confirm sign up sucessed box 
  confirmBtn.addEventListener("click", () => {
    window.location.href = "../view/user/login.php";
  })
</script>

</html>