<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  
  <title>VOTESxEUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <?php
  session_start();
  if($_POST['logout'] == "logout") {
    unset($_SESSION['logged']);
    session_destroy();
  }
  ?>
</head>
<body>
  <nav id="menu">
    <a class="logo" href="index.php">VOTESxEUROVISION</a>
    <a href="index.php">Home</a>
    <a href="">Participants</a>
    <a href="">Statistics</a>
    <button type="button" class="vote" name="vote" onclick="document.location='votes.php';">Vote!</button>
  </nav>
  <p>You have correctly logged out.</p>
  <p>Use the navigation bar if you want to continue your navigation on the website.</p>
</body>
