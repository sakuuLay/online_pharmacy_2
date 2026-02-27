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

        .form_container {
            display: flex;
            align-items: center;
            background-color: #f1f1f1;
            width: 100%;
            margin: 40px;
            padding: 40px;
        }
        .login_form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .form_item{
            display: flex;
            flex-direction: column;
            width: 100%;

        }
        input{
            font-size: 14px;
            padding: 10px;
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

        .container{
            width: 80%;
            height: 60vh;
            display: flex;
            margin: auto;
            align-items: center;
            justify-content: space-around;
        }

        .citems{
            width: 200px;
            padding: 40px;
            background-color: black;
            color:white;
            margin:40px;
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
        <div>
        <a href="Mother&BabyCare.php"><div class="citems">Mother BabyCare</div></a>
        <a href="kidscare.php"><div class="citems">Pet Care</div></a>
        <a href="petcare.php"><div class="citems">Kids Care</div></a>
    </div>


        
    </div>

    <?php include './footer.php'; ?>



    

</body>

</html>