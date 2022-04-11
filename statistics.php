<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <title>VOTES4EUROVISION | Statistics</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <script src="plotly-2.9.0.min.js"></script>
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
    $artists[$row['country']] = $artist;
  }

  $votespercountry = array();
  $result = mysqli_query($con, "SELECT `country`, COUNT(*) as votes_per_country FROM `users` WHERE `available_votes` != 20 GROUP BY country ORDER BY 2 DESC");
  while($row = mysqli_fetch_assoc($result)) {
    $country = $row['country'];
    $votespercountry["$country"] = $row['votes_per_country'];
  }

  $votesperartist = array();
  foreach (array_keys($artists) as $key) {
    $votesperartist["$key"] = 0;
  }
  $result = mysqli_query($con, "SELECT `country`, SUM(votes) as tot_votes FROM votes GROUP BY country ORDER BY 2 DESC");
  while($row = mysqli_fetch_assoc($result)) {
    $country = $row['country'];
    $votesperartist["$country"] = (int)$row['tot_votes'];
  }
  arsort($votesperartist);
  ?>
</head>
<body>
  <a href="#header" class="skip-to-main-content">Skip to main content</a>
  <div id="menu" class="menu">
    <a class="logo" title="Home" href="index.php">VOTES4EUROVISION</a>
    <a href="index.php" class="link">Home</a>
    <a href="partecipants.php" class="link">Participants</a>
    <a href="statistics.php" class="link currentpage">Statistics</a>
    <a href="votes.php" class="link">Voting page</a>
    <button type="button" class="vote" name="vote" onclick="document.location = 'votes.php';">Vote!</button>
    <a href="javascript:void(0);" class="icon" onclick="showMenu()">
      <em class="fa fa-bars"></em>
    </a>
  </div>
  <header id="header">
    <h1>Votes statistics</h1>
    <h2>2022</h2>
  </header>
  <section id="countries_container" class="countries_container">
    <h2>Users' provenience</h2>
    <p>
      This section containes a pie chart which graphically shows where votes come from.<br>
      In particular what is provided is the number of users that expressed at least one vote.
    </p>
      <div id="countriespie"></div>
      <p>
        The chart only shows percentages so if you are interested in numbers click the button below and all details will be displayed.
        If there are no data available the chart will not be visible. Vote and come back!
      </p>
      <details>
      <summary>Number of users from each country</summary>
      <table id="countries_votes">
        <?php
        $counter = 0;
        echo "<tr><th>Country</th><th>Users</th></tr>";
        foreach(array_keys($votespercountry) as $key) {
          echo "<tr><td>$key</td> <td><div class='from' data-country='$key'>$votespercountry[$key]</div></td></tr>";
        }
        ?>
      </table>
    </details>
      <script>
        display_totals()
      </script>
  </section>
  <section id="artists_container" class="artists_container">
    <h2>Ranking</h2>
    <p>The current positioning of all countries is the one that follows.
      Click on the country  to show the name of the singer, the title of the song and the votes that it received.</p>
    <?php
    $order = 1;
    $currentvotes = 0;
    $previousvotes = -1;
    foreach(array_keys($votesperartist) as $key) {
        $currentvotes = $votesperartist[$key];
      if($currentvotes != $previousvotes && $previousvotes != -1) {
        $order++;
      }
      echo "<details><summary data-order='$order'>$order. $key</summary>";
      echo "<table><tr><th>Singer</th><th>Song</th><th>Votes</th></tr>";
      echo "<tr><td class='name-cell'>" . $artists[$key]->get_name() .
              "</td><td class='song-cell'>" . $artists[$key]->get_song() .
                "</td><td class='votes-cell'><div class='for' data-artist='$key'>$votesperartist[$key]</div></td></tr></table>";
      echo "</details>";
      $previousvotes = $currentvotes;
    }
    ?>
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
