<?php
    include './connect.php';
    $genid = $_GET['genid'];
    if($_GET['status']== "true") {
        $status = 1;
        echo "Showed !";
    } else {
        $status = 0;
        echo "Hidden !";
    }
    $sql = "UPDATE genres SET genStatus=$status WHERE genID = $genid";
    $result = $conn->query($sql);
    $conn->close();
?>