<?php
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
    $id = intval($_POST['id']);

    // Prepare the SQL query
    $query = "DELETE FROM sales WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>alert('تم حذف الفاتورة بنجاح'); window.location.href = 'viewBills.php';</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء حذف الفاتورة'); window.location.href = 'viewBills.php';</script>";
    }

    $stmt->close();
}

$conn->close();
header("Location:index2.php");
?>
