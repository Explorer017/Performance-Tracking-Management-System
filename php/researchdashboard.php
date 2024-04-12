<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MIROSdb";

  
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    $userid = $_SESSION["user_id"];
    $sql = "SELECT points FROM user WHERE user_id = $userid";
    $result = $conn->query($sql);

   
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pointsTotal = $row["points"];
    } else {
        $pointsTotal = 0;
    }

    
    $conn->close();
    ?>

    <div class="container">
        <h2>Research Dashboard</h2>
        <canvas id="pointsChart"></canvas>
    </div>

    <script>
        var pointsData = {
            labels: ['Points Received'],
            datasets: [{
                label: 'Total Points',
                data: [<?php echo $pointsTotal; ?>],
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
    </script>
    <div class="container">
    <h2>Research Dashboard</h2>
    <canvas id="pointsChart"></canvas>
    <hr>
    <h3>Submissions</h3>
    <div>
        <button onclick="showSection('professional_affiliations')">Professional Affiliations</button>
        <button onclick="showSection('professional_achievements')">Professional Achievements</button>

</html>
