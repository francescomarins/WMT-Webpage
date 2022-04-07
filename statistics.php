<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <title>VOTES4EUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <script src="plotly-2.9.0.min.js"></script>
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
  <script>
  function display_totals() {
    let froms = document.getElementsByClassName("from");
    let from_values = new Array();
    let from_countries = new Array();
    let total = 0;

    for (var i = 0; i < froms.length; i++) {
      var item = froms[i];
      total = total + parseInt(item.innerHTML);
    }

    var limit = (froms.length < 5) ? froms.length : 5;
    for (var i = 0; i < limit; i++) {
      var item = froms[i];
      from_countries[i] = item.getAttribute('data-country');
      from_values[i] = parseInt(item.innerHTML)*1.0 / total * 100;
    }

    if(froms.length > 5) {
      from_countries[5] = "Others";
      var others_value = 0;
      for (var i = 5; i < froms.length; i++) {
        var item = froms[i];
        others_value = others_value + parseInt(item.innerHTML);
      }
      from_values[5] = others_value*1.0 / total * 100;
    }

    var colours_array = ["90e0ef","48cae4","00b4d8","0096c7","0077b6","023e8a","03045e"];

    var data = [{
      values: from_values,
      labels: from_countries,
      type: 'pie',
      hoverinfo: 'label+percent',
      marker: {
        colors: colours_array
      }
    }];

    var layout = {
      paper_bgcolor: 'rgba(0,0,0,0)',
      plot_bgcolor: 'rgba(0,0,0,0)',
      font: {
        color: 'white'
      },
      hoverlabel: {
        bordercolor: 'white'
      }
    }

    var config = {responsive: true}

    Plotly.newPlot('countriespie', data, layout, config);
  }
  </script>
</head>
<body>
  <nav id="menu">
    <a class="logo" href="index.php">VOTES4EUROVISION</a>
    <a href="index.php">Home</a>
    <a href="partecipants.php">Participants</a>
    <a href="statistics.php" class="currentpage">Statistics</a>
    <button type="button" class="vote" name="vote" onclick="document.location ='votes.php';">Vote!</button>
  </nav>
  <header id="header">
    <h1>Votes statistics</h1>
    <h2>2022</h2>
  </header>
  <section id="countries_container" class="countries_container">
    <h2>Votes' provenience</h2>
    <p>
      This section containes a pie chart which graphically shows where votes come from.<br>
      In particular what is provided is the number of users that expressed at least one vote.
    </p>
      <div id="countriespie"></div>
      <p>
        The chart only shows percentages so if you are interested click the button below and all details will be displayed.
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
</body>
</html>
