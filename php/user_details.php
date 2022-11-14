<?php
ob_start();
session_start();
include('con.php');

  if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($con, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
  ?>
  
  <div><b>Name :</b><span><?php echo $row['name']; ?></span></div>
  <div><b>Username :</b><span><?php echo $row['username']; ?></span></div>
  <div><b>Email :</b><span><?php echo $row['email']; ?></span></div>
  <div><b>Phone :</b><span><?php echo $row['phone']; ?></span></div>
  <div><b>Referral code :</b><span><?php echo $row['referral_code']; ?></span></div>
  <div><b>Referral id :</b><span><?php echo $row['referral_id']; ?></span></div>
  <div><b>Date :</b><span><?php echo $row['date']; ?></span></div>
  <div><b>Type :</b><span><?php echo $row['type']; ?></span></div>
  <div><b>Current day :</b><span><?php echo $row['current_day']; ?></span></div>
  <div><b>Balance :</b><span><?php echo $row['balance']; ?></span></div>
  <div><b>Team :</b><span><?php echo $row['team']; ?></span></div>
  <div><b>Reward :</b><span><?php echo $row['reward']; ?></span></div>
  <div><b>Spin count :</b><span><?php echo $row['spin_count']; ?></span></div>
  <div><b>Region :</b><span><?php echo $row['region']; ?></span></div>
  <div><b>City :</b><span><?php echo $row['city']; ?></span></div>
  
  <?php
  }
}

?>