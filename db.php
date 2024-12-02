<?php
$host = '127.0.0.1';  // or 'localhost'
$username = 'root';   // Your database username
$password = '';       // Your database password
$dbname = 'encryption'; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
