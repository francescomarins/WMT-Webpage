<?php
$hostname = "localhost";
$username="root";
$password="root";
$db="VOTESxEUROVISION";
$con = mysqli_connect($hostname, $username, $password, $db) or die('Error connecting to database');

$USERS = array();

$result = mysqli_query($con, "SELECT * FROM users");
while($row = mysqli_fetch_assoc($result)){
  $USERS[$row['email']] = $row['password'];
}

function check_logged(){
  global $_SESSION, $USERS;
  if (!isset($_SESSION["logged"]) || !array_key_exists($_SESSION["logged"],$USERS)) {
    header("Location: login.php");
  };
};
?>
