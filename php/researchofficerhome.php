

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href= "style.css">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

    </style>
</head>
<body>
    <?php include 'navbar2.php'; ?>
    <div class="container">
        <h2>Research Dashboard</h2>
        <canvas id="researchChart"></canvas>
        <canvas id="pointsChart"></canvas>
    </div>

    <?php
    $sql = "SELECT points FROM user";
    //$result = $pointsTotal;
    $pointsTotal = $result; 

    
    echo "<script>
            

            var pointsData = {
                labels: ['Points Received'],
                datasets: [{
                    label: 'Total Points',
                    data: [$pointsTotal],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            };

        

            var pointsCtx = document.getElementById('pointsChart').getContext('2d');
            var pointsChart = new Chart(pointsCtx, {
                type: 'bar',
                data: pointsData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>";
    ?>
</body>
</html>