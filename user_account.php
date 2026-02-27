<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_pharmacy";

$id=$_SESSION['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$sql = "SELECT * FROM users WHERE id = $id"; // Assuming user ID 1 for demo purposes, you should adjust this query accordingly
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
}
$conn->close();
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
    }

    .item {
        display: flex;
        flex-direction: column;
        padding: 10px;
        font-size: 19px;
        width: 400px;
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

    .order_items {
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 3px;
    }

    .order_items>.item {
        display: flex;
        font-size: 13px;
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
        <div style="display: flex; width: 100%; align-items: center; justify-content: center;gap: 40px;">
            <div>
                <div class="item">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $row['fname'] ." " .  $row['lname'] ?>" id="name">
                </div>
                <div class="item">
                    <label for="address">district</label>
                    <input type="text" name="address" value="<?php echo $row['district']  ?>" id="address">
                </div>
                <div class="item">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email']  ?>" id="email">
                </div>
                <div class="item">
                    <label for="birthday">birthday</label>
                    <input type="text" name="birthday" value="<?php echo $row['birthday']  ?>" id="birthday">
                </div>
            </div>
            <div>
                <form action="./action/update_password.php" method="post" onsubmit="return validatePasswordForm()">

                    <div class="item">
                        <label for="npassword">Current Password</label>
                        <input type="text" name="currentpassword" id="npassword">
                    </div>
                    <div class="item">
                        <label for="npassword">New Password</label>
                        <input type="text" name="newpassword" id="npassword">
                    </div>
                    <div class="item">
                        <label for="cpassword">Cofirm Password</label>
                        <input type="text" name="confirmpassword" id="cpassword">
                    </div>
                    <br>

                    <button>submit</button>
                    <br><br>
                </form>
                <hr>
                <br><br>

                <a href="./action/logout.php"><button>Logout</button></a>

            </div>
            <div>
                <h2>Orders</h2>
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
                $sql = "SELECT * FROM order_table where user_id= $id ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="order_items">';
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="item">
                            <h2> Order (ID: ' . $row["id"] . ')</h2>
                            <a href="./action/delete_order.php?id=' . $row['id'] . '"><button>Cancel Order</button></a>
                        </div>';   
                    }
                    echo '</div>';
                } else {
                    echo "0 results";
                }
                

                $conn->close();
                ?>
            </div>
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

    <script>
    function validatePasswordForm() {
        let currentPassword = document.getElementById('npassword').value;
        let newPassword = document.getElementById('npassword').value;
        let confirmPassword = document.getElementById('cpassword').value;

        if (!currentPassword || !newPassword || !confirmPassword) {
            alert('All password fields must be filled out');
            return false;
        }

        if (newPassword !== confirmPassword) {
            alert('New Password and Confirm Password do not match');
            return false;
        }

        if (newPassword.length < 6) {
            alert('Password must have at least 6 characters');
            return false;
        }

        return true;
    }
    </script>


</body>

</html>