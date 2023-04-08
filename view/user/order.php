<?php 
  session_start();

  if (!isset($_COOKIE['accountId'])) {
    header('location: /project-NoRenowned-games/view/user/login.php');
  }
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My orders</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="icon" href="../../assets/img/logo.png" />
  <link rel="stylesheet" href="../../assets/css/product.css" />
  <link rel="stylesheet" href="../../assets/css/header.css" />
  <link rel="stylesheet" href="../../assets/css/style.css" />
  <link rel="stylesheet" href="../../assets/css/footer.css" />
  <link rel="stylesheet" href="../../assets/css/filterProducts.css" />
  <link rel="stylesheet" href="../../assets/css/productDetails.css" />
  <link rel="stylesheet" href="../../assets/css/orders.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
  <?php
  include 'header.php';
  ?>

  <div class="main-content">
    <div id="my-orders">
      <header class="my-orders-header">My orders</header>
      <div class="list-orders">
        <!-- <div class="order">
            <div class="order-top">
              <div class="order-date">Order date: 21/02/2023</div>
              <div class="order-status">Pending order</div>
            </div>
            <div class="order-mid">
              <div class="order-products">
                <div class="order-img">
                  <img src="./assets/img/sky3.jpg" alt="" />
                </div>
                <div class="order-name">Hogward Legacy</div>
                <div class="order-quantity">x 5</div>
                <div class="order-price">20.00$</div>
              </div>
              <div class="order-products">
                <div class="order-img">
                  <img src="./assets/img/sky3.jpg" alt="" />
                </div>
                <div class="order-name">Hogward Legacy</div>
                <div class="order-quantity">x 5</div>
                <div class="order-price">20.00$</div>
              </div>
              <div class="order-products">
                <div class="order-img">
                  <img src="./assets/img/sky3.jpg" alt="" />
                </div>
                <div class="order-name">Hogward Legacy</div>
                <div class="order-quantity">x 5</div>
                <div class="order-price">20.00$</div>
              </div>
            </div>
            <div class="order-bot">
              <button class="order-cancel">Cancel an order</button>
              <div class="order-total">Total: 100.00$</div>
            </div>
          </div>
          <div class="order">
            <div class="order-top">
              <div class="order-date">Order date: 21/02/2023</div>
              <div class="order-status">Pending order</div>
            </div>
            <div class="order-mid">
              <div class="order-products">
                <div class="order-img">
                  <img src="./assets/img/sky3.jpg" alt="" />
                </div>
                <div class="order-name">Hogward Legacy</div>
                <div class="order-quantity">x 5</div>
                <div class="order-price">20.00$</div>
              </div>
              <div class="order-products">
                <div class="order-img">
                  <img src="./assets/img/sky3.jpg" alt="" />
                </div>
                <div class="order-name">Hogward Legacy</div>
                <div class="order-quantity">x 5</div>
                <div class="order-price">20.00$</div>
              </div>
              <div class="order-products">
                <div class="order-img">
                  <img src="./assets/img/sky3.jpg" alt="" />
                </div>
                <div class="order-name">Hogward Legacy</div>
                <div class="order-quantity">x 5</div>
                <div class="order-price">20.00$</div>
              </div>
            </div>
            <div class="order-bot">
              <button class="order-cancel">Cancel an order</button>
              <div class="order-total">Total: 100.00$</div>
            </div>
          </div> -->

          <!-- <div class="notification">
            <header>You have not paid for any products yet</header>
            <a href="search.php" title="Move to search page">Go around and buy some stuff (Touch this)</a>
          </div> -->
      </div>
      <button id="more">See More...</button>
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="../../assets/js/header.js"></script>
<script src="../../controller/get_order.js"></script>
</html>