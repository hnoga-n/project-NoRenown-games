<?php

include "connect.php";

$param1 = strtolower($_GET['queryGames']);
$param3 = strtolower($_GET['genre']);
$param4 = intval($_GET['priceFrom']);
$param5 = intval($_GET['priceTo']);
$param6 = strtoupper($_GET['sort']);
$param2 = intval($_GET['page']);
$startPos = 12 *  $param2 - 12;

// search games
$product_matched_search_sql = "SELECT * FROM  games WHERE gname REGEXP '$param1' AND gcategory REGEXP '$param3' AND gprice BETWEEN $param4 AND $param5";
$product_of_specified_page_sql = "SELECT * FROM  games WHERE gname REGEXP '$param1'AND gcategory REGEXP '$param3' AND gprice BETWEEN $param4 AND $param5 ORDER BY gprice $param6 LIMIT 12 OFFSET $startPos ";
$pageNumber = floor(($conn->query($product_matched_search_sql)->num_rows) / 12);

echo $pageNumber . "page_number";
$list_product_card = $conn->query($product_of_specified_page_sql);

if ($list_product_card->num_rows > 0) {

  while ($row = $list_product_card->fetch_assoc()) {
    echo "
            <div class='item'>
            <a href='./productDetails.php?id=" . $row['gid'] . "'>
            <i class='fa-solid fa-cart-shopping'></i>
            <img src='../../assets/img/4horseman.jpg' alt='' />
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
?>