<?php
    include './connect.php';

    $sql = "SELECT gid,gimg,gdiscount,gname,gprice,trending,trailer
            FROM games JOIN game_detail ON games.gid = game_detail.gdt_id
            WHERE trending=1 AND visible=1
            ORDER BY RAND()
            LIMIT 12";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='item'>
                    <a href='./view/user/productDetails.php?id=".$row['gid']."' onmouseover='showVid(event,this)' onmouseout='closeVid(event,this)'>
                        <video muted autoplay loop>
                            <source src='" . $row['trailer'] . "' type=''>
                            <source src='./assets/video/I Am Atomic 4k.mp4' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>
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
    $conn->close();
?>