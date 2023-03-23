<?php 
    include 'connect.php';

    $accountId = $_COOKIE['accountId'];
    $query = "SELECT * FROM cart WHERE cUser_id = {$accountId}";
    $result = $conn->query($query);
    $data = '';

    if($result->num_rows > 0 ) {
        while($row = mysqli_fetch_assoc($result)) {
            $data .= '<div class="cart-item">
                <div class="item-container">
                  <a href="../../view/user/productDetails.php?id=' . $row['cItem_id'] . '" class="cover">
                    <picture><img data-src="../../assets/img/' . $row['cItem_image'] . '" alt="' . $row['cItem_name'] . '" src="../../assets/img/' . $row['cItem_image'] . '" loading="lazy">
                    </picture>
                  </a>
                  <div class="information">
                    <div class="name">
                      <span title=" ' . $row['cItem_name'] .  '  " class="title">' . $row['cItem_name'] . '</span>
                    </div>
                    <div class="type">Steam</div> 
                    <div class="actions">
                      <a href="" class="deleteItem">
                        <div class="icon-delete icon-xs"></div>
                      </a>
  
                    </div>
                  </div>
                  <input type="number" value="' . $row['cItem_quantity'] . '" class="count_input">
                  </span>
                  <div class="price">' . $row['cItem_price_after_discount'] . '$</div>
                </div> 
              </div>';
        }
        echo $data;
    } else {
        echo '
            <div class="cart-empty">
            <div class="icon-cart icon-xxl"></div> 
            <h2 class="title">Your cart is empty</h2> 
            <span class="content">You didn\'t add any item in your cart yet. Browse the website to find amazing deals!</span> 
            <a href="/en/search/" class="button button-secondary">Discover games</a>
            </div>';
    }
