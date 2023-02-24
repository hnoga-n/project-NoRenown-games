<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoRenowned Games</title>

  <link rel="icon" href="./assets/img/logo.png">
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/footer.css">
  <link rel="stylesheet" href="./assets/css/contact.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
  <?php
    include 'header.php';
  ?>
  <!-- contact form -->
  <div class="form-outside-container">
    <div class="deco-icon">
      <i id="moon" class="fa-regular fa-moon"></i>
      <i id="star-1" class="fa-regular fa-star"></i>
      <i id="star-2" class="fa-regular fa-star"></i>
      <i id="star-3" class="fa-regular fa-star"></i>
    </div>

    <div class="form-container">
      <form class="form" action="" method="">
        <div class="title">
          <i id="console-icon" class="fa-solid fa-gamepad"></i>
          <span>C&nbsp;&nbsp;&nbsp;&nbsp;NTACT US</span>
          <i id="headphone-icon" class="fa-solid fa-headset"></i>
        </div>
          <label for="name">Name </label>
          <input type="text" name="name" id="name" placeholder="Nguyen Hoang">
          <label for="mail">Email </label>
          <input type="email" name="mail" id="mail" placeholder="hackiemsi@gmail.com">
          <label for="phone">Phone </label>
          <input type="tel" name="phone" id="phone" placeholder="0961243102">
          <label for="message">Your feedback </label>
          <!-- <input type="text" name="name" id="message" placeholder="I love this website !!!!"> -->
          <textarea name="name" id="message" cols="30" rows="10" placeholder="I love this website !!!!"></textarea>
          <button type="submit" name="submit" id="submit">
            <span>Submit</span>
            <i class="fa-solid fa-scroll"></i>
            
          </button>
      </form>
      <img class="deco-img" src="./assets/img/pacman-ghost-logo-4E0E79293D-seeklogo.com.png" alt="">
    </div>

  </div>

  <?php
      include 'footer.php';
  ?>
</body>
  <script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script> 
  <script src="./assets/js/header.js"></script>
</html>