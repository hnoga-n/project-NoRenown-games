<?php

session_start();
if (!isset($_COOKIE['accountId'])) {
  header('location: ./login.php');
} else {
  include "../../model/connect.php";
  $id = $_COOKIE['accountId'];
  $sql = "SELECT *  FROM account
                      JOIN users
                        on account.userID = users.userID 
                    WHERE accid = $id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}
if (!isset($_SESSION['total'])) {
  header('location: ../../index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoRenowned Games</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="icon" href="../../assets/img/logo.png" />
  <link rel="stylesheet" href="../../assets/css/header.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/footer.css">
  <link rel="stylesheet" href="../../assets/css/contact.css">
  <link rel="stylesheet" href="../../assets/css/payment.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
  <!-- <?php
        include 'header.php';
        ?> -->

  <div class="header" id="myHeader" style="background: black;padding:0 20px;">
    <div class="header-right">
      <div class="cart" style="padding:15px 0;">
        <a href="/project-NoRenowned-games/view/user/cart.php">
          <button style="min-width:150px;padding:0 10px;">
            <i class="fa-solid fa-arrow-left"></i>
            Back to cart
          </button>
        </a>
      </div>
    </div>
  </div>


  <div class="main-content">
    <div id="ig-main-container" class="payment-container">
      <h2>Billing address</h2>
      <div id="payment-app" class="payment-app">
        <form id="buy-card-form" action="../../model/add_invoice.php" class="payment-form" method="post">
          <div class="platforms">
            <div class="billing-address-container">
              <div class="alerts error hidden" id="billing-address-error" style="display: none;color: #ca1d1d;font-size: 18px;margin-bottom: 20px;">Please fill every fields</div>
              <div class="address-form raw">
                <label style="width: 50%;">
                  <input placeholder="Full name" type="text" name="fullname" required="required" value="<?php echo $row['fullname'] ?>" autocomplete="payment-form" class="name">
                </label>
                <label style="width: calc(50% - 15px)">
                  <input placeholder="Phone number" type="text" name="phone" required="required" value="<?php echo $row['phone'] ?>" autocomplete="payment-form" class="phone">
                </label>
                <label style="width: 100%;">
                  <input placeholder="Address" type="text" name="address" required="required" value="<?php echo $row['address'] ?>" autocomplete="payment-form" class="street">
                </label>
              </div>
            </div>
          </div>

          <div class="panel">
            <div class="pay-button">
              <div class="summary-row total">
                <span class="texttotal">Total payment :</span>
                <span class="subtotal"><?php echo $_SESSION['total'] ?></span>
              </div>
              <div class="payment-platform-submit"><!----> <!---->
                <div class="hipay"><button type="submit" class="button" id="formsubmit">Pay</button>
                </div> <!----> <!----> <!---->
              </div>
            </div>
            <label class="cgu-container">By clicking "Pay", You'll move to <strong>order page</strong> and wait for the order to be processed.</label>
          </div>

        </form>
      </div>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>
<!-- <script src="../../assets/js/payment.js"></script> -->
<!-- <script src="../../assets/js/header.js"></script> -->
<script src="../../controller/confirmPayment.js"></script>

</html>