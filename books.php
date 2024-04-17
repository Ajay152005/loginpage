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

// Insert data into the 'books' table for each book
$books = array(
    // Science category
    array("a_brief_history_of_time", "Stephen Hawking", "Science"),
    array("The Selfish Gene", "Richard Dawkins", "Science"),
    array("The Elegant Universe", "Brian Green", "Science"),

    // Fiction category
    array("1984", "Orwell", "Fiction"),
    array("To Kill A Mockingbird", "Harper Lee", "Fiction"),
    array("The Great Gatsby", "F. Scott Fitzgerald", "Fiction"),

    // History category
    array("Guns Germs and Steel", "Jared Diamond", "History"),
    array("A People's History of the United States", "Howard Zinn", "History"),
    array("Sapiens A Brief History of Humankind", "Yuval Noah Harari", "History")
);

// Insert each book into the 'books' table
foreach ($books as $book) {
    $bookname = mysqli_real_escape_string($conn, $book[0]);
    $author = mysqli_real_escape_string($conn, $book[1]);
    $category = mysqli_real_escape_string($conn, $book[2]);

    $sql = "INSERT INTO books (bookname, author, category) VALUES ('$bookname', '$author', '$category')";

    if (mysqli_query($conn, $sql)) {
        echo "Book inserted successfully: $bookname<br>";
    } else {
        echo "Error inserting book: " . mysqli_error($conn) . "<br>";
    }
}

// Close database connection
mysqli_close($conn);
?>
