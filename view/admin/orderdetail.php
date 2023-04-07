<?php
    include '../admin/head1.php';
    include '../admin/leftmenu.php';
    include '../../model/connect.php';
    if(isset($_GET['orderID'])) {
        $orderid = $_GET['orderID'];
        $sql = "SELECT gid,quantity,price,discount,gname
                FROM invoice_detail
                WHERE orderID = $orderid";
        $result = $conn->query($sql);
        echo `<div class="editaccount-modalbox">
        <div class="modal-header">
            <h2>Order Detail</h2>
        </div>
        <div class="modal-form">`;
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
        echo `</div></div>`;
    } else {
        
    }
    
?>
<script src="../../assets/js/leftmenu.js"></script>