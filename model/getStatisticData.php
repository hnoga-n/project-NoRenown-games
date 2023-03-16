<?php
    include_once('connect.php');
    $sql = "SELECT * FROM genres";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        echo $row['genre'] . '/';
    }

    // echo "hi2";
    $conn->close();
?>