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
    $sql = "SELECT * FROM c1_lead_new_research WHERE user_id = $userid
        UNION ALL
        SELECT * FROM c2_research_development_projects WHERE user_id = $userid
        UNION ALL
        SELECT * FROM c3_research_development_operations WHERE user_id = $userid
        SELECT * FROM a6_professional_affilliations_memberships WHERE user_id = $userid
        UNION ALL
        SELECT * FROM b_professional_achievements WHERE user_id = $userid
        UNION ALL
        SELECT * FROM d_professional_consultations WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e11_e12_conference WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e14_knowledge_dissemination WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e1_e2_guidlines_papers_books_reports WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e3_e4_e13_journals_patents_trademarks WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e5_e6_techincal_publications WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e7_e8_papers WHERE user_id = $userid
        UNION ALL
        SELECT * FROM e9_e10_articles_guidelines_teaching WHERE user_id = $userid
        UNION ALL
        SELECT * FROM f3_research_and_project_supervision WHERE user_id = $userid
        UNION ALL
        SELECT * FROM f4_speaker WHERE user_id = $userid
        UNION ALL
        SELECT * FROM f5_scientific_technical_evaluation WHERE user_id = $userid
        UNION ALL
        SELECT * FROM f6_others WHERE user_id = $userid
        UNION ALL
        SELECT * FROM g_services_to_community WHERE user_id = $userid;"
        UNION ALL
    $result = $conn->query($sql);

    
    $research_counts = array(
        'Lead New Research' => 0,
        'Research Development Projects' => 0,
        'Research Development Operations' => 0,
        'Professional Affilliations Memberships' => 0,
        'Professional Achievements' => 0,
        'Professional Consultations' => 0,
        'Conference' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,
        'Research Development Operations' => 0,

        
    );

    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['section_number'] == 'c1') {
                $research_counts['Lead New Research']++;
            } elseif ($row['section_number'] == 'c2') {
                $research_counts['Research Development Projects']++;
            } elseif ($row['section_number'] == 'c3') {
                $research_counts['Research Development Operations']++;
            }
            // Add more conditions for other types as needed
        }
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
        <h2>Research Types</h2>
        <canvas id="researchChart"></canvas>
    </div>

    <script>
        var researchData = {
            labels: <?php echo json_encode(array_keys($research_counts)); ?>,
            datasets: [{
                label: 'Research Types',
                data: <?php echo json_encode(array_values($research_counts)); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)'
                    
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                    
                ],
                borderWidth: 1
            }]
        };

        var researchCtx = document.getElementById('researchChart').getContext('2d');
        var researchChart = new Chart(researchCtx, {
            type: 'pie',
            data: researchData,
            options: {
                
            }
        });
    </script>
</body>

</html>
