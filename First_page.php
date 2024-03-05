<?php //@include 'dbconnection.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabernacle of Grace Church</title>
    <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/index.css">
    <link rel="stylesheet" href="Styles/footer.css">
  </head>
  <body>
    <!--
      This code was writen by Watson luchisoyi:
      Email watsonluchisoyi69@gmial.com
    -->
    <div class="container">
      <div class="screen">
        <div class="screen_content">
        <img src="images/logo.jpg" class="logo" alt="logo">
          <form class="login" action="login.php" method="post">             
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="login_field">
              <i class="fas fa-user login_icon">
                <img class="img" src="icons/user-solid.svg" alt="user">
              </i>              
              <input type="text" name="UserName" id="" class="login_input" placeholder="Username" >
            </div>
            <div class="login_field">
              <i class="fa-duotone fa-lock login_icon">
                <img class="img" src="icons/lock-solid.svg" alt="lock">
              </i>              
              <input type="password" name="password" id="" class="login_input" placeholder="password" >
            </div>            
            <button name="login" class="button login_submit">
              <span class="button_text">Log In</span>              
              <i class="button_icon fas fa-chevron-right">
                <img class="img" src="icons/login.svg" alt="login">
              </i>
            </button>                                     
          </form>
        </div>
        <!--
          This code was writen by Watson luchisoyi:
          Email watsonluchisoyi69@gmial.com
        -->
      </div>
    </div>
    <footer class="foot">
      <p>&copy; 2023 Tabernacle of Grace Church</p>
    </footer>
    <script src="Scripts/index.js"></script>
  </body>
</html>