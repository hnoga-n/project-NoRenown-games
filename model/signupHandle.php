<?php
include 'connect.php';
if (!empty($_POST["signup_name"]) && !empty($_POST["signup_phone"]) && !empty($_POST["signup_mail"]) && !empty($_POST["signup_passwd"])) {
  $passwd = $_POST['signup_passwd'];
  $fullname = $_POST['signup_name'];
  $phone = $_POST['signup_phone'];
  $mail = $_POST['signup_mail'];
  $auth = '1,2,3';

  $sql = $conn->prepare("INSERT INTO account (passwd,	auth,	fullname,	mail,	phone)	 VALUES (?,?,?,?,?) ");
  $sql->bind_param("sssss", $passwd, $auth, $fullname, $mail, $phone);
  $sql->execute();
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