<?php
ob_start();
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
};
?>



<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>MS Wallet</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    </head>
  <body>
    
    
    <!---------------- LOADIG START ---------------->
    <div class="loading-page">
      <div></div>
    </div>
    
    <!---------------- ALERT START ---------------->
    <div class="daily-bonus-claim-alert hide">
      <span><span>Your current member type is</span> <b class="member-type"></b></span>
      <h1 class="daily-bonus-claim-balance">000 MMK</h1>
      <hr>
      <div class="btn-group">
        <button id="daily-bonus-claim-btn" class="btn-bg">Claim</button>
        <button id="daily-bonus-details-btn">Details</button>
      </div>
    </div>
    <div class="log-out-alert hide">
      <i class="fa-solid fa-circle-question"></i>
      <span><small>Are you sure you want to </small><b>logout?</b></span>
      <div class="btns">
        <a href="content.php?content=logout" id="yes-logout" class="btn-bg">Yes</a>
        <a id="no-logout">No</a>
      </div>
    </div>
    <?php
    if(isset($_GET['content'])) {
      session_destroy();
      header('location: login.php');
    }
    ?>
    <div class="update-alert-box">
      <div class="update-alert-box-hide">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <div class="balance-box">
        <h5>My Balance</h5>
        <b class="my-balance">0.00 MMK</b>
      </div>
      <hr>
      <h5 class="update-member-type text-center"></h5>
      <div class="detail-box"></div>
      <div class="btn-group">
        <button type="button" class="btn-bg recharge-btn">Recharge</button>
        <button id="update-now-btn" type="button" class="btn-bg">Update Now</button>
      </div>
    </div>
    <div class="something-wrong hide">
      <i class="fa-solid fa-xmark something-wrong-close-btn"></i>
      <b id="something-wrong-text"></b>
    </div>
    <div class="top-alert">
      
    </div>
    <div class="spin-claim-alert hide">
      <img src="../images/wheel_claim.png">
      <h3 class="spin-get-mmk">0 MMK</h3>
      <button id="spin-claim-btn">Claim</button>
    </div>
    <div class="spin-count-err-alert hide">
      <img src="../images/empty.png">
      <img class="bee" src="../images/bee.png">
      <div class="text-center">
        <h4>Oops!</h4>
        <span>You hasn't a spin count.</span>
      </div>
      <div class="btn-group">
        <button class="btn-bg buy-spin-count-btn">
          <i class="fa-solid fa-dharmachakra"></i>
          &nbsp;Buy
        </button>
        <button class="spin-count-buy-cancel-btn">Cancel</button>
      </div>
    </div>
    
    <!---------------- TAB START ---------------->
    <div class="tab-bar">
      <div id="slider"></div>
      <div id="mining-icon">
        <i class="fa-solid fa-land-mine-on"></i>
        <small>mining</small>
      </div>
      <div id="home-icon">
        <i class="fa-solid fa-house"></i>
        <small>home</small>
      </div>
      <div id="more-icon">
        <i class="fa-solid fa-bars"></i>
        <small>more</small>
      </div>
    </div>
    
    <!---------------- NAV START ---------------->
    <nav class="nav-bar">
      <i id="profile-icon" class="fa-solid fa-circle-user"></i>
      <div id="brand">
        <img src="../images/brand.png">
      </div>
      <i id="chat-icon" class="fa-solid fa-comments-dollar"></i>
    </nav>
    
    <!---------------- MAIN START ---------------->
    <div id="main-container">
      <div id="mining-page">
        <div class="mining-lock-page">
          <img src="../images/mining_lock.png">
          <div class="des-box">
            <small>You need to be a member to start mining.</small>
            <h4>Please login as a member.</h4>
          </div>
          <button type="button" class="btn-bg recharge-btn">Recharge</button>
          <button type="button" class="join-now-btn">Join Now</button>
        </div>
        <div class="mining-page">
          <div class="detail-container">
            <div>
              <b>Running day</b>
              <small class="running-day">000/200</small>
            </div>
            <div>
              <b>Daily output</b>
              <small class="daily-output">0000/1100</small>
            </div>
            <div>
              <b>Member type</b>
              <small class="member-type">Silver</small>
            </div>
          </div>
          <div class="mining-box">
            <div class="img-box">
              <img class="gold_mountain" src="../images/gold_mountain.png">
              <img class="pointed" src="../images/pointed.png">
            </div>
            <b class="output-box"></b>
          </div>
          <button id="start-mining-btn" type="button" class="btn-bg">Start</button>
          <button id="claim-mining-btn" type="button" class="btn-bg">Claim</button>
        </div>
      </div>
      <div id="home-page">
        <div id="banner">
          <div class="banner-animation-box">
            <img src="../images/water_faucet.png">
            <div class="water-drop">MMK</div>
            <img class="bucket-cover" src="../images/bucket_cover.png">
            <img class="bucket" src="../images/bucket.png">
          </div>
          <div class="custom-ads-container">
            <a class="lucky-wheel-box">
              <img src="../images/lucky_wheel_ads.png">
              <div>
                <h5>Lucky wheel</h5>
                <span>Spin the lucky wheel and get extra prizes</span>
              </div>
            </a>
            <a href="service.php">
              <img src="../images/service.png">
              <div>
                <h4>Our service</h4>
                <span>Create your own website or web application and expand your business</span>
              </div>
            </a>
            <a>
              <img src="../images/lucky_wheel_ads.png">
              <div>
                <h4>Lucky wheel</h4>
                <span>Spin the lucky wheel and get extra prizes</span>
              </div>
            </a>
          </div>
        </div>
        <div id="shortcut">
          <div class="shortcut-icon">
            <i class="fa-solid fa-user-plus"></i>
            <small>Referral</small>
          </div>
          <div class="shortcut-icon">
            <i class="fa-solid fa-award"></i>
            <small>Reward</small>
          </div>
          <div class="shortcut-icon">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <small>Withdrawal</small>
          </div>
          <div class="shortcut-icon">
            <i class="fa-solid fa-circle-dollar-to-slot"></i>
            <small>Recharge</small>
          </div>
          <div class="shortcut-icon">
            <i class="fa-solid fa-sack-dollar"></i>
            <small>Bonus</small>
          </div>
        </div>
        <div id="Member-box-container">
          <div class="silver-box">
            <img src="../images/silver.png">
            <small>1 Day Output - 1100 MMK</small>
            <small>Running Day - 200 days</small>
            <h5>72000 MMK</h5>
            <button class="btn-bg update-btn" type="button">Update</button>
          </div>
          <div class="platinum-box">
            <img src="../images/platinum.png">
            <small>1 Day Output - 1240 MMK</small>
            <small>Running Day - 250 days</small>
            <h5>148000 MMK</h5>
            <button class="btn-bg update-btn" type="button">Update</button>
          </div>
          <div class="gold-box">
            <img src="../images/gold.png">
            <small>1 Day Output - 2450 MMK</small>
            <small>Running Day - 2 years</small>
            <h5>360000 MMK</h5>
            <button class="btn-bg update-btn" type="button">Update</button>
          </div>
          <div class="diamond-box">
            <img src="../images/diamond.png">
            <small>1 Day Output - 3800 MMK</small>
            <small>Running Day - 2 years 5 months</small>
            <h5>532000 MMK</h5>
            <button class="btn-bg update-btn" type="button">Update</button>
          </div>
          <div class="vip-box">
            <img src="../images/vip.png">
            <small>1 Day Output - 8200 MMK</small>
            <small>Running Day - 3years</small>
            <h5>1184000 MMK</h5>
            <button class="btn-bg update-btn" type="button">Update</button>
          </div>
        </div>
      </div>
      <div id="more-page">
        <a>
          <div class="proile-box">N</div>
          <div class="balance-box">
            <h4>My Balance</h4>
            <i class="fa-solid fa-eye balance-view"></i>
            <b id="my-balance"></b>
          </div>
          <div class="Member-box">
            <!-- mining js file တွင်အလုပ်လုပ်သည် -->
            <img id="silver-brand" src="../images/silver.png">
            <img id="platinum-brand" src="../images/platinum.png">
            <img id="gold-brand" src="../images/gold.png">
            <img id="diamond-brand" src="../images/diamond.png">
            <img id="vip-brand" src="../images/vip.png">
          </div>
        </a>
        <a class="more-item profile-information-div">
          <i class="fa-solid fa-user"></i>
          <small>Profile</small>
        </a>
        <a class="more-item referral-div">
          <i class="fa-solid fa-user-plus"></i>
          <small>Referral</small>
        </a>
        <a class="more-item reward-div">
          <i class="fa-solid fa-award"></i>
          <small>Reward</small>
        </a>
        <a class="more-item team-div">
          <i class="fa-solid fa-user-group"></i>
          <small>Team</small>
        </a>
        <a class="more-item bonus-div">
          <i class="fa-solid fa-sack-dollar"></i>
          <small>Bonus</small>
        </a>
        <a class="more-item mining-div">
          <i class="fa-solid fa-land-mine-on"></i>
          <small>Mining</small>
        </a>
        <a class="more-item recharge-div">
          <i class="fa-solid fa-circle-dollar-to-slot"></i>
          <small>Recharge</small>
        </a>
        <a class="more-item withdrawal-div">
          <i class="fa-solid fa-hand-holding-dollar"></i>
          <small>Withdrawal</small>
        </a>
        <a class="more-item recharge-record-div">
          <i class="fa-solid fa-hourglass-start"></i>
          <small>Recharge Record</small>
        </a>
        <a class="more-item withdrawal-record-div">
          <i class="fa-solid fa-hourglass-end"></i>
          <small>Withdrawal Record</small>
        </a>
        <a class="more-item setting-div">
          <i class="fa-solid fa-gear"></i>
          <small>Setting</small>
        </a>
        <a class="more-item logout-div">
          <i class="fa-solid fa-right-from-bracket"></i>
          <small>Log Out</small>
        </a>
      </div>
    </div>
    
    <!---------------- RECHARGE CONFIRM START ---------------->
    <div class="hide" id="recharge-confirm-page">
      <i id="recharge-confirm-page-close-icon" class="fa-solid fa-grip-lines"></i>
      <div class="d">
        <input disabled type="text" name="recharge-confirm-account" class="recharge-confirm-account"></h4>
        <input disabled type="text" name="recharge-confirm-amount" class="recharge-confirm-amount"></b>
        <input disabled type="text" name="recharge-confirm-address" class="recharge-confirm-address"></b>
      </div>
      <div class="to-send-wallet-address-box">
        <h4>Send to</h4>
        <div>
          <b>09*****869</b>
          <i id="mk-phone" class="fa-regular fa-clipboard"></i>
        </div>
        <h4 class="text-center">(OR)</h4>
        <div>
          <b>09******148</b>
          <i id="pnd-phone" class="fa-regular fa-clipboard"></i>
        </div>
      </div>
      <div class="recharge-confirm-digits-box">
        <h4>The last 6 digits of the transfer order</h4>
        <div class="input-group">
          <input type="text" maxlength="1">
          <input type="text" maxlength="1">
          <input type="text" maxlength="1">
          <input type="text" maxlength="1">
          <input type="text" maxlength="1">
          <input type="text" maxlength="1">
        </div>
        <input hidden name="transaction-voucher-digits" id="transaction-voucher-digits" value="v digits">
      </div>
      <form id="r_form" class="recharge-confirm-voucher-box">
        <h4>Upload transaction voucher</h4>
        <div id="transaction-voucher-demo">
          <i class="fa-solid fa-upload"></i>
        </div>
        <input type="text" hidden name="r_account" id="r_account">
        <input type="text" hidden name="r_amount" id="r_amount">
        <input type="text" hidden name="r_address" id="r_address">
        <input type="text" hidden name="r_digits" id="r_digits">
        <input type="file" name="transaction-voucher-upload-file" id="transaction-voucher-upload-file" accept="image/png, image/jpg, image/jpeg">
      </form>
      <button type="button" class="btn-bg" id="recharge-confirm-btn">Confirm</button>
    </div>
    <div class="more-div-pages" id="lucky-wheel-page">
      <div class="buy-spin-count-page">
        <i id="buy-spin-count-page-hide-btn" class="fa-solid fa-grip-lines"></i>
        <h3 class="my-3">Spin count store</h3>
        <img src="../images/spin_count_store.png">
        <div class="box">
          <div>
            <i id="spin-count-decrease-btn" class="fa-solid fa-minus"></i>
            <b id="spin-count-quantity">1</b>
            <i id="spin-count-increase-btn" class="fa-solid fa-plus"></i>
          </div>
          <div id="spin-count-balance-amount">450 MMK</div>
        </div>
        <button id="spin-count-buynow-btn" class="btn-bg">Buy now</button>
      </div>
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back bonus-back"></i>
      </span>
      <div class="span-count-container">
        <div class="my-balance-box">
          <i class="fa-solid fa-sack-dollar"></i>
          <b class="my-balance"></b>
        </div>
        <div class="span-count-box">
          <b class="span-count"></b>
          <i class="fa-solid fa-dharmachakra"></i>
        </div>
      </div>
      <div class="lucky-wheel-container">
        <img src="../images/lucky_wheel.png">
        <div class="lucky-wheel-circle">
          <span class="w1"><small>100 MMK</small></span>
          <span class="w2"><small>500 MMK</small></span>
          <span class="w3"><small>300 MMK</small></span>
          <span class="w4"><small>900 MMK</small></span>
        </div>
      </div>
      <button id="spin-btn">Spin</button>
    </div>
    <div class="more-div-pages" id="daily-bonus-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back bonus-back"></i>
      </span>
      <div class="bonus-role-container">
        <div class="bonus-role">
          <img src="../images/silver.png">
          <b>20 MMK</b>
        </div>
        <div class="bonus-role">
          <img src="../images/platinum.png">
          <b>45 MMK</b>
        </div>
        <div class="bonus-role">
          <b>100 MMK</b>
          <img src="../images/diamond.png">
        </div>
        <div class="bonus-role">
          <b>70 MMK</b>
          <img src="../images/gold.png">
        </div>
        <div class="bonus-role">
          <img src="../images/vip.png">
          <b>200 MMK</b>
        </div>
        <img src="../images/bonus_clock.png">
      </div>
      <div class="clock-container">
        <div class="h-box"><b class="bonus-h bl"></b></div>
        <div class="m-box"><b class="bonus-m bl"></b></div>
        <div class="s-box"><b class="bonus-s bl"></b></div>
        <span class="p-box bl">00</span>
      </div>
    </div>
    
    <div class="more-div-pages" id="profile-information-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Profile</div>
      </span>
      <div class="profile-box">
        <img src="../images/brand.png">
      </div>
      <div class="name-box name">MS Wallet</div>
      <div class="wallet-box">
        <div class="recharge-icon">
          <i class="fa-solid fa-arrow-up"></i>
          <span>Recharge</span>
        </div>
        <div class="withdrawal-icon">
          <i class="fa-solid fa-arrow-down"></i>
          <span>Withdrawal</span>
        </div>
      </div>
      <div class="big-container">
        <div>
          <h3>Type</h3>
          <small class="member-type">loading...</small>
        </div>
        <div>
          <h3>Balance</h3>
          <small class="my-balance">loading...</small>
        </div>
        <div>
          <h3>Team</h3>
          <small class="team-count">loading...</small>
        </div>
        <div>
          <h3>Reward</h3>
          <small class="total-reward">loading...</small>
        </div>
      </div>
      <div class="small-container">
        <div>
          <i class="fa-solid fa-envelope"></i>
          <span class="email">minkoko.r@gmail.com</span>
        </div>
        <div>
          <i class="fa-solid fa-phone"></i>
          <span class="phone">0615845878</span>
        </div>
        <div>
          <i class="fa-solid fa-building-columns"></i>
          <span class="region">Region</span>
        </div>
        <div>
          <i class="fa-solid fa-city"></i>
          <span class="city">city</span>
        </div>
      </div>
      <a class="edit-aprofile-btn btn-bg" href="edit_profile.php">
        <i class="fa-solid fa-pen-to-square"></i>&nbsp;
        Edit Profile
      </a>
    </div>
    <div class="more-div-pages" id="referral-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Referral</div>
      </span>
      <h4 class="mt-3">Refer your friends and Earn</h4>
      <img src="../images/referral.png">
      <h4>Your referral code</h4>
      <div class="referral-code-div">
        <b class="referral-code">loading</b>|
        <i id="referral-code-copy-btn" class="fa-solid fa-clipboard"></i>
      </div>
      <div class="referral-link-box">
        <span class="referral-link">loading...</span>
        <div>
          <i id="referral-link-copy-btn" class="fa-solid fa-clipboard"></i>
          <i id="referral-link-facebook-share-btn" class="fa-brands fa-facebook-f"></i>
          <i id="referral-link-telegram-share-btn" class="fa-solid fa-paper-plane"></i>
        </div>
        <button class="referral-learn-more-btn">Learn more</button>
      </div>
    </div>
    <div class="more-div-pages" id="reward-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Reward</div>
      </span>
      <img src="../images/reward.png">
      <div class="total-reward-box">
        <h4>Total Reward</h4>
        <span class="total-reward">loading...</span>
      </div>
      <div class="reward-box-container">
        <div class="reward-box">
        <div>
          <b>4000 MMK</b>
          <img src="../images/silver.png">
          <small>If you can referral silver member</small>
        </div>
      </div>
        <div class="reward-box">
          <div>
            <b>7000 MMK</b>
            <img src="../images/platinum.png">
            <small>If you can referral platinum member</small>
          </div>
        </div>
        <div class="reward-box">
          <div>
            <b>12000 MMK</b>
            <img src="../images/gold.png">
            <small>If you can referral gold member</small>
          </div>
        </div>
        <div class="reward-box">
          <div>
            <b>16000 MMK</b>
            <img src="../images/diamond.png">
            <small>If you can referral diamond member</small>
          </div>
        </div>
        <div class="reward-box">
          <div>
            <b>20000 MMK</b>
            <img src="../images/vip.png">
            <small>If you can referral vip member</small>
          </div>
        </div>
      </div>
    </div>
    <div class="more-div-pages" id="team-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Team</div>
      </span>
      <div class="team-members-count-box">
        <h2>My Team</h2>
        <span class="team-members-count"><strong class="team-count">loading...</strong></span>
      </div>
      <div class="team-members-type-box">
        <div class="team-members-all-icon team-members-type-icon-active">
          <small>All</small>
        </div>
        <div class="team-members-silver-icon">
          <img src="../images/silver.png">
          <small>Silver</small>
        </div>
        <div class="team-members-platinum-icon">
          <img src="../images/platinum.png">
          <small>Platinum</small>
        </div>
        <div class="team-members-gold-icon">
          <img src="../images/gold.png">
          <small>Gold</small>
        </div>
        <div class="team-members-diamond-icon">
          <img src="../images/diamond.png">
          <small>Diamond</small>
        </div>
        <div class="team-members-vip-icon">
          <img src="../images/vip.png">
          <small>VIP</small>
        </div>
        
      </div>
      <div class="team-members-main-box">
        
      </div>
    </div>
    <div class="more-div-pages" id="bonus-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Bonus</div>
      </span>
      <img class="hide bonus-img" src="../images/bonus.png">
      <div class="lucky-wheel-box">
        <i class="fa-solid fa-dharmachakra"></i>
        <div>
        
          <h5>Lucky Wheel</h5>
          <small>Spin the lucky wheel and get extra prizes</small>
        </div>
      </div>
      <div class="referral-bonus-box">
        <i class="fa-solid fa-user-plus"></i>
        <div>
        
          <h5>Referral Bonus</h5>
          <small>Invite your friends and get extra rewards</small>
        </div>
      </div>
      <div class="daily-bonus-box">
        <i class="fa-solid fa-clock"></i>
        <div>
        
          <h5>Daily Bonus</h5>
          <small>Log in daily and get bonuses</small>
        </div>
      </div>
    </div>
    <div class="more-div-pages" id="recharge-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Recharge</div>
      </span>
      <h4 class="mt-2">My Balance</h4>
      <b class="my-balance"></b>
      <hr>
      <div class="role-box">
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>Daily recharge amount - </span><b>1500000 MMK</b>
        </div>
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>Maximum recharge amount - </span><b>500000 MMK</b>
        </div>
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>Minium recharge amount - </span><b>40000 MMK</b>
        </div>
      </div>
      <div class="recharge-amount-box">
        <h4>Recharge Amount</h4>
        <input id="recharge-amount" type="number" placeholder="amount">
      </div>
      <div class="recharge-account-box">
        <h4>Wallet Account</h4>
        <b id="recharge-account">KBZ Pay</b>
        <i class="fa-solid fa-chevron-right edit-recharge-icon"></i>
        <div>KBZ Pay</div>
        <div>Wave Pay</div>
        <div>Uab Pay</div>
      </div>
      <div class="recharge-address-box">
        <h4>Recharge Address</h4>
        <input id="recharge-address" type="number" placeholder="phone number">
      </div>
      <button id="recharge-btn" type="button" class="btn-bg">Recharge</button>
    </div>
    <div class="more-div-pages" id="withdrawal-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Withdrawal</div>
      </span>
      <h3 class="text-center mt-2">My Balance</h3>
      <b class="my-balance text-center"></b>
      <hr>
      <div class="role-box">
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>Daily withdrawal amount - </span><b>500000 MMK</b>
        </div>
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>Maximum withdrawal amount - </span><b>150000 MMK</b>
        </div>
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>Minium withdrawal amount - </span><b>50000 MMK</b>
        </div>
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>withdrawal time - </span><b>07:00 am to 07:00 pm</b>
        </div>
        <div>
          <i class="fa-solid fa-circle-exclamation"></i>
          <span>withdrawal fee - </span><b>0.025%</b>
        </div>
      </div>
      <div class="amount-box">
        <div>
          <h5>Withdrawal Amount</h5>
          <input id="withdrawal-amount" type="number" placeholder="amount">
        </div>
        <div><span>Withdrawal fee - </span><b id="fee">0.00</b>&nbsp;<b>MMK</b></div>
      </div>
      <div class="withdrawal-account-box">
        <h4>Wallet Account</h4>
        <span class="my-withdrawal-account">KBZ Pay</span>
        <i class="fa-solid fa-chevron-right more-withdrawal-account"></i>
        <div class="kbz-pay">KBZ Pay</div>
        <div class="wave-pay">Wave Pay</div>
        <div class="cb-pay">Uab Pay</div>
      </div>
      <div class="withdrawal-address-box">
        <h4>Withdrawal Address</h4>
        <input type="number" id="withdrawal-address" placeholder="phone number">
      </div>
      <form id="w_form">
        <input hidden type="text" name="w_account" id="w_account">
        <input hidden type="text" name="w_amount" id="w_amount">
        <input hidden type="text" name="w_fee" id="w_fee">
        <input hidden type="text" name="w_address" id="w_address">
      </form>
      <button id="withdrawal-btn" class="btn-bg">Withdrawal</button>
    </div>
    <div class="more-div-pages" id="recharge-record-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Recharge record</div>
      </span>
      <div class="empty-box">
        <img src="../images/empty.png">
        <img class="bee" src="../images/bee.png">
        <h3>Oops!</h3>
        <p>You have't any recharge record</p>
        <button class="recharge-btn">Recharge now</button>
      </div>
    </div>
    <div class="more-div-pages" id="withdrawal-record-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Withdrawal record</div>
      </span>
      <div class="record-box">
        <div>
          <b>Amount</b>
          <span>50000 MMK</span>
        </div>
        <div>
          <b>To Account</b>
          <span>48750 MMK</span>
        </div>
        <div>
          <b>Fee</b>
          <span>1250 MMK</span>
        </div>
        <div>
          <b>Date & Time</b>
          <span>1/1/2022 5:23 PM</span>
        </div>
        <div>
          <b>Withdrawal Account</b>
          <span>Wave Pay</span>
        </div>
        <div>
          <b>Withdrawal Address</b>
          <span>0987654321</span>
        </div>
      </div>
    </div>
    <div class="more-div-pages" id="setting-page">
      <span class="back-div">
        <i class="fa-solid fa-chevron-left back"></i>
        <div>Setting</div>
      </span>
      <a href="edit_profile.php" class="edit-profile-btn">
        <div>
          <i class="fa-solid fa-user-pen"></i>
          <b>Edit Profile</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a href="change_password.php" class="change-password-btn">
        <div>
          <i class="fa-solid fa-lock"></i>
          <b>Change Pssword</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a href="help.php" class="help-btn">
        <div>
          <i class="fa-solid fa-hand-holding-medical"></i>
          <b>Help</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a class="about-us-btn">
        <div>
          <i class="fa-solid fa-circle-info"></i>
          <b>About</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a href="contact_us.php" class="contact-us-btn">
        <div>
          <i class="fa-solid fa-address-book"></i>
          <b>Contact Us</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a class="our-services-btn">
        <div>
          <i class="fa-solid fa-hand-holding-hand"></i>
          <b>Our Services</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a class="legal-btn">
        <div>
          <i class="fa-solid fa-file-contract"></i>
          <b>Legal</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
      <a class="cookies-btn">
        <div>
          <i class="fa-solid fa-cookie"></i>
          <b>Cookies</b>
        </div>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/tab.js"></script>
    <script src="../js/mining.js"></script>
    <script src="../js/home.js"></script>
    <script src="../js/more.js"></script>
    <script src="../js/profile.js"></script>
    <script src="../js/referral.js"></script>
    <script src="../js/reward.js"></script>
    <script src="../js/team.js"></script>
    <script src="../js/bonus.js"></script>
    <script src="../js/daily_bonus.js"></script>
    <script src="../js/lucky_wheel.js"></script>
    <script src="../js/recharge.js"></script>
    <script src="../js/withdrawal.js"></script>
    <script src="../js/recharge_record.js"></script>
    <script src="../js/setting.js"></script>
  </body>
</html>