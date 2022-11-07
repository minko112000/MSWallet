<?php
include('con.php');
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
} else {
  $username = $_SESSION['username'];
  
  if (isset($_GET['spin_count'])) {
    $spin_count = $_GET['spin_count'];
    $query = "UPDATE users SET spin_count = $spin_count WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
      die('ERROR SPIN COUNT UPDATE');
    }
  }
  
  if (isset($_GET['spin_count_buy_balance']) && isset($_GET['spin_count_buy'])) {
    $spin_count_buy_balance = $_GET['spin_count_buy_balance'];
    $spin_count = $_GET['spin_count_buy'];
    $query = "UPDATE users SET spin_count = $spin_count, balance = $spin_count_buy_balance WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
      die('ERROR SPIN COUNT UPDATE');
    }
  }
  
  if (isset($_GET['spinBalance'])) {
    $spinBalance = $_GET['spinBalance'];
    $query = "UPDATE users SET balance = $spinBalance WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
      die('ERROR SPIN COUNT UPDATE');
    }
  }
}

