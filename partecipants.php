<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <title>VOTES4EUROVISION</title>
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
    $artist = new Artist($row['name'], $row['link'], $row['song'], $row['country']);
    array_push($artists, $artist);
  }
  ?>
</head>

<body>
  <nav id="menu">
    <a class="logo" href="index.php">VOTES4EUROVISION</a>
    <a href="index.php">Home</a>
    <a href="partecipants.php" class="currentpage">Participants</a>
    <a href="statistics.php">Statistics</a>
    <button type="button" class="vote" name="vote" onclick="document.location ='votes.php';">Vote!</button>
  </nav>
  <header id="header">
    <h1>Eurovision Participants</h1>
    <h2>2022</h2>
  </header>
  <section id="artists-container" class="artists-container">
    <article class="iframe-container">
      <h3>Listen to all the songs partaking in the competition, the video below contains all of them!</h3>
      <iframe id="allsongs " src="https://www.youtube.com/embed/nrOaYo3I-9A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
    </article>
    <article class="list-of-artists">
      <h3>See the list of all contestants. Click on their names to know something more about them.</h3>
      <?php
        $column = 1;
      foreach ($artists as $singer) {
      echo '<a class="artist column' . $column . '" href=' . $singer->get_link() .'>' . $singer->get_name() . ' - ' . $singer->get_song() . '<span class="country">' . $singer->get_country() . '</span></a>';
      if($column == 1)
        $column++;
      else {
        $column = 1;
      }
      } ?>
    </article>
</section>
</body>
