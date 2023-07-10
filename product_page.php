<!DOCTYPE html>
<html>
<?php include('html/head.html'); ?>

<body>
  <?php include('html/header.php'); ?>
  <div class="back-button">
    <button  class="go_back_button" onclick="goToIndex()">Natrag</button>
  </div>
  
  <div class="products">
    <?php

    $productId = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = '$productId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo '<div class="product-details">';
      echo '<img  class="product_img" src="' . $row["image"] . '" alt="' . $row["name"] . '">';
      echo '<div class="product-info">';
      echo '<h2>' . $row["name"] . '</h2>';
      echo '<h3>' . $row["code"] . '</h3>';
      echo '<p>Price: €' . $row["price"] . '</p>';
      ?>

    <form action="add_to_cart.php" method="post">
      <label for="quantity">Količina:</label>
      <input type="number" id="quantity" name="quantity" value="1" min="1" required>
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <button class="add_to_cart_button" type="submit" name="add_to_cart">Dodaj u košaricu</button>
    </form>

    <?php
      echo '</div>';
    } else {
      echo "Product not found.";
    }
    $conn->close();
    ?>
  </div>

  <div class="footer">
    <?php include('html/footer.html'); ?>
  </div>

</body>
</html>