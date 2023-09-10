<?php
class mysqlConnection
{
  private $servername = "localhost:3307";
  private $username = "root";
  private $password = "";
  private $dbname = "norenown";
  private $conn = new mysqli($servername, $username, $password, $dbname);

  public function query($sql){
    $result = $conn->query($sql);
    if($result->)
  }
}
