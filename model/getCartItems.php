<?php
  include 'connect.php';
    $sql = mysqli_query($conn, "SELECT * FROM cart");
    if (mysqli_num_rows($sql) > 0) {
        while($row = $sql->fetch_assoc()){
            echo '<div class="cart-item" id="' . $row["cItem_id"] . '">
            <div class="item-container">
              <a href="/en/12153-buy-wo-long-fallen-dynasty-pc-game-steam/" class="cover">
                <picture><img data-src="../../assets/img/'. $row["cItem_image"] .'" alt="'. $row["cItem_name"] .'" src="../../assets/img/'. $row["cItem_image"] .'" loading="lazy">
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
              <input type="number" value=' . $row["cItem_quantity"] . ' min="1" oninput="validity.valid||(value=``);" onChange="changed_quantity();" class="count_input">';
            
            $formatter = new NumberFormatter('vi_VN',NumberFormatter::CURRENCY);
            $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE,'VND');
            $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
            if($row["cItem_price"] == $row["cItem_discountedPrice"]) 
                echo '<div class="price" value="'. $row["cItem_price"] .'">' . $formatter->formatCurrency($row["cItem_price"],'VND') . '</div>';
            else if($row["cItem_discountedPrice"] < $row["cItem_price"])
                echo '<div class="price" value="'. $row["cItem_price"] .'"><s style="color:gray">' . $formatter->formatCurrency($row["cItem_price"],'VND') . '</s>
                        <div class="discounted" value="'. $row["cItem_discountedPrice"] .'">' . $formatter->formatCurrency($row["cItem_discountedPrice"],'VND') . '</div>
                    </div>';
            echo '</div> <!---->
          </div>';
        }
      
    }else {
        echo '<div class="cart-empty">
        <div class="icon-cart icon-xxl"></div> 
        <h2 class="title">Your cart is empty</h2> 
        <span class="content">You didn\'t add any item in your cart yet. Browse the website to find amazing deals!</span> 
        <a href="/search.php" class="button button-secondary">Discover games</a>
      </div>';
    }
?>