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
  <script src="plotly-2.9.0.min.js"></script>
  <script type="text/javascript" src="javascript.js"></script>
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
    $artists[$row['country']] = $artist;
  }

  $votespercountry = array();
  $result = mysqli_query($con, "SELECT `country`, COUNT(*) as votes_per_country FROM `users` WHERE `available_votes` != 20 GROUP BY country ORDER BY 2 DESC");
  while($row = mysqli_fetch_assoc($result)) {
    $country = $row['country'];
    $votespercountry["$country"] = $row['votes_per_country'];
  }

  $votesperartist = array();
  $result = mysqli_query($con, "SELECT `country`, SUM(votes) as tot_votes FROM votes GROUP BY country ORDER BY 2 DESC");
  while($row = mysqli_fetch_assoc($result)) {
    $country = $row['country'];
    $votesperartist["$country"] = $row['tot_votes'];
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
    <article class="values">
      <span name="countries">
        <?php
        foreach(array_keys($votespercountry) as $key) {
          echo "<div name='$key' class='from' hidden>$votespercountry[$key]</div>";
        }
        ?>
      </span>
      <span name="artists">
        <?php
        foreach(array_keys($votesperartist) as $key) {
          echo "<div name='$key' class='for' hidden>$votesperartist[$key]</div>";
        }
        ?>
      </span>
    </article>
    <article class="countries_displayer">
      <div id="countriespie"></div>
      <script type="text/javascript">
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
        from_countries[i] = item.getAttribute('name');
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
        },
        showlegend: false
      }

      Plotly.newPlot('countriespie', data, layout);

      </script>
    </article>
  </section>
</body>
</html>
