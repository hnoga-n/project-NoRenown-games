<?php
session_start();
switch ($_GET['query']) {
  case "loadgen":
    loadGen();
    break;
  case "loadcart":
    loadCart();
    break;
  case "listgame":
    showListGameImport();
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
}

function showListGameImport()
{
  include './connect.php';
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
            FROM games
            WHERE LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12
            ";
      $sql1 = "SELECT * 
            FROM games
            WHERE LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto";
    } else {
      $sql = "SELECT * 
            FROM games
            WHERE gcategory = '$v' AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto
            LIMIT $loc,12";
      $sql1 = "SELECT * 
            FROM games
            WHERE gcategory = '$v' AND LOWER(gname) REGEXP '$search' AND gprice BETWEEN $pfrom AND $pto";
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
                        <td>" . $row['gcategory'] . "</td>
                        <td>" . $row['gprice'] . "$</td>
                        <td>" . $row['gquantity'] . "</td>
                        <td>-" . $row['gdiscount'] . "%</td>
                        <td>
                            <img src='../../assets/img/" . $row['gimg'] . "'>
                        </td>
                        <td>
                          <div class='delete-button' onclick='addToImportCard(" . $row['gid'] . ")'>Del</div>
                        </td>
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
    $sql_insert_cart = $conn->prepare("INSERT INTO import_cart(gid,gname,gquantity,gprice) VALUES (?,?,?,?)");
    $sql_insert_cart->bind_param("isis", $game['gid'], $game['gname'], $game['gquantity'], $game['gprice'],);
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
            <td><input type='number' name='quanof_" . $row['gid'] . "' class='quantity_inp' onkeyup='updateCurrPrice()'></td>";
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
                <span>Import ID:</span>
              </div>
              <div>
                <input id='importID' name='importID' type='text' value='1' readonly>
              </div>
            </div>
            <div class='form-general-div'>
              <div>
                <span>Account ID:</span>
              </div>
              <div>
                <input id='import-account-ID' name='import_account_ID' type='text' value='2' readonly>
              </div>
            </div>
            <div class='form-general-div'>
              <div>
                <span>Date create :</span>
              </div>
              <div>
                <input id='import-date-create' name='import_date_create' type='text' value='" . date("d/m/Y") . "' readonly>
              </div>
            </div>
            <div class='form-general-div'>
              <div>
                <span>Total price :</span>
              </div>
              <div>
                <input id='import-total-price' name='import_total_price' type='text' value='' readonly>
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
            <span>Import ID:</span>
          </div>
          <div>
            <input id='importID' name='importID' type='text' value='" . $row['impID'] + 1 . "' readonly>
          </div>
        </div>
        <div class='form-general-div'>
          <div>
            <span>Account ID:</span>
          </div>
          <div>
            <input id='import-account-ID' name='import_account_ID' type='text' value='2' readonly>
          </div>
        </div>
        <div class='form-general-div'>
          <div>
            <span>Date create :</span>
          </div>
          <div>
            <input id='import-date-create' name='import_date_create' type='text' value='" . date("Y/m/d") . "' readonly>
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
  include "../model/game.php";
  $impID = intval($_POST['importID']);
  /* $impAccID = intval($_POST['import_account_ID']); */
  $impAccID = 3;
  $impDataCreate = $_POST['import_date_create'];
  $impTotalPrice = intval($_POST['import_total_price']);

  $sql_imp = "INSERT INTO import(accID,total_price,date_create) VALUES ($impAccID,$impTotalPrice,$impDataCreate)";
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
      $quantity = $val;
      continue;
    }
    if (preg_match("/suppof_/", $key)) {
      $gameID = explode("suppof_", $key);
      $gameTmp = new games();
      $gameTmp = games::__construct2(games::getGame($gameID[1]));
      $supp = $val;
      $gname = $gameTmp->getGameName();
      $gprice = floatval($gameTmp->getGamePrice()) * $quantity;


      $sql_imp_detail->bind_param("iisiii", $lastID, $gameID[1], $gname, $quantity, $gprice, $supp);
      $sql_imp_detail->execute();
    }
  }
}

function getNameGame($gid)
{
}
