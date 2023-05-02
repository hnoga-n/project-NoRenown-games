<?php
include './connect.php';
include './function_employee.php';
$accountFeatures = json_decode($features_arr[5], true);
session_start();
switch ($_GET['query']) {
  case "cartquantity":
    $gid = $_GET['gid'];
    $quantity_update = $_GET['quantity'];
    updateCartQuantity($gid, $quantity_update);
    break;
  case "loadgen":
    loadGen();
    break;
  case "loadcart":
    loadCart();
    break;
  case "listgame":
    showListGameImport($accountFeatures["IMPORT GAMES"]);
    break;
  case "addgame":
    addGameToCart($_GET['gid']);
    break;
  case "deletegame";
    deleteGameFromCart($_GET['gid']);
    break;
  case "import":
    importGame();
    break;
  case "listimport":
    $date_start = $_GET['d_strt'];
    $date_end = $_GET['d_end'];
    $accID = $_GET['accID'];
    $price_from = intval($_GET['priceFr']);
    $price_to = intval($_GET['priceTo']);
    listImportWithPagination($date_start, $date_end, $accID, $price_from, $price_to);
    break;
  case "listimportpage":
    $page = $_GET['pg'];
    $date_start = $_GET['d_strt'];
    $date_end = $_GET['d_end'];
    $accID = $_GET['accID'];
    $price_from = intval($_GET['priceFr']);
    $price_to = intval($_GET['priceTo']);
    listImportWithoutPagination($page, $date_start, $date_end, $accID, $price_from, $price_to);
    break;
  case "showdetail":
    $accid = $_GET['accID'];
    $impid = $_GET['impID'];
    $date_create = $_GET['date_create'];
    echo $date_create;
    $total_price = $_GET['total_price'];
    showImportDetail($impid, $accid,  $date_create, $total_price);
    break;
}

function showListGameImport($import)
{
  include '../model/connect.php';
  $q = intval($_GET['q']);
  $v = $_GET['v'];
  $count = 0;
  $loc = intval(($q - 1) * 12);
  $sql = "";
  $sql1 = "";

  if (isset($_GET['search']) && isset($_GET['pfrom']) && isset($_GET['pto'])) {
    $search = strtolower($_GET['search']);
    $pfrom = floatval($_GET['pfrom']);
    $pto = floatval($_GET['pto']);
    if ($v == "all") {
      $sql = "SELECT * 
            FROM games JOIN genres ON games.genreID = genres.genID
            WHERE LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12
            ";
      $sql1 = "SELECT * 
            FROM games JOIN genres ON games.genreID = genres.genID
            WHERE LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto";
    } else {
      $sql = "SELECT * 
            FROM games  JOIN genres ON games.genreID = genres.genID
            WHERE genreID = '$v' AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12";
      $sql1 = "SELECT * 
            FROM games  JOIN genres ON games.genreID = genres.genID
            WHERE genreID = '$v' AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto";
    }
  }
  $result = $conn->query($sql);
  $result1 = $conn->query($sql1);
  $str = "";
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $str .= "    <tr>
                        <td>" . $row['gid'] . "</td>
                        <td>" . $row['gname'] . "</td>
                        <td>" . $row['genName'] . "</td>
                        <td>" . $row['gprice'] . "$</td>
                        <td>" . $row['gquantity'] . "</td>
                        <td>-" . $row['gdiscount'] . "%</td>
                        <td>
                            <img src='../../assets/img/" . $row['gimg'] . "'>
                        </td>
                        <td>";
      if ($import == 1) {
        $str .= "<div class='delete-button' onclick='addToImportCard(" . $row['gid'] . ")'>Select</div>";
      }
      $str .= "</td>
                    </tr>";
    }
  }
  if ($result1->num_rows > 0) {
    // output data of each row
    while ($row = $result1->fetch_assoc()) {
      $count++;
    }
  }
  $count /= 12;
  $myobj = new stdClass();
  $myobj->pagenum = ceil($count);
  $myobj->s = $str;
  $myJSON = json_encode($myobj);
  echo $myJSON;
  $conn->close();
}


