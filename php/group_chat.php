<?php

ob_start();
session_start();
include('con.php');
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Group Chat</title>
    <script src="https://kit.fontawesome.com/c3ce1fe727.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../css/chat.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-12 col-md-8">
          <div id="group-chat-room">
            <span>
              <i id="to-home" class="fa-solid fa-angle-left"></i>
            </span>
            <div id="messages-container" class="sb">
              
            </div>
            <div id="input-field">
              <input id="message" type="text" placeholder="Type a message">
              <i id="message-send" class="fa-solid fa-paper-plane"></i>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/chat.js"></script>
  </body>
</html>