<?php
session_start();
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

    a {
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
        padding: 0px 100px;
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
    }

    .items img {
        width: 100%;
    }

    .card_item {
        width: 200px;
        margin: 20px;
    }

    #search {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 8px;
        margin-bottom: 10px;
        width: 100%;
        max-width: 300px;
        /* Adjust width as needed */
        box-sizing: border-box;
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

<script>
    function addToCart(itemId) {
    // Send an AJAX request to a PHP script to add the item to the cart
    // Here you can use either XMLHttpRequest or fetch API

    // Example using fetch:
    fetch('add_to_cart.php?id=' + itemId)
        .then(response => {
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

</script>
</head>

<body>
    <?php include './nav.php'; ?>


    <?php
    if (isset($_GET['message'])) {
        echo "<div class='toast show'>{$_GET['message']}</div>";
    }
    ?>

    <div class="container">
        <br>
        <div style="display: flex; align-items: center; justify-content: space-around; width: 100%;">
            <h2>Select from a wide variety of quality brands</h2>
           
        </div>
        <br>
        <div style="display: flex; align-items: start; gap: 20px;">
            <div class="items"
                style="flex: 90%; display: flex; align-items: start; justify-content:center; flex-wrap: wrap; gap: 20px; ">

                <?php
                // Database connection
                $servername = "localhost";
                $username = "root"; // Change this to your database username
                $password = ""; // Change this to your database password
                $dbname = "online_pharmacy"; // Change this to your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch products from the database
                $sql = "SELECT * FROM ShopItems";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card_item">
                        <img src="' . $row["image_url"] . '" alt="Product Image">
                        <h2>' . $row["name"] . '</h2>
                        <p>' . $row["description"] . '</p>
                        <button onclick="addToCart(' . $row["id"] . ')">Add to Cart</button>
                        </div>';
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>

            </div>
        </div>
    </div>

    <?php include './footer.php'; ?>



    




</body>

</html>