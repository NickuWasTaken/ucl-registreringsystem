<?php

$servername = "mysql24.unoeuro.com";
$username = "nicku_dk";
$password = "aR49Bh3D5rHy";
$my_db = "nicku_dk_db_registreringssystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $my_db);
$conn->set_charset('UTF-8');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>