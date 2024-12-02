<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    /* Add this to your CSS file or inside a <style> tag */
body {
    transition: background-color 1s ease; /* Smooth background color change */
}

.alert {
    display: none;
    transition: opacity 1s ease-out; /* Smooth fade-in for alerts */
}

</style>

</html>

<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        die("SQL Error: " . $conn->error); // Display SQL error
    }

    // Bind parameters and execute
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Fetch result
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password_hash'])) {
            echo "<script>
                // alert('Login successful! Welcome');
                // document.body.style.transition = 'background-color 1s ease'; 
                // document.body.style.backgroundColor = '#FFB6C1'; // Green background for success
                location.href = 'interface.html';
                // setTimeout(function() {
                //     location.href = 'interface.html'; // Smooth transition to another page
                // }, 300); // Wait 1 second before redirect
            </script>";
        } else {
            echo "<script>
                alert('Invalid password.');
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelector('#password').value = '';
                });
            </script>";
        }
    } else {
        echo "<script>
            alert('No user found with this email.');
        </script>";
    }

    $stmt->close();
}
?>









<?php
/*include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        die("SQL Error: " . $conn->error); // Display SQL error
    }

    // Bind parameters and execute
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Fetch result
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password_hash'])) {
            echo "<script>
            alert('Login successful! Welcome');
            location.href = 'interface.html';
        </script>";
            
            // "Login successful! Welcome, " . htmlspecialchars($user['username']);
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }

    $stmt->close();
}*/
?>
