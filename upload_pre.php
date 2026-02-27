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



    #prev {
        left: 0;
    }

    #next {
        right: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        width: 100%;
        padding: 20px 120px;
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

    .item {
        display: flex;
        flex-direction: column;
        padding: 10px;
        width: 80%;
        font-size: 19px;
    }

    input {
        font-size: 14px;
        padding: 10px;
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

    button {
        background-color: black;
        color: white;
        font-size: 20px;
        padding: 10px 30px;
        font-weight: bold;
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
        <div style="display: flex;align-items: start;">
            <div style="flex: 50%; padding-top: 120px;">
                <h2>Save time by refilling your prescription online
                    and skip the wait.</h2>
                <br>
                <img style="width:80%;"
                    src="https://www.summahealth.org/-/media/project/summahealth/website/page-content/pharmacy/beyondprescriptions-1098323548.jpg?la=en&h=600&w=800&hash=FB569AD547858A1F45E02CFAC185DF2A"
                    alt="lost image">
                <br><br>
                <h2>How it works?</h2>
                <br>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque, iure! Doloribus magnam quos
                    harum consequatur incidunt consectetur odit modi quis!</p>
            </div>
            <div style="flex: 50%; padding-top: 60px;">
                <form action="./action/upload_pre.php" method="post" enctype="multipart/form-data"
                    onsubmit="return validateForm()">
                    <div class="item">
                        <label for="prescription_image">Prescription Image</label>
                        <input type="file" name="prescription_image" id="prescription_image">
                    </div>
                    <div class="item">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="item">
                        <label for="phonenumber">Phone Number</label>
                        <input type="text" name="phonenumber" id="phonenumber">
                    </div>
                    <div class="item">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div class="item">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="item">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="gender">
                    </div>
                    <div class="item">
                        <label for="paymentmethod">Payment Method</label>
                        <input type="text" name="paymentmethod" id="paymentmethod">
                    </div>
                    <div class="item">
                        <label for="duration">Duration</label>
                        <input type="text" name="duration" id="duration">
                    </div>
                    <div class="item">
                        <label for="allergies">Allergies</label>
                        <input type="text" name="allergies" id="allergies">
                    </div>
                    <div class="item">
                        <label for="specialnotes">Special Notes</label>
                        <input type="text" name="specialnotes" id="specialnotes">
                    </div>
                    <br>
                    <button style="magin-left:20px;" type="submit">Upload</button>
                </form>
            </div>
        </div>

    </div>

    <?php include './footer.php'; ?>

    <script>
    function validateForm() {
        let name = document.getElementById('name').value;
        let phoneNumber = document.getElementById('phonenumber').value;
        let email = document.getElementById('email').value;
        let address = document.getElementById('address').value;

        if (name.trim() === "") {
            alert("Name is required.");
            return false;
        }

        if (phoneNumber.trim() === "") {
            alert("Phone number is required.");
            return false;
        } else if (!/^\d{10}$/.test(phoneNumber)) { // Simple validation for a 10-digit phone number
            alert("Please enter a valid 10-digit phone number.");
            return false;
        }

        if (email.trim() === "") {
            alert("Email is required.");
            return false;
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (address.trim() === "") {
            alert("Address is required.");
            return false;
        }

        return true; // Return true if all validations pass
    }
    </script>


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