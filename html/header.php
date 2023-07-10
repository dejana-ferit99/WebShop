<header>
<h1>Web Shop</h1>
<?php
    session_start();
    include 'db.php';
if (empty($_SESSION["shopping_cart"])) {
    $itemsInCart = 0;

} else {
    $itemsInCart = count($_SESSION['shopping_cart']);
}
?>

 <?php echo "<button id='cart-badge'> Proizvodi u košarici (" . $itemsInCart . ")</button>"; ?>

<div id="mini-cart-container" class="mini-cart">
<ul class="mini-cart__list">

<?php
foreach ($_SESSION["shopping_cart"] as $key => $item) {
    $productId = $item['id'];
    $productName = $item['name'];
    $productPrice = $item['price'];
    $productQuantity = $item['quantity'];
    $total = $productPrice * $productQuantity;
    
    echo '<li>';
    echo '<p>' . $productName . '</p>';
    echo '<p>' . $productPrice . 'x' . $productQuantity . '=' . $total . '</p>';

    echo '<button class="remove-from-cart" data-key="' . $key . '">Ukloni</button>';
    echo '<hr>';
    echo '</li>';
    

}
?>
</ul>

<a class="cart_page_link" href='cart.php'>Pogledaj košaricu</a>
</div>
</header>
