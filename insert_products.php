<?php
// Assuming you have established a database connection
session_start();
include 'db.php';

// Retrieve products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if any products were found
if ($result->num_rows > 0) {
    // Loop through each row and display product information
    while ($row = $result->fetch_assoc()) {
        $productId = $row['id'];
        $productName = $row['name'];
        $productCode = $row['code'];
        $productPrice = $row['price'];
        $productImage = $row['image'];

        // Display product information as desired
        echo "<div>";
        echo "<h3>$productName</h3>";
        echo "<p>Code: $productCode</p>";
        echo "<p>Price: $productPrice</p>";
        echo "<img src='$productImage' alt='$productName'>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

// Close the database connection
$conn->close();
?>
