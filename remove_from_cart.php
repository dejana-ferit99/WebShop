<?php
session_start();

if (isset($_POST['key'])) {
    $key = $_POST['key'];

    if (isset($_SESSION["shopping_cart"][$key])) {
        unset($_SESSION["shopping_cart"][$key]);
        if (!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        } else {
            $cart_count = 0;
        }
        echo $cart_count;
    } else {
        echo 'error';
    }
}
?>
