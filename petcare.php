<?php
session_start();
?>
<?php

// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "online_pharmacy"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online pharmacy</title>
    <link rel="stylesheet" href="./nav.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        margin: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    /* slider  */
    .slider {
        position: relative;
        width: 100%;
        max-width: 750px;
        margin: auto;
        margin-top: 40px;
        margin-bottom: 20px;

    }

    .slide {
        width: 100%;
        display: none;
    }

    .btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: #f1f1f1;
        border: none;
        cursor: pointer;
        padding: 10px;
        margin-top: -22px;
        color: black;
    }



    #prev {
        left: 0;
    }

    #next {
        right: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        padding: 0px 120px;
    }

    footer {
        background-color: aliceblue;
        display: flex;
        justify-content: space-around;
        min-height: 300px;
        padding: 40px;
        margin-top: 50px;
    }

    .nav_search {
        border-radius: 28px;
        height: 40px;
        padding: 10px;
    }

    .form_container {
        display: flex;
        align-items: center;
        background-color: #f1f1f1;
        width: 100%;
        margin: 40px;
        padding: 40px;
    }

    .login_form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .form_item {
        display: flex;
        flex-direction: column;
        width: 100%;

    }

    input {
        font-size: 14px;
        padding: 10px;
    }

    button {
        background-color: black;
        color: white;
        font-size: 20px;
        padding: 10px 30px;
        font-weight: bold;
    }




    .toast {
        background-color: darkred;
        color: white;
        padding: 14px;
        position: fixed;
        top: 16%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: none;
        /* Initially hidden */
    }

    .toast.show {
        display: block;
        animation: fadeInOut 2s forwards;
    }
    .item_list{
        display: flex;
        align-items:start;
        flex-wrap: wrap;
        

    }
    .item{
        width: 200px;
        background: white;
        margin: 20px;
        border: 1px solid black;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .cart_image{
        width: 80%;
    }

    @keyframes fadeInOut {

        0%,
        100% {
            opacity: 0;
        }

        10%,
        90% {
            opacity: 1;
        }
        
    }
    </style>
</head>

<body>

    <?php include './nav.php'; ?>

    <?php
    if (isset($_GET['message'])) {
        echo "<div class='toast show'>{$_GET['message']}</div>";
    }
    ?>

    <div class="container">
        <br><br>
        <h2>Pet Care</h2>
        <br><br>
        <div class="item_list">
        <?php
            // Fetch data from database
            $sql = "SELECT * FROM pet_items";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    
                    echo "<div class='item'>";
                    echo "<img class='cart_image' src='{$row['image']}' alt='{$row['name']}'>";
                    echo "<h3>{$row['name']}</h3>";
                    echo "<p>{$row['description']}</p>";
                    echo "<p>Price: {$row['price']}</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>




    </div>

    <?php include './footer.php'; ?>



    <script>
    let slideIndex = 0;
    showSlide(slideIndex);

    function changeSlide(n) {
        slideIndex += n;
        showSlide(slideIndex);
    }

    function showSlide(n) {
        let i;
        const slides = document.getElementsByClassName("slide");
        if (n >= slides.length) slideIndex = 0;
        if (n < 0) slideIndex = slides.length - 1;

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex].style.display = "block";
    }
    </script>

</body>

</html>