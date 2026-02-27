<nav>
    <div class="top_nav">
        <div><b>Hotline - +94 77 88 444 22</b></div>
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo    '<div style="display: flex; align-items: center">' . $_SESSION['email'] . '&nbsp;<a href="user_account.php"> <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/user-male-circle.png" alt="user-male-circle"/> </a> </div>';
            }else{
                echo '
                <div style="disply:flex ; gap:20px">
                    <a class="white" href="login.php">Login &nbsp; </a>
                    <a class="white" href="registration.php"> Register</a>
                </div>';
            }

        ?>
    </div>
    <div class="nav_main">
        <img width="30" height="30" src="https://static.vecteezy.com/system/resources/previews/010/960/131/original/pharmacy-logo-vector.jpg" alt="logo" />
        <input class="nav_search" style="width: 600px;" type="text" placeholder="search product">
        <a href="show_cart.php">
        <div style="display: flex;flex-direction: column; align-items: center;">
            <img width="30" height="30" src="https://img.icons8.com/fluency/48/shopping-cart.png" alt="shopping-cart" />
            <h3>cartItems</h3>
        </div>
        </a>
        <a href="./upload_pre.php" style="display: flex;flex-direction: column; align-items: center;">
            <img width="30" height="30" src="https://img.icons8.com/parakeet/48/upload.png" alt="upload" />
            <h3>upload prescription</h3>
        </a>

    </div>
    <div class="nav_link">
        <a href="index.php">Home</a>
        <a href="product.php">Products</a>
        <a href="shop.php">Shop</a>
        <a href="contactus.php">Contact Us</a>
        <a href="faq.php">FAQ</a>
    </div>
</nav>