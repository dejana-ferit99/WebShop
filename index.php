<!DOCTYPE html>
<html>
<?php include('html/head.html'); ?>

<body>
  <?php include('html/header.php'); ?>
  <div class="items-grid">
    <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="item">';
                echo '<a href="product_page.php?id=' . $row["id"] . '">';
                echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<p>' . $row["code"] . '</p>';
                echo '<p>Price: €' . $row["price"] . '</p>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo "Proizvod nije pronađen.";
        }
        $conn->close();
        ?>
  </div>
  <?php include('html/footer.html'); ?>
  </div>
</body>

</html>