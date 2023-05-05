<?php
    include 'connect.php';
    if(isset($_GET['orderid'])) {
        $orderid = $_GET['orderid'];
        if(isset($_GET['orderstatus']) && $_GET['orderstatus'] == '2') {
        $sql = "UPDATE invoice SET order_status = '2' WHERE orderID = $orderid
        ";
        }
        else if(isset($_GET['orderstatus']) && $_GET['orderstatus'] == '1') {
            $sql = "UPDATE invoice SET order_status = '1' WHERE orderID = $orderid
        ";
            $selectOrder = "SELECT *,SUM(games.gquantity - invoice_detail.quantity) AS SL FROM games JOIN invoice_detail ON games.gid = invoice_detail.gid WHERE invoice_detail.orderID = {$_GET['orderid']} GROUP BY games.gid";

        }
        $result = $conn->multi_query($sql);
        $result2 = $conn->query($selectOrder);
        while ($row = $result2->fetch_assoc()) {
            $updateGameQuantity = "UPDATE games SET gquantity = {$row['SL']} WHERE games.gid = {$row['gid']}";
            $conn->query($updateGameQuantity);
        }
        if($result === TRUE) {
            echo "Change Status successfully !";
        }
        else {
            echo "Change Status failed !";
        }
    }
    else {
        echo "Order ID not found !";
    }

        

    $conn->close();
?>