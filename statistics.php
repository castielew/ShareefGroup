<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gain Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h2>Gain vs Payment Chart</h2>
    <canvas id="gainChart" width="400" height="200"></canvas>
    
    <label for="paymentAdjustment">Payment Adjustment:</label>
    <input type="number" id="paymentAdjustment" value="0" step="0.01">
    <button onclick="updateChart()">Update Payment</button>

    <script>
        // Sample data for months, gains, and payments (to be dynamically updated)
        const months = ['January', 'February', 'March', 'April', 'May', 'June'];
        const gains = [10, 15, 12, 20, 25, 30];  // Example percentage gains
        const payments = [50, 60, 55, 70, 80, 90]; // Example payments

        // Create the chart
        const ctx = document.getElementById('gainChart').getContext('2d');
        let gainChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Gain (%)',
                    data: gains,
                    borderColor: 'green',
                    fill: false
                },
                {
                    label: 'Payment ($)',
                    data: payments,
                    borderColor: 'blue',
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

        // Function to update the payment dynamically
        function updateChart() {
            let adjustment = parseFloat(document.getElementById('paymentAdjustment').value);
            for (let i = 0; i < payments.length; i++) {
                payments[i] += adjustment;  // Increase payment based on user input
            }
            gainChart.update();  // Update the chart with new payment data
        }
    </script>

</body>
</html>
