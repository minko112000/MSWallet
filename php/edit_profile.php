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
    <title>Edit Profile</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/edit_profile.css" rel="stylesheet">
  </head>
  <body>
    
    <?php
    $name = '';
    $email = '';
    $phone = '';
    $region = '';
    $city = '';
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if ($result) {
      $row = mysqli_fetch_array($result);
      $name = $row['name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $region = $row['region'];
      $city = $row['city'];
    }
    if (isset($_POST['edit-profile-submit-btn'])) {
      $name = $_POST['change-name'];
      $email = $_POST['change-email'];
      $phone = $_POST['change-phone'];
      $region = $_POST['change-region'];
      $city = $_POST['change-city'];
      
      if (!empty($name) && !empty($email) && !empty($phone) && !empty($region) && !empty($city)) {
        $query = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', region = '$region', city = '$city' WHERE username = '$username'";
        $result = mysqli_query($con, $query);
        if ($result) {
          header('location: content.php');
        }
      }
    }
    ?>
    
    <div class="edit-profile-container">
      <span class="back-div">
        <a href="content.php"><i class="fa-solid fa-chevron-left"></i></a>
      </span>
      <img src="../images/change.png">
      <form action="edit_profile.php" method="post">
        <div>
          <label for="change-name">Name</label>
          <input id="change-name" name="change-name" type="text" value="<?php echo $name ?>">
        </div>
        <div>
          <label for="change-email">Email</label>
          <input id="change-email" name="change-email" type="email" value="<?php echo $email ?>">
        </div>
        <div>
          <label for="change-phone">Phone</label>
          <input id="change-phone" name="change-phone" type="number" value="<?php echo $phone ?>">
        </div>
        <div>
          <label for="change-region">Region</label>
          <input id="change-region" name="change-region" type="text" value="<?php echo $region ?>">
        </div>
        <div>
          <label for="change-city">City</label>
          <input id="change-city" name="change-city" type="text" value="<?php echo $city ?>">
        </div>
        <button id="edit-profile-submit-btn" name="edit-profile-submit-btn" class="btn-bg">Submit</button>
      </form>
    </div>
    
    <script src="../js/edit_profile.js"></script>
  </body>
</html>