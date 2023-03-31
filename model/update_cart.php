<?php 
include "connect.php";

session_start();
  $accountId = $_COOKIE['accountId'];
  
  if(isset($_GET['item_id']) && isset($_GET['item_quantity'])) {
    $item_id=$_GET['item_id'];
    $item_quantity = $_GET['item_quantity'];
    $sql = "UPDATE cart SET cItem_quantity = $item_quantity WHERE cItem_id = $item_id AND cUser_id = $accountId";
    $result = $conn->query($sql);
    if($result === TRUE) {
        echo "<script>alert('Updated!')</script>";
        echo "<div>cart updated!</div>";
    }
    else {
        echo "<script>alert('Update failed!')</script>";
        echo "<div>cart failed to update</div>";
    }
}
