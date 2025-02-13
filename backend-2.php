<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "id22139626_lsam01";
$password = "Lsam...@@@28"; // Check your XAMPP settings for the correct password
$dbname = "id22139626_cybersec";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and perform data validation
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $service = mysqli_real_escape_string($conn, $_POST['services']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
    $timeframe = mysqli_real_escape_string($conn, $_POST['timeframe']);
    $additionalInformation = mysqli_real_escape_string($conn, $_POST['additionalInformation']);

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO Portfolio (Name, Email, Service, Budget, TimeFrame, AdditionalInfo) VALUES ('$name', '$email', '$service', '$budget', '$timeframe', '$additionalInformation')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully

        // Send email notification
        $to = "lakshan.sam28@gmail.com"; // Your email address
        $subject = "New Form Submission";
        $message = "A new form has been submitted:\n\nName: $name\nEmail: $email\nService: $service\nBudget: $budget\nTimeframe: $timeframe\nAdditional Information: $additionalInformation";
        $headers = "From: lakshan.sam28@gmail.com"; // Sender's email address

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            // Email sent successfully
            header("Location: confirmation.php"); // Redirect to confirmation page
            exit();
        } else {
            // Error occurred while sending email
            echo "Error: Unable to send email.";
        }
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>