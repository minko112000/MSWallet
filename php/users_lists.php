<?php
ob_start();
session_start();
include('con.php');



if ($_GET['content'] == 'users') {
  $query = "SELECT * FROM users";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}

if ($_GET['content'] == 'date') {
  $query = "SELECT * FROM users";
  $result = mysqli_query($con, $query);
  if ($result) { 
    foreach ($result as $row) { 
    ?>
    
      <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
    
    <?php
    
    }
  }
}
if ($_GET['content'] == 'name') {
  $query = "SELECT * FROM users ORDER BY name";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}
if ($_GET['content'] == 'population') {
  $query = "SELECT * FROM users ORDER BY balance DESC";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}
if ($_GET['content'] == 'silver') {
  $query = "SELECT * FROM users WHERE type = 'silver'";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}
if ($_GET['content'] == 'platinum') {
  $query = "SELECT * FROM users WHERE type = 'platinum'";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}
if ($_GET['content'] == 'gold') {
  $query = "SELECT * FROM users WHERE type = 'gold'";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}
if ($_GET['content'] == 'diamond') {
  $query = "SELECT * FROM users WHERE type = 'diamond'";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}
if ($_GET['content'] == 'vip') {
  $query = "SELECT * FROM users WHERE type = 'vip'";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}

if ($_GET['content'] == 'none') {
  $query = "SELECT * FROM users WHERE type = 'none'";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="user-item in-out">
          <span><?php echo $row['email']; ?></span>
          <span><?php echo $row['balance'] . ' MMK'; ?></span>
          <button id="<?php echo $row['id']; ?>"  class="button bann-btn" type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
          <button id="<?php echo $row['id']; ?>"  class="button see-btn" type="button">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
      
      <?php
    }
  }
}

if ($_GET['content'] == 'withdrawal') {
  $query = "SELECT * FROM withdrawal ORDER BY id DESC";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="withdrawal-item in-out wr">
            
          <div>
            <b>Account</b>
            <span><?php echo $row['account']; ?></span>
          </div>
          <div>
            <b>Amount</b>
            <span><?php echo $row['amount']; ?></span>
          </div>
          <div>
            <b>Fee</b>
            <span><?php echo $row['fee']; ?></span>
          </div>
          <div>
            <b>Address</b>
            <span><?php echo $row['address']; ?></span>
          </div>
          <div>
            <b>Date</b>
            <span><?php echo $row['date']; ?></span>
          </div>
          <div>
            <b>Time</b>
            <span><?php echo $row['time']; ?></span>
          </div>
          <div class="btn-gp">
            <button id="<?php echo $row['id']; ?>"  type="button" class="confirm-btn button">Confirm</button>
          </div>
        </div>
      
      <?php
    }
  }
}

if ($_GET['content'] == 'recharge') {
  $query = "SELECT * FROM recharge ORDER BY id DESC";
  $result = mysqli_query($con, $query);
  if ($result) {
    foreach ($result as $row) {
      ?>
      
        <div class="recharge-item in-out wr">
          <img src="../vouchers/<?php echo $row['voucher']; ?>">
          <div>
            <b>Account</b>
            <span><?php echo $row['account']; ?></span>
          </div>
          <div>
            <b>Amount</b>
            <span><?php echo $row['amount']; ?></span>
          </div>
          <div>
            <b>Address</b>
            <span><?php echo $row['address']; ?></span>
          </div>
          <div>
            <b>Digits</b>
            <span><?php echo $row['digits']; ?></span>
          </div>
          <div>
            <b>Date</b>
            <span><?php echo $row['date']; ?></span>
          </div>
          <div>
            <b>Time</b>
            <span><?php echo $row['time']; ?></span>
          </div>
          <div class="btn-gp">
            <button id="<?php echo $row['id']; ?>"  type="button" class="confirm-btn button">Confirm</button>
          </div>
        </div>
      
      <?php
    }
  }
}


?>