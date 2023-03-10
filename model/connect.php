<?php
    $servername = "localhost:8080";
    $username = "root";
    $password = "";
    $dbname = "norenown";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
<<<<<<< HEAD:connect.php
    // echo "Connected successfully<br>";
?>
=======
    //echo "Connected successfully<br>";
?>
>>>>>>> 7ee2cdc23e86bbe0e1b4e9a9a69996d284bb50a6:model/connect.php
