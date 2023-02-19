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
    <div class="header" id="myHeader">
        <a href="index.html">
            <div class="logo">
                <span class="text1">NoRENOWN</span>
                <br />
                <span class="text2">GAMING</span>
            </div>
        </a>
        <div class="container">
            <div class="menu">
                <div>
                    <a id="" href="./index.html"> Home </a>
                </div>
                <div>
                    <a id="games" href="./search.html"> Games </a>
                </div>
                <div>
                    <a id="" href="./contact.html"> Contact </a>
                </div>
                <div>
                    <a id="" href=""> About </a>
                </div>
            </div>
            <div class="search">
                <input type="text" class="search-inp" id="header-search" />
            </div>
            <div class="close" id="close">&times;</div>
        </div>
        <div class="header-right">
            <div class="cart">
                <button>
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
            </div>
            <div class="user">
                <a href="login.html">
                    <button>
                        <i class="fa-solid fa-user"></i>
                    </button>
                </a>
            </div>
            <div class="user-logged">
                <button onclick="document.getElementById('panel-el').style.display = 'block'">
                    <i class="fa-solid fa-user-secret"></i>
                </button>
                <div class="user-menu" id="panel-el">
                    <div class="panel">
                        <div>
                            <span>Mach Hao Tuan</span>
                        </div>
                        <hr>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            &nbsp;
                            Account
                        </div>
                        <div>
                            <i class="fa-solid fa-money-bill"></i>
                            &nbsp;
                            My orders
                        </div>
                        <hr>
                        <div>
                            <i class="fa-solid fa-right-from-bracket"></i>
                            &nbsp;
                            Sign out
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <a href="./search.html" class="button button-more-games glass-card">More Games</a>
            </div>
            <div class="products-list">
                <div class="item">
                    <a href="productDetailsView.php?user_id=1">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <img src="/assets/img/sky3.jpg" alt="" />
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

    <div class="footer">
        <div class="content">
            <div class="footer-link">
                <div class="footer-logo">
                    <a href="index.html">
                        <div class="logo">
                            <span class="text1">NoRENOWN</span>
                            <br />
                            <span class="text2">GAMING</span>
                        </div>
                    </a>
                </div>
                <ul class="footer-lists">
                    <li>
                        <a href="#">Terms of Use</a>
                    </li>
                    <li>
                        <a href="#">Privacy policy</a>
                    </li>
                    <li>
                        <a href="#">Contact us</a>
                    </li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                </ul>
                <div class="footer-social">
                    <div class="footer-social-icons">
                        <a href="">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div class="footer-social-apps">
                        <a href="https://www.apple.com/vn/app-store/" target="_blank">
                            <img src="https://s3.gaming-cdn.com/themes/igv2/modules/footer/images/apple.svg" alt="" />
                        </a>
                        <a href="https://play.google.com/store/games" target="_blank">
                            <img src="https://s2.gaming-cdn.com/themes/igv2/modules/footer/images/android.svg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-information">
                Copyright © 2023 NoRenown Gaming - All rights reserved
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="./assets/js/header.js"></script>
<script src="./assets/js/slider.js"></script>

</html>