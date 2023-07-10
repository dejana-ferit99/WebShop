<?php 
$servername = "localhost";
$username = "lv4_admin";
$password = "wVt7@(fTdLGE[LLq";
$dbname = "product_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>