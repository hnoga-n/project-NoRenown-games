<?php
session_start();

  
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NoRenowned Games</title>

  <link rel="icon" href="./assets/img/logo.png" />
  <link rel="stylesheet" href="./assets/css/slider.css" />
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/header.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/product.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />
  <link rel="stylesheet" href="./assets/css/filterProducts.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
</head>

<body>
  <!-- header -->
  <?php
  include './view/user/header.php';
  ?>
  <!-- slider -->
  <div class="slider-container">
    <div class="sliders">
      <div class="slide" id="slide-first">
        <a class="slider-img" href="#"><img src="./assets/img/eldenRingSlide.jpg " class="slider-img" /></a>
      </div>

      <div class="slide">
        <a class="slider-img" href="#"><img src="./assets/img/gowSlideShow.jpg" class="slider-img" /></a>
      </div>

      <div class="slide">
        <a class="slider-img" href="#"><img src="./assets/img/genshinsLIDEsHOW.jpg " class="slider-img" /></a>
      </div>

      <div class="slide">
        <a class="slider-img" href="#"><img src="./assets/img/spongebogSlhowSlide.jpg " class="slider-img" /></a>
      </div>
    </div>

    <div class="nav-btn">
      <input type="radio" id="radio1" name="next_slide" checked />
      <input type="radio" id="radio2" name="next_slide" />
      <input type="radio" id="radio3" name="next_slide" />
      <input type="radio" id="radio4" name="next_slide" />
    </div>
  </div>

  <div class="main-content">
    <div class="products-trending">
      <div class="headline">
        <h2>Trending</h2>
        <a href="./view/user/search.php" class="button button-more-games glass-card">More Games</a>
      </div>
      <div class="products-list">
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
        <div class="item">
          <a href="./productDetails.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <img src="./assets/img/sky3.jpg" alt="" />
            <div class="discount">
              <span>-<label>20</label>%</span>
            </div>
          </a>
          <div class="product-information">
            <div class="text-name">Elden ring</div>
            <div class="price">
              <label class="price-number"> 20.000 </label>
              <label class="price-dollar">$</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include './view/user/footer.php';
  ?>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="./assets/js/header.js"></script>
<script src="./assets/js/slider.js"></script>
<script src="./assets/js/search.js"></script>
<script src="./assets/js/result.js"></script>
<script src="./assets/js/login.js"></script>

</html>