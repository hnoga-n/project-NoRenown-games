<?php
    include './connect.php';
    include './function_employee.php';
    if(isset($_GET['search'])  && isset($_GET['pagenum'])) {
        $html="";
        $sql="";
        $sql1="";
        $count = 0;
        $pagenum = intval($_GET['pagenum']);
        $pos = intval(($pagenum - 1) * 10);
        $search = $_GET['search'];
        $category = $_GET['category'];
        
        if($category == 'all') {

            
            $sql = "SELECT orderID,accID,total_price,date_create,consignee_name,address,phone_number,order_status
                    FROM invoice
                    WHERE consignee_name REGEXP '$search' or date_create REGEXP '$search' or phone_number REGEXP '$search'
                    ORDER BY orderID DESC
                    LIMIT $pos,10";
            $sql1 = "SELECT orderID,accID,total_price,date_create,consignee_name,address,phone_number,order_status
                    FROM invoice
                    WHERE consignee_name REGEXP '$search' or date_create REGEXP '$search' or phone_number REGEXP '$search'
                    ORDER BY orderID DESC";
        } else {
            $sql = "SELECT orderID,accID,total_price,date_create,consignee_name,address,phone_number,order_status
                    FROM invoice
                    WHERE order_status = {$category} AND (consignee_name REGEXP '$search' or date_create REGEXP '$search' or phone_number REGEXP '$search')
                    ORDER BY orderID DESC
                    LIMIT $pos,10";
            $sql1 = "SELECT orderID,accID,total_price,date_create,consignee_name,address,phone_number,order_status
                    FROM invoice
                    WHERE order_status = {$category} AND (consignee_name REGEXP '$search' or date_create REGEXP '$search' or phone_number REGEXP '$search')
                    ORDER BY orderID DESC";
        }
        
        
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        $accountFeatures = json_decode($features_arr[2],true);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row['order_status'] == 1){
                    $status ="<td style='color:#41fd70' id='sts'>Processed</td>";
                    $ckst = "acp";
                }
                else if ($row['order_status'] == 0){
                    $status ="<td style='color:gray' id='sts'>Waiting</td>";
                    $ckst = "wt";
                }
                else {
                    $status = "<td style='color:red' id='sts'>Cancelled</td>";
                    $ckst = "cnl";
                }
                
               $html.=
                    "<tr>
                        <td>".$row['orderID']."</td>
                        <td>".$row['accID']."</td>
                        <td>".$row['total_price'].'$'."</td>
                        <td>".$row['date_create']."</td>
                        <td>".$row['consignee_name']."</td>
                        $status
                        <td style='
                        display: flex;
                        justify-content: space-around;
                        flex-direction: row;'>";
                        if($accountFeatures["DETAIL INVOICE"]==1) {
                            $html.= "<a href='./orderdetail.php?page=listbills&orderID=".$row['orderID']."'><button>Detail</button></a>";
                        }
                        if($accountFeatures["ACCEPT INVOICE"]==1 && $row['order_status'] == 0) {
                            $html.= "<a href=''><button onclick='changestatus(".$row['orderID'].",1)'>Accept</button></a>";
                        } else {
                            $html.= "<a style=''><button disabled>Accept</button></a>";
                        }                  
                        if($accountFeatures["DECLINE INVOICE"]==1  && $row['order_status'] == 0) {
                            $html.= "<a href=''><button onclick='changestatus(".$row['orderID'].",2)'>Decline</button></a>";
                        } else {
                            $html.= "<a style=''><button disabled>Decline</button></a>";

                        }                  
                $html.="</td>
                    </tr>";
                ;
            }
        }
    
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $count++;
            }
        }
        $count /= 10;
        $myobj = new stdClass();
        $myobj->pagenum = ceil($count);
        $myobj->html = $html;
        $myJSON = json_encode($myobj);
        echo $myJSON;
    }
    $conn->close();
?>