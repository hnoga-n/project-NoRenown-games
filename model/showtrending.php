<?php
    include './connect.php';
    $num = intval($_GET['num']);
    $loc = intval(($num - 1) * 9);
    $html = "";
    $sql = "SELECT gid,gimg,gdiscount,gname,gprice,trending
            FROM games
            WHERE trending=1
            LIMIT $loc,9";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $html.= "<div class='item'>
                    <a href='./view/user/productDetails.php?id=".$row['gid']."'>
                        <i class='fa-solid fa-cart-shopping'></i>
                        <img src='./assets/img/".$row['gimg']."' alt='' />
                        <div class='discount'>
                            <span>-<label>".$row['gdiscount']."</label>%</span>
                        </div>
                    </a>
                    <div class='product-information'>
                    <div class='text-name'>".$row['gname']."</div>
                    <div class='price'>
                        <label class='price-number'>".$row['gprice']."</label>
                        <label class='price-dollar'>$</label>
                    </div>
                    </div>
                </div>";
        }
    }
    $sql1 = "SELECT gid,gimg,gdiscount,gname,gprice,trending
            FROM games
            WHERE trending=1";
    $result1 = $conn->query($sql1);
    $pages = mysqli_num_rows($result1);
    mysqli_free_result($result1);
    $pages/=9;
    $myobj = new stdClass();
    $myobj->pagenum = ceil($pages);
    $myobj->html = $html;
    $myJSON = json_encode($myobj);
    echo $myJSON;
    $conn->close();
?>