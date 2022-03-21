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

  include("artist.php");

  $hostname = "localhost";
  $username="root";
  $password="root";
  $db="VOTESxEUROVISION";
  $con = mysqli_connect($hostname, $username, $password, $db) or die('Error connecting to database');

  $artists = array();
  $result = mysqli_query($con, "SELECT * FROM participants");
  while($row = mysqli_fetch_assoc($result)){
    $artist = new Artist($row['name'], $row['link'], $row['song'], $row['songlink'], $row['country']);
    array_push($artists, $artist);
  }

  $userquery = "SELECT * FROM users WHERE email=" . $_SESSION['logged'];
  $userresult = mysqli_query($con, userquery);
  $userrow = mysqli_fetch_assoc($userresult);
  $uservotes = $userrow['available_votes'];

  ?>

</head>
  <body>
    <?php session_start(); include("passwords.php"); check_logged(); ?>
    <nav id="menu">
      <a class="logo" href="index.php">VOTESxEUROVISION</a>
      <a href="index.php">Home</a>
      <a href="partecipants.php">Participants</a>
      <a href="">Statistics</a>
      <form action="logout.php" method="post">
        <button type="submit" id="logout" name="logout" value="logout">Logout</button>
      </form>
    </nav>
    <header id="header">
      <h1>Eurovision Voting Page</h1>
      <h2>2022</h2>
    </header>
    <section id="voting-container">
      <?php echo "<p> Hi " . $userrow['email'] . "</p>"; ?>
      <p> Welcome to the voting page! You still have <?php echo "$uservotes"; ?> available! </p>
    </section>
  </body>
</html>
