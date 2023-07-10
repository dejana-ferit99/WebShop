<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];
    $quantity = $_POST['quantity'];

    $_SESSION['shopping_cart'][$key]['quantity'] = $quantity;

    $totalQuantity = 0;
    $totalAmount = 0;

    foreach ($_SESSION['shopping_cart'] as $item) {
        $productPrice = $item['price'];
        $productQuantity = $item['quantity'];
        $totalQuantity += $productQuantity;
        $totalAmount += $productPrice * $productQuantity;
    }
    
    $response = [
        'totalQuantity' => $totalQuantity,
        'totalAmount' => $totalAmount
    ];

    echo json_encode($response);
}
?>
