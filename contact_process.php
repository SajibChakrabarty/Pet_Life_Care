<?php
// Define database connection parameters
$hostname = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "contact_form_db"; // Change this to the name of your database

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the connection is successful, you can proceed with inserting form data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $number = $conn->real_escape_string($_POST['number']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    
    // Insert form data into the database
    $sql = "INSERT INTO contact_submissions (name, number, email, subject, message) VALUES ('$name', '$number', '$email', '$subject', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<h1>New record created successfully</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
