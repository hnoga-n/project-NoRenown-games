<?php

include "connect.php";

$param1 = strtolower($_GET['queryGames']);
$param3 = strtolower($_GET['genre']);
$param4 = intval($_GET['priceFrom']);
$param5 = intval($_GET['priceTo']);
$param6 = strtoupper($_GET['sort']);
$param2 = intval($_GET['page']);
$startPos = 12 *  $param2 - 12;

$product_matched_search_sql = "SELECT * FROM games JOIN genres ON games.genreID=genres.genID WHERE visible=1 AND gname REGEXP '$param1' AND genName REGEXP '$param3' AND CAST(gprice as FLOAT)  BETWEEN $param4 AND $param5";
$product_of_specified_page_sql = "SELECT * FROM  games JOIN genres ON games.genreID=genres.genID WHERE visible=1 AND gname REGEXP '$param1' AND genName REGEXP '$param3' AND gprice BETWEEN $param4 AND $param5 ORDER BY CAST(gprice as FLOAT) $param6 LIMIT 12 OFFSET $startPos";
$pageNumber = floor(($conn->query($product_matched_search_sql)->num_rows) / 12);
echo $pageNumber . "page_number";

$list_product_card = $conn->query($product_of_specified_page_sql);
if ($list_product_card->num_rows > 0) {

  while ($row = $list_product_card->fetch_assoc()) {
    $trailer_sql = "SELECT trailer FROM game_detail WHERE gdt_id = {$row['gid']}";
    $trailer = $conn->query($trailer_sql);
    $row1 = $trailer->fetch_assoc();
    echo "
            <div class='item'>
            <a href='./productDetails.php?id=" . $row['gid'] . "' onmouseover='showVid(event,this)' onmouseout='closeVid(event,this)'>
            <video muted autoplay loop>
                <source src='" . $row1['trailer'] . "' type=''>
                <source src='../../assets/video/I Am Atomic 4k.mp4' type='video/mp4'>
                Your browser does not support the video tag.
            </video>
            <img src='../../assets/img/" . $row['gimg'] . "' alt='' />
            <div class='discount'>
                <span>-<label>" . $row['gdiscount'] . "</label>%</span>
            </div>
            </a>
            <div class='product-information'>
            <div class='text-name'>" . $row['gname'] . "</div>
            <div class='price'>
                <label class='price-number'>" . $row['gprice'] . "</label>
                <label class='price-dollar'>$</label>
            </div>
            </div>
        </div>
        ";
  }
} else {
  echo "empty";
}
