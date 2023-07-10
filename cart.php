<!DOCTYPE html>
<html>
<?php include('html/head.html'); ?>
<body>
    <div class="shopping-cart">
       <h1>Shopping Cart</h1> 
    </div>
    
    <div class="back-button">
    <button  class="go_back_button" onclick="goToIndex()">Natrag</button>
  </div>
    <div class="cart_container">
        <?php
        session_start();
        include 'db.php';
        ?>
        <div class="items-in-cart">
            <?php if (!empty($_SESSION["shopping_cart"])) {
                echo '<table class="cart-table">';
                echo '<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>';
                
                foreach ($_SESSION["shopping_cart"] as $key => $item) {
                    $productId = $item['id'];
                    $productName = $item['name'];
                    $productPrice = $item['price'];
                    $productQuantity = $item['quantity'];
                    $total = $productPrice * $productQuantity;
                    
                    echo '<tr>';
                    echo '<td>' . $productName . '</td>';
                    echo '<td>$' . $productPrice . '</td>';
                    echo '<td><input type="number" min="1" value="' . $productQuantity . '" data-key="' . $key . '" class="quantity-input"></td>';
                    echo '<td>$' . $total . '</td>';
                    echo '<td><button class="remove-from-cart" data-key="' . $key . '">Remove</button></td>';
                echo '</tr>';
                }
                echo '</table>';

                $totalAmount = 0;
                
                foreach ($_SESSION["shopping_cart"] as $item) {
                    $productPrice = $item['price'];
                    $productQuantity = $item['quantity'];
                    $totalAmount += $productPrice * $productQuantity;
                }
                echo '<p class="total-amount">Total Amount: $' . $totalAmount . '</p>';
                } else {
                    echo '<p class="empty-cart">Your cart is empty.</p>';
                }
            ?>
        </div>

        <div class="customer-details">
            <h2>Customer Details</h2>
            <form class="customer-form" id="customer-form" method="post" action="">
                <label class="label" for="name">Name:</label>
                <input class="input" type="text" id="name" name="name" required>
                <label class="label" for="surname">Surname:</label>
                <input class="input" type="text" id="surname" name="surname" required>
                <label class="label" for="address">Address:</label>
                <input class="input" type="text" id="address" name="address" required>
                <label class="label" for="telephone">Telephone:</label>
                <input class="input" type="text" id="telephone" name="telephone" required>
            </form>
        </div>

    </div>
    <div>
        <form id="place-order-form" action="place_order.php" method="post">
            <button id="place_order_btn" class="place-order" type="submit" name="place_order">Place Order</button>
        </form>
    </div>

    <div class="footer">
        <?php include('html/footer.html'); ?>
    </div>
</body>

</html>