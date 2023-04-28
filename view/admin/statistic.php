<?php 
  include_once "../../model/searchGenres.php";
  
  $accounts = "SELECT accid FROM account";
  $result_accounts = $conn->query($accounts);

  $games = "SELECT gid FROM games";
  $result_games = $conn->query($games);

  $trash_games = "SELECT gid FROM games WHERE visible = 0";
  $result_trash_games = $conn->query($trash_games);

  $invoices = "SELECT orderID FROM invoice";
  $result_invoices = $conn->query($invoices);

  $authorizations = "SELECT groupID FROM auth_group";
  $result_authorizations = $conn->query($authorizations);

?>
<html lang="en">
<body>
  <div class="statistic-container">
    <div class="menu_bar">
      <div class="header_menu_bar">
        <div class="menu">
          <ul>
          <li>Overview</li><li>Sold out</li><li>Import</li><li>Customer</li>
          </ul>
        </div>
      </div>
    </div>

    <div id="container">
      <div class="statistic-container-header">

          <div class="sales">
            <div class="content">
              <div class="text">Accounts</div>
              <div>
                <div class="number" id="sum_sold_quantity"><?php echo $result_accounts->num_rows ?></div>
                <i class="fa-solid fa-users-gear"></i>
              </div>
            </div>
          </div>
          <div class="earning">
            <div class="content">
              <div class="text">Invoices</div>
              <div>
                <div class="number" id="revenue"><?php echo $result_invoices->num_rows ?></div>
                <i class="fa-solid fa-barcode"></i>
              </div>
            </div>
          </div>
          <div class="import_money">
            <div class="content">
              <div class="text">Games</div>
              <div>
                <div class="number" id="import-money"><?php echo $result_games->num_rows ?></div>
                <i class="fa-solid fa-gamepad"></i>
              </div>
            </div>
          </div>
          <div class="import_quantity">
            <div class="content">
              <div class="text">Trash game</div>
              <div>
                <div class="number" id="import-quantity"><?php echo $result_trash_games->num_rows ?></div>
                <i class="fa-solid fa-trash-can"></i>
              </div>
            </div>
          </div>
          <div class="import_quantity">
            <div class="content">
              <div class="text">Authorizations</div>
              <div>
                <div class="number" id="import-quantity"><?php echo $result_authorizations->num_rows ?></div>
                <i class="fa-solid fa-screwdriver-wrench"></i>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  

</body>

<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="../../assets/js/statistic.js"></script>
<!-- <script src="../../controller/showListGamesSold.js"></script> -->

</html>