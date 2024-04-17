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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);

    // Debugging output (remove this in production)
    echo "Username: $username<br>";
    echo "Book Name: $book_name<br>";

    // Calculate return time (10 days from borrow time)
    $borrow_time = date("Y-m-d H:i:s");
    $return_time = date("Y-m-d H:i:s", strtotime($borrow_time . " +10 days"));

    // Debugging output (remove this in production)
    echo "Borrow Time: $borrow_time<br>";
    echo "Return Time: $return_time<br>";
// Insert borrow information into the database
$sql = "INSERT INTO borrow_history (username, book_name, borrow_time, return_time) 
        VALUES ('$username', '$book_name', '$borrow_time', '$return_time')";

if (mysqli_query($conn, $sql)) {
    // Borrow information successfully inserted
    echo "Book borrowed successfully!";
    header("location: libhome.php");
} else {
    // Error inserting borrow information
    echo "Error inserting borrow information: " . mysqli_error($conn);
}

} else {
    echo "No data received from the form.";
}

// Close database connection
mysqli_close($conn);
?>
