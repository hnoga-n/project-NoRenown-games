<?php
session_start();
if (!isset($_SESSION['accountId'])) {
  header('location: ./login.php');
} else {
  include "../../model/connect.php";
  $id = $_SESSION['accountId'];
  $sql = "SELECT * FROM account WHERE accid = $id";
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
  <link rel="stylesheet" href="../../assets/css/userProfile.css" />
  <link rel="stylesheet" href="../../assets/css/header.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
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
            <span><?php echo $row['fullname'] ?></span>
          </div>
          <div>
            <span>Member since: 01-01-2023</span>
          </div>
        </div>

      </div>
    </div>
    <div class="bottom">
      <form name="update_profile_form" class="bottom-div" onsubmit="return sanitizeUpdateProfileForm()" action="../../model/updateProfile.php" method="POST">
        <div class="b-title">
          <span>Profile</span>
        </div>
        <div class="b-input">
          <div>
            <input name="profile_fullname" type="text" required="required" value="<?php echo $row['fullname'] ?>">
            <span><?php echo $row['fullname'] ?></span>
          </div>
          <div>

            <input name="profile_phone" type="text" required="required" value="<?php echo $row['phone'] ?>">
            <span><?php echo $row['phone'] ?></span>
          </div>
          <div>
            <input name="profile_address" type="text" required="required" value="<?php echo $row['address'] ?>">
            <span><?php echo $row['address'] ?></span>
          </div>
          <div>
            <input name="profile_mail" type="text" required="required" readonly value="<?php echo $row['mail'] ?>">
            <span><?php echo $row['mail'] ?></span>
          </div>
          <div>
            <input name="profile_newPasswd" type="text" required="required" value="<?php echo $row['passwd'] ?>">
            <span>New Password</span>
          </div>
        </div>
        <div class="b-button">
          <div>
            <button type="submit">
              Update
            </button>
          </div>
        </div>
        <span>
          <?php if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
          }
          ?>
        </span>
      </form>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="../../assets/js/header.js"></script>
<script src="../../assets/js/login.js"></script>

</html>