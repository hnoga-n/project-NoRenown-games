<?php
    include './connect.php';
    include './function_employee.php';
    if(isset($_GET['search'])) {
        $search=strtolower($_GET['search']);
        $sql = "SELECT *
                FROM genres
                WHERE LOWER(genName) REGEXP '$search' AND genStatus=1";
        $html="";
        $result = $conn->query($sql);
        $accountFeatures = json_decode($features_arr[8],true);
        if($result->num_rows > 0) {
            $status="";
            while($row = $result->fetch_assoc()) {
                if($row['genStatus'])
                    $status="checked";
                else 
                    $status="";
                $html.= "<tr>
                            <td>".$row['genID']."</td>
                            <td>".$row['genName']."</td>";
                            $html.="<td>";
                            if($accountFeatures['EDIT GENRE']==1) {
                            $html.="<a>
                                        <button onclick='editGenre(".$row['genID'].",`".$row['genName']."`)'>Edit</button>
                                    </a>";
                            }
                            if($accountFeatures['LOCK GENRE']==1) {
                                $html.="
                                    <a href=''>
                                        <button onclick='setStatus(".$row['genID'].")'>Delete</button>
                                    </a>
                                ";
                            }
                         $html.="</td>
                        </tr>";
            }
        }
        echo $html;
    }
    $conn->close();
?>