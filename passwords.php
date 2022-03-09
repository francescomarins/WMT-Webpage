<?php
$hostname = "localhost";
$username="root";
$password="root";
$db="VOTESxEUROVISION";
$con = mysqli_connect($hostname, $username, $password, $db) or die('Error connecting to databse');
echo "Connected to db";

$USERS = array();

$result = mysqli_query($con, "SELECT * FROM users");
echo "Query executed";
while($row = mysqli_fetch_assoc($result)){
  $USERS[$row['email']] = $row['password'];
}
echo "Array populated";

function check_logged(){
  global $_SESSION, $USERS; //_SESSION is not an ordinary variable but it is a "system" variable predefined
  if (!isset($_SESSION["logged"]) || !array_key_exists($_SESSION["logged"],$USERS)) {
    header("Location: login.php");
  };
};
?>
