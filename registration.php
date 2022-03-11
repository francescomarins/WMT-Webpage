<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>VOTESxEUROVISION</title>
  <link rel="icon" href="img/logo2.png" type="image/png" sizes="any">
  <link rel="stylesheet" href="mycss.css" type="text/css">
  <?php
    if($_POST['operation'] == "registration") {
      $userpresent = false;
      include("passwords.php");
      foreach (array_keys($USERS) as $email) {
        if ( $email == $_POST["email"]) {
          $userpresent = true;
          break;
        };
      };
      $result = false;
      if (!$userpresent) {
        $sql = "INSERT INTO users (email, password) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "')";
        $result = mysqli_query($con, $sql);
    };
  };
  ?>
</head>
  <body>
    <nav id="menu">
      <a class="logo" href="index.php">VOTESxEUROVISION</a>
      <a href="index.php">Home</a>
      <a href="">Participants</a>
      <a href="">Statistics</a>
      <button type="button" name="vote" onclick="document.location='login.php';">Vote!</button>
    </nav>
    <section id="reg-container">
      <header>
        <h1>Registration</h1>
      </header>
      <article id="reg">
        <form name="reg-form" class="reg-form" action="registration.php" method="post">
          <?php
            if($userpresent)
            echo "<p>Email already registered. Click on the button below to log in!</p>"
          ?>
          <label for="email">E-mail</label> <br>
          <input type="email" id="email" name="email"><br>
          <label for="password" >Password</label> <br>
          <input type="password" id="password" name="password"><br>
          <button type="submit" name="operation" value="registration" onclick="check();">Sign up</button>
          <?php
            if($result)
            echo "<p>Successful registration. Please log in to enter the website!</p>"
          ?>
        </form>
      </article>
    </section>
    <button type="button" id="show" name="show" onclick="document.location='login.php';">Sign in</button>
  </body>
</html>
