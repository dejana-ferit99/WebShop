<?php
// Assuming you have already established a database connection

// Query to fetch products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

// Create an array to store the products
$products = array();

// Fetch each row as an associative array and add it to the products array
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

// Close the database connection
mysqli_close($connection);

// Set the response header to indicate JSON content
header("Content-Type: application/json");

// Return the products array as JSON
echo json_encode($products);
?>
