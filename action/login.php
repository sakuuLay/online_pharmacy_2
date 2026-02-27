<?php
session_start(); // Start a new session or resume the existing one

$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'online_pharmacy'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    header("Location: ../login.php?message=login faild try agen!");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign POST values to variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a select statement
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        // Set parameters
        $param_email = $email;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            
            // Check if email exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['email'] = $email;

                        // Redirect user to welcome page
                        header("Location: ../user_account.php");
                    } else {
                        // Display an error message if password is not valid
                        header("location: ../login.php?message=Password is not valid.");
                    }
                }
            } else {
                // Display an error message if email doesn't exist
                header("location: ../login.php?message=No account found with that email.");
            }
        } else {
            header("location: ../login.php?message=Oops! Something went wrong. Please try again later.");
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // Form is not submitted via POST
    header("location: ../login.php?message=Please submit the form to login.");
}
?>
