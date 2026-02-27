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
            padding: 0px 120px;
            height: 48vh;
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
        .item{
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 10px;
            font-size: 19px;
        }
    </style>
</head>

<body>
    
    <?php include './nav.php'; ?>


    <div class="container">
        <div style=" height: 89vh; width: 100%;display: flex;align-items: center;justify-content: center;gap: 40px;">
            <div style="padding: 40px;">
                <h2>Follow Us</h2>
                <br>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/facebook-new.png" alt="facebook-new"/>
                    <p>My care health center</p>
                </div>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <p>My care health center</p>
                </div>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/twitterx--v2.png" alt="twitterx--v2"/>
                    <p>My care health center</p>
                </div>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <p>Visit : My care.lk</p>
                </div>
                
                
                
            </div>
            <div style="padding: 40px;">
                <h2>Contact Us</h2>
                <br>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material-sharp/24/phone-disconnected.png" alt="phone-disconnected"/>
                    <p>Visit : My care.lk</p>
                </div>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <p>Colombo branch : 055-563 4873</p>
                </div>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <p>Kandy branch : 055-365 4582</p>
                </div>
                <br>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <h2>Visit Us</h2>
                <div class="item">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/instagram-new--v1.png" alt="instagram-new--v1"/>
                    <p>Kandy branch : 055-365 4582</p>
                </div>
               
            </div>
            
        </div>
        <br><br>

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