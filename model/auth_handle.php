<?php
include "../model/connect.php";

$sql = "SELECT * FROM auth_group";

$result = $conn->query($sql);
$data = '';
while ($row = $result->fetch_assoc()) {
  $data .= ' 
  <tr>
    <td style="width: 5%;">' . $row['groupID'] . '</td>
    <td style="width: 20%;">' . $row['groupName'] . '</td>
    <td style="width: 25%;">' . $row['date_create'] . '</td>
    <td style="width: 25%;">' . $row['last_modify'] . '</td>
    <td style="width: 25%;">
        <a href="./authorize.php?page=authorization&grid=' . $row['groupID'] . '">
            <button>Edit</button>
        </a>
        <button>Delete</button>
    </td>
 </tr>
  ';
}

echo $data;



$conn->close();
