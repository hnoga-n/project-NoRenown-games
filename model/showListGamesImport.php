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
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,genName,import_detail.gname,games.genreID,games.gid,price,games.gimg FROM
            import JOIN import_detail ON import.impID = import_detail.impID JOIN games on import_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,genName,import_detail.gname,games.genreID,games.gid,price,games.gimg FROM
            import JOIN import_detail ON import.impID = import_detail.impID JOIN games on import_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE games.genreID = '{$category}' AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid ORDER BY SUM(quantity) DESC LIMIT $topSell";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    } else {
        if($category == "all") {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,genName,import_detail.gname,games.genreID,games.gid,price,games.gimg FROM
            import JOIN import_detail ON import.impID = import_detail.impID JOIN games on import_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        } else {
            $selecInvoiceData = "SELECT SUM(quantity),date_create,quantity,genName,import_detail.gname,games.genreID,games.gid,price,games.gimg FROM
            import JOIN import_detail ON import.impID = import_detail.impID JOIN games on import_detail.gid = games.gid JOIN genres ON games.genreID = genres.genID WHERE games.genreID = '{$category}' AND date_create BETWEEN '$dateStart' AND '$dateEnd' GROUP BY games.gid";
            $getInvoiceData = $conn->query($selecInvoiceData);       
        }
    }

    $data = "";
    $soldQuantity = 0;
    $revenue = 0;

    if($getInvoiceData->num_rows > 0) {
        while($row = $getInvoiceData->fetch_assoc()) {
            // $dateCreate = explode(" ",$row['date_create']);
            // $dateCreate = date('m-d-Y', strtotime($dateCreate[1]));
            // if (($dateCreate >= '$dateStart') && ($dateCreate <= $dateEnd)){
                $data .= "<tr>
                    <td>" . $row['gid'] ."</td>
                    <td>" . $row['gname'] ."</td>
                    <td>" . $row['genName'] ."</td>
                    <td class='price'>" . $row['price'] ."$</td>
                    <td>
                        <img src='../../assets/img/" . $row['gimg'] ."'>
                    </td>
                    <td class='sold_quantity'>" . $row['SUM(quantity)'] ."</td>
                </tr>";
                $flag = true;
                $soldQuantity += (int) $row['SUM(quantity)'];
                $revenue += (int) $row['SUM(quantity)'] * (float) $row['price'];
            // }
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