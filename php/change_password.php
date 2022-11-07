<?php
ob_start();
session_start();
include('con.php');
if (!isset($_SESSION['username'])) {
  header('location: login.php');
};
?>


<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Change Password</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/change_password.css" rel="stylesheet">
  </head>
  <body>
    
    <?php
    $username = $_SESSION['username'];
    $old_password = '';
    $input_old_password = '';
    $new_password = '';
    $confirm_password = '';
    $err = '';
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $old_password = $row['password'];
    }
    if (isset($_POST['change-password-submit-btn'])) {
      $input_old_password = $_POST['old-password'];
      $new_password = $_POST['new-password'];
      $confirm_password = $_POST['confirm-password'];
      $input_old_password_hide = md5($input_old_password);
      $new_password_hide = md5($new_password);
      $confirm_password_hide = md5($confirm_password);
      
      if (strlen($input_old_password) >= 8 && strlen($new_password) >= 8 && strlen($confirm_password) >= 8) {
        if ($input_old_password_hide != $old_password) {
          $err = 'Incorrect password';
        }
        if ($new_password_hide != $confirm_password_hide) {
        $err = 'Password not match';
        }
        if ($old_password == $confirm_password_hide) {
          $err = 'Old password and new password are same';
        }
      } else {
        $err = 'Please enter over 8 character';
      }
      
        
      
      
      if (empty($err)) {
        $query1 = "UPDATE users SET password = '$confirm_password_hide' WHERE username = '$username'";
        $result1 = mysqli_query($con, $query1);
        if ($result1) {
          $err = 'Successfully';
        }
      }
      
    }
    ?>
    
    <div class="top-err-alert <?php if (!empty($err)) : ?> err-pass <?php endif ?> <?php if ($err == 'Successfully') : ?> change-password-success <?php endif ?>">
      <?php echo($err) ?>
    </div>
    
    <span>
      <a href="content.php"><i class="fa-solid fa-chevron-left"></i></a>
    </span>
    
    <div class="container">
      <div class="row">
        <div class="img-box col-12 col-md-6">
          <img src="../images/change_password.png">
        </div>
        <div class="change-password-box col-12 col-md-6">
          <form action="change_password.php" method="post">
          <h1>Change Pssword</h1>
            <div>
              <i class="fa-solid fa-eye"></i>
              <input type="password" name="old-password" id="old-password" placeholder="old password">
            </div>
            <div>
              <i class="fa-solid fa-eye"></i>
              <input type="password" name="new-password" id="new-password" placeholder="new password">
            </div>
            <div>
              <i class="fa-solid fa-eye"></i>
              <input type="password" name="confirm-password" id="confirm-password" placeholder="confirm password">
            </div>
            <button name="change-password-submit-btn" id="change-password-submit-btn">Submit</button>
          </form>
        </div>
      </div>
    </div>
    
    <script src="../js/change_password.js"></script>
  </body>
</html>