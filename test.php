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
$imgUrl = $_GET['imgUrl'];
$index = (int)$_GET['index'];
$nameImg = "{$_GET['nameImg']}.jpg";
$title = $_GET['title'];

// Remote image URL
// $url = 'http://www.example.com/remote-image.png';

// Image path
// $img = "./assets/img/{$name}.jpg";

// Save image 
// file_put_contents($img, file_get_contents($imgUrl));

// AND gname = ?,$name
$stmt = $conn->prepare("UPDATE games SET gimg = ?, gname = ? WHERE gid = ?");
$stmt->bind_param("ssi",$nameImg,$title,$index);
$stmt->execute();
$stmt->close();
echo "Done";

?>