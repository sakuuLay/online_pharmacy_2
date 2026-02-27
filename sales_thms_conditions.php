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
    </style>
</head>

<body>
    <?php include './nav.php'; ?>

    <div class="container">
        <br>
        <h2>Sales Terms & Conditions</h2>
        <br><br><br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, eum. At, in! Maxime, amet assumenda. Voluptates,
            nobis ipsum exercitationem minus, atque fugiat quos ab repudiandae tempore similique fugit dolores nemo
            architecto modi aliquid. Praesentium natus qui quo laudantium ullam nemo ad, ratione odit voluptas quidem
            distinctio molestias sed itaque dolores.</p>
            <br>
    </div>

    <?php include './footer.php'; ?>





</body>

</html>