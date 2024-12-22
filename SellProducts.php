<?php
require_once "connection.php";

if(
    isset($_POST['product']) && !empty($_POST['product'])
    && isset($_POST['price']) && !empty($_POST['price'])
    && isset($_POST['quantity']) && !empty($_POST['quantity'])
    && isset($_POST['customerName']) && !empty($_POST['customerName'])
    && isset($_POST['customerNumber']) && !empty($_POST['customerNumber'])
    && isset($_POST['saleDate']) && !empty($_POST['saleDate'])
) {
    $product_name = $_POST['product'];
    $quantity = intval($_POST['quantity']);
    $price_per_unit = floatval($_POST['price']);
    $customer_name = $_POST['customerName'];
    $customer_number = $_POST['customerNumber'];
    $sale_date = $_POST['saleDate'];
    $total = $quantity * $price_per_unit;

    $query = "INSERT INTO sales (product_name, quantity, price_per_unit, total_price, customer_name, customer_number, sale_date) 
              VALUES ('$product_name', $quantity, $price_per_unit, $total, '$customer_name', '$customer_number', '$sale_date')";
echo $query;

    if ($conn->query($query) === TRUE) {
        echo "Sale recorded successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
header("Location:index2.php");
?>





