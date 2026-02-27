<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "online_pharmacy";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo $conn->connect_error;
    exit;
}

// Prepare and bind SQL statement
if ($stmt = $conn->prepare("INSERT INTO order_table (items_id, user_id) VALUES (?, ?)")) {
    $stmt->bind_param("si", $dataString, $_SESSION['id']); // "si" for string and integer

    // Prepare data string
    $dataString = json_encode($_SESSION['cart']);

    // Execute and check if successful
    if ($stmt->execute()) {
        header("Location: ../shop.php?message=successful send order request.");
    } else {
        header("Location: ../shop.php?message=faild send order request.");
    }

    // Close statement
    $stmt->close();
} else {
    echo  $conn->error;
    
}

// Close connection
$conn->close();

// // Redirect to shop.php with the message
// header("Location: ../shop.php");
exit;
?>
