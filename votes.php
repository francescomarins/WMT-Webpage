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
</head>
  <body>
    <?php session_start(); include("passwords.php"); check_logged(); ?>
    <nav id="menu">
      <a class="logo" href="index.php">VOTESxEUROVISION</a>
      <a href="index.php">Home</a>
      <a href="partecipants.php">Participants</a>
      <a href="">Statistics</a>
      <form action="logout.php" method="post">
        <button type="submit" id="logout" name="logout" value="logout">Logout</button>
      </form>
    </nav>
  </body>
</html>
