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

  $videostring = "<p>To listen to the song taking part to the contest you can watch the video.</p>";
  $infostring0 = '<p>Or know more about <a href="';
  $infostring1 = '">';
  $infostring2 = '</a></p>';
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
    <h1>Eurovision Participants</h1>
    <h2>2022</h2>
  </header>
  <section id="artists-container">
    <h3>See the list of all the artists who take part in the copetition. Click on their name to see something more about them.</h3>
    <?php
    foreach ($artists as $singer) {
      echo '<article class="artist-article" id="' . $singer->get_country() . '">';
      echo '<h2 class="artist" onclick=showmore("' . $singer->get_country() . '");>' . $singer->get_name() . ' - ' . $singer->get_song() . '<span class="country">' . $singer->get_country() . '</span></h2>';
      echo '<div class="details" id="' . $singer->get_country() . '-details" style="display: none;">';
      echo $singer->get_songlink();
      echo '<span class="about_the_artist">' . '<h2>Information about the artist</h2>' . $videostring . $infostring0 . $singer->get_link() . $infostring1 . $singer->get_name() . $infostring2 .'</span>';
      echo '</div></article>';
    } ?>
  </section>
</body>
