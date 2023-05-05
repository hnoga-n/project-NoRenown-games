<?php
include './connect.php';
include './function_employee.php';
$q = intval($_GET['q']);
$v = $_GET['v'];
$count = 0;
$loc = intval(($q - 1) * 12);
$sql = "";
$sql1 = "";
if (isset($_GET['search']) && isset($_GET['pfrom']) && isset($_GET['pto'])) {  
    $search = strtolower($_GET['search']);
    $pfrom = floatval($_GET['pfrom']);
    $pto = floatval($_GET['pto']);
    if ($v == 0) {
        $sql = "SELECT gid,gname,gprice,genName,gdiscount,gimg,visible,gquantity,trending,genStatus 
            FROM games JOIN genres ON games.genreID=genres.genID  
            WHERE visible=1 AND genStatus=1 AND (gid='$search' OR LOWER(gname) REGEXP '$search') AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12
            ";
        $sql1 = "SELECT gid,gname,gprice,genName,gdiscount,gimg,visible,gquantity,trending,genStatus 
            FROM games JOIN genres ON games.genreID=genres.genID
            WHERE visible=1 AND genStatus=1 AND (gid='$search' OR LOWER(gname) REGEXP '$search') AND gprice BETWEEN $pfrom AND $pto";
    } else {
        $sql = "SELECT gid,gname,gprice,genName,gdiscount,gimg,visible,gquantity,trending,genStatus
            FROM games JOIN genres ON games.genreID=genres.genID
            WHERE visible=1 AND genStatus=1 AND genreID=$v AND (gid='$search' OR LOWER(gname) REGEXP '$search') AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12";
        $sql1 = "SELECT gid,gname,gprice,genName,gdiscount,gimg,visible,gquantity,trending,genStatus 
            FROM games JOIN genres ON games.genreID=genres.genID
            WHERE visible=1 AND genStatus=1 AND genreID=$v AND (gid='$search' OR LOWER(gname) REGEXP '$search') AND gprice BETWEEN $pfrom AND $pto";
    }
}
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$str = "";
$accountFeatures = json_decode($features_arr[0],true);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if($row['trending'] == 1) 
            $status = "checked";
        else $status = "";
        $str .= "    <tr>
                        <td>" . $row['gid'] . "</td>
                        <td>" . $row['gname'] . "</td>
                        <td>" . $row['genName'] . "</td>
                        <td>" . $row['gprice'] . "$</td>
                        <td>" . $row['gquantity'] . "</td>
                        <td>-" . $row['gdiscount'] . "%</td>
                        <td>
                            <img src='../../assets/img/" . $row['gimg'] . "'>
                        </td>
                        <td>
                            <label class='switch'>
                                <input type='checkbox' onchange='setTrending(".$row['gid'].",this.checked)' $status>
                                <span class='slider round'></span>
                            </label>
                        </td>
                        <td>";
                if($accountFeatures["EDIT GAME"]==1) {
                    $str.= "<a href='editgame.php?page=listgame&id=" . $row['gid'] . "'>
                                <button>Edit</button>
                            </a>
                            <br><br>";
                }
                if($accountFeatures["DELETE GAME"]==1) {
                    $str.= "<a href=''>
                                <button onclick='deletegame(" . $row['gid'] . ")'>Delete</button>
                            </a>";
                }            
                    $str.="</td>
                    </tr>";        
    }
}
if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
        $count++;
    }
}
$count /= 12;
$myobj = new stdClass();
$myobj->pagenum = ceil($count);
$myobj->s = $str;
$myJSON = json_encode($myobj);
echo $myJSON;
$conn->close();
