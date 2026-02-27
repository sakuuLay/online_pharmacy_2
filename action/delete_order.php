<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_pharmacy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$stmt = $conn->prepare("DELETE FROM order_table WHERE id = ?;");
$stmt->bind_param("i", $_GET['id']);

// Execute the statement
if($stmt->execute()){

    header("Location: ../user_account.php?message=successful order deleted");
} else {

    header("Location: ../user_account.php?message=faild order deleted.");
}

// Get the result
$result = $stmt->get_result();



// Close statement and connection
$stmt->close();
$conn->close();


?>