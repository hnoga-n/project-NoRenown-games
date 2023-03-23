<?php
session_start();
if (isset($_COOKIE['accuontId']) || isset($_COOKIE['fullname'])) {
  unset($_COOKIE['accountId']);
  unset($_COOKIE['fullname']);
  setcookie('accountId', null, -1, '/');
  setcookie('fullname', null, -1, '/');
  header('location: ../index.php');
}
