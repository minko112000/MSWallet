<?php
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
    <title>Sign Up</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/signup.css" rel="stylesheet">
  </head>
  <body>
    
    
    <?php
    include('con.php');
    $name = '';
    $email = '';
    $phone = '';
    $password = '';
    $referral_code = '';
    $name_err = '';
    $email_err = '';
    $phone_err = '';
    $password_err = '';
    $referral_code_err = '';
    if (isset($_GET['ref'])) {
        $referral_code = $_GET['ref'];
    }
    
    if (isset($_POST['signup-btn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $referral_code = $_POST['referral-code'];
        if (empty($name)) {
          $name_err = 'invalid name';
        }
        if (empty($email)) {
          $email_err = 'invalid email';
        } else {
          $query_mail = "SELECT * FROM users WHERE email = '$email'";
          $result_mail = mysqli_query($con, $query_mail);
          if ($result_mail) {
            if (mysqli_num_rows($result_mail) == 1) {
              $email_err = 'already used email';
            }
          }
        }
        if (empty($phone)) {
          $phone_err = 'invalid phone';
        } else {
          $query_phone = "SELECT * FROM users WHERE phone = '$phone'";
          $result_phone = mysqli_query($con, $query_phone);
          if ($result_phone) {
            if (mysqli_num_rows($result_phone) == 1) {
              $phone_err = 'already used phone number';
            }
          }
        }
        if (empty($password)) {
          $password_err = 'invalid password';
        } else {
          if (strlen($password) < 8) {
          $password_err = 'enter more than 8 character';
          }
        }
        
        if (!empty($referral_code)) {
          $query_refcode = "SELECT * FROM users WHERE referral_code = $referral_code";
          $result_refcode = mysqli_query($con, $query_refcode);
          if ($result_refcode) {
            if (mysqli_num_rows($result_refcode) == 1) {
              $row = mysqli_fetch_array($result_refcode);
              $referral_code = $_POST['referral-code'];
              $referral_code_err = '';
            } else {
              $referral_code_err = 'invalid referral code';
            }
          }
        } else {
          $referral_code_err = '';
        }
        if (!empty($name) && !empty($email) && empty($email_err) && !empty($phone) && empty($phone_err) && !empty($password) && strlen($password) > 7 && empty($referral_code_err)) {
          $username = md5($email);
          $password_hide = md5($password);
          if ($referral_code == '') {
            $referral_code = 0;
          };
          $referral_id = $referral_code;
          $my_referral_code = rand(10000000,99999999);
          $query = "INSERT INTO users (name, username, email, phone, password, referral_code, referral_id, date) 
                    VALUES ('$name', '$username', '$email', '$phone', '$password_hide', $my_referral_code, $referral_id, now())";
          $result = mysqli_query($con, $query);
          if ($result) {
            $query_increase_team = "SELECT * FROM users WHERE referral_code = $referral_code";
            $result_increase_team = mysqli_query($con, $query_increase_team);
            if (mysqli_num_rows($result_increase_team) == 1) {
              $row = mysqli_fetch_array($result_increase_team);
              $count = $row['team'] + 1;
              echo $count;
              echo $referral_code;
              $query_team_update = "UPDATE users SET team = $count WHERE referral_code = $referral_code";
              $result_team_update = mysqli_query($con, $query_team_update);
              if ($result_team_update) {
                
              }
            }
            header('location: login.php');
          } else {
            echo 'ERROR . . ';
          }
        }
    }
    ?>
    
    <div class="top-alert"></div>
    
    <div class="img-box">
      <img src="../images/brand.png">
    </div>
    <h2 class="app-name">MS Wallet</h2>
    <span>Create MS Wallet account and change your life</span>
    <form class="form-container" action="signup.php" method="POST">
      <div>
        <label for="name">name</label>
        <i class="err"><?php echo($name_err) ?></i>
        <input class="<?php if ($name_err != '') : ?> invalid <?php endif ?>" type="text" id="name" name="name" value="<?php echo($name); ?>">
      </div>
      <div>
        <label for="email">email</label>
        <input class="<?php if ($email_err != '') : ?> invalid <?php endif ?>" type="email" id="email" name="email" value="<?php echo($email); ?>">
        <i class="err"><?php echo($email_err) ?></i>
      </div>
      <div>
        <label for="phone">phone</label>
        <input class="<?php if ($phone_err != '') : ?> invalid <?php endif ?>" type="number" id="phone" name="phone" value="<?php echo($phone); ?>">
        <i class="err"><?php echo($phone_err) ?></i>
      </div>
      <div>
        <i class="fa-solid fa-eye"></i>
        <label for="password">password</label>
        <input class="<?php if ($password_err != '') : ?> invalid <?php endif ?>" type="password" id="password" name="password">
        <i class="err"><?php echo($password_err) ?></i>
      </div>
      <div>
        
        <label for="referral-code">referral code</label>
        <input class="<?php if ($referral_code_err != '') : ?> invalid <?php endif ?>" type="number" id="referral-code" name="referral-code" value="<?php echo($referral_code) ?>">
        <i class="err"><?php echo($referral_code_err) ?></i>
      </div>
      <button name="signup-btn" id="signup-btn">Sign up</button>
    </form>
    <div class="login-div">
      <small>already account yet?</small>
      <a href="login.php">Log in</a>
    </div>

    
    <script src="../js/script.js"></script>
    <script src="../js/signup.js"></script>
  </body>
</html>