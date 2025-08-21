<?php
$servername = "localhost"; // Replace with your server name if needed
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "db_pendaftaran"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
