<?php 
   include 'connect.php';
   session_start();

   if(empty($_COOKIE['accountId'])) {
      echo "NotSignIn";
   } else {

      $cUser_id = $_COOKIE['accountId'];
      $cItem_id = (int)$_GET['userId'];
      $cItem_name = $_GET['nameProduct'];
      $cItem_price_after_discount = $_GET['priceProductAfterDiscount'];
      $cItem_price_before_discount = trim($_GET['priceProductBeforeDiscount'],"$");
      $cItem_image = $_GET['imgSrc']; 
      $cItem_quantity = 1;

      $sql = "SELECT cItem_quantity FROM cart WHERE cUser_id = '{$cUser_id}' AND cItem_id = '{$cItem_id}'";
      $result = $conn->query($sql);

      if($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         $cItem_quantity += (int)$row['cItem_quantity'];
         $stmt = $conn->prepare("UPDATE cart SET cItem_quantity = ? WHERE cUser_id = ? AND cItem_id = ?");
         $stmt->bind_param("iii",$cItem_quantity,$cUser_id,$cItem_id);
      }
      else {
         $stmt = $conn->prepare("INSERT INTO cart (cUser_id, cItem_id, cItem_name,cItem_price_after_discount,cItem_price_before_discount,cItem_image,cItem_quantity) 
                                 VALUES (?,?,?,?,?,?,?)");
         $stmt->bind_param("iissssi",$cUser_id,$cItem_id,$cItem_name,$cItem_price_after_discount,$cItem_price_before_discount,$cItem_image,$cItem_quantity);
      }
      if($stmt) {
         echo "You have added $cItem_name to your cart";
      } else {
         echo "Please try again";
      }
      $stmt->execute();

      $stmt->close();
      $conn->close();
   }
