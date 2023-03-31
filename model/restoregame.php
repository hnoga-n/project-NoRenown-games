<?php
    include './connect.php';
    if(isset($_GET['gid'])) {
        $gid = $_GET['gid'];
        $sql = "UPDATE games SET visible=1 WHERE gid = $gid;";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "Restore successfully !";
        }
        else {
            echo "Restore failed !";
        }
    }
    else {
        echo "Game id not found !";
    }
    $conn->close();
?>