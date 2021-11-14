<?php
include "utils/error.php";
include "utils/debug.php";
include "utils/constants.php";

debug_to_console($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  header('Location: login.php');
  die();
}
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "lab7";

$user_username = $_REQUEST["username"];
$user_password = crypt($_REQUEST["password"], $SALT);

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  page_error();
}
$sql = "SELECT * FROM `user_auth` WHERE `username` LIKE '$user_username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $user_details = $result->fetch_assoc();
  if ($user_details["password"] == $user_password) {
    header('Location: home.php');
    die();
  } else {
    header('Location: login.php?error=true');
    die();
  }
} else {
  header('Location: login.php?error=true');
  die();
}
$conn->close();