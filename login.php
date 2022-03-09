<?php
session_start();
include("passwords.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $op = $_POST['operation'];
  if(strcmp($op, 'login') == 0) {
    if (isset($USERS[$_POST["email"]]) && $USERS[$_POST["email"]]==$_POST["password"]) {
         $_SESSION["logged"]=$_POST["email"];
         echo "logged in";
        } else {
          echo '<p>Wrong username or password!</p>';
        }
    if (isset($_SESSION["logged"]) && array_key_exists($_SESSION["logged"],$USERS)) { // the user is logged
          header("Location: dbinteraction.php");
  }
}
?>
