<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Shareef Group</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/all.min.css">
    <link rel="stylesheet" href="index2.css">
</head>


<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index2.php">AlshareefGroup</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  items" aria-current="page" href="#"> بيع منتج</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link items " href="#">مبيعات </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  items" href="#"> احصائيات   </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link  items" href="#"> فواتير   </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
  <h2 class="text-center">Sales Filtering</h2>
  <form id="filterForm" method="post" action="">
    <div class="row">
      <div class="col-md-4">
        <label for="productFilter">فلتر بواسطة المنتج</label>
        <select id="productFilter" name="product" class="form-control">
          <option value="">All Products</option>
          <?php
          require_once "connection.php";
          $query = "SELECT DISTINCT product_name FROM sales";
          $result = $conn->query($query);
          while ($row = $result->fetch_assoc()) {
              echo '<option value="' . htmlspecialchars($row['product_name']) . '">' . htmlspecialchars($row['product_name']) . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-md-4">
      <label for="startDate">تاريخ البداية:</label>
        <input type="date" id="startDate" name="startDate" class="form-control">
      </div>
      <div class="col-md-4">
      <label for="endDate">تاريخ النهاية:</label>
              <input type="date" id="endDate" name="endDate" class="form-control">
      </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
      <button type="submit" class="">Filter Sales</button>
    </div>
  </form>
</div>
<?php
require_once "connection.php";

// Initialize variables
$productFilter = isset($_POST['product']) ? $_POST['product'] : '';
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';

// Build query
$query = "SELECT * FROM sales WHERE 1=1";

// Apply product filter
if (!empty($productFilter)) {
    $query .= " AND product_name = '" . $conn->real_escape_string($productFilter) . "'";
}

// Apply date range filter
if (!empty($startDate)) {
    $query .= " AND sale_date >= '" . $conn->real_escape_string($startDate) . "'";
}
if (!empty($endDate)) {
    $query .= " AND sale_date <= '" . $conn->real_escape_string($endDate) . "'";
}

// Execute query
$result = $conn->query($query);

// Calculate total revenue
$totalRevenue = 0;
?>
<div class="container mt-5">
  <h3 class="text-center">Filtered Sales</h3>
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price per Unit</th>
        <th>Total Price</th>
        <th>Customer Name</th>
        <th>Sale Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result && $result->num_rows > 0) {
          $counter = 1;
          while ($row = $result->fetch_assoc()) {
              $totalRevenue += $row['total_price'];
              echo "<tr>";
              echo "<td>" . $counter++ . "</td>";
              echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
              echo "<td>" . htmlspecialchars($row['price_per_unit']) . "</td>";
              echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
              echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['sale_date']) . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='7'>No sales found for the selected criteria.</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <h4 class="text-center">Total Revenue: <?php echo $totalRevenue; ?> $</h4>
</div>





    <script src="bootstrap/js/all.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="index2.js"></script>
</body>
</html>