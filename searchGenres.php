<?php
include "connect.php";

if (isset($_GET['queryGenres'])) {
  $param1 = strtolower($_GET['queryGenres']);

  $sql = "SELECT * FROM genres WHERE genre REGEXP '$param1' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo $row['genre'] . '/';
    }
  } else {
    echo "empty";
  }
}
