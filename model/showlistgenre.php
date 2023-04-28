<?php
    include './connect.php';
    include './function_employee.php';
    if(isset($_GET['search'])) {
        $search=strtolower($_GET['search']);
        $sql = "SELECT *
                FROM genres
                WHERE LOWER(genName) REGEXP '$search'";
        $html="";
        $result = $conn->query($sql);
        $accountFeatures = json_decode($features_arr[7],true);
        if($result->num_rows > 0) {
            $status="";
            while($row = $result->fetch_assoc()) {
                if($row['genStatus'])
                    $status="checked";
                else 
                    $status="";
                $html.= "<tr>
                            <td>".$row['genID']."</td>
                            <td>".$row['genName']."</td>
                            <td>";
                            if($accountFeatures['LOCK GENRE']==1) {
                                $html.="
                                <label class='switch'>
                                    <input type='checkbox' onchange='setStatus(".$row['genID'].",this.checked)' $status>
                                    <span class='slider round'></span>
                                </label>";
                            }
                                
                            $html.="</td>
                            <td>";
                            if($accountFeatures['EDIT GENRE']==1) {
                            $html.="<a>
                                        <button onclick='editGenre(".$row['genID'].",`".$row['genName']."`)'>Edit</button>
                                    </a>";
                            }
                         $html.="</td>
                        </tr>";
            }
        }
        echo $html;
    }
    $conn->close();
?>