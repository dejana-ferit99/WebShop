<!DOCTYPE html>

<head>
</head>

<html>

    <body>
        <?php
        session_start();
        include 'db.php';

        $products = [
            ["Apple", "Baranjska jabuka", 1.99, "./img/apple.jpg", "100"],
            ["Banana", "Banana iz Ekvadora", 0.99, "./img/banana.jpg", "50"],
            ["Bread", "Domaci kruh", 2.5, "./img/bread.jpeg", "37"],
            ["Cereal", "Sa slavonskih polja", 3.60, "./img/cereal.jpg", "59"],
            ["Juice", "Od najfinijeg voca", 2.99, "./img/juice.jpg", "77"],
            ["Kiwi", "Izvor vitamina C", 4.99, "./img/kiwi.jpg", "43"],
            ["Orange", "Citrus aurauntium", 2.00, "./img/orange.jpg", "54"]
        ];

        foreach ($products as $product) {
            $name = $product[0];
            $code = $product[1];
            $price = $product[2];
            $image = $product[3];
            $quantity = $product[4];

            $sql = "INSERT INTO products (name, code, price, image, quantity) VALUES ('$name', '$code', $price, '$image', '$quantity')";
            if ($conn->query($sql) === TRUE) {
                echo "Product added successfully: $name<br>";
            } else {
                echo "Error adding product: " . $conn->error;
            }
        }
        $conn->close();
        ?>
    </body>
</html>