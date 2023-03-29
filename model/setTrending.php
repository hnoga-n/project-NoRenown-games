<?php
    include './connect.php';
    $gid = $_GET['gid'];
    if($_GET['status']== "true") {
        $status = 1;
        echo "Trending on!";
    } else {
        $status = 0;
        echo "Trending off!";
    }
    $sql = "UPDATE games SET trending=$status WHERE gid = $gid";
    $result = $conn->query($sql);
    $conn->close();
?>