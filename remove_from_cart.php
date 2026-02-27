<?php
session_start();

$productId = $_GET['id'];

// Remove product from cart session variable
if (($key = array_search($productId, $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
}

// Redirect back to the previous page or wherever you want
header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=Item removed from cart');
?>
