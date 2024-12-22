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
  <div class="Selling">  
    <h1 class="text-center">صفحة المبيع</h1>
    <form id="sellForm" method="post" action="SellProducts.php">
      <div class="row text-center mt-5">
        <div class="col-lg-4 col-md-4 col-sm-6">
          <label for="">اختر منتج</label>
          <select id="section" class="form-control" name="product">
            <option value="" class="text-center">اختر منتج</option>
            <?php
              require_once "connection.php";
              $query = "SELECT name FROM products";
              $result = $conn->query($query);

              if ($result) {
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="'.($row['name']) .'" class="text-center">'.($row['name']) .'</option>';
                }
              } else {
                echo '<option value="">No sections available</option>';
              }
            ?>
          </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <label for="quantity">الكمية</label>
          <input type="number" class="form-control" name="quantity" id="quantity" required>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <label for="price">السعر</label>
          <input type="number" class="form-control" name="price" id="price" required>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <label>اسم الزبون</label>
          <input type="text" class="form-control" name="customerName" id="customerName" required>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <label>رقم الزبون</label>
          <input type="text" class="form-control" name="customerNumber" id="customerNumber">
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
          <label>تاريخ البيع</label>
          <input type="date" class="form-control" name="saleDate" id="saleDate">
        </div>

        <div class="d-flex justify-content-center mt-3">
          <button type="submit" class="custom" >بيع</button>
        </div>
      </div>
    </form>
  </div>



  <div class="container-fluid mt-5 " style="">
        <h2 class="text-center">سجل المبيعات</h2>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>اسم المنتج</th>
                    <th>الكمية</th>
                    <th>السعر الإجمالي</th>
                    <th>اسم الزبون</th>
                    <th>حذف الفاتورة؟ </th>
                </tr>
            </thead>
            <tbody>
    <?php
    if ($result && $result->num_rows > 0) {
require_once "connection.php"; 
$query = "SELECT * FROM sales ORDER BY id DESC";

$result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['product_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['total_price']}</td>
                    <td>{$row['customer_name']}</td>
                    <td>
                        <form method='post' action='deleteBill.php' onsubmit='return confirm(\"هل أنت متأكد أنك تريد حذف هذه الفاتورة؟\");'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' class='btn btn-danger'>حذف</button>
                        </form>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9' class='text-center'>لا توجد بيانات</td></tr>";
    }
    ?>
</tbody>
        </table>
    </div>
    <script src="bootstrap/js/all.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="index2.js"></script>




</body>
</html>