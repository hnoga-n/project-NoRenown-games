<?php
  include 'connect.php';
  if (empty($_GET['orderId']) || !is_numeric($_GET['orderId'])) {
    header('location: ../../page404.php');
  } else {
    $id = $_GET['orderId'];
    $sql = mysqli_query($conn, "SELECT * FROM invoice_detail where orderID = {$id}");
    $sql1 = mysqli_query($conn, "SELECT * FROM invoice where gid = {$id}");
    if (mysqli_num_rows($sql) > 0 && mysqli_num_rows($sql1) > 0) {
      $row = mysqli_fetch_assoc($sql);
      $row2 = mysqli_fetch_assoc($sql1);
    } else {
      header('location: ../../page404.php');
    }
  }
  $conn->close();
?>