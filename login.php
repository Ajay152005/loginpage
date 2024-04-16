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

$sql = "SELECT * FROM users WHERE username = '".$username."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User found, check password
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    if (password_verify($password, $hashed_password)) {
        // Password matches, start session and redirect to welcome page
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "No user found with that username";
}

mysqli_close($conn);
?>
