<?php
session_start();

$db_host = "localhost:3307";
$db_user = "ajay";
$db_password = "ajay15";
$db_name = "ajay";

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// Check if passwords match
if ($password !== $confirm_password) {
    echo "Passwords do not match";
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check for existing username
    $sql_check = "SELECT * FROM users WHERE username = '$username'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Username already exists";
    } else {
        // Prepare and execute insert query
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful! Please login.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
