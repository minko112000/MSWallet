<?php

ob_start();
session_start();
include('con.php');
if (!isset($_SESSION['username'])) {
  header('location: login.php');
};

if(!empty($_POST['w_account']) && !empty($_POST['w_amount']) && !empty($_POST['w_fee']) && !empty($_POST['w_address'])) {
  $username = $_SESSION['username'];
  $account = $_POST['w_account'];
  $amount = $_POST['w_amount'];
  $fee = $_POST['w_fee'];
  $address = $_POST['w_address'];
  $query = "INSERT INTO withdrawal (
    username, account, amount, fee, address, date, time
    ) VALUES (
    '$username', '$account', $amount, $fee, '$address', now(), now()
    )";
    $result = mysqli_query($con, $query);
    if ($result) {
    echo('ok');
    }
} else {
  echo('no');
}

?>