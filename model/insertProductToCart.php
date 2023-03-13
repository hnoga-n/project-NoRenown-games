<?php 
   include 'connect.php';
   session_start();

   /*  $cUser_id = $_POST['userId'] ; */
   $cUser_id = $_SESSION[''];
   $cItem_id = (int)$_GET['userId'];
   $cItem_name = $_GET['nameProduct'];
   $cItem_price = $_GET['priceProduct'];
   $cItem_image = $_GET['imgSrc']; 
   $cItem_quantity = 1;

   $sql = "SELECT cItem_quantity FROM cart WHERE cUser_id = '{$cUser_id}' AND cItem_id = '{$cItem_id}'";
   $result = $conn->query($sql);

   if($result->num_rows > 0) {
      $cItem_quantity += (int)$row['cItem_quantity'];
   }

   $stmt = $conn->prepare("INSERT INTO cart (cUser_id, cItem_id, cItem_name,cItem_price,cItem_image,cItem_quantity) 
                           VALUES (?,?,?,?,?,?)");
   $stmt->bind_param("iisssi",$cUser_id,$cItem_id,$cItem_name,$cItem_price,$cItem_image,$cItem_quantity);
   
   if($stmt) {
      echo "You have added $cItem_name to your cart";
   } else {
      echo "Please try again";
   }

   $stmt->execute();

   $stmt->close();
   $conn->close();
?>