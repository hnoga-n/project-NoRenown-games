<?php
include 'connect.php';
if (isset($_GET['userid'])) {

    $userid = $_GET['userid'];
    $sql = "UPDATE account SET acc_visible=0 WHERE userID = $userid";
    $result = $conn->multi_query($sql);
    if ($result === TRUE) {
        echo "Delete successfully !";
    } else {
        echo "Delete failed !";
    }
} else {
    echo "Account ID not found !";
}
$conn->close();
