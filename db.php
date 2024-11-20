<?php
$servername = "localhost";
$username = "FHTalukder";
$password = "BqmHQwH9";
$db = "FHTalukder";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>