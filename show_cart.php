<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>
<?php


// Function to fetch item details from the database
function fetchItemDetails($itemId) {
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
    $stmt = $conn->prepare("SELECT id, name, description, image_url FROM shopitems WHERE id = ?");
    $stmt->bind_param("i", $itemId);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch data
    $item = $result->fetch_assoc();
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
    
    return $item;
}

if(isset($_SESSION['cart'])){
    // Fetch item details for each item in the cart
    $cartItems = $_SESSION['cart'];
    $cartItemsDetails = array();

    foreach ($cartItems as $itemId) {
        // Fetch item details from the database
        $itemDetails = fetchItemDetails($itemId);
        
        // Add item details to the array
        if ($itemDetails) {
            $cartItemsDetails[] = $itemDetails;
        }
    }
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
    
    .cart_item{
        width: 250px;
        margin:40px;
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
        function removeFromCart(itemId) {
    // Send an AJAX request to a PHP script to remove the item from the cart
    // Example using fetch:
    fetch('remove_from_cart.php?id=' + itemId)
        .then(response => {
            // Handle response if needed
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
    <h1>Cart</h1>
    <br><br>
    <div class="items" style="flex: 90%; display: flex; align-items: start; justify-content:center; flex-wrap: wrap; gap: 20px; ">
        <?php
        if(isset($_SESSION['cart'])){
            foreach ($cartItemsDetails as $item) {
                echo '<div class="cart_item">
                        <img  class="item_imag" src="' . $item["image_url"] . '" alt="' . $item["name"] . '">
                        <h2>' . $item["name"] . '</h2>
                        <p>' . $item["description"] . '</p>
                        <button onclick="removeFromCart(' . $item["id"] . ')">Remove from Cart</button>
                    </div>';
            }
        }
        ?>
    </div>
    <a href="./action/order.php"><button>Order Now</button></a>
    </div>

    <?php include './footer.php'; ?>



    




</body>

</html>