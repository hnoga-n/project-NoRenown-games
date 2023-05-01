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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/header.css" />
  <link rel="stylesheet" href="../../assets/css/footer.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/style.css" />
  <link rel="stylesheet" href="../../assets/css/userProfile.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
  <title>Profile</title>
</head>

<body>
  <!-- header -->
  <?=
  include './header.php';
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
            <span><?php echo $row['fullname'] ?></span>
          </div>
          <div>
            <span>Member since: <?php echo $row['date_create'] ?></span>
          </div>
        </div>

      </div>
    </div>
    <div class="bottom">
      <form name="update_profile_form" class="bottom-div" onsubmit="return sanitizeUpdateProfileForm()" action="../../model/updateProfile.php?query=updatecustomer" method="POST">
        <div class="b-title">
          <span>Profile</span>
        </div>
        <div class="b-input">
            <div>
            <input type="text" name="profile_fullname" required="required" value="<?php echo $row['fullname'] ?>">
            <span>Name</span>
		<div style="display:none;" class="input_message" id="name_update_message"></div>
            </div>
            <div>
            <input type="text" name="profile_phone" required="required" value="<?php echo $row['phone'] ?>">
            <span>Phone</span>
		<div style="display:none;" class="input_message" id="phone_update_message"></div>
            </div>
            <div>             
              <input type="text" name="profile_address" required="required" value="<?php echo $row['address'] ?>">
              <span>Address</span>
            </div>
            <div>              
              <input type="text" name="profile_newPasswd" required="required" value="<?php echo $row['passwd'] ?>">             
              <span>Password</span>
              <div style="display:none;" class="input_message" id="pw_update_message"></div>
            </div>
            <div>              
            <input type="text" name="profile_mail" required="required" value="<?php echo $row['mail'] ?>" readonly disabled>
            <span id="useremail">Email</span>
          </div>
        </div>
        <div class="update_message">
          <?php
          if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          }
          ?>
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
  include './footer.php';
  ?>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="../../assets/js/header.js"></script>
<script src="../../assets/js/login.js"></script>

</html>