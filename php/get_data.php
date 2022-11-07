<?php
include('con.php');
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}


$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);
if ($result) {
  $row = mysqli_fetch_array($result);
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $referral_code = $row['referral_code'];
  $type = $row['type'];
  $current_day = $row['current_day'];
  $balance = $row['balance'];
  $team = $row['team'];
  $reward = $row['reward'];
  $spin_count = $row['spin_count'];
  $region = $row['region'];
  $city = $row['city'];
  $user = array(
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'referral_code' => $referral_code,
    'type' => $type,
    'current_day' => $current_day,
    'balance' => $balance,
    'team' => $team,
    'reward' => $reward,
    'spin_count' => $spin_count,
    'region' => $region,
    'city' => $city
  );
  echo(json_encode($user));
}

?>
