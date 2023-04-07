<?php
session_start();
if (isset($_COOKIE['accountId']) || isset($_COOKIE['fullname'])) {
  unset($_COOKIE['accountId']);
  unset($_COOKIE['fullname']);
  unset($_COOKIE['usertype']);
  setcookie('accountId', null, -1, '/');
  setcookie('fullname', null, -1, '/');
  setcookie('usertype', null, -1, '/');
  header('location: ../index.php');
}
