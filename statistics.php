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
    <script type="text/javascript" src="javascript.js"></script>  <?php

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

    $votespercounty = array();
    $result = mysqli_query($con, "SELECT `country`, COUNT(*) as votes_per_country FROM `users` WHERE `available_votes` != 20 GROUP BY country ORDER BY 2 DESC");
    while($row = mysqli_fetch_assoc($result)) {
      $country = $row['country'];
      $votespercounty["$country"] = $row['votes_per_country'];
    }
    ?>
  </head>
  <body>
    <nav id="menu">
      <a class="logo" href="index.php">VOTESxEUROVISION</a>
      <a href="index.php">Home</a>
      <a href="partecipants.php">Participants</a>
      <a href="statistics.php">Statistics</a>
      <button type="button" class="vote" name="vote" onclick="document.location ='votes.php';">Vote!</button>
    </nav>
    <header id="header">
      <h1>Votes statistics</h1>
      <h2>2022</h2>
    </header>
    <section id="statistics-container">
      <article>
        <p>
        <?php
        foreach(array_keys($votespercounty) as $key) {
          echo "Votes from $key are $votespercounty[$key]<br>";
        }
        ?>
        </p>
      </article>
  </section>
  </body>
</html>
