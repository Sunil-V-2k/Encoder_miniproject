<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Access denied! Please log in first.";
    header("Location: login.php");
    exit();
}

// Fetch user details if needed
echo "Welcome to the dashboard!";
?>
