<?php
    include 'connect.php';
    if(isset($_GET['orderid'])) {
        $orderid = $_GET['orderid'];
        if(isset($_GET['orderstatus']) && $_GET['orderstatus'] == '2') {
        $sql = "UPDATE invoice SET order_status = '2' WHERE orderID = $orderid
        ";
        $selectOrderDetail = "SELECT * FROM invoice_detail JOIN games ON invoice_detail.gid = games.gid WHERE orderID = {$orderid}";
        $result2 = $conn->query($selectOrderDetail);
    
        while ($row = $result2->fetch_assoc()) {
            
            $sql2 = "SELECT gquantity FROM games WHERE gid = {$row['gid']}";
            $result3 = $conn->query($sql2);
            $row2 = $result3->fetch_assoc();
    
            $quantity = (int) $row2['gquantity'] + (int) $row['quantity'];
            $updateGameQuantity = "UPDATE games SET gquantity = $quantity WHERE games.gid = {$row['gid']}";
            $conn->query($updateGameQuantity);
        }
        }
        else if(isset($_GET['orderstatus']) && $_GET['orderstatus'] == '1') {
            $sql = "UPDATE invoice SET order_status = '1' WHERE orderID = $orderid
        ";

        }
        $result = $conn->multi_query($sql);
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