<?php
// Database connection settings
$servername = "localhost";  // Replace with your server address
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "baby_shop";      // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
