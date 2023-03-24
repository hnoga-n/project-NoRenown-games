<?php
  include 'connect.php';
  session_start();
  $accountId = $_COOKIE['accountId'];
    $sql = mysqli_query($conn, "SELECT * FROM cart WHERE cUser_id = {$accountId}");
    if (mysqli_num_rows($sql) > 0) {
        while($row = $sql->fetch_assoc()){
            echo '<div class="cart-item" id="' . $row["cItem_id"] . '">
            <div class="item-container">
              <a href="../../view/user/productDetails.php?id=' . $row['cItem_id'] . '" class="cover">
                <picture><img data-src="../../assets/img/'. $row["cItem_image"] .'" alt="'. $row["cItem_name"] .'" src="../../assets/img/'. $row["cItem_image"] .'" loading="lazy">
                </picture>
              </a>
              <div class="information">
                <div class="name"><!---->
                  <span title="' . $row["cItem_name"] . '" class="title">' . $row["cItem_name"] . '</span>
                </div>
                <div class="type">Steam</div> <!---->
                <div class="actions">
                  <a href="../../model/delete_itemcart.php?item_id=' . $row["cItem_id"] . '" class="deleteItem">
                    <div class="icon-delete icon-xs"></div>
                  </a>
                </div>
              </div>
              <input type="number" value=' . $row["cItem_quantity"] . ' min="1" oninput="validity.valid||(value=``);" onChange="changed_quantity();" class="count_input">';
            

            if((float)$row["cItem_price_before_discount"] == (float)$row["cItem_price_after_discount"]) 
                echo '<div class="price" value="'. $row["cItem_price_before_discount"] .'">' . $row["cItem_price_before_discount"] . '$</div>';
            else if((float)$row["cItem_price_after_discount"] < (float)$row["cItem_price_before_discount"])
                echo '<div class="price" value="'. $row["cItem_price_before_discount"] .'$"><s style="color:gray">' . $row["cItem_price_before_discount"] . '$</s>
                        <div class="discounted" value="'. $row["cItem_price_after_discount"] .'">' . $row["cItem_price_after_discount"] . '$</div>
                    </div>';
            echo '</div> <!---->
          </div>';
        }
      
    }else {
        echo '<div class="cart-empty">
        <div class="icon-cart icon-xxl"></div> 
        <h2 class="title">Your cart is empty</h2> 
        <span class="content">You didn\'t add any item in your cart yet. Browse the website to find amazing deals!</span> 
        <a href="./search.php" class="button button-secondary">Discover games</a>
      </div>';
    }
