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
    <div class="cart">
      <button>
        <i class="fa-solid fa-cart-shopping"></i>
      </button>
    </div>
    <div class="user">
      <a href="/project-NoRenowned-games/view/user/login.php">
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
            <a href="userProfile.php">
              <i class="fa-solid fa-user"></i>
              &nbsp;
              Profile
            </a>
          </div>
          <div>
            <a href="">
              <i class="fa-solid fa-money-bill"></i>
              &nbsp;
              My orders
            </a>
          </div>
          <hr>
          <div>
            <a href="">
              <i class="fa-solid fa-right-from-bracket"></i>
              &nbsp;
              Sign out
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>