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
  if($_POST['operation'] == "login") {
    $wrongpasswd = false;
    include("passwords.php");
     if (isset($USERS[$_POST["email"]]) && $USERS[$_POST["email"]]==$_POST["password"]) {
       $_SESSION["logged"]=$_POST["email"];
     } else {
       $wrongpasswd = true;
     }
  };
  if (isset($_SESSION["logged"]) && array_key_exists($_SESSION["logged"],$USERS)) { // the user is logged
    header("Location: votes.php");
  }
  ?>
</head>
<body>
  <a href="#login-container" class="skip-to-main-content">Skip to main content</a>
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
  <section id="login-container" class="centred">
    <header>
      <h1>Login</h1>
    </header>
    <article id="login">
      <h3>Log in to access the website</h3>
      <form name="login-form" class="login-form centred" action="login.php" method="post" onsubmit="return check_login();">
        <?php
          if($wrongpasswd)
          echo "<p>Wrong email or password!</p>"
        ?>
        <label for="email">E-mail</label> <br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password</label> <br>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="operation" value="login">Login</button>
      </form>
    </article>
    <hr class="half-row">
    <article class="button-container">
      <h3>Haven't you registered yet?</h3>
        <button type="button" onclick="document.location='registration.php';">Sign up</button>
    </article>
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
