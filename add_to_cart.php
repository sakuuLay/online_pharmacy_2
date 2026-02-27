<?php
session_start();

// Assuming $_GET['id'] contains the product ID
$productId = $_GET['id'];

// Add product to cart session variable
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $productId);



// Redirect back to the previous page or wherever you want
header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=Item added to cart');
?>
