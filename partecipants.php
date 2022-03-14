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
  <?php

  class Artist {
    public $name;
    public $link;
    public $song;
    public $songlink;
    public $country;

    public function __construct($name, $link, $song, $songlink, $country) {
      $this->name = $name;
      $this->link = $link;
      $this->song = $song;
      $this->songlink = $songlink;
      $this->country = $country;
    }

    public function get_name() {
      return $this->name;
    }

    public function get_link() {
      return $this->link;
    }

    public function get_song() {
      return $this->song;
    }

    public function get_songlink() {
      return $this->songlink;
    }

    public function get_country() {
      return $this->country;
    }
  }

  $hostname = "localhost";
  $username="root";
  $password="root";
  $db="VOTESxEUROVISION";
  $con = mysqli_connect($hostname, $username, $password, $db) or die('Error connecting to database');

  $artists = array();
  $result = mysqli_query($con, "SELECT * FROM participants");
  while($row = mysqli_fetch_assoc($result)){
    $artist = new Artist($row['name'], $row['link'], $row['song'], $row['songlink'], $row['country']);
    array_push($artists, $artist);
  }
  ?>
</head>

<body>
  <nav id="menu">
    <a class="logo" href="index.php">VOTESxEUROVISION</a>
    <a href="index.php">Home</a>
    <a href="partecipants.php">Participants</a>
    <a href="">Statistics</a>
    <button type="button" class="vote" name="vote" onclick="document.location ='votes.php';">Vote!</button>
  </nav>
  <header id="header">
    <h1>Eurovision Participants</h1>
    <h2>2022</h2>
  </header>
  <section id="artists-container">
    <?php
    foreach ($artists as $singer) {
      echo '<article id="' . $singer->get_country() . '">';
      echo '<h2>' . $singer->get_name() . '</h2>';
      echo $singer->get_songlink();
      echo '</article>';
    } ?>
  </section>
</body>
