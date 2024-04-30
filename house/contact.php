<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "your_username"; // Replace with your database username
    $password = "your_password"; // Replace with your database password
    $dbname = "your_database"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO messages (sender_name, sender_email, message_subject, message_body) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $senderName, $senderEmail, $messageSubject, $messageBody);

    // Set parameters and execute
    $senderName = $_POST["senderName"];
    $senderEmail = $_POST["senderEmail"];
    $messageSubject = $_POST["messageSubject"];
    $messageBody = $_POST["messageBody"];

    if ($stmt->execute()) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
