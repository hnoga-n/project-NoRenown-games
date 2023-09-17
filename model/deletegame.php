<?php
include './connect.php';
if (isset($_GET['gid'])) {
    $gid = $_GET['gid'];
    $sql_searchGame = "SELECT gquantity FROM games WHERE gid=$gid";
    $res_searchGame = $conn->query($sql_searchGame);
    if ($res_searchGame->num_rows > 0) {
        while ($row = $res_searchGame->fetch_assoc()) {
            $gquantity = $row['gquantity'];
        }
    }
    if ($gquantity == 0) {
        $sql = "UPDATE games SET visible=0,trending=0 WHERE gid = $gid;";
        $result = $conn->query($sql);
        $sql_search_import_cart = "SELECT gid FROM import_cart WHERE gid=$gid ";
        if ($conn->query($sql_search_import_cart)) {
            $sql_delete_import_cart = "DELETE FROM import_cart WHERE gid=$gid";
            $conn->query($sql_delete_import_cart);
        }
        if ($result === TRUE) {
            echo "Delete successfully !";
        } else {
            echo "Delete failed !";
        }
    } else {
        echo "When out of stock, it can be deleted !";
    }
} else {
    echo "Game id not found !";
}
$conn->close();
