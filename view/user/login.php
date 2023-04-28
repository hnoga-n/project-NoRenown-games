<?php
// neu la nhan vien thi vao trang index khong thi vao profile employee
session_start();
if (isset($_COOKIE['accountId']) && $_COOKIE['usertype'] == 1) {
  header('location: ../../index.php');
}
if (isset($_COOKIE['accountId']) && $_COOKIE['usertype'] == 2) {
  header('location: ../admin/employee.php?page=employee-profile');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../assets/img/logo.png" />
  <link rel="stylesheet" href="../../assets/css/login.css">
  <link rel="stylesheet" href="../../assets/css/reset.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <title>Sign in/Sign up</title>
</head>

<body>
  <div class="body">
    <div class="back"><a href="../../index.php"><i class="fa-solid fa-arrow-left"></i></a></div>
    <div class="container" id="container">

      <div class="form-container sign-up-container">
        <form name="signup_form" onsubmit="return sanitizeForm()" action="../../model/signupHandle.php" method="POST">
          <h1>Create Account</h1>
          <input name="signup_name" type="text" placeholder="Name" name="name" />
          <div style="display:none;" class="input_message" id="name_validate_message"></div>
          <input name="signup_phone" type="tel" placeholder="Phone" name="phone" />
          <div style="display:none;" class="input_message" id="phone_validate_message"></div>
          <input name="signup_mail" type="email" placeholder="Email" name="email" />
          <div style="display:none;" class="input_message" id="mail_validate_message"></div>
          <input name="signup_passwd" type="password" placeholder="Password" name="password" />
          <input name="signup_passwd_cfm" type="password" placeholder="Confirm password" />
          <div style="display:none;" class="input_message" id="passwd_cfm_message"></div>
          <button type="submit">Sign Up</button>

        </form>
      </div>
      <!-- action="../../model/signinHandle.php" method="POST" -->
      <div class="form-container sign-in-container">
        <form name="signin_form" onsubmit="return sanitizeSigninForm()" action="../../model/signinHandle.php" method="POST">
          <h1>Sign in</h1>
          <input name="signin_mail" type="email" placeholder="Email" />
          <div style="display:none;" class="input_message" id="mail_validate_signin_message"></div>
          <input name="signin_pw" type="password" placeholder="Password" />
          <div style="display:none;" class="input_message" id="passwd_signin_cfm_message"></div>
          <span id="input_message_signin">
            <?php
            if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }

            ?>
          </span>
          <a href="../../model/forgotpasswd.php">Forgot your password?</a>
          <button type="submit">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="../../assets/js/login.js"></script>
<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>

</html>