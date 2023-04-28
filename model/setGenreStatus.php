<?php
    include './connect.php';
    $genid = $_GET['genid'];
    $sql = "UPDATE genres SET genStatus=0 WHERE genID = $genid";
    $result = $conn->query($sql);
    if($result) {
        echo "Delete successfully !";
    } else {
        echo "Can not delete this Genre";
    }
    $conn->close();
?>