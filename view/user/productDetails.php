<?php
session_start();
include_once "../../model/getProductDetails.php";
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $row2['gname'] ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="icon" href="../../assets/img/logo.png" />
  <link rel="stylesheet" href="../../assets/css/product.css" />
  <link rel="stylesheet" href="../../assets/css/header.css" />
  <link rel="stylesheet" href="../../assets/css/style.css" />
  <link rel="stylesheet" href="../../assets/css/footer.css" />
  <link rel="stylesheet" href="../../assets/css/filterProducts.css" />
  <link rel="stylesheet" href="../../assets/css/productDetails.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <div class="parallax">
    <img src="../../assets/img/<?php echo $row2['gimg'] ?>">
  </div>

  <div class="box-image-zoom-in">
    <i class="fa-solid fa-xmark"></i>
    <div class="icon-chevron icon-chevron-left" onclick="antiPropagation(event)">
      <i class="fa-sharp fa-solid fa-chevron-left"></i>
    </div>
    <div class="image-zoom-in" onclick="antiPropagation(event)">
      <img src="" id="imageZoomId" />
    </div>
    <div class="icon-chevron icon-chevron-right" onclick="antiPropagation(event)">
      <i class="fa-sharp fa-solid fa-chevron-right"></i>
    </div>
  </div>

  <div class="main-content">
    <div class="product-app">
      <div class="header-content">

        <div class="video-game">
          <video controls src="<?php echo $row['trailer'] ?>">
            <source src='../../assets/video/I Am Atomic 4k.mp4' type='video/mp4'>
          </video>
        </div>
        <div class="panel">
          <div class="name">
            <h2><?php echo $row2['gname'] ?></h2>
          </div>
          <div class="price">
            <small><s><?php echo $row2['gprice'] ?>$</s></small>
            <div class="price-number"><?php echo $result ?></div>
            <div class="price-dollar">$</div>
          </div>
          <div>
            <div id="addToCartBtn">
              Add to cart
              <i class="fa-solid fa-cart-shopping"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="seperator"></div>
      <div class="middle-content">
        <h2>Screenshots</h2>
        <div class="visuals-gameplay">
          <div class="main-img">
            <img src="../../assets/img/<?php echo $row2['gimg'] ?>" onclick="zoomIn(this.src,this)" />
          </div>
          <div class="sub-img">
            <div class="sub-img-item">
              <img src=" <?php echo $row['screenshot1'] ?>" onclick="zoomIn(this.src,this)" />
            </div>
            <div class="sub-img-item">
              <img src="<?php echo $row['screenshot2'] ?>" onclick="zoomIn(this.src,this)" />
            </div>
            <div class="sub-img-item">
              <img src="<?php echo $row['screenshot3'] ?>" onclick="zoomIn(this.src,this)" />
            </div>
            <div class="sub-img-item">
              <img src="<?php echo $row['screenshot4'] ?>" onclick="zoomIn(this.src,this)" />
            </div>
          </div>
        </div>
        <div class="seperator"></div>
        <div class="information">
          <div class="about-game">
            <h2>About this game</h2>
            <p><?php echo $row['about'] ?>.</p>
          </div>
          <div class="configuration">
            <h2>Configurations</h2>
            <ul id="configuration-list">
              <li id="os">
                <span>OS :</span>
                <span><?php echo $row['cfg_os'] ?></span>
              </li>
              <li id="processor">
                <span>Processor:</span>
                <span><?php echo $row['cfg_processor'] ?></span>
              </li>
              <li id="graphics">
                <span>Graphics:</span>
                <span><?php echo $row['cfg_graphics'] ?></span>
              </li>
              <li id="storage">
                <span>Storage:</span>
                <span><?php echo $row['cfg_storage'] ?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="seperator"></div>
      <div class="footer-content">
        <div class="reviews">
          <?php include_once "../../model/get_user_reviews.php"; ?>
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
<script src="../../assets/js/productDetails.js"></script>
<script src="../../controller/addToCart.js"></script>
<script src="../../controller/insert_reviews.js"></script>

</html>