function addGameToCart($gid)
{
  include "../model/connect.php";
  $sql_check = "SELECT gid FROM import_cart WHERE gid=$gid";
  $check = $conn->query($sql_check);
  if ($check->num_rows <= 0) {
    $sql_game = "SELECT gid,gname,gquantity,gprice FROM games WHERE gid=$gid";
    $game = $conn->query($sql_game)->fetch_assoc();
    //insert to cart db
    $quantity = 1;
    $sql_insert_cart = $conn->prepare("INSERT INTO import_cart(gid,gname,gquantity,gprice) VALUES (?,?,?,?)");
    $sql_insert_cart->bind_param("isis", $game['gid'], $game['gname'], $quantity, $game['gprice'],);
    $sql_insert_cart->execute();
    echo "succes";
  } else {
    echo "exist";
  }
  $conn->close();
}

function loadCart()
{
  include "../model/connect.php";
  //load game into cart
  $sql = "SELECT gid,gname,gquantity,gprice FROM import_cart ";
  $result = $conn->query($sql);
  $data = '';
  while ($row = $result->fetch_assoc()) {
    $data .= "
          <tr>
            <td>" . $row['gid'] . "</td>
            <td>" . $row['gname'] . "</td>
            <td class='price'>" . $row['gprice'] . "</td>
            <td>" . $row['gquantity'] . "</td>
            <td><input type='number' name='quanof_" . $row['gid'] . "' class='quantity_inp' onkeyup='updateCurrPrice(" . $row['gid'] . ",this.value)' value='" . $row['gquantity'] . "'></td>";
    $sql_supp = "SELECT suppID,suppName FROM supplier";
    $result2 = $conn->query($sql_supp);
    $supp_opt = '';
    if ($result2->num_rows > 0) {
      while ($row2 = $result2->fetch_assoc()) {
        $supp_opt .= "<option value='" . $row2['suppID'] . "'>" . $row2['suppName'] . "</option>";
      }
    } else {
      $supp_opt = "<option value='none'>none</option>";
    }
    $data .= "
          <td><select name='suppof_" . $row['gid'] . "' id='supply'>
            $supp_opt
          </select></td>
          <td>
            <div class='delete-button' onclick='deleteFromCart(" . $row['gid'] . ")' >Del</div>
          </td>
        </tr> ";
  }
  echo $data;
  $conn->close();
}

function loadGen()
{
  include "../model/connect.php";
  $sql = "SELECT impID FROM import ORDER BY impID DESC";
  $result =  $conn->query($sql);
  if ($result->num_rows <= 0) {
    $data = "
              <div class='title'>
              <span>Import information</span>
            </div>
            <div class='form-general-div'>
              <div>
                <span>Account ID:</span>
              </div>
              <div>
                <input id='import-account-ID' name='import_account_ID' type='text' value='" . $_COOKIE['accountId'] . "' readonly>
              </div>
            </div>
            <div class='form-general-div'>
              <div>
                <span>Date create :</span>
              </div>
              <div>
                <input id='import-date-create' name='import_date_create' type='text' value='" . date("Y-m-d") . "' readonly>
              </div>
            </div>
            <div class='form-general-div'>
              <div>
                <span>Total price :</span>
              </div>
              <div>
                <input id='import-total-price' name='import_total_price' type='text' value='0' readonly>
              </div>
            </div>

            <div>
              <div class='message-container'>
                <span id='message'></span>
              </div>
            </div>
  ";
  } else {
    $row = $result->fetch_assoc();
    $data = "
          <div class='title'>
          <span>Import information</span>
        </div>
        <div class='form-general-div'>
          <div>
            <span>Account ID:</span>
          </div>
          <div>
            <input id='import-account-ID' name='import_account_ID' type='text' value='" . $_COOKIE['accountId'] . "' readonly>
          </div>
        </div>
        <div class='form-general-div'>
          <div>
            <span>Date create :</span>
          </div>
          <div>
            <input id='import-date-create' name='import_date_create' type='text' value='" . date("Y-m-d")  . "' readonly>
          </div>
        </div>
        <div class='form-general-div'>
          <div>
            <span>Total price :</span>
          </div>
          <div>
            <input id='import-total-price' name='import_total_price' type='number' value='0' readonly>
          </div>
        </div>

        <div>
          <div class='message-container'>
            <span id='message'></span>
          </div>
        </div>
    ";
  }
  echo $data;
  $conn->close();
}
function deleteGameFromCart($gid)
{
  include "../model/connect.php";
  $sql = "DELETE FROM import_cart WHERE gid = $gid";
  if ($conn->query($sql)) {
    echo "success";
  } else {
    echo "delete failed";
  }
}

