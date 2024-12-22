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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <a class="nav-link items" aria-current="page" href="#">بيع منتج</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link items" href="#">مبيعات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link items" href="./statistics.php">احصائيات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link items" href="#">فواتير</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Gain vs Payment Chart</h2>
                <canvas id="gainChart" width="400" height="400"></canvas>
            </div>
            <div class="col-md-6">
                <h2>Total Quantities</h2>
                <div class="alert alert-info">
                    إجمالي الكمية: <span id="totalQuantity"></span>
                </div>
            </div>
        </div>
    </div>

    <?php
require_once "connection.php";

$query = "SELECT sale_date, quantity FROM sales";
$result = $conn->query($query);

$saleDates = array();
$quantities = array();
$totalQuantity = 0;

while ($row = $result->fetch_assoc()) {
    $saleDates[] = $row['sale_date'];
    $quantities[] = $row['quantity'];
    $totalQuantity += $row['quantity'];
}
?>


    <script>
        const saleDates = <?php echo json_encode($saleDates); ?>;
        const quantities = <?php echo json_encode($quantities); ?>;
        const totalQuantity = <?php echo $totalQuantity; ?>;

        document.getElementById('totalQuantity').textContent = totalQuantity;

        const ctx = document.getElementById('gainChart').getContext('2d');
        let gainChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: saleDates,
                datasets: [{
                    label: 'Quantity Sold',
                    data: quantities,
                    borderColor: 'green',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
