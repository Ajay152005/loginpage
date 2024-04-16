<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User not logged in, redirect to login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
</body>
</html>