function importGame()
{
  include "../model/connect.php";
  include "../model/object/game.php";
  $impID = intval($_POST['importID']);
  /* $impAccID = intval($_POST['import_account_ID']); */
  $impAccID = 3;
  $impDataCreate = $_POST['import_date_create'];
  $impTotalPrice = floatval($_POST['import_total_price']);
  if ($impTotalPrice == 0) { //check if no product is choose
    $_SESSION['message'] = "PLEASE CHOOSE PRODUCT!";
    header('location: ../view/admin/employee.php?page=import');
    return;
  }
  $sql_imp = "INSERT INTO import(accID,total_price,date_create) VALUES ($impAccID,$impTotalPrice,'" . $impDataCreate . "')";
  if ($conn->query($sql_imp)) {
    $lastID = $conn->insert_id;

    $sql_imp_detail = $conn->prepare("INSERT INTO import_detail(impID,gid ,gname,quantity,price,suppID) VALUES (?,?,?,?,?,?)");
  }
  $pattern = '/importID|import_account_ID|import_date_create|import_total_price/';
  $quantity = 0;
  $supp = 0;
  foreach ($_POST as $key => $val) {
    if (preg_match($pattern, $key) == 1) {
      continue;
    }
    if (preg_match("/quanof_/", $key)) {
      if (intval($val) == 0) {
        $quantity = 1;
      } else {
        $quantity = $val;
      }
      continue;
    }
    if (preg_match("/suppof_/", $key)) {
      $gameID = explode("suppof_", $key);
      $gameTmp = new games();
      $gameTmp = games::__construct2(games::getGame($gameID[1]));
      $supp = $val;
      $gname = $gameTmp->getGameName();
      $gprice = floatval($gameTmp->getGamePrice());

      $sql_imp_detail->bind_param("iisiii", $lastID, $gameID[1], $gname, $quantity, $gprice, $supp);

      if ((updateGameQuantity($gameID[1], $quantity) == 1)) { // update quantity in game
        if ($sql_imp_detail->execute()) {
          // empty import_cart
          $sql_delete_cart = "DELETE FROM import_cart";
          $result = $conn->query($sql_delete_cart);
          $_SESSION['message'] = "ADD PRODUCT SUCESSED !";
        } else {
          // if import detail failed->restore quantity
          $_SESSION['message'] = "ADD PRODUCT FAILED !";
          restoreGameQuantity($gameID[1], $quantity);
        }
      } else {
        $_SESSION['message'] = "ADD PRODUCT FAILED !";
      }
      header('location: ../view/admin/employee.php?page=import');
    }
  }
}

function updateGameQuantity($gid, $imp_quantity)
{
  include "../model/connect.php";
  echo "alo";
  $sql_quantity = "SELECT gquantity FROM games WHERE gid=$gid";
  $result = $conn->query($sql_quantity);
  $row = $result->fetch_assoc();
  $curr_quantity = intval($row['gquantity']);
  $total_quantity = $curr_quantity + intval($imp_quantity);

  //update
  $sql_update = "UPDATE games SET gquantity = $total_quantity WHERE gid = $gid";
  $result2 = $conn->query($sql_update);
  if ($result2 == true) {
    return 1;
  } else {
    return 0;
  }
  $conn->close();
}


function restoreGameQuantity($gid, $imp_quantity)
{
  include "../model/connect.php";
  $sql_quantity = "SELECT gquantity FROM games WHERE gid=$gid";
  $result = $conn->query($sql_quantity);
  $row = $result->fetch_assoc();
  $curr_quantity = intval($row['gquantity']);
  $total_quantity = $curr_quantity - intval($imp_quantity);

  //update
  $sql_update = "UPDATE games SET gquantity = $total_quantity WHERE gid = $gid";
  $result2 = $conn->query($sql_update);
  if ($result2 == true) {
    return 1;
  } else {
    return 0;
  }
  $conn->close();
}

function updateCartQuantity($gid, $quantity)
{
  include "../model/connect.php";
  if ($gid == "-1") {
    $total_price = 0;
    $sql_getprice = "SELECT gquantity,gprice FROM import_cart";
    $result = $conn->query($sql_getprice);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $total_price += floatval($row['gquantity']) * floatval($row['gprice']);
      }
      echo $total_price;
    }
  } else {
    $sql = "UPDATE import_cart SET gquantity=$quantity WHERE gid=$gid";
    if ($conn->query($sql)) {
      $total_price = 0;
      $sql_getprice = "SELECT gquantity,gprice FROM import_cart";
      $result = $conn->query($sql_getprice);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $total_price += floatval($row['gquantity']) * floatval($row['gprice']);
        }
        echo $total_price;
      }
    }
  }
}

function listImportWithPagination($date_start, $date_end, $accID, $priceFr, $priceTo)
{
  include "../model/connect.php";
  include "../model/object/supplier.php";
  $import_bill = '';
  // get number of import bill for pagination
  if ($accID == "") {
    $sql_all = "SELECT impID FROM import WHERE date_create BETWEEN '" . $date_start . "' AND '" . $date_end . "' AND total_price BETWEEN $priceFr AND $priceTo";
  } else {
    $sql_all = "SELECT impID FROM import WHERE accID=$accID AND date_create BETWEEN '" . $date_start . "' AND '" . $date_end . "' AND total_price BETWEEN $priceFr AND $priceTo";
  }
  $allImp = $conn->query($sql_all);
  if ($allImp->num_rows <= 0) {
    echo "empty";
    return;
  }
  if ($allImp->num_rows % 5 == 0) {
    $imp_quantity = floor($allImp->num_rows / 5);
  } else {
    $imp_quantity = floor($allImp->num_rows / 5) + 1;
  }

  echo $imp_quantity . "###";
  // get import bills of page 1
  if ($accID == "") {
    $sql_page_one = "SELECT * FROM import WHERE date_create BETWEEN '" . $date_start . "' AND '" . $date_end . "' AND total_price BETWEEN $priceFr AND $priceTo ORDER BY impID LIMIT 0,5 ";
  } else {
    $sql_page_one = "SELECT * FROM import WHERE accID=$accID AND date_create BETWEEN '" . $date_start . "' AND '" . $date_end . "' AND total_price BETWEEN $priceFr AND $priceTo ORDER BY impID LIMIT 0,5 ";
  }
  $page_one = $conn->query($sql_page_one);
  if ($page_one->num_rows > 0) {
    while ($row = $page_one->fetch_assoc()) {
      //get general info
      $import_bill .= "
        <tr>
          <td style='width: 20%;' id='impid'>" . $row['impID'] . "</td>
          <td style='width: 20%;' id='accid'>" . $row['accID'] . "</td>
          <td style='width: 20%;' id='date'>" . $row['date_create'] . "</td>
          <td style='width:20%;' id='impid'>" . $row['total_price'] . "</td>
          <td>
            <div class='view-button' onclick='showImportDetail(" . $row['impID'] . "," . $row['accID'] . ",document.getElementById(`date`).innerHTML," . $row['total_price'] . ")' >Select</div>
          </td> 
        </tr>
      ";
    }
    echo $import_bill;
  }
}

function listImportWithoutPagination($page, $date_start, $date_end, $accID, $priceFr, $priceTo)
{
  include "../model/connect.php";
  include "../model/object/supplier.php";
  $startPos = 5 *  $page - 5;
  $import_bill = '';
  // get import bills of page
  if ($accID == '') {
    $sql_page = "SELECT * FROM import WHERE date_create BETWEEN '" . $date_start . "' AND '" . $date_end . "' AND total_price BETWEEN $priceFr AND $priceTo ORDER BY impID LIMIT 5 OFFSET $startPos";
  } else {
    $sql_page = "SELECT * FROM import WHERE accID=$accID AND date_create BETWEEN '" . $date_start . "' AND '" . $date_end . "' AND total_price BETWEEN $priceFr AND $priceTo ORDER BY impID LIMIT 5 OFFSET $startPos";
  }
  $page = $conn->query($sql_page);
  if ($page->num_rows > 0) {
    while ($row = $page->fetch_assoc()) {
      //get general info
      $import_bill .= "
        <tr>
          <td style='width:20%;'>" . $row['impID'] . "</td>
          <td style='width: 20%;'>" . $row['accID'] . "</td>
          <td style='width: 20%;'>" . $row['date_create'] . "</td>
          <td style='width:20%;'>" . $row['total_price'] . "</td>
          <td>
            <div class='view-button' onclick='showImportDetail(" . $row['impID'] . "," . $row['accID'] . "," . $row['date_create'] . "," . $row['total_price'] . ")' >Select</div>
          </td>
        </tr>
      ";
    }
  }
  echo $import_bill;
}

function showImportDetail($importID, $accountId, $date_create, $total_price)
{
  include "../model/connect.php";
  include "../model/object/supplier.php";
  $import_bill = '';
  //get general info
  $import_bill .= "
    <div class='import-container'>
      <div class='infor'>
        <div class='id'>
          <span>Import ID:</span>
          <span>" . $importID . "</span>
        </div>
        <div class='Account'>
          <span>Account ID:</span>
          <span>" . $date_create . "</span>
        </div>
        <div class='Date'>
          <span>Data create: </span>
          <span>" . $accountId . "</span>
        </div>
      </div>
      <div class='list-game-imported'>
        <div class='game-imported-header'>
          <div class='gid-import-header'>GID</div>
          <div class='gname-import-header'>Name</div>
          <div class='quantity-import-header'>QUANTITY</div>
          <div class='price-import-header'>PRICE</div>
          <div class='supp-import-header'>SUPPLIER</div>
        </div>
      ";
  //get list game 
  $sql_get_list_game = "SELECT * FROM import_detail WHERE impID=" . $importID . "";
  $list = $conn->query($sql_get_list_game);
  while ($game = $list->fetch_assoc()) {
    $import_bill .= "
      <div class='game-imported'>
        <div class='gid-import'>" . $game['gid'] . "</div>
        <div class='gname-import'>" . $game['gname'] . "</div>
        <div class='quantity-import'>" . $game['quantity'] . "</div>
        <div class='price-import'>" . $game['price'] . "</div>";
    $suppTmp = supplier::__construct2(supplier::getSupp($game['suppID']));
    $import_bill .= "
        <div class='supp-import'>" . $suppTmp->getSuppName() . "</div>
      </div> 
    ";
    unset($suppTmp);
  }
  $import_bill .= "
    </div>
    <div class='price-view'>
      <div class='total-price'>
        <span>TOTAL PRICE: </span>
        <span>" . $total_price . "</span>
      </div>
    </div>
  </div>";
  echo $import_bill;
}
