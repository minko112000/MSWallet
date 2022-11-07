<?php
$hostname = '127.0.0.1';
$db_username = 'root';
$db_password = 'root';
$db_name = 'MSWallet';

$con = mysqli_connect($hostname, $db_username, $db_password, $db_name);

if (!$con) {
  die('ERROR CONNECTION . . .');
}
?>