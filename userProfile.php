<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <link rel="stylesheet" href="./assets/css/header.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/userProfile.css" />
    <link rel="stylesheet" href="./assets/css/footer.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link 
      href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
      rel="stylesheet"  type='text/css'>
    <title>Profile</title>
</head>
<body>
    <!-- header -->
    <?php
      include 'header.php';
    ?>
    <div class="main">
      <div class="top">
        <div class="t-img">
          <div>
          </div>
        </div>
        <div class="t-info">
          <div class="t-info-div">
            <div>
              <span>Hu chuynh</span>
            </div>
            <div>
              <span>Member since: 01-01-2023</span>
            </div>
          </div>
          
        </div>
      </div>
      <div class="bottom">
        <div class="bottom-div">
          <div class="b-title">
            <span>Profile</span>
          </div>
          <div class="b-input">
            <div>
              <span>Name</span>
              <br>
              <br>
              <input type="text">
            </div>
            <div>
              <span>Phone</span>
              <br>
              <br>
              <input type="text">
            </div>
            <div>
              <span>Email</span>
              <br>
              <br>
              <input type="text">
            </div>
            <div>
              <span>Address</span>
              <br>
              <br>
              <input type="text">
            </div>
            <div>
              <span>User name</span>
              <br>
              <br>
              <input type="text">
            </div>
            <div>
              <span>Password</span>
              <br>
              <br>
              <input type="text">
            </div>
          </div>
          <div class="b-button">
            <div>
              <button>
                Update
              </button>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <?php
      include 'footer.php';
    ?>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="./assets/js/header.js"></script>
</html>