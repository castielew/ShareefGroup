<?php
require_once "connection.php";

echo "hello";

if (
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_POST['quantity']) && !empty($_POST['quantity']) &&
    isset($_POST['unit']) && !empty($_POST['unit']) &&
    isset($_POST['date']) && !empty($_POST['date'])
) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);

    $sql = "INSERT INTO products (name, price, quantity, date, unit) 
            VALUES ('$name', '$price', '$quantity', '$date', '$unit')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

else if (
    isset($_POST['deleteProduct']) && !empty($_POST['deleteProduct'])
){

    $product=$_POST['deleteProduct'];
    $sql= "DELETE FROM products WHERE name='$product'";
    $conn->query($sql);

}else if (isset($_POST['editproduct']) && !empty($_POST['editproduct']) &&
isset($_POST['newPrice']) && !empty($_POST['newPrice']) &&
isset($_POST['newQuantity']) && !empty($_POST['newQuantity'])) {

$editProduct = $_POST['editproduct'];
$newPrice = $_POST['newPrice'];
$newQuantity = $_POST['newQuantity'];


$sql = "UPDATE products 
        SET price = '$newPrice', quantity = '$newQuantity' 
        WHERE name = '$editProduct'";

if ($conn->query($sql) === TRUE) {
    echo "Product updated successfully!";
} else {
    echo "Error updating product: " . $conn->error;
}
} else {
echo "Please fill out all fields!";
}

header("Location:index.php");
?>






