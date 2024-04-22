<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Supervisor Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MIROSdb";

    $conn = require("db_conn.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_SESSION["user_id"];

   
    $sql = "SELECT * FROM user WHERE user_id = $userid";
    $result = $conn->query($sql);

    $supervisor_info = [];
    if ($result && $result->num_rows > 0) {
        $supervisor_info = $result->fetch_assoc();
    } else {
        echo "Supervisor information not found.";
    }

    
    $sql = "SELECT * FROM user WHERE higher_user_id = $userid";
    $result = $conn->query($sql);

    $supervised_users = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supervised_users[] = $row;
        }
    }

    
    $points_distribution = [];
   // foreach ($supervised_users as $user) {
   //     $points_distribution[$user['category']] = isset($points_distribution[$user['category']]) ? $points_distribution[$user['category']] + $user['points'] : $user['points'];
   // }

    $conn->close();
    ?>

    <div class="container mt-5">
        <h2>Welcome, <?php echo isset($supervisor_info['first_name']) ? $supervisor_info['first_name'] : "Supervisor"; ?>!</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Supervised Users</h5>
                        <p class="card-text"><?php echo count($supervised_users); ?></p>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Research Output from Supervised Users</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th class = "text-warning">User ID</th>
                            <th class = "text-warning">Full Name</th>
                            <th class = "text-warning">Total Points</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supervised_users as $user) : ?>
                            <tr>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['first_name']; ?></td>
                                <td><?php echo $user['points']; ?></td>
                               
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Points Distribution</h3>
                <canvas id="pointsChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <script>
        var pointsData = <?php echo json_encode($points_distribution); ?>;
        var categories = Object.keys(pointsData);
        var points = Object.values(pointsData);

        var ctx = document.getElementById('pointsChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Points Distribution',
                    data: points,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
