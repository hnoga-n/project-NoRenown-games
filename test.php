<?php
include './model/connect.php';

/* $sql = $conn->prepare("INSERT INTO games (gname,gcategory,gprice,gdiscount,gimg) VALUES (?,?,?,?,?)");
$sql = $conn->prepare("INSERT INTO game_detail (gdt_id,about,cfg_os,cfg_processor,cfg_graphics,cfg_storage) VALUES (?,?,?,?,?,?)");
 */
/* $sql = $conn->prepare("UPDATE games SET gquantity = (?) WHERE gid = (?)");
for ($i = 1; $i <= 112; $i++) {
  $rand = rand(30, 50);
  $sql->bind_param("ii", $rand, $i);
} */


/* $imgUrl = $_GET['imgUrl'];
$index = (int)$_GET['index'];
$nameImg = "{$_GET['nameImg']}.jpg";
$title = $_GET['title'];
*/

// $about = $_GET['descript'];
// $os = $_GET['os'];
// $processor = $_GET['graphics'];
// $graphics = $_GET['processor'];
// $storage = $_GET['storage'];
$screenshot1 = $_GET['screenshot1'];
$screenshot2 = $_GET['screenshot2'];
$screenshot3 = $_GET['screenshot3'];
$screenshot4 = $_GET['screenshot4'];
$index = (int)$_GET['index'];


/* $stmt = $conn->prepare("SELECT about FROM game_detail WHERE gdt_id = ?");
$stmt->bind_param("i",$index);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$row = $result->fetch_assoc(); // fetch data  

echo $about . " ???????? " . $row['about']; */
// echo $index;
// echo "$about,$os,$processor,$graphics,$storage,$screenshot1,$screenshot2,$screenshot3,$screenshot4,$index";

// echo $about;
// Remote image URL
// $url = 'http://www.example.com/remote-image.png';

// Image path
// $img = "./assets/img/{$name}.jpg";

// Save image 
// file_put_contents($img, file_get_contents($imgUrl));


/* $stmt = $conn->prepare("UPDATE games SET gimg = ?, gname = ? WHERE gid = ?");
$stmt->bind_param("ssi",$nameImg,$title,$index); */

//all
/* $stmt = $conn->prepare("UPDATE game_detail SET about = ?, cfg_os = ?, cfg_processor = ?, cfg_graphics = ?, cfg_storage = ?, screenshot1 = ?, screenshot2 = ?, screenshot3 = ?, screenshot4 = ? WHERE gdt_id = ?");
$stmt->bind_param("sssssssssi",$about,$os,$processor,$graphics,$storage,$screenshot1,$screenshot2,$screenshot3,$screenshot4,$index);
 */

 //system require
/* $stmt = $conn->prepare("UPDATE game_detail SET cfg_os = ?, cfg_processor = ?, cfg_graphics = ?, cfg_storage = ? WHERE gdt_id = ?");
$stmt->bind_param("ssssi",$os,$processor,$graphics,$storage,$index);
 */

//screenshot
/* $stmt = $conn->prepare("UPDATE game_detail SET screenshot1 = ?, screenshot2 = ?, screenshot3 = ?, screenshot4 = ? WHERE gdt_id = ?");
$stmt->bind_param("ssssi",$screenshot1,$screenshot2,$screenshot3,$screenshot4,$index);
 */

 //about
/* $stmt = $conn->prepare("UPDATE game_detail SET about = ? WHERE gdt_id = ?");
$stmt->bind_param("si",$about,$index);*/

/* 
$stmt->execute();
$stmt->close();
$conn->close();  */
?>