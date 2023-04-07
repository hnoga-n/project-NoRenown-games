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