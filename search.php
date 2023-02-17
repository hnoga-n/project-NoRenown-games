<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search Results</title>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
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
  </head>
  <body>
    <?php
      include 'header.php';
    ?>

    <div class="search-view">
      <div class="main-content">
        <div class="products-trending">
          <div class="products-filter">
            <div class="products-filter-selections">
              <div class="selection">
                <input class="glass-card" type="search" placeholder="Genres.." />
                <i class="fa-sharp fa-solid fa-caret-down"></i>
                <div class="dropdown-category">
                  <ul class="category-list">
                    <li>Fighting</li>
                    <li>Action</li>
                    <li>Adventure</li>
                  </ul>
                </div>
              </div>
              <div class="selection">
                <input class="glass-card" type="search" placeholder="Sort by :" />
                <i class="fa-sharp fa-solid fa-caret-down"></i>
                <div class="dropdown-category">
                  <ul class="category-list">
                    <li>Bestsellers</li>
                    <li>Trending</li>
                    <li>Price: Low to high</li>
                    <li>Price: High to low</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="products-filter-price">
              <label>Between</label>
              <input class="glass-card" type="text" min="0" value="0" />
              <label>and</label>
              <input class="glass-card" type="text" value="1000000" />
              <label>$</label>
              <i class="fa-solid fa-rotate-right"></i>
            </div>
          </div>
          <div class="products-list-filter">
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
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
                  <label class="price-number">20.00</label>
                  <label class="price-dollar">$</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pagination">
          <input type="button" value="&laquo;">
          <input type="button" value="1" class="active">
          <input type="button" value="2">
          <input type="button" value="3">
          <input type="button" value="4">
          <input type="button" value="&raquo;">
        </div>
      </div>
    </div>

    <?php
      include 'footer.php';
    ?>

  </body>
  <script src="./assets/js/productsView.js"></script>
  <script
    src="https://kit.fontawesome.com/f26ba754df.js"
    crossorigin="anonymous"
  ></script>
  <script src="./assets/js/header.js"></script>

</html>
