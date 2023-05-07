<?php 
    include "connect.php";
    session_start();

    $status = $_GET['status'];
    $orderID = $_GET['orderID'];

    $selectOrderDetail = "SELECT * FROM invoice_detail JOIN games ON invoice_detail.gid = games.gid WHERE orderID = {$orderID}";
    $result2 = $conn->query($selectOrderDetail);

    while ($row = $result2->fetch_assoc()) {
        
        $sql2 = "SELECT gquantity FROM games WHERE gid = {$row['gid']}";
        $result3 = $conn->query($sql2);
        $row2 = $result3->fetch_assoc();

        $quantity = (int) $row2['gquantity'] + (int) $row['quantity'];
        $updateGameQuantity = "UPDATE games SET gquantity = $quantity WHERE games.gid = {$row['gid']}";
        $conn->query($updateGameQuantity);
    }

    $updateStatus = "UPDATE invoice SET order_status = {$status} WHERE accID = {$_COOKIE['accountId']} AND orderID = {$orderID}";
    $result = $conn->query($updateStatus);

    echo "Cancel successful";
    $conn->close()
?>