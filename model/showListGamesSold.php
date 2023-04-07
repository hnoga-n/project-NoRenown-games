<?php 
    include_once "connect.php";

    $dateStart = $_GET['dateStart'];
    $dateEnd = $_GET['dateEnd'];
    $category = $_GET['category'];
    $flag = false;

    $dateStart = date('m-d-Y', strtotime($dateStart));
    $dateEnd = date('m-d-Y', strtotime($dateEnd));

    if($category == "all") {
        $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,invoice_detail.gname,games.gcategory,order_status,games.gid,price,img FROM
                       invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid GROUP BY games.gid";
        $getInvoiceData = $conn->query($selecInvoiceData);       
        
    } else {
        $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,invoice_detail.gname,games.gcategory,games.gid,order_status,price,img FROM
        invoice JOIN invoice_detail ON invoice.orderID = invoice_detail.orderID JOIN games on invoice_detail.gid = games.gid WHERE games.gcategory = '{$category}' GROUP BY games.gid";
        $getInvoiceData = $conn->query($selecInvoiceData);       

    }

    if($getInvoiceData->num_rows > 0) {
        while($row = $getInvoiceData->fetch_assoc()) {
            /* if($row['order_status'] != "1" ) {
                break;
            } */
            $dateCreate = explode(" ",$row['date_create']);
            $dateCreate = date('m-d-Y', strtotime($dateCreate[1]));
            if (($dateCreate >= $dateStart) && ($dateCreate <= $dateEnd)){
                echo "<tr>
                    <td>" . $row['gid'] ."</td>
                    <td>" . $row['gname'] ."</td>
                    <td>" . $row['gcategory'] ."</td>
                    <td class='price'>" . $row['price'] ."$</td>
                    <td>
                        <img src='../../assets/img/" . $row['img'] ."'>
                    </td>
                    <td class='sold_quantity'>" . $row['SUM(quantity)'] ."</td>
                </tr>";
                $flag = true;
            }
        }
    } 
    if(!$flag) {
        echo "<tr><td colspan='6' style='font-weight: 600'>No result</td></tr>";
    }
    // echo $dateStart . ',' . $dateEnd . ',' . $category;

?>