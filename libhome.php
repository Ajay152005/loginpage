<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .category {
            margin-bottom: 30px;
        }

        .category-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .books-container {
            display: flex;
            overflow-x: auto; /* Enable horizontal scrolling */
        }

        .book-card {
    flex: 0 0 auto; /* Ensure equal size */
    width: 200px;
    margin-right: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
    overflow: hidden; /* Hide overflow content */
}

.book-cover {
    width: 100%;
    height: 250px; /* Fixed height for book cover */
    object-fit: cover; /* Maintain aspect ratio */
    border-radius: 5px 5px 0 0; /* Rounded corners for top */
}


        .book-details {
    padding: 10px;
    height: 120px; /* Fixed height for consistent alignment */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.book-title {
    font-weight: bold;
    margin-bottom: 5px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.book-author {
    color: #666;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.borrow-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
    box-sizing: border-box;
}

.borrow-button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Online Library</h1>
        
        <!-- Science category -->
        <div class="category">
            <h2 class="category-title">Science</h2>
            <div class="books-container">
                <!-- Slot for each book -->
                <!-- Slot for each book -->
                <div class="book-card">
                    <img src="science_book.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">a_brief_history_of_time</div>
                        <div class="book-author">stephen_hawking</div>
                        <button class="borrow-button" onclick="downloadPDF('stephen_hawking_a_brief_history_of_time.pdf')">Borrow</button>
                    </div>
                </div>
                <div class="book-card">
                    <img src="science_book1.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">The Selfish Gene</div>
                        <div class="book-author">Richard Dawkins</div>
                        <button class="borrow-button" onclick="downloadPDF('The Selfish Gene.pdf')">Borrow</button>
                    </div>
                </div>
                <div class="book-card">
                    <img src="science_book2.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">he Elegant Universe</div>
                        <div class="book-author">Brian Green</div>
                        <button class="borrow-button" onclick="downloadPDF('The Elegant Universe - Brian Green.pdf')">Borrow</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Fiction category -->
        <div class="category">
            <h2 class="category-title">Fiction</h2>
            <div class="books-container">
                <!-- Slot for each book -->
                <div class="book-card">
                    <img src="fiction1.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">1984</div>
                        <div class="book-author">Orwell</div>
                        <button class="borrow-button" onclick="downloadPDF('Orwell-1949 1984.pdf')">Borrow</button>
                    </div>
                </div>
                <div class="book-card">
                    <img src="fiction2.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">To Kill A Mockingbird</div>
                        <div class="book-author">Harper Lee</div>
                        <button class="borrow-button" onclick="downloadPDF('TKMFullText.pdf')">Borrow</button>
                    </div>
                </div>
                <div class="book-card">
                    <img src="fiction3.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">The Great Gatsby</div>
                        <div class="book-author">F. Scott Fitzgerald</div>
                        <button class="borrow-button" onclick="downloadPDF('Gatsby_PDF_FullText.pdf')">Borrow</button>
                    </div>
                </div>     
                
            </div>
        </div>

        <!-- History category -->
        <div class="category">
            <h2 class="category-title">History</h2>
            <div class="books-container">
                <!-- Slot for each book -->
                <!-- Slot for each book -->
                <div class="book-card">
                    <img src="history1.jpg" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">Guns Germs and Steel</div>
                        <div class="book-author">Jared Diamond</div>
                        <button class="borrow-button" onclick="downloadPDF('Jared_Diamond-Guns_Germs_and_Steel.pdf')">Borrow</button>
                    </div>
                </div>
                <div class="book-card">
                    <img src="history2.png" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">A People's History of the Unite</div>
                        <div class="book-author">Howard Zinn</div>
                        <button class="borrow-button" onclick="downloadPDF('A People\'s History of the Unite - Howard Zinn.pdf')">Borrow</button>
                    </div>
                </div>
                <div class="book-card">
                    <img src="history3.png" alt="Book Cover" class="book-cover">
                    <div class="book-details">
                        <div class="book-title">Sapiens A Brief History of Humankind</div>
                        <div class="book-author">Yuval Noah Harari</div>
                        <button class="borrow-button" onclick="downloadPDF('Sapiens-A-Brief-History-of-Humankind.pdf')">Borrow</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <script>
        function downloadPDF(pdfFileName) {
    // Create a temporary link element
    var link = document.createElement('a');
    link.href = pdfFileName; // Set the link's href attribute to the PDF file path
    link.download = pdfFileName.split('/').pop(); // Set the download attribute to the file name
    link.target = '_blank'; // Open the link in a new tab/window
    link.click(); // Programmatically click the link to trigger the download
}

        function borrowBook(username, bookName) {
            // Create a form element
            var form = document.createElement('form');
            form.action = 'borrow_book.php'; // Set the action attribute
            form.method = 'post'; // Set the method attribute

            // Create hidden input fields for username and book name
            var usernameInput = document.createElement('input');
            usernameInput.type = 'hidden';
            usernameInput.name = 'username';
            usernameInput.value = username;

            var bookNameInput = document.createElement('input');
            bookNameInput.type = 'hidden';
            bookNameInput.name = 'book_name';
            bookNameInput.value = bookName;

            // Append input fields to the form
            form.appendChild(usernameInput);
            form.appendChild(bookNameInput);

            // Append form to the document body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        }
    </script>
</body>
</html>
