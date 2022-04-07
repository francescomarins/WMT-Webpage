<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTES4EUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <link rel="stylesheet" href="bg.css" type="text/css">
  <script src="javascript.js"></script>
  <?php
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
  <nav id="menu">
    <a class="logo" href="index.php">VOTES4EUROVISION</a>
    <a href="index.php">Home</a>
    <a href="partecipants.php">Participants</a>
    <a href="statistics.php">Statistics</a>
    <button type="button" class="vote" name="vote" onclick="document.location = 'votes.php';">Vote!</button>
  </nav>
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

</body>
</html>
