<?php 
    include "connect.php";
    session_start();

    $status = $_GET['status'];
    $orderID = $_GET['orderID'];

    $updateStatus = "UPDATE invoice SET order_status = {$status} WHERE accID = {$_COOKIE['accountId']} AND orderID = {$orderID}";
    $result = $conn->query($updateStatus);

    echo "Cancel successful"
?>