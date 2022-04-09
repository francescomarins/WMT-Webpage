<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTES4EUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <link rel="stylesheet" href="bg.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="javascript.js"></script>  <?php
  session_start();
  if($_POST['logout'] == "logout") {
    unset($_SESSION['logged']);
    session_destroy();
  }
  ?>
</head>
<body>
  <a href="#logout-container" class="skip-to-main-content">Skip to main content</a>
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
  <section id="logout-container">
    <h3>Successful logout</h3>
    <div class="align-center">
      <p>You have correctly logged out.</p>
      <p>Use the navigation bar if you want to continue your navigation on the website.</p>
    </div>
  </section>
  <footer id="footer">
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
