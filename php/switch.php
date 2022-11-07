<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) {
  header('location: content.php');
} else {
  header('location: login.php');
}
?>