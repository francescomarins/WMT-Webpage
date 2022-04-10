<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTES4EUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <link rel="stylesheet" href="bg.css" type="text/css">
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

  <?php
  session_start();
  include("passwords.php");
  check_logged();

  $userquery = "SELECT * FROM users WHERE email='" . $_SESSION['logged'] . "'";
  $userresult = mysqli_query($con, $userquery);
  $userrow = mysqli_fetch_assoc($userresult);
  $uservotes = $userrow['available_votes'];

  if($_POST['operation'] == "voting") {
    if ($_POST['country'] == "");
    else if ($uservotes == 0) {
      $novotesleft = true;
    } else if ($userrow['country'] == $_POST['country']) {
      $wrongvote = true;
    } else {
      $one = 1;
      $uservotes = $uservotes - $one;
      $userquery = "UPDATE users SET available_votes ='" . $uservotes . "' WHERE email ='" . $userrow['email'] . "'";
      $userresult = mysqli_query($con, $userquery);
      $checkpresencequery = "SELECT * FROM votes WHERE country = '" . $_POST['country'] . "' AND user_country = '" . $userrow['country'] . "'";
      $checkpresenceresult = mysqli_query($con, $checkpresencequery);
      if(mysqli_num_rows($checkpresenceresult) == 0) {
        $votequery = "INSERT INTO votes (user_country, country, votes) VALUES ('" . $userrow['country'] . "','" . $_POST['country'] . "','" . $one . "')";
        $voteresult = mysqli_query($con, $votequery);
      }
      else {
        $checkpresencerow = mysqli_fetch_assoc($checkpresenceresult);
        $votesofcandidate = (int)$checkpresencerow['votes'] + $one;
        $votequery = "UPDATE votes SET votes = '" . $votesofcandidate . "' WHERE votes.user_country = '" . $userrow['country'] . "' AND votes.country = '" . $_POST['country'] . "'";
        $voteresult = mysqli_query($con, $votequery);
      }

    }
  };
  ?>

  <div id="menu" class="menu">
    <a class="logo" title="Home" href="index.php" class="currentpage">VOTES4EUROVISION</a>
    <a href="index.php" class="currentpage link">Home</a>
    <a href="partecipants.php" class="link">Participants</a>
    <a href="statistics.php" class="link">Statistics</a>
    <a href="votes.php" class="link">Voting page</a>
    <form action="logout.php" method="post">
      <button type="submit" id="logout" name="logout" value="logout">Logout</button>
    </form>
    <a href="javascript:void(0);" class="icon" onclick="showMenu()">
      <em class="fa fa-bars"></em>
    </a>
  </div>
  <header id="header">
    <h1>Eurovision Voting Page</h1>
    <h2>2022</h2>
  </header>
  <section id="voting-container">
    <h2> Welcome to the voting page! You still have <?php echo "$uservotes"; ?> votes available! </h2>
    <p> In this page you can express the preference for a singer. It is possible to express one vote at a time.
      If you want to give all your twenty votes to a singer you must repeat the procedure all the times.
      Remember that you cannot vote for an artist that represents your country.
      After voting you can see the live ranking the statistics' page.
    </p>

    <form class="voting-form centred" action="votes.php" method="post">
      <?php
      if ($novotesleft == true)
      echo "<p> YOU HAVE NO MORE VOTES AVAILABLE </p>";
      else if ($wrongvote)
      echo "<p> YOU CANNOT VOTE FOR AN ARTIST OF YOUR OWN COUNTRY </p>";
      ?>
      <select name="country" id="country">
        <option value="" disabled selected>Select a country</option>
        <?php
        foreach ($artists as $singer) {
          echo '<option value="' . $singer->get_country() . '">' . $singer->get_country() . ' (' . $singer->get_name() . ' - ' . $singer->get_song() . ')</option>';
        }
        ?>
      </select> <br>
      <button type="submit" name="operation" value="voting">Vote!</button>
    </form>
  </section>
</body>
</html>
