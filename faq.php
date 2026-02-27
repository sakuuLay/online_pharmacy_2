<?php
session_start();
?>
<?php
// Dummy FAQ data (replace this with your actual data)
$faqEntries = array(
    array(
        "question" => "What medications are available for purchase?",
        "answer" => "Our online pharmacy offers a wide range of medications for various health conditions, including but not limited to antibiotics, pain relievers, allergy medications, and more."
    ),
    array(
        "question" => "How can I place an order?",
        "answer" => "Placing an order is simple. Just browse our website, select the medications you need, add them to your cart, and proceed to checkout. Follow the instructions to complete your purchase."
    ),
    array(
        "question" => "Is a prescription required to buy medications?",
        "answer" => "The requirement for a prescription depends on the medication and your location. Some medications may require a valid prescription from a healthcare professional, while others may be available over-the-counter."
    ),
    array(
        "question" => "How long does shipping take?",
        "answer" => "Shipping times vary depending on your location and the shipping method chosen. We strive to process orders promptly, and delivery times typically range from a few days to a couple of weeks."
    ),
    // Add more FAQ entries as needed
);


// Search functionality
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $filteredEntries = array_filter($faqEntries, function ($entry) use ($search) {
        return stripos($entry['question'], $search) !== false || stripos($entry['answer'], $search) !== false;
    });
} else {
    // If search term is not provided, display all entries
    $filteredEntries = $faqEntries;
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

        .form_container{
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php include './nav.php'; ?>

    <div class="container">
        <br>
        <h2>FAQ! Need Help ??</h2>
        <br>
        <!-- Search form -->
        <form method="GET" action="">
                <div style="display: flex; gap: 20px; width: 650px;">
                    <input name="search" style="width: 100%; font-size: 20px; padding: 10px; border-radius: 28px;" type="text" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button style="border-radius: 28px; width: 120px;">Search</button>
                </div>
            </form>
            <br>
            <!-- Display filtered FAQ entries -->
            <div class="search_list">
                <?php if (!empty($filteredEntries)) : ?>
                    <?php foreach ($filteredEntries as $entry) : ?>
                        <div class="search_item" style="display: flex; border: 1px solid black; width: 650px; padding: 20px; margin: 10px;">
                            <div style="flex: 20%; font-size: 40px;">Q</div>
                            <div style="flex: 80%;"><?php echo $entry['question']; ?></div>
                        </div>
                        <div class="search_item" style="display: flex; border: 1px solid black; width: 650px; padding: 20px; margin: 10px;">
                            <div style="flex: 20%; font-size: 40px;">A</div>
                            <div style="flex: 80%;"><?php echo $entry['answer']; ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No results found.</p>
                <?php endif; ?>
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