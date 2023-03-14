<?php

include "connect.php";

if (isset($_GET['mail'])) {
  $mail = $_GET['mail'];
  $sql_mail = $conn->prepare("SELECT * FROM account WHERE mail = (?)");
  $sql_mail->bind_param("s", $mail);
  $sql_mail->execute();
  $result1 = $sql_mail->get_result();
  $sql_mail->close();
  if ($result1->num_rows > 0) {
    echo "mailExist";
  }
}

$conn->close();
