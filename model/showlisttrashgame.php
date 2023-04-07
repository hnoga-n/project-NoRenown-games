<?php
include './connect.php';
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
    if ($v == "all") {
        $sql = "SELECT * 
            FROM games
            WHERE visible=0 AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12
            ";
        $sql1 = "SELECT * 
            FROM games
            WHERE visible=0 AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto";
    } else {
        $sql = "SELECT * 
            FROM games
            WHERE visible=0 AND gcategory = '$v' AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12";
        $sql1 = "SELECT * 
            FROM games
            WHERE visible=0 AND gcategory = '$v' AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto";
    }
}
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$str = "";
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if($row['trending'] == 1) 
            $status = "checked";
        else $status = "";
        $str .= "    <tr>
                        <td>" . $row['gid'] . "</td>
                        <td>" . $row['gname'] . "</td>
                        <td>" . $row['gcategory'] . "</td>
                        <td>" . $row['gprice'] . "$</td>
                        <td>" . $row['gquantity'] . "</td>
                        <td>-" . $row['gdiscount'] . "%</td>
                        <td>
                            <img src='../../assets/img/" . $row['gimg'] . "'>
                        </td>
                        <td>
                            <a href=''>
                                <button onclick='restoregame(" . $row['gid'] . ")'>Restore</button>
                            </a>
                        </td>
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
