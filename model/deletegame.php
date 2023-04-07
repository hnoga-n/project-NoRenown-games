<?php
    include './connect.php';
    if(isset($_GET['gid'])) {
        $gid = $_GET['gid'];
        $sql = "UPDATE games SET visible=0,trending=0 WHERE gid = $gid;";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "Delete successfully !";
        }
        else {
            echo "Delete failed !";
        }
    }
    else {
        echo "Game id not found !";
    }
    $conn->close();
?>