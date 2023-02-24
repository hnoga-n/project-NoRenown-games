<?php
$servername = 'localhost:3307';
$username = 'root';
$password = '';
$dbname = 'test2';

$form_name = $_POST['name'];
$form_mail = $_POST['mail'];
$form_phone = $_POST['phone'];
$form_message = $_POST['message'];

// CREATE DB
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}
echo "connect successfully ! <br>";


// CREATE DATABASE
/* $sql = "CREATE DATABASE test2";

if ($conn->query($sql) === TRUE) {
  echo "create db successed !";
} else {
  echo "create db failed" . $conn->error;
} */

// CREATE TABLE

/* $sql = "
  CREATE TABLE contact (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    phone VARCHAR(10),
    feedback VARCHAR(200) NOT NULL
  )
"; */

/* $sql = $conn->prepare("INSERT INTO contact (name, mail, phone, feedback) VALUES (?,?,?,?)");
$sql->bind_param("ssss", $form_name, $form_mail, $form_phone, $form_message);
$sql->execute();

 */
/* $sql3 = "SELECT * FROM contact";
$before = $conn->query($sql3);
if ($before->num_rows > 0) {
  while ($row = $before->fetch_assoc()) {
    echo "name: " .  $row['name']  . "mail: " .  $row['mail']  . "phone: " .  $row['phone']  . "feedback: " .  $row['feedback'] . "<br>";
  }
} else {
  echo "data is empty !";
}

echo "---------------------------------- <br>";

$sql = "DELETE FROM contact WHERE id = 3";

if ($conn->query($sql) === true) {
  echo "delect line 3 successed !<br>";

  $sql2 = "SELECT * FROM contact";
  $result = $conn->query($sql2);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "name: " .  $row['name']  . "mail: " .  $row['mail']  . "phone: " .  $row['phone']  . "feedback: " .  $row['feedback'] . "<br>";
    }
  } else {
    echo "data is empty !";
  }
} else {
  echo "delete failed";
}
$conn->close(); */
echo "res";
?>
<!-- <script>
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      container.innerHTML = this.responseText;
      console.log("success");
    }

    xmlhttp.open("GET", "search.php?q=" + str, true);
    xmlhttp.send();
  }
</script> -->