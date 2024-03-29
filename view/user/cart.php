<?php
session_start();

if (!isset($_COOKIE['accountId'])) {
  header('location: /project-NoRenowned-games/view/user/login.php');
}
?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="icon" href="../../assets/img/logo.png" />
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/header.css">
  <link rel="stylesheet" href="../../assets/css/footer.css">
  <link rel="stylesheet" href="../../assets/css/cart.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
  <!-- header -->
  <div class="header" id="myHeader">
    <a href="/project-NoRenowned-games/index.php">
      <div class="logo">
        <span class="text1">NoRENOWN</span>
        <br />
        <span class="text2">GAMING</span>
      </div>
    </a>
    <div class="container">
      <div class="menu">
        <div>
          <a href="/project-NoRenowned-games/index.php"> Home </a>
        </div>
        <div>
          <a href="/project-NoRenowned-games/view/user/search.php"> Games </a>
        </div>
        <div>
          <a href="/project-NoRenowned-games/view/user/contact.php"> Contact </a>
        </div>
        <div>
          <a href="/project-NoRenowned-games/view/user/about.php"> About </a>
        </div>
      </div>
      <div class="search">
        <input type="text" class="search-inp" id="header-search" onkeyup="search(searchValue.value,1,genreInp.value, priceFrom.value, priceTo.value,sortBy.value)" />
      </div>
      <div class="close" id="close">&times;</div>
    </div>
    <div class="header-right">


      <?php
      if (isset($_COOKIE["fullname"])) { ?>
        <div class="user-logged" style="display:block;">
          <button onclick="document.getElementById('panel-el').style.display = 'block'">
            <i class="fa-solid fa-user-secret"></i>
          </button>
          <div class="user-menu" id="panel-el">
            <div class="panel" style="margin: 70px 74%;">
              <div>
                <span><?php echo $_COOKIE["fullname"] ?></span>
              </div>
              <hr>
              <div>
                <a href="/project-NoRenowned-games/view/user/userProfile.php">
                  <i class="fa-solid fa-user"></i>
                  &nbsp;
                  Profile
                </a>
              </div>
              <div>
                <a href="/project-NoRenowned-games/view/user/order.php">
                  <i class="fa-solid fa-money-bill"></i>
                  &nbsp;
                  My orders
                </a>
              </div>
              <hr>
              <div>
                <a href="/project-NoRenowned-games/model/logout.php">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  &nbsp;
                  Sign out
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="user" style="display:block;">
          <a href="./view/user/login.php">
            <button>
              <i class="fa-solid fa-user"></i>
            </button>
          </a>
        </div>
      <?php } ?>

    </div>
  </div>
  </header>
  <div class="main-content">
    <div id="cartpage-app" class="cartpage-container">
      <div class="cartpage-left">
        <div class="cartpage-section">
          <h2>Cart</h2>
          <div class="cart-listing" id="itemsList">
            <?php
            // if ($sql->num_rows > 0) {
            //     while($result = $sql->fetch_assoc()) {
            //         echo 
            //     }
            // }
            // include '../../model/getCartItems.php';
            // include '../../model/getProductsInCart.php';

            ?>

          </div>
        </div>
      </div>

      <div class="cartpage-right cartpage-empty">
        <h2>Summary</h2>
        <div class="cart-summary">
          <div class="summary-row">
            <span>Official price</span>
            <span id="offcprice">0</span>
          </div>
          <a href="#" class="button gotopayment button-disabled" id="goto_payment">
            Go to payment
            <div class="icon-arrow icon-xxs"></div>
          </a> <span class="choice">or</span>
          <a href="./search.php" class="back">
            <div class="icon-arrow icon-xxs"></div>
            Continue shopping
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>
</body>
<script src="../../assets/js/cart.js"></script>
<script src="../../assets/js/header.js"></script>



</html>