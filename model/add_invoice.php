<?php 
    include "connect.php";
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $dateOrder =  date("Y-m-d");
    $status = 0;//invoice unprocecss
    $total = (float)str_replace(array("$",","),"",$_SESSION['total']);// remove $ in total
    $_COOKIE['accountId'] = (int)$_COOKIE['accountId'];
    $consignee_name = $_POST['fullname'];
    $address = $_POST['address'] . ',' . $_POST['country'];
    $phone_number = $_POST['phone'];

    //insert data to invoice table
    $insertInvoiceData = "INSERT INTO invoice (accID,total_price,date_create,order_status,consignee_name,address,phone_number)
                          VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($insertInvoiceData); 
    $stmt->bind_param("idsisss",$_COOKIE['accountId'],$total,$dateOrder,$status,$consignee_name,$address,$phone_number);
    $stmt->execute();

    //insert data to invoice_detail table
    $getCartData = "SELECT * FROM cart WHERE cUser_id = {$_COOKIE['accountId']}";
    $cartData = $conn->query($getCartData);

    $getOrderID = "SELECT orderID FROM invoice WHERE accID = {$_COOKIE['accountId']} ORDER BY orderID DESC LIMIT 1";
    $orderID = $conn->query($getOrderID);
    $rowOrderID = $orderID->fetch_assoc();

    while($row = $cartData->fetch_assoc()) {
        $insertInvoiceData = "INSERT INTO invoice_detail (orderID,gid,quantity,price,discount,gname,img)
                          VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($insertInvoiceData); 
        $stmt->bind_param("iiissss",$rowOrderID['orderID'],$row['cItem_id'],$row['cItem_quantity'],$row['cItem_price_before_discount'],$row['cItem_price_after_discount'],$row['cItem_name'],$row['cItem_image']);
        $stmt->execute();
    }

    //delete cart data
    $delCartData = "DELETE FROM cart WHERE cUser_id = {$_COOKIE['accountId']}";
    $conn->query($delCartData);

    $stmt->close();
    header("location: ../view/user/order.php");
?>  