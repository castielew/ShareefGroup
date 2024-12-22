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
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- Nav Bar  -->
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
                        <a class="nav-link  items" aria-current="page" href="#">اضف منتج</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link items " href="#">احذف منتج</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  items" href="#"> تعديل منتج </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  items" href="#">  منتجاتي </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- add product -->

    <div class="container mt-5">
        <div class="addSection">
            <h1 class="text-center head">اضافة منتج</h1>
            <div class="add">
                <form action="ManageProduct.php" method="post">
                    <div class="row text-center  dashboard">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="section">الاسم</label>
                            <input type="text" class="form-control" name="name">
                        </div>
    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="name">الكمية</label>
                            <input type="number" class="form-control" name="quantity">
                        </div>
    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="price">السعر</label>
                            <input type="number" class="form-control" name="price">
                        </div>
    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="quantity">وحدة القياس</label>
                            <select class="form-control" name="unit">
                                <option value="متر" class="text-center">متر</option>
                                <option value="توب" class="text-center">توب</option>
                                <option value="كيلو" class="text-center">كيلو</option>
                            </select>
                        </div>
    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <label for="quantity">تاريخ الاستيراد</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
    
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="custom">اضف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- delete product -->
    <div class="deleteSection"  style="display: none;">
        <div class="container ">
            <div class="row text-center mt-5">
<form action="ManageProduct.php" method="post">
            
                <div class="col-lg-6 col-md-4 col-sm-12">
                    <label for="section">اختر منتج</label>
                    <select id="section" class="form-control mt-2" name ="deleteProduct" >
                        <option value="" class="text-center">اختر منتج للحذف</option>
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
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="custom ">احذف</button>
                </div>
                </form>
            </div>
        </div>
    </div>








    <!-- edit product -->


    <div class="editSection"  style="display: none;">
        <div class="container ">
        <form action="ManageProduct.php" method="post">
            <div class="row text-center mt-5">

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label for="section">اختر منتج</label>
                    <select id="section" class="form-control mt-2" name ="editproduct">
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
                        <label for="name">  الكمية الجديدة</label>
                        <input type="number"  class="form-control" name="newQuantity">
                    </div>
                

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label for="section">السعر الجديد </label>
                    <input type="number"  class="form-control" name="newPrice">             
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="custom ">تعديل</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="viewSection mt-5 "  style="display: none;">
    <div class="container-fluid">
        <h2 class="text-center mb-4">عرض المنتجات</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>الاسم</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>تاريخ الاستيراد</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT name, price, quantity, date FROM products";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['name']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['date']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='4'>لا يوجد منتجات لعرضها</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="bootstrap/js/all.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>

</body>

</html>