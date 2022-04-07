<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTES4EUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <link rel="stylesheet" href="bg.css" type="text/css">
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
    <a class="logo" href="index.php">VOTES4EUROVISION</a>
    <a href="index.php">Home</a>
    <a href="partecipants.php">Participants</a>
    <a href="statistics.php">Statistics</a>
    <button type="button" class="vote" name="vote" onclick="document.location='votes.php';">Vote!</button>
  </nav>
  <h3>Successful logout</h3>
  <div class="align-center">
    <p>You have correctly logged out.</p>
    <p>Use the navigation bar if you want to continue your navigation on the website.</p>
  </div>
</body>
