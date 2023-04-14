<?php 
    include "connect.php";
    session_start();
    if(isset($_COOKIE['accountId'])) {
        $gid = $_POST['gid'];
        $acc_id = $_COOKIE['accountId'];
        $review_text = $_POST['user_reviews'];
        
        $insertData = "INSERT INTO reviews(gid,acc_id,review_text) 
                    VALUES (?,?,?)";
        $sqlInsert = $conn->prepare($insertData);
        $sqlInsert->bind_param("sss",$gid,$acc_id,$review_text);
        
        $sqlInsert->execute();
        echo "<script>
            alert('Your reviews have been post')
            window.location.replace('../view/user/productDetails.php?id=$gid')
            </script>
            ";
    } else {
        echo "<script>
            alert('You are not sign in')
            window.location.replace('location: ../view/user/login.php')
            </script>";
    }
    $sqlInsert->close();
?>