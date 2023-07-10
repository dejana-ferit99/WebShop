<?php
session_start();
include 'db.php';

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT * FROM products WHERE id = '$productId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $item = [
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'quantity' => $quantity
        ];

        if (isset($_SESSION['shopping_cart'])) {
            if (array_key_exists($productId, $_SESSION['shopping_cart'])) {
                $_SESSION['shopping_cart'][$productId]['quantity'] += $quantity;
            } else {
                $_SESSION['shopping_cart'][$productId] = $item;
            }
        } else {
            $_SESSION['shopping_cart'] = [$productId => $item];
        }

        $conn->close();

        $message = "Product added to cart successfully!";
        header("Location: product_page.php?id=$productId&message=$message");
        exit;
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}
?>