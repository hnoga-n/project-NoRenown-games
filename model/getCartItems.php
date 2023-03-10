<?php
  include 'connect.php';
    $sql = mysqli_query($conn, "SELECT * FROM cart");
    if (mysqli_num_rows($sql) > 0) {
        while($row = $sql->fetch_assoc()){
            echo '<div class="cart-item" id="' . $row["cItem_id"] . '">
            <div class="item-container">
              <a href="/en/12153-buy-wo-long-fallen-dynasty-pc-game-steam/" class="cover">
                <picture><img data-src="https://s1.gaming-cdn.com/images/products/12153/250x143/12153-cover.jpg?v=1677841491" alt="Wo Long: Fallen Dynasty" src="https://s1.gaming-cdn.com/images/products/12153/250x143/12153-cover.jpg?v=1677841491" loading="lazy">
                </picture>
              </a>
              <div class="information">
                <div class="name"><!---->
                  <span title=' . $row["cItem_name"] . ' class="title">' . $row["cItem_name"] . '</span>
                </div>
                <div class="type">Steam</div> <!---->
                <div class="actions">
                  <a href="../../model/delete_itemcart.php?item_id=' . $row["cItem_id"] . '" class="deleteItem">
                    <div class="icon-delete icon-xs"></div>
                  </a>
                </div>
              </div>
              <input type="number" value=' . $row["cItem_quantity"] . ' class="count_input">
              <div class="price">' . $row["cItem_price"] . '</div>
            </div> <!---->
          </div>';
        }
      
    }else {
        echo '<div class="cart-empty">
        <div class="icon-cart icon-xxl"></div> 
        <h2 class="title">Your cart is empty</h2> 
        <span class="content">You didn\'t add any item in your cart yet. Browse the website to find amazing deals!</span> 
        <a href="/en/search/" class="button button-secondary">Discover games</a>
      </div>';
    }
?>