<?php 
    include_once "connect.php";

    $topSell = $_GET['topSell'];
    $dateStart = $_GET['dateStart'];
    $dateEnd = $_GET['dateEnd'];
    $category = $_GET['category'];
    $flag = false;

    

    $dateStart = date('Y-m-d', strtotime($dateStart));
    $dateEnd = date('Y-m-d', strtotime($dateEnd));
    if((int)$topSell > 0) {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(price*invoice_detail.quantity),SUM(quantity),date_create,genName,games.genreID,order_status,price FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY genres.genID ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(price*invoice_detail.quantity),SUM(quantity),date_create,genName,games.genreID,order_status,price FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE games.genreID = '{$category}' AND order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY genres.genID ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    } else {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(price*invoice_detail.quantity),SUM(quantity),date_create,genName,games.genreID,order_status,price FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY genres.genID";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(price*invoice_detail.quantity),SUM(quantity),date_create,genName,games.genreID,order_status,price FROM
            invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE games.genreID = '{$category}' AND order_status = 1 AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY genres.genID";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    }

    $data = "";
    $soldQuantity = 0;
    $revenue = 0;

    if($getInvoiceData->num_rows > 0) {
        while($row = $getInvoiceData->fetch_assoc()) {
                $data .= "<tr>
                    <td>" . $row['genreID'] ."</td>
                    <td>" . $row['genName'] ."</td>
                    <td class='price'>" . number_format($row['SUM(price*invoice_detail.quantity)'], 2, '.', '') ."$</td>
                    <td class='sold_quantity'>" . $row['SUM(quantity)'] ."</td>
                </tr>";
                $flag = true;
                $soldQuantity += (int) $row['SUM(quantity)'];
                $revenue += $row['SUM(price*invoice_detail.quantity)'];
        }
    } 
    if(!$flag) {
        $data .= "<tr><td colspan='6' style='font-weight: 600'>No result</td></tr>";
    }
    // echo $dateStart . ',' . $dateEnd . ',' . $category;
    // $count /= 12;
    $myobj = new stdClass();
    $myobj->data = $data;
    $myobj->sold_quantity = $soldQuantity;
    $myobj->revenue = $revenue;
    $myJSON = json_encode($myobj);
    echo $myJSON;
    $conn->close();
?>