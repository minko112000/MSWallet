<?php
include('con.php');
ob_start();
session_start();
if (isset($_SESSION['username'])) {
  header('location: content.php');
}
?>


<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Log In</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
  </head>
  <body>
    
    <?php
    $login = '';
    $username = '';
    $password = '';
    $username_err = '';
    $password_err = '';
    if (isset($_POST['login-btn'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      if (empty($username)) {
        $username_err = 'invalid username';
        $login = 'err';
      }
      if (empty($password)) {
        $password_err = 'invalid password';
        $login = 'err';
      }
      if (!empty($username) && !empty($password)) {
        $login = '';
        $password_hide = md5($password);
        $query = "SELECT * FROM users WHERE email = '$username' AND password = '$password_hide' OR phone = '$username' AND password = '$password_hide'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result);
          $_SESSION['username'] = $row['username'];
          header('location: content.php');
        } else {
          $login = 'err';
        }
      }
    }
    ?>
    
    <div class="err_login <?php if ($login == 'err') : ?> err_login_hide <?php endif ?>">
      Invalid username or password
    </div>
    
    <div class="img-box">
      <img src="../images/brand.png">
    </div>
    <h2 class="app-name">MS Wallet</h2>
    <span>Warm greetings from MS Wallet</span>
    <form action="login.php" method="POST">
      <div class="<?php if ($username_err != '') : ?> invalid <?php endif ?>">
        <input type="text" id="username" name="username" placeholder="email or phone" value="<?php echo($username); ?>">
      </div>
      <div class="<?php if ($password_err != '') : ?> invalid <?php endif ?>">
        <i class="fa-solid fa-eye"></i>
        <input type="password" id="password" name="password" placeholder="password">
      </div>
      <button name="login-btn" id="login-btn">Log in</button>
      <span class="signup-div">
        <small>no account yet?</small>
        <a href="signup.php">Sign up</a>
      </span>
    </form>
    
    <script src="../js/script.js"></script>
    <script src="../js/login.js"></script>
  </body>
</html>