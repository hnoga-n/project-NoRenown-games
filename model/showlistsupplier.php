<?php
    include './connect.php';
    include './function_employee.php';
    if(isset($_GET['search'])  && isset($_GET['pagenum'])) {
        $html="";
        $sql="";
        $count = 0;
        $pagenum = intval($_GET['pagenum']);
        $pos = intval(($pagenum - 1) * 10);
        $search = $_GET['search'];
        
        
        

            
            $sql = "SELECT suppID,suppName,suppMail,suppTel
                    FROM supplier
                    WHERE suppName REGEXP '$search'
                    ORDER BY suppID ASC
                    LIMIT $pos,10";
            $sql1 = "SELECT suppID,suppName,suppMail,suppTel
                    FROM supplier
                    WHERE suppName REGEXP '$search'
                    ORDER BY suppID ASC";
        
        
        
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        $accountFeatures = json_decode($features_arr[7],true);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
               $html.=
                    "<tr>
                        <td>".$row['suppID']."</td>
                        <td>".$row['suppName']."</td>
                        <td>".$row['suppMail']."</td>
                        <td>".$row['suppTel']."</td>
                        <td style='
                        display: flex;
                        justify-content: space-around;
                        flex-direction: row;'>";
                        if($accountFeatures["EDIT SUPPLIER"]==1) {
                            $html.= "<a href='./editsupplier.php?page=listsupply&suppID=".$row['suppID']."'><button>Edit</button></a>";
                        }
                        if($accountFeatures["DELETE SUPPLIER"]==1) {
                            $html.= "<a href=''><button onclick='deletesupplier(".$row['suppID'].")'>Delete</button></a>";
                        } else {
                            $html.= "<a style=''><button disabled>Delete</button></a>";
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