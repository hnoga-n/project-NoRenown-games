<?php
    include 'connect.php';
    if(isset($_GET['gid'])) {
        $gid = $_GET['gid'];
        $sql = "DELETE FROM game_detail WHERE gdt_id = $gid;
                DELETE FROM games WHERE gid = $gid;
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
        echo "Game id not found !";
    }
    $conn->close();
?>