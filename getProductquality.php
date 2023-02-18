<?php
    include 'connect.php';
    $sql = "SELECT * 
    FROM product";
    $result = $conn->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $count++;
      }
    } 
    $count/=12;
    echo ceil($count);
    $conn->close();
?>