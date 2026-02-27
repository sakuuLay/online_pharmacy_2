<?php
session_start(); // Start the session

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $currentPassword = $_POST['currentpassword'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];
    
    

    if($newPassword != $confirmPassword) {
        // Handle passwords not matching
        header("Location: ../user_account.php?message=New passwords do not match");
        
    } else {
        // Password update successful
        // updating in the database
        
        header("Location: ../user_account.php?message=password updated successfully");

        // password in your database
        // For example, if you are using MySQL and have a users table:
        // Establish database connection (replace these with your actual database credentials)
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

        // Hash the new password
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Get the user ID from the session
        $userId = $_SESSION['id']; // Assuming you store the user's ID in the session

        // Prepare and execute the SQL query to update the password
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $newHashedPassword, $userId);

        if ($stmt->execute()) {
            // Redirect to another page after the update
            header("Location: ../user_account.php?message=password updated successfully");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            // Handle error
            header("Location: ../user_account.php?message=password updated unsuccessfully");
            exit(); // Ensure that subsequent code is not executed after redirection
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    }
}
?>