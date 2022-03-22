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

  ?>

</head>
<body>
  <?php
  session_start();
  include("passwords.php");
  check_logged();

  $userquery = "SELECT * FROM users WHERE email='" . $_SESSION['logged'] . "'";
  $userresult = mysqli_query($con, $userquery);
  $userrow = mysqli_fetch_assoc($userresult);
  $uservotes = $userrow['available_votes'];
  ?>

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
    <h2> Welcome to the voting page! You still have <?php echo "$uservotes"; ?> votes available! </h2>
    <p> In this page you can express the preference for a singer. It is possible to express one vote at a time.
      If you want to give all your twenty votes to a singer you must repeat the procedure all the times.
      After voting you can see the live ranking the statistics' page.
    </p>
    <form class="voting-form centred" action="votes.php" method="post">
      <select name="country" id="country">
        <option value="" disabled selected>Select a country</option>
        <?php
        foreach ($artists as $singer) {
          echo '<option value="' . $singer->get_country() . '">(' . $singer->get_country() . ') ' . $singer->get_name() . ' - ' . $singer->get_song() . '</option>';
        }
        ?>
      </select> <br>
      <button type="submit" name="operation" value="voting">Vote!</button>
    </form>
  </section>
</body>
</html>
