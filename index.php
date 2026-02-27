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
        .nav_search{
            border-radius: 28px;
            height: 40px;
            padding: 10px;
        }
        
    </style>
</head>

<body>
    
    <?php include './nav.php'; ?>

    <div class="container">
        <div class="slider">
            <img src="https://assets-global.website-files.com/5f62665342c50cb6bf43a1e6/6463b058fae8806d54b1de4c_AdobeStock_132398792-min.jpeg" alt="" class="slide"
                style="display: block;" />
            <img src="https://www.yourlocalpharmacy.com.au/wp-content/uploads/2018/11/Range-Shot-2.jpg" alt=""
                class="slide">
            <img src="https://qcarepharmacy.com//wp-content/uploads/sites/3/2019/09/brands.jpg"
                alt="" class="slide">
            <button class="btn" id="prev" onclick="changeSlide(-1)">❮ Prev</button>
            <button class="btn" id="next" onclick="changeSlide(1)">Next ❯</button>
        </div>
        <h2>Welcome to Store</h2>
        <br>
        <p>Lorem SS ipsum dolor sit amet consectetur adipisicing elit. Dolores, amet dolorum voluptatibus numquam nemo
            aliquam itaque eligendi magni ex ad earum aperiam voluptates. Accusantium dolorum doloribus ipsa similique
            inventore earum itaque neque culpa assumenda provident consectetur reprehenderit porro, minima cumque ipsum
            enim fugit quas corporis. Quo tempora nesciunt impedit quas!</p>

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