<?php

$servername = "localhost:3307";
$username = "root";
$password = '';
$dbname = "test2";
$params = $_GET['q'];

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM  contact";

$result = $conn->query($sql);
$response = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    /* echo $row . "<br>"; */
    $params = strtolower($params);
    if (preg_match("/$params/i", $row['name']) == 1) {
      /* $json = '"id": ' . $row['id'] . ', "name": ' . $row['name'] . ', "mail": ' . $row['mail'] . ', "phone": ' . $row['phone'] . ',"feedback": ' . $row['feedback']; */
      array_push($response, $row);
    }
  }
  echo json_encode($response);
} else {
  echo "data empty";
}
