<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTES4EUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="javascript.js"></script>

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
    $artist = new Artist($row['name'], $row['link'], $row['song'], $row['country']);
    array_push($artists, $artist);
  }
  ?>
</head>

<body>
  <a href="#header" class="skip-to-main-content">Skip to main content</a>
  <div id="menu" class="menu">
    <a class="logo" title="Home" href="index.php" class="currentpage">VOTES4EUROVISION</a>
    <a href="index.php" class="currentpage link">Home</a>
    <a href="partecipants.php" class="link">Participants</a>
    <a href="statistics.php" class="link">Statistics</a>
    <a href="votes.php" class="link">Voting page</a>
    <button type="button" class="vote" name="vote" onclick="document.location = 'votes.php';">Vote!</button>
    <a href="javascript:void(0);" class="icon" onclick="showMenu()">
      <em class="fa fa-bars"></em>
    </a>
  </div>
  <header id="header">
    <h1>Eurovision Participants</h1>
    <h2>2022</h2>
  </header>
  <section id="artists-container" class="artists-container">
    <article class="iframe-container">
      <h3>All 40 participating songs</h3>
      <p>Listen to all the songs partaking in the competition, the video below contains all of them!</p>
      <iframe id="allsongs" src="https://www.youtube.com/embed/nrOaYo3I-9A?start=1" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
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
  <footer id="footer">
    <hr>
    <h3>Some external links</h3>
    <a class="fa fa-location-arrow" href="http://www.comune.torino.it/" title="Municipality of Turin"></a>
    <a class="fa fa-instagram" href="https://www.instagram.com/eurovision" title="Euovision Song Contest Instagram Account"></a>
    <a class="fa fa-youtube" href="https://www.youtube.com/channel/UCRpjHHu8ivVWs73uxHlWwFA" title="Eurovision Song Contest YouTube Channel"></a>
    <p>
      &copy; All rights reserved - Francesco Marinelli - 2022
    </p>
  </footer>
</body>
</html>
