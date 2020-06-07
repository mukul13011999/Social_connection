<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataname = "socialconnection";

// Create connection
$conn = new mysqli($servername, $username, $password, $dataname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>