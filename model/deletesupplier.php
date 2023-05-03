<?php
    include 'connect.php';
    if(isset($_GET['suppID'])) {
        $suppid = $_GET['suppID'];
        $sql = "UPDATE supplier SET Status=0 WHERE suppID = $suppid;
        ";
        $result = $conn->multi_query($sql);
        if($result === TRUE) {
            echo "Delete successfully !";
        }
        else {
            echo "Delete failed !";
        }
    }
    else {
        echo "Supplier ID not found !";
    }
    $conn->close();
?>