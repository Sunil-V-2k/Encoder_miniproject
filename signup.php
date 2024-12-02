<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user details into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        // Display a success message and redirect using JavaScript
        echo "<script>
            alert('Signup successful!');
            window.location.href = 'loginpage.html';
        </script>";
        exit(); // Ensure no further PHP code is executed
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
