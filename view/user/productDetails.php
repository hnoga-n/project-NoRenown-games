<?php
include '../../model/connect.php';
if (empty($_GET['id'])) {
  header('location: page404.php');
} else {
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT * FROM game_detail where gdt_id = {$id}");
  $sql1 = mysqli_query($conn, "SELECT * FROM games where gid = {$id}");
  if (mysqli_num_rows($sql) > 0 && mysqli_num_rows($sql1) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $row2 = mysqli_fetch_assoc($sql1);
    $result = round((float)$row2['gprice'] - (float)$row2['gprice'] * (int)$row2['gdiscount'] * 0.01, 2);
  } else {
    header('location: page404.php');
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $row2['gname'] ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="icon" href="./assets/img/logo.png" />
  <link rel="stylesheet" href="./assets/css/product.css" />
  <link rel="stylesheet" href="./assets/css/header.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/footer.css" />
  <link rel="stylesheet" href="./assets/css/filterProducts.css" />
  <link rel="stylesheet" href="./assets/css/productDetails.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
  <?php
  include 'header.php';
  ?>
  <div class="parallax">
    <img src="./assets/img/sky3.jpg">
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
          <video controls muted src="./assets/video/I Am Atomic 4k.mp4"></video>
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
            <a href="">
              <div class="addToCartBtn">
                Add to cart
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="seperator"></div>
      <div class="middle-content">
        <h2>Screenshots</h2>
        <div class="visuals-gameplay">
          <div class="main-img">
            <img src="./assets/img/sky3.jpg" onclick="zoomIn(this.src,this)" />
          </div>
          <div class="sub-img">
            <div class="sub-img-item">
              <img src="./assets/img/4horseman.jpg" onclick="zoomIn(this.src,this)" />
            </div>
            <div class="sub-img-item">
              <img src="./assets/img/pacman-ghost-logo-4E0E79293D-seeklogo.com.png" onclick="zoomIn(this.src,this)" />
            </div>
            <div class="sub-img-item">
              <img src="./assets/img/sky-of-star.jpg" onclick="zoomIn(this.src,this)" />
            </div>
            <div class="sub-img-item">
              <img src="./assets/img/gowSlideShow.jpg" onclick="zoomIn(this.src,this)" />
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
        <h2>Reviews</h2>
      </div>
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>

</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="./assets/js/header.js"></script>
<script src="./assets/js/productDetails.js"></script>

</html>