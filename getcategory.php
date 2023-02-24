<?php
    include 'connect.php';
    $sql = "SELECT DISTINCT (gcategory) 
    FROM games";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $a[] = $row['gcategory'];
      }
    } 



    $q = $_REQUEST["q"];
    $html = "";

    if($q !== ""){
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($html === "") {
                    $html = "<li>".$name."</li>";
                } else {
                    $html .= "<li>".$name."</li>";
                }
            }
        }
    }
    echo $html === "" ? "" : $html;
?>