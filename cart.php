<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Include your CSS and JavaScript files -->
</head>
<body>
    <?php include './nav.php'; ?>
    
    <div class="container">
        <h2>Cart Items</h2>
        <div class="cart-items">
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $productId): ?>
                    <?php
                    // Fetch product details from the database using $productId
                    // Replace this with your database query to fetch product details
                    $sql = "SELECT * FROM ShopItems WHERE id = $productId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                    ?>
                        <div class="cart-item">
                            <img src="<?php echo $row['image_url']; ?>" alt="Product Image">
                            <h3><?php echo $row['name']; ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <button onclick="removeFromCart(<?php echo $productId; ?>)">Remove</button>
                        </div>
                    <?php
                    } else {
                        echo "Product not found!";
                    }
                    ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No items in the cart</p>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include './footer.php'; ?>

    <script>
        function removeFromCart(itemId) {
            // Send an AJAX request to remove the item from the cart
            // Example using fetch:
            fetch('remove_from_cart.php?id=' + itemId)
                .then(response => {
                    // Reload the page or update the cart section
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</body>
</html>
