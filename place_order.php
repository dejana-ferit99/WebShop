<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the customer details from the POST request
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];

    // Validate the customer details
    $errors = array();

    if (empty($name)) {
        $errors[] = "Please enter your name.";
    }

    if (empty($surname)) {
        $errors[] = "Please enter your surname.";
    }

    if (empty($address)) {
        $errors[] = "Please enter your address.";
    }

    if (empty($telephone)) {
        $errors[] = "Please enter your telephone number.";
    }

    if (count($errors) > 0) {
        // Display the error messages
        echo "Please fix the following errors: ";

        foreach ($errors as $error) {
            echo "$error";
        }

    } else {
        
        session_unset();
        // Provide a response indicating the order has been placed successfully
        $response = "Order placed successfully. Thank you for your purchase!";
        echo $response;
    }
} else {
    // If the request method is not POST, handle the error accordingly
    $response = "Invalid request method. Please try again.";
    echo $response;
}
?>