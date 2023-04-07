<?php
session_start();
if (isset($_COOKIE['usertype'])) {
  if ($_COOKIE['usertype'] == 2) {
    require_once "./model/logout.php";
    header('location: ./page404.php');
  }
}
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
      <?php
      include './model/connect.php';
      $sql = "SELECT gid,gimg
                FROM games
                WHERE trending=1 AND visible=1
                ORDER BY RAND()
                LIMIT 4";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='slide' id='slide-first'>
                    <a class='slider-img' href='./view/user/productDetails.php?id=" . $row['gid'] . "'><img src='./assets/img/" . $row['gimg'] . "' class='slider-img' /></a>
                  </div>";
          break;
        }
        while ($row = $result->fetch_assoc()) {
          echo "<div class='slide'>
                    <a class='slider-img' href='./view/user/productDetails.php?id=" . $row['gid'] . "'><img src='./assets/img/" . $row['gimg'] . "' class='slider-img' /></a>
                  </div>";
        }
      }
      ?>
      <!-- <div class="slide" id="slide-first">
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
      </div> -->
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
      <div class="products-list" id="showtrending">
        <!-- <div class="item">
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
        </div> -->
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
<!-- <script src="./assets/js/search.js"></script> -->
<!-- <script src="./assets/js/list.js"></script> -->
<!-- <script src="./assets/js/login.js"></script> -->
<script src="./controller/pagination_trending.js"></script>
<script src="./assets/js/productsView.js"></script>

</html>