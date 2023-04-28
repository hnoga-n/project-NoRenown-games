<?php
    include "connect.php";
    session_start();
    $accID = $_COOKIE['accountId'];
    $startIndex = $_GET['startIndex'];
    $limit = 1;
    
    $checkInvoiceData = "SELECT * FROM invoice WHERE accID = {$accID} ";
    $invoiceDataExist = $conn->query($checkInvoiceData);
    
    $data = '';
    if($invoiceDataExist->num_rows > 0 ) {
        $getInvoiceData = "SELECT * FROM invoice WHERE accID = {$accID} ORDER BY orderID DESC LIMIT {$startIndex},{$limit}";
        $invoiceData = $conn->query($getInvoiceData);

        if($invoiceData->num_rows == 0) {
            $data .= "Stop";   
        } else {
            while($row = $invoiceData->fetch_assoc()) {
            $pending = '';
            $product = '';
            $cancleOrder = '';

            //check status order
            if($row['order_status'] == '0') {
                $pending .= '<div class="order-status">Pending order</div>';
                $cancleOrder .= '<button class="order-cancel" style="margin-right: 10px;" onclick="changeStatus(this)">Cancel an order</button>';
            } else if($row['order_status'] == '1') {
                $pending .= '<div class="order-status" style="color: green;">Delivery successful</div>';
                $cancleOrder .= '<button class="order-cancel" style="display: none;opacity: .6;pointer-events: none;margin-right: 10px;">Cancel an order</button>';
            } else if($row['order_status'] == '2') {
                $pending .= '<div class="order-status" style="color: red;">Cancelled</div>';
                $cancleOrder .= '<button class="order-cancel" style="display: none;opacity: .6;pointer-events: none;margin-right: 10px;">Cancel an order</button>';
            }

            //render products
            $getInvoiceDetailsData = "SELECT * FROM invoice_detail WHERE orderID = {$row['orderID']}";
            $invoiceDetailsData = $conn->query($getInvoiceDetailsData);
            while($row1 = $invoiceDetailsData->fetch_assoc()) {
                $product .= '<div class="order-products">
                                <div class="order-img">
                                    <img src="../../assets/img/'. $row1['img'] .'" alt="" />
                                </div>
                                <div class="order-name">'. $row1['gname'] .'</div>
                                <div class="order-quantity">x '. $row1['quantity'] .'</div>
                                <div class="order-price"><s>'. $row1['price'] .'$</s> '. $row1['discount'] .'$</div>
                            </div>';
            }
            setlocale(LC_MONETARY,"en_US");
            $total = number_format((float)$row['total_price'],2,'.',',');

            $data .= '<div class="order">
                        <div class="order-top">
                            <div class="order-date">Order date: '. $row['date_create'] .' </div>
                            ' . $pending .'
                        </div>
                        <div class="order-mid">
                            ' . $product . '
                        </div>
                        <div class="order-bot">
                            <input type="hidden" name="orderID" value="'. $row['orderID'] .'">
                                <div style="display: flex;">
                                    ' . $cancleOrder . '
                                    <div class="order-receiver-address" onmouseover="showAddressDetail(this)" onmouseout="hideAddressDetail(this)">
                                        <div class="consigneeDetail">
                                            <header>RECEIVER\'S INFO</header>
                                            <div class="name">Name: '. $row['consignee_name'] .'</div>
                                            <div class="address">Address: '. $row['address'] .'</div>
                                            <div class="phone">Phone: '. $row['phone_number'] .'</div>
                                        </div>
                                        Delivery address
                                    </div>
                                </div>
                            <div class="order-total">Total: '. $total  .'$</div>
                        </div>
                    </div>';
            }
        }
             
    } else {
        $data .= "NoOrder";
    }
    if($invoiceDataExist->num_rows - 1 == $startIndex) {
        echo $data . "#?+#?+" . "Stop";  
    }else {
        echo $data;  
    }
?>