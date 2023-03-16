<?php
    include 'connect.php';
    if(isset($_GET['item_id'])) {
        $item_id=$_GET['item_id'];
        $sql="DELETE FROM cart WHERE cItem_id = $item_id";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo "<script>alert('Deleted!')</script>";
            header("Location: ../view/user/cart.php");
        }
        else {
            echo "<script>alert('Delete failed!')</script>";
            header("Location: ../view/user/cart.php");
        }
    }
?>
