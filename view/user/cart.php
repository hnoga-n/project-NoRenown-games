<?php
include "../../model/connect.php";



?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoRenowned Games</title>
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
    <a href="index.html">
      <div class="logo">
        <span class="text1">NoRENOWN</span>
        <br>
        <span class="text2">GAMING</span>
      </div>
    </a>


    <div class="progress-steps">
      <span class="step active">
        <span class="number">1</span>
        <span class="text">Shopping cart</span>
        <span class="spacer"></span>
      </span>
      <span class="step ">
        <span class="number">2</span>
        <span class="text">Payment</span>
        <span class="spacer"></span>
      </span>
      <span class="step">
        <span class="number">3</span>
        <span class="text last">Game activation</span>
      </span>
    </div>
    <div class="user">
      <a href="login.html">
        <button>
          <i class="fa-solid fa-user"></i>
        </button>
      </a>
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
            ?>
            <!-- <div class="cart-item">
              <div class="item-container">
                <a href="/en/12153-buy-wo-long-fallen-dynasty-pc-game-steam/" class="cover">
                  <picture><img data-src="https://s1.gaming-cdn.com/images/products/12153/250x143/12153-cover.jpg?v=1677841491" alt="Wo Long: Fallen Dynasty" src="https://s1.gaming-cdn.com/images/products/12153/250x143/12153-cover.jpg?v=1677841491" loading="lazy">
                  </picture>
                </a>
                <div class="information">
                  <div class="name">
                    <span title="Wo Long: Fallen Dynasty" class="title">Wo Long: Fallen Dynasty</span>
                  </div>
                  <div class="type">Steam</div>
                  <div class="actions">
                    <a href="" class="deleteItem">
                      <div class="icon-delete icon-xs"></div>
                    </a>
                  </div>
                </div>
                <input type="number" value="1" class="count_input">
                <div class="price">44.39€</div>
              </div>
            </div> -->

            <!-- <div class="cart-empty">
                  <div class="icon-cart icon-xxl"></div> 
                  <h2 class="title">Your cart is empty</h2> 
                  <span class="content">You didn't add any item in your cart yet. Browse the website to find amazing deals!</span> 
                  <a href="/en/search/" class="button button-secondary">Discover games</a>
                </div>  -->
          </div>
        </div> <!----> <!----> <!----> <!---->
      </div>
      <!-- <div class="cartpage-right cartpage-empty">
            <h2>Summary</h2> 
            <div class="cart-summary">
              <div class="summary-row">
                <span>Official price</span> 
                <span>0 Vnd</span>
              </div> <div class="summary-row">
                <span>Discount</span>
                 <span>0 Vnd</span>
                </div> 
                <div class="summary-row">
                  <span>Subtotal</span>
                   <span>0 Vnd</span>
                  </div> 
                  <a href="#" class="button gotopayment button-disabled">
                      Go to payment
                  <div class="icon-arrow icon-xxs"></div>
                </a> 
                <span class="choice">or</span> 
                <a href="/" class="back">
                  <div class="icon-arrow icon-xxs"></div>
                    Continue shopping
                </a>
              </div>
            </div>
          </div> -->

      <div class="cartpage-right">
        <h2>Summary</h2>
        <div class="cart-summary">
          <div class="summary-row">
            <span>Official price</span>
            <span id="offcprice">0</span>
          </div>
          <div class="summary-row">
            <span>Discount</span>
            <span id="discount">0</span>
          </div>
          <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotal">0</span>
          </div>
          <a href="" class="button gotopayment">
            Go to payment
            <div class="icon-arrow icon-xxs"></div>
          </a> <span class="choice">or</span>
          <a href="/" class="back">
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
<!-- <script src="./assets/js/header.js"></script> -->

</html>