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
</head>

<body>
  <?php
  include 'header.php';
  include '../../model/connect.php';
  // $id = mysqli_real_escape_string($conn,$_GET['user_id']);
  // $gdt_id = $_GET['q'];
  //   $gdt_id = '171';

  //   $sql = mysqli_query($conn,"SELECT * FROM game_detail where gdt_id = {$gdt_id}");
  //   $sql1 = mysqli_query($conn,"SELECT * FROM games where gid = {$gdt_id}");

  //   $row = mysqli_fetch_assoc($sql);
  //   $row2 = mysqli_fetch_assoc($sql1);
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
                <img src="../../assets/img/sky3.jpg" alt="" />
              </div>
              <div class="order-name">Hogward Legacy</div>
              <div class="order-quantity">x 5</div>
              <div class="order-price">20.00$</div>
            </div>
            <div class="order-products">
              <div class="order-img">
                <img src="../../assets/img/sky3.jpg" alt="" />
              </div>
              <div class="order-name">Hogward Legacy</div>
              <div class="order-quantity">x 5</div>
              <div class="order-price">20.00$</div>
            </div>
            <div class="order-products">
              <div class="order-img">
                <img src="../../assets/img/sky3.jpg" alt="" />
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

        <div class="notification">
            <header>You have not paid for any products yet</header>
            <a href="search.php" title="Move to search page">Go around and buy some stuff (Touch this)</a>
          </div>
      </div>
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="../../assets/js/header.js"></script>

</html>