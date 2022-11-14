<?php

ob_start();
session_start();
include('con.php');

$username = '';

if (!isset($_SESSION['username'])) {
  header('location: login.php');
} else {
  $username = $_SESSION['username'];
  $query = "SELECT * FROM messages";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $user) {
      if ($user['username'] == $username) {
        ?>
        <div class="outer-msg-container o-i">
          <div class="outer-msg-box">
            <span><?php echo $user['message']; ?></span>
          </div>
        </div>
        <?php
      } else {
        ?>
        <div class="inner-msg-container o-i">
          <div class="inner-msg-box">
            <span><?php echo $user['message']; ?></span>
          </div>
        </div>
        <?php
      }
    }
  }
}


if (isset($_GET['message'])) {
  $message = $_GET['message'];
  if (!empty($message)) {
$query = "INSERT INTO messages(username, message, time)
              VALUES('$username', '$message', now())";
    $result = mysqli_query($con, $query);
  }
}

?>


