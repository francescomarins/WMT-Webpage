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
  <link rel="stylesheet" href="bg.css" type="text/css">
  <script type="text/javascript" src="javascript.js"></script>
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
  <nav id="menu">
    <a class="logo" href="index.php">VOTESxEUROVISION</a>
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
      <form name="login-form" class="login-form centred" action="login.php" method="post">
        <?php
          if($wrongpasswd)
          echo "<p>Wrong email or password!</p>"
        ?>
        <label for="email">E-mail</label> <br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password</label> <br>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="operation" value="login" onclick="check();">Login</button>
      </form>
    </article>
    <article class="button-container">
      Aren't you registered?<br>
        <button type="button" onclick="document.location='registration.php';">Sign up</button>
    </article>
  </section>

</body>
</html>
