<?php
include('con.php');
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
} else {
  if(isset($_GET['team'])) {
    
    if ($_GET['team'] == 'all') {
      $referral_code = '';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $referral_code = $row['referral_code'];
        if (!empty($referral_code)) {
          $query1 = "SELECT * FROM users WHERE referral_id = $referral_code";
          $result1 = mysqli_query($con, $query1);
          if (mysqli_num_rows($result1) > 0) {
            foreach($result1 as $team_member) { ?>
              <div>
                <b class="team-mail"><?php echo($team_member['email']); ?></b>
                <span><?php echo($team_member['date']); ?></span>
                <span><?php echo($team_member['type']); ?></span>
              </div>
            <?php }
          }
        }
      }
    }
    
    if ($_GET['team'] == 'silver') {
      $referral_code = '';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $referral_code = $row['referral_code'];
        if (!empty($referral_code)) {
          $query1 = "SELECT * FROM users WHERE referral_id = $referral_code AND type = 'silver'";
          $result1 = mysqli_query($con, $query1);
          if (mysqli_num_rows($result1) > 0) {
            foreach($result1 as $team_member) { ?>
              <div>
                <b class="team-mail"><?php echo($team_member['email']); ?></b>
                <span><?php echo($team_member['date']); ?></span>
                <span><?php echo($team_member['type']); ?></span>
              </div>
            <?php }
          }
        }
      }
    }
    
    if ($_GET['team'] == 'platinum') {
      $referral_code = '';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $referral_code = $row['referral_code'];
        if (!empty($referral_code)) {
          $query1 = "SELECT * FROM users WHERE referral_id = $referral_code AND type = 'platinum'";
          $result1 = mysqli_query($con, $query1);
          if (mysqli_num_rows($result1) > 0) {
            foreach($result1 as $team_member) { ?>
              <div>
                <b class="team-mail"><?php echo($team_member['email']); ?></b>
                <span><?php echo($team_member['date']); ?></span>
                <span><?php echo($team_member['type']); ?></span>
              </div>
            <?php }
          }
        }
      }
    }
    
    if ($_GET['team'] == 'gold') {
      $referral_code = '';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $referral_code = $row['referral_code'];
        if (!empty($referral_code)) {
          $query1 = "SELECT * FROM users WHERE referral_id = $referral_code AND type = 'gold'";
          $result1 = mysqli_query($con, $query1);
          if (mysqli_num_rows($result1) > 0) {
            foreach($result1 as $team_member) { ?>
              <div>
                <b class="team-mail"><?php echo($team_member['email']); ?></b>
                <span><?php echo($team_member['date']); ?></span>
                <span><?php echo($team_member['type']); ?></span>
              </div>
            <?php }
          }
        }
      }
    }
    
    if ($_GET['team'] == 'diamond') {
      $referral_code = '';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $referral_code = $row['referral_code'];
        if (!empty($referral_code)) {
          $query1 = "SELECT * FROM users WHERE referral_id = $referral_code AND type = 'diamond'";
          $result1 = mysqli_query($con, $query1);
          if (mysqli_num_rows($result1) > 0) {
            foreach($result1 as $team_member) { ?>
              <div>
                <b class="team-mail"><?php echo($team_member['email']); ?></b>
                <span><?php echo($team_member['date']); ?></span>
                <span><?php echo($team_member['type']); ?></span>
              </div>
            <?php }
          }
        }
      }
    }
    
    if ($_GET['team'] == 'vip') {
      $referral_code = '';
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $referral_code = $row['referral_code'];
        if (!empty($referral_code)) {
          $query1 = "SELECT * FROM users WHERE referral_id = $referral_code AND type = 'vip'";
          $result1 = mysqli_query($con, $query1);
          if (mysqli_num_rows($result1) > 0) {
            foreach($result1 as $team_member) { ?>
              <div>
                <b class="team-mail"><?php echo($team_member['email']); ?></b>
                <span><?php echo($team_member['date']); ?></span>
                <span><?php echo($team_member['type']); ?></span>
              </div>
            <?php }
          }
        }
      }
    }
    
  }
}
?>
