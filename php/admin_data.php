<?php
ob_start();
session_start();
include('con.php');

$admin_data = [
  'users' => '',
  'in_come' => '',
  'cash_out' => ''
];

if (isset($_GET['admin'])) {
  $query1 = "SELECT id FROM users";
  $result1 = mysqli_query($con, $query1);
  if ($result1) {
    $admin_data['users'] = mysqli_num_rows($result1);
  }
}

echo(json_encode($admin_data))

?>