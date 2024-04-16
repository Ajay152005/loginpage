<?php
session_start();

$db_host = "localhost";
$db_user = "ajay";
$db_password = "ajay15";
$db_name = "ajay";

// Connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);

    // Calculate return time (10 days from borrow time)
    $borrow_time = date("Y-m-d H:i:s");
    $return_time = date("Y-m-d H:i:s", strtotime($borrow_time . " +10 days"));

    // Insert borrow information into the database
    $sql = "INSERT INTO borrow_history (username, book_name, borrow_time, return_time) 
            VALUES ('$username', '$book_name', '$borrow_time', '$return_time')";
    
    if (mysqli_query($conn, $sql)) {
        // Borrow information successfully inserted
        echo "Book borrowed successfully!";
    } else {
        echo "Error inserting borrow information: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
