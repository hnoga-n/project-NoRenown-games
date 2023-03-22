<?php
if (isset($_SESSION['accuontId']) || isset($_COOKIE['fullname'])) {
  unset($_SESSION['accountId']);
  unset($_COOKIE['fullname']);
  setcookie('fullname', null, -1, '/');
  header('location: ../index.php');
}
