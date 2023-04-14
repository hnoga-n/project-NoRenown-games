<?php
    include "connect.php";    
        
    if(isset($_COOKIE['accountId'])) {
        $selectUserName = "SELECT users.fullname FROM account JOIN users ON account.userID = users.userID WHERE account.accid = {$_COOKIE['accountId']}" ;
        $sqlUserName = $conn->query($selectUserName);

        $selectYourReview = "SELECT users.userID,users.fullname,gid,acc_id,review_text FROM reviews JOIN account ON reviews.acc_id = account.accid JOIN users ON account.userID = users.userID WHERE account.accid = {$_COOKIE['accountId']} AND gid = {$row2['gid']}";
        $sqlYourReview = $conn->query($selectYourReview);

        $rowYourReview = $sqlYourReview->fetch_assoc();
        $rowUserName = $sqlUserName->fetch_assoc();

        echo "<h2>Your reviews</h2>
            <div class='seperator'></div>";
        if($sqlYourReview->num_rows > 0) {
            echo "
                <div class='text-reviews'>
                    <div class='avatar'>
                        <img src='../../assets/img/4911053.webp' alt='' >
                    </div>
                    <div class='message-reviews'>
                        <div class='user-name'>" . $rowYourReview['fullname'] ."</div>
                        <input type='text' maxlength = '200' value='" . $rowYourReview['review_text'] ."' style='border-radius: 10px;' readonly>
                    </div>
                </div>
                <div class='seperator'></div>";
        } else {
            echo "<form class='your-reviews text-reviews' name='myForm' action='../../model/insert_reviews.php' onsubmit='return validateForm()' method='POST'>
                    <div class='avatar'>
                    <img src='../../assets/img/4911053.webp' alt='' >
                    </div>
                    <input type='hidden' name='gid' value='" . $row2['gid'] ."' >
                    <div id='input-reviews' class='message-reviews'>
                    <div class='user-name'>" . $rowUserName['fullname'] ."</div>
                    <input id='text_reviews' type='text' maxlength = '200' name='user_reviews' placeholder='Write your feeling about this game here!'>
                    </div>
                    <input type='submit' id='btn-send' value='POST'>
                </form> 
                <div class='seperator'></div>";
        }


    }  
          
        
    if(isset($_COOKIE['accountId'])) {
        $selectOtherReview = "SELECT users.userID,users.fullname,gid,acc_id,review_text FROM reviews JOIN account ON reviews.acc_id = account.accid JOIN users ON account.userID = users.userID WHERE  NOT account.accid = {$_COOKIE['accountId']} AND gid = {$row2['gid']}";
        $sqlOtherReview = $conn->query($selectOtherReview);
    } else {
        $selectOtherReview = "SELECT users.userID,users.fullname,gid,acc_id,review_text FROM reviews JOIN account ON reviews.acc_id = account.accid JOIN users ON account.userID = users.userID WHERE gid = {$row2['gid']}";
        $sqlOtherReview = $conn->query($selectOtherReview);
    }

    $dataOtherReview = "";

    if($sqlOtherReview->num_rows > 0) {
        while ($rowOtherReview = $sqlOtherReview->fetch_assoc()) {
            $dataOtherReview .= "<div class='text-reviews'>
                    <div class='avatar'>
                    <img src='../../assets/img/4911053.webp' alt='' >
                    </div>
                    <div class='message-reviews'>
                    <div class='user-name'>" . $rowOtherReview['fullname'] ."</div>
                    <input type='text' maxlength = '200' value='" . $rowOtherReview['review_text'] ."' readonly>
                    </div>
                </div>
                <div class='seperator'></div>";
        }
    } else {
        $dataOtherReview .= "<div class='text-reviews' style='justify-content: center;'>
                    <h2>No other reviews here</h2>
                    </div>
                <div class='seperator'></div>";
    }
    

    echo "<h2>Other reviews</h2>
        <div class='seperator'></div>
        <div class='other-reviews'>
        $dataOtherReview
        </div>"

?>