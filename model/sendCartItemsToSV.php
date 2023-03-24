<?php
include 'connect.php';
session_start();
if(isset($_GET['total'])) {
    $item_id=$_GET['total'];
    $_SESSION['total']=$_GET['total'];
}
header("Location: ../view/user/payment.php");

?>