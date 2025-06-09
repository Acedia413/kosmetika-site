
<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header("Location: login.html");
    exit;
}

$product = $_GET['product'] ?? '';
$image = $_GET['image'] ?? '';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$product])) {
    $_SESSION['cart'][$product]['quantity'] += 1;
} else {
    $_SESSION['cart'][$product] = [
        'quantity' => 1,
        'image' => $image
    ];
}

header("Location: order_summary.php");
exit;
?>
