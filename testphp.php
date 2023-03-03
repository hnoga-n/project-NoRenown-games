<?php
include 'connect.php';

/* $sql = $conn->prepare("INSERT INTO games (gname,gcategory,gprice,gdiscount,gimg) VALUES (?,?,?,?,?)");
$sql = $conn->prepare("INSERT INTO game_detail (gdt_id,about,cfg_os,cfg_processor,cfg_graphics,cfg_storage) VALUES (?,?,?,?,?,?)");
 */
$sql = $conn->prepare("UPDATE games SET gquantity = (?) WHERE gid = (?)");
for ($i = 1; $i <= 112; $i++) {
  $rand = rand(30, 50);
  $sql->bind_param("ii", $rand, $i);
  $sql->execute();
}
/* $sql->bind_param("isssss", $data->gid, $data->about, $data->os, $data->process, $data->graph, $data->storage);
$sql->execute();
$rand = rand(1, 10);
$cate = '';
$img = '?';
switch ($rand) {
  case 1: {
      $cate = "Action";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 2: {
      $cate = "Casual";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 3: {
      $cate = "Indie";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 4: {
      $cate = "Racing";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 5: {
      $cate = "RPG";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 6: {
      $cate = "Simulation";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 7: {
      $cate = "Sports";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 8: {
      $cate = "Strategy";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 9: {
      $cate = "Fighting";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    }
  case 10: {
      $cate = "Horror";
      $sql->bind_param("sssss", $data->name, $cate, $data->price, $data->discount, $img);
      $sql->execute();
      break;
    } 
}*/
