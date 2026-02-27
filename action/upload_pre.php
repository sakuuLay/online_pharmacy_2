<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
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

    // Handle image upload
    if (isset($_FILES["prescription_image"]) && $_FILES["prescription_image"]["error"] == 0) {
        // File upload configuration
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["prescription_image"]["name"]);

        // Check if file already exists
        if (file_exists($target_file)) {
            header("Location: ../upload_pre.php?message=Sorry, file already exists");
        } else {
            // Validate and sanitize other form inputs
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $phonenumber = isset($_POST["phonenumber"]) ? $_POST["phonenumber"] : "";
            $address = isset($_POST["address"]) ? $_POST["address"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $paymentmethod = isset($_POST["paymentmethod"]) ? $_POST["paymentmethod"] : "";
            $duration = isset($_POST["duration"]) ? $_POST["duration"] : "";
            $allergies = isset($_POST["allergies"]) ? $_POST["allergies"] : "";
            $specialnotes = isset($_POST["specialnotes"]) ? $_POST["specialnotes"] : "";

            // Move uploaded file to target location
            if (move_uploaded_file($_FILES["prescription_image"]["tmp_name"], $target_file)) {
                // Image uploaded successfully, now insert data into database
                $sql = $conn->prepare("INSERT INTO prescriptions (prescription_image, name, phonenumber, address, email, gender, paymentmethod, duration, allergies, specialnotes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $sql->bind_param("ssssssssss", $target_file, $name, $phonenumber, $address, $email, $gender, $paymentmethod, $duration, $allergies, $specialnotes);
                
                if ($sql->execute()) {
                    header("Location: ../upload_pre.php?message=New record created successfully");
                } else {
                    header("Location: ../upload_pre.php?message=New record created faild");
                }
            } else {
                header("Location: ../upload_pre.php?message=New record created faild");
            }
        }
    } else {
        header("Location: ../upload_pre.php?message=No file was uploaded.");
    }

    $conn->close(); // Close connection
}
?>
