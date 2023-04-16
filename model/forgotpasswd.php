<?php
session_start();
if (isset($_COOKIE['accountId']) && $_COOKIE['usertype'] == 1) {
  header('location: ../../index.php');
}
if (isset($_COOKIE['accountId']) && $_COOKIE['usertype'] == 2) {
  header('location: ../admin/employee.php?page=employee-profile');
}
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Include library files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "connect.php";
if (isset($_POST['mail'])) {

  $sql = $conn->prepare("SELECT mail,accid FROM account WHERE mail=(?)");
  $sql->bind_param("s", $_POST['mail']);
  $sql->execute();
  $result = $sql->get_result();

  if ($result->num_rows <= 0) {
    $_SESSION['message'] = "* Email not recognized !";
  } else {
    $account = $result->fetch_assoc();

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'norenowngaming@gmail.com';
    $mail->Password = 'uvjxuqfocqcpwbmf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('norenowngaming@gmail.com', 'Norenown Game');
    $mail->addReplyTo('norenowngaming@gmail.com', 'Norenown Game');
    $mail->addAddress($_POST['mail']);
    $mail->Subject = "YOUR NEW PASSWORD";
    $newpass = strval(rand(10000000, 99999999));
    $mail->Body = "Your password is: $newpass";

    $sql_update_pass = $conn->prepare("UPDATE account SET passwd=(?) WHERE accid=(?) ");
    $sql_update_pass->bind_param("si", $newpass, $account['accid']);

    // Send email 
    if ($mail->send() && $sql_update_pass->execute()) {
      $_SESSION['message'] = 'Check your new password in mail';
    } else {
      $_SESSION['message'] = 'Can regenerate password, maybe your gmail is not valid.';
    }
  }
}


?>

<html lang="en">

<head>
  <link rel="stylesheet" href="../assets/css/forgotpass.css">
  <link rel="stylesheet" href="../assets/css/reset.css">
  <title>Forgot pass</title>
</head>

<body>
  <div class="main-forgot-page">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="fgpass-container" method="POST">
      <div class="title">Type in your email:</div>
      <input name="mail" type="email" class="email" id="forgot-mail" placeholder="instantgames@gmail.com">
      <div class="message" id="mail-message">
        <?php
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
        ?>
      </div>
      <button type="submit">GET CODE</button>
    </form>
  </div>

</body>

</html>