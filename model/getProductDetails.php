<?php
  include 'connect.php';
  if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: ../../page404.php');
  } else {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM game_detail where gdt_id = {$id}");
    $sql1 = mysqli_query($conn, "SELECT * FROM games where gid = {$id}");
    if (mysqli_num_rows($sql) > 0 && mysqli_num_rows($sql1) > 0) {
      $row = mysqli_fetch_assoc($sql);
      $row2 = mysqli_fetch_assoc($sql1);
      $result = round((float)$row2['gprice'] - (float)$row2['gprice'] * (int)$row2['gdiscount'] * 0.01, 2);
    } else {
      header('location: ../../page404.php');
    }
  }
?>