<?php

ob_start();
session_start();
include('con.php');
if (!isset($_SESSION['username'])) {
  header('location: login.php');
};

if (!empty($_POST['r_account']) && !empty($_POST['r_amount']) && !empty($_POST['r_address']) && !empty($_POST['r_digits']) && !empty($_FILES['transaction-voucher-upload-file']["name"])) {
  $username = $_SESSION['username'];
  $account = $_POST['r_account'];
  $amount = $_POST['r_amount'];
  $address = $_POST['r_address'];
  $digits = $_POST['r_digits'];
  $voucher = $_FILES['transaction-voucher-upload-file'];
  $exp = explode('/', $voucher['type']);
  $ext = end($exp);
  $voucher_name = md5(time().$voucher['name']).'.'.$ext;
  $path = '../vouchers/';
  if (move_uploaded_file($voucher['tmp_name'], $path.$voucher_name)) {
    $query = "INSERT INTO recharge (
      username, account, amount, address, digits, voucher, date, time
      ) VALUES (
      '$username', '$account', $amount, '$address', '$digits', '$voucher_name', now(), now()
      )";
    $result = mysqli_query($con, $query);
    if ($result) {
      echo('ok');
    }
  }
} else {
  echo('no');
}

?>
