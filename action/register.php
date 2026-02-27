<?php
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'online_pharmacy'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $birthday = $conn->real_escape_string($_POST['birthday']);
    $district = $conn->real_escape_string($_POST['district']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    // Password confirmation
    if ($password !== $confirm_password) {
        header("Location: ../login.php?message=password not match!");
    } else {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, birthday, district, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fname, $lname, $birthday, $district, $email, $password_hash);
        
        if ($stmt->execute()) {
            header("Location: ../login.php?message=Registered successfully!");
        } else {
            header("Location: ../login.php?message=Registered faild!");
        }
        $stmt->close();
    }
}

$conn->close();
?>
