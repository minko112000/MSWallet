<?php
include('con.php');
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

$username = $_SESSION['username'];

if (isset($_GET['currentDay'])) {
  $currentDay = $_GET['currentDay'];
  $query = "UPDATE users SET current_day = $currentDay WHERE username = '$username'";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo 'ok';
  } else {
    die('ERROR CURRENT DAY ADD . . .');
  }
} else {
  echo('NOT ENOUCH DATA');
}

if (isset($_GET['type'])) {
  $type = $_GET['type'];
  $query = "UPDATE users SET type = '$type', current_day = 0 WHERE username = '$username'";
  $result = mysqli_query($con, $query);
  if (!$result) {
    die('ERROR UPDATE MEMBER TYPE . . .');
  } else {
    echo 'ok';
  }
} else {
  echo('NOT ENOUCH DATA');
}

if (isset($_GET['type']) && isset($_GET['reward_balance']) && isset($_GET['balance'])) {
  $type = $_GET['type'];
  $balance = intval($_GET['balance']);
  $reward_balance = intval($_GET['reward_balance']);
  $referral_id;
  $query = "UPDATE users SET type = '$type', balance = $balance WHERE username = '$username'";
  $result = mysqli_query($con, $query);
  if ($result) {
    $query1 = "SELECT * FROM users WHERE username = '$username'";
    $result1 = mysqli_query($con, $query1);
    if ($result1) {
      $row1 = mysqli_fetch_array($result1);
      $referral_id = $row1['referral_id'];
      if (!empty($referral_id)) {
      $query2 = "SELECT * FROM users WHERE referral_code = $referral_id";
      $result2 = mysqli_query($con, $query2);
        if ($result2) {
          $row2 = mysqli_fetch_array($result2);
          $parent_reward = $row2['reward'];
          $parent_balance = $row2['balance'];
          $parent_referral_code = $row2['referral_code'];
          $update_reward_balance = $parent_reward + $reward_balance;
          $update_balance = $parent_balance + $reward_balance;
          if ($update_reward_balance > 0) {
            $query3 = "UPDATE users SET balance = $update_balance, reward = $update_reward_balance WHERE referral_code = $parent_referral_code";
            $result3 = mysqli_query($con, $query3);
            if ($result3) {
              echo('ok ok ok');
            }
          };
        }
      }
    }
  }
} else {
  echo('NOT ENOUCH DATA');
}
