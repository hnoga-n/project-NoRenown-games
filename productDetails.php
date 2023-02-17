<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game name</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="icon" href="./assets/img/logo.png" />
    <link rel="stylesheet" href="./assets/css/product.css" />
    <link rel="stylesheet" href="./assets/css/header.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/footer.css" />
    <link rel="stylesheet" href="./assets/css/filterProducts.css" />
    <link rel="stylesheet" href="./assets/css/productDetails.css" />

  </head>
  <body>
    <?php
      include 'header.php';
    ?>

    <div class="parallax">
      <img src="./assets/img/sky3.jpg">
    </div>

    <div class="main-content">
      <div class="product-app">
        <div class="header-content">
          <div class="video-game">
            <video controls muted src=""></video>
          </div>
          <div class="panel">
            <div class="name">
              <h2>Hogwarts Legacy</h2>
            </div>
            <div class="price">
                <small><s>40.00$</s></small>
                <div class="price-number">20.00</div>
                <div class="price-dollar">$</div>
            </div>
            <div>
              <a href="" >
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
              <img src="./assets/img/sky3.jpg" >
            </div>
            <div class="sub-img">
              <div class="sub-img-item">
                <img src="./assets/img/sky3.jpg">
              </div>
              <div class="sub-img-item">
                <img src="./assets/img/sky3.jpg">
              </div>
              <div class="sub-img-item">
                <img src="./assets/img/sky3.jpg">
              </div>
              <div class="sub-img-item">
                <img src="./assets/img/sky3.jpg">
              </div>
            </div>
          </div>
          <div class="seperator"></div>
          <div class="infomation">
            <div class="about-game">
              <h2>About this game</h2>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta in quod illo totam ut libero adipisci quibusdam natus voluptate, quas id sequi nesciunt mollitia eveniet quos expedita doloremque veniam quasi.</p>
            </div>
            <div class="configuration">
              <h2>Configurations</h2>
              <ul id="configuration-list">
                <li id="os">
                  <span>OS :</span>
                  <span>Windows 10 64-bit 1909</span>
                </li>
                <li id="processor">
                  <span>Processor:</span>
                  <span>Intel Core i3-4160, 3.6 GHz or AMD equivalent</span>
                </li>
                <li id="graphics">
                  <span>Graphics:</span>
                  <span>NVIDIA GTX 950 or AMD Radeon RX 470</span>
                </li>
                <li id="storage">
                  <span>Storage:</span>
                  <span>75 GB available space</span>
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
  <script
    src="https://kit.fontawesome.com/f26ba754df.js"
    crossorigin="anonymous"
  ></script>
  <script src="./assets/js/header.js"></script>
</html>
