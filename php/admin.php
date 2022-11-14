<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/admin.css" rel="stylesheet">
  </head>
  <body>
    
    <div id="image-view">
      <i class="fa-solid fa-xmark" id="image-view-close"></i>
      <img src='../../images/bee.png'>
    </div>
    
    
    
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav>
            <img src="../../images/brand.png" id="brand">
            <div id="nav-bar">
              <i id="close-search" class="fa-solid fa-xmark"></i>
              <input type="text" id="search-value">
              <i id="search" class="fa-solid fa-magnifying-glass-dollar"></i>
              <i id="group-chat" class="fa-solid fa-comments-dollar"></i>
            </div>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-12">
          <div id="main-container">
            <div id="lists-page">
              <div class="title">
                <span id="title"></span>
                <div class="choice-box">
                  <div id="sort-box">
                    <div class="sort-check">By date</div>
                    <div>By name</div>
                    <div>By population</div>
                    <div>By silver member</div>
                    <div>By platinum member</div>
                    <div>By gold member</div>
                    <div>By diamond member</div>
                    <div>By vip member</div>
                    <div>By not member</div>
                  </div>
                  <span id="sort">By date</span>
                  <i id="choice-btn" class="dd fa-solid fa-caret-right"></i>
                </div>
              </div>
              <div class="lists-loader">
                <div class="d1">
                  <img src="../images/brand.png">
                </div>
                <div class="d2">
                  <img src="../images/brand.png">
                </div>
                <div class="d3">
                  <img src="../images/brand.png">
                </div>
                <div class="d4">
                  <img src="../images/brand.png">
                </div>
                <div class="d5">
                  <img src="../images/brand.png">
                </div>
                <div class="d6">
                  <img src="../images/brand.png">
                </div>
              </div>
              <div class="content-container">
                
              </div>
              
            </div>
            <div id="more-page">MORE</div>
            <div id="home-page">
              <div id="slider-container">
                <div>
                  <h3>Total Users</h3>
                  <span id="total-users">000</span>
                </div>
                <div>
                  <h3>Total Income</h3>
                  <span id="total-income">000</span>
                </div>
                <div>
                  <h3>Total Cash Out</h3>
                  <span id="total-cash-out">000</span>
                </div>
              </div>
            </div>
          </div>
          <div class="user-details-page">
            
          </div>
          <div id="tab-bar">
            <i id="home" class="fa-solid fa-home active"></i>
            <i id="users" class="fa-solid fa-users"></i>
            <i id="withdrawal" class="fa-solid fa-hand-holding-dollar"></i>
            <i id="recharge" class="fa-solid fa-circle-dollar-to-slot"></i>
            <i id="more" class="fa-solid fa-bars"></i>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/admin.js"></script>
  </body>
</html>