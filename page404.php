<?php
    if(isset($_SERVER["REDIRECT_STATUS"])){
        $error = $_SERVER["REDIRECT_STATUS"];
    }
    session_start();
        
    $refresh_interval = 2;

    $meta_tag = '<meta http-equiv="refresh" content="' . $refresh_interval . '">';

    echo $meta_tag;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 404</title>
    <link rel="stylesheet" href="/project-NoRenowned-games/assets/css/page404.css">
    <link rel="stylesheet" href="/project-NoRenowned-games/assets/css/header.css">
</head>

<body>

    <div class="bg-purple">

        <div class="stars">
            <div class="custom-navbar">
                <div class="header" id="myHeader">
                    <a href="/project-NoRenowned-games/index.php">
                        <div class="logo">
                            <span class="text1">NoRENOWN</span>
                            <br />
                            <span class="text2">GAMING</span>
                        </div>
                    </a>
                </div>
                <div class="navbar-links">
                    <ul>
                        <li><a href="/project-NoRenowned-games/index.php">Home</a></li>
                        <li><a href="/project-NoRenowned-games/view/user/contact.php">Contact</a></li>
                        <li><a href="/project-NoRenowned-games/view/user/about.php">About</a></li>
                    </ul>
                </div>
            </div>
            <div class="central-body">
                <img class="image-404" src="http://salehriaz.com/404Page/img/404.svg" width="300px">
                <a href="/project-NoRenowned-games/index.php" class="btn-go-home">GO BACK HOME</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="http://salehriaz.com/404Page/img/rocket.svg" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="http://salehriaz.com/404Page/img/earth.svg" width="100px">
                    <img class="object_moon" src="http://salehriaz.com/404Page/img/moon.svg" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="http://salehriaz.com/404Page/img/astronaut.svg" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>

            </div>

        </div>

    </div>
</body>

</html>