<?php 
    include_once "connect.php";

    $flag = false;
    $topSell = $_GET['topSell'];
    $dateStart = $_GET['dateStart'];
    $dateEnd = $_GET['dateEnd'];
    $dateStart = date('Y-m-d', strtotime($dateStart));
    $dateEnd = date('Y-m-d', strtotime($dateEnd)); 

    if((int)$topSell > 0) {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,account.accid,fullname,mail,SUM(invoice.total_price),SUM(invoice_detail.quantity) FROM
                       invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN account ON account.accid = invoice.accID JOIN users ON account.userID = users.userID WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY account.accid ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,account.accid,fullname,mail,SUM(invoice.total_price),SUM(invoice_detail.quantity) FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN account ON account.accid = invoice.accID JOIN users ON account.userID = users.userID WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY account.accid ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    } else {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,account.accid,fullname,mail,SUM(invoice.total_price),SUM(invoice_detail.quantity) FROM
                       invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN account ON account.accid = invoice.accID JOIN users ON account.userID = users.userID WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY account.accid";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,account.accid,fullname,mail,SUM(invoice.total_price),SUM(invoice_detail.quantity) FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN account ON account.accid = invoice.accID JOIN users ON account.userID = users.userID WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY account.accid";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    }
  /*   
    $category = $_GET['category'];

    

    
    /* if((int)$topSell > 0) {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,invoice_detail.gname,games.gcategory,order_status,games.gid,price,img FROM
                       invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY account.accid ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,invoice_detail.gname,games.gcategory,games.gid,order_status,price,img FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid WHERE games.gcategory = '{$category}' AND order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    } else {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,invoice_detail.gname,games.gcategory,order_status,games.gid,price,img FROM
                       invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,invoice_detail.gname,games.gcategory,games.gid,order_status,price,img FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid WHERE games.gcategory = '{$category}' AND order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    }
 */

    $selecInvoiceData = "SELECT account.accid,fullname,mail,SUM(invoice.total_price),SUM(invoice_detail.quantity) FROM account JOIN users ON account.userID = users.userID JOIN invoice ON account.accid = invoice.accID JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID WHERE order_status = 1 GROUP BY account.accid";
    $getInvoiceData = $conn->query($selecInvoiceData);       


    $data = "";
    $soldQuantity = 0;
    $revenue = 0;

    if($getInvoiceData->num_rows > 0) {
        $flag = true;
        while($row = $getInvoiceData->fetch_assoc()) {
                $data .= "<tr>
                    <td>" . $row['accid'] ."</td>
                    <td>" . $row['fullname'] ."</td>
                    <td>" . $row['mail'] ."</td>
                    <td>" . $row['SUM(invoice_detail.quantity)'] ."</td>
                    <td>" . round($row['SUM(invoice.total_price)'],2) ."$</td>
                </tr>";
        }
    } 
    if(!$flag) {
        $data .= "<tr><td colspan='6' style='font-weight: 600'>No result</td></tr>";
    }
    // echo $dateStart . ',' . $dateEnd . ',' . $category;
    // $count /= 12;
    /* $myobj = new stdClass();
    $myobj->data = $data;
    $myobj->sold_quantity = $soldQuantity;
    $myobj->revenue = $revenue;
    $myJSON = json_encode($myobj);
    echo $myJSON; */
    echo $data;
    $conn->close();
?>