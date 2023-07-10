<?php
session_start();
if(isset($_SESSION["cart"])){
    $cart_count = count($_SESSION["cart"]);
} else {
    $cart_count = 0;
}
echo $cart_count;
?>
