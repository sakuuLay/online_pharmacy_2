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

        form {
            background-color: #f1f1f1;
            padding: 40px;
        }

        .form_item {
            width: 40%;
            display: flex;
            justify-content: space-between;
            display: flex;
            flex-direction: column;

        }
        input{
            font-size: 12px;
            padding: 10px;
            width: 100%;
        }
        button{
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
        <form action="./action/register.php" method="post">
            <h2>Register</h2>
            <br>
            <div style="display: flex; align-items: center;justify-content: space-between;">
                <div style="flex: 80%;">
                    <div style="display: flex; flex-wrap: wrap;gap: 20px;">
                        <div class="form_item">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname">
                        </div>
                        <div class="form_item">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname">
                        </div>
                        <div class="form_item">
                            <label for="birthday">Birthday</label>
                            <input type="date" name="birthday" id="birthday">
                        </div>
                        <div class="form_item">
                            <label for="district">District *</label>
                            <input type="text" name="district" id="district">
                        </div>
                        <div class="form_item">
                            <label for="email">Email address *</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="form_item">
                            <label for="password">Password *</label>
                            <input type="text" name="password" id="password">
                        </div>
                        <div class="form_item">
                            <label for="confirm_password">Confired password *</label>
                            <input type="text" name="confirm_password" id="confirm_password">
                        </div>
                    </div>
                </div>
                <div style="flex: 20%;">
                    <img style="width:100%;" src="https://renuerx.com/wp-content/uploads/2021/12/renue-rx-Do-You-Know-Your-Community-Pharmacist-The-Role-Of-A-Pharmacist.jpg" alt="image is missing">
                </div>
            </div>
            <br>

            <h4>Your personal data will be used to support your experience throughout this website,
                to Xcess to your account, and for other in our</h4>
            <br>
            <button type="submit">REGISTER</button>
        </form>
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