<?php
    include '../view/admin/head1.php';
    include '../view/admin/leftmenu.php';
    include './connect.php';
    // include_once '../../model/getbilldetail.php';

    if(isset($_GET['orderID'])) {
        $orderid = $_GET['orderID'];
        $sql = "SELECT gid,quantity,price,discount,gname
                FROM invoice_detail
                WHERE orderID = $orderid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo `<div class="form-div">
                <div>
                    <span>Game ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="`. $row["gid"] .`">
                </div>
                <div>
                    <span>Quantity:</span>
                </div>
                <div>
                    <input type="text" readonly value="`. $row["quantity"] .`">
                </div>
                <div>
                    <span>Price:</span>
                </div>
                <div>
                    <input type="text" readonly value="`. $row["price"] .`">
                </div>
                <div>
                    <span>Game Name:</span>
                </div>
                <div>
                    <input type="text" readonly value="`. $row["gname"] .`">
                </div>
            </div>
            `;
            }
        }
    } else {
        
    }
    
?>

<script src="../assets/js/leftmenu.js"></script>