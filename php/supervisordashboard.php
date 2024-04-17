<?php include 'navbar.php'; ?>
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
    $sql = "SELECT points, higher_user_id FROM user WHERE user_id = $userid";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pointsTotal = $row["points"];
        $higherUserId = $row["higher_user_id"];
    } else {
        $pointsTotal = 0;
        $higherUserId = null;
    }

    
    $higherTotalPoints = 0;
    if ($higherUserId !== null) {
        $sql = "SELECT SUM(points) AS total_points FROM user WHERE higher_user_id = $higherUserId";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $higherTotalPoints = $row["total_points"];
        }
    }


    $sql = "SELECT points, section_number FROM c1_lead_new_research WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM c2_research_development_projects WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM c3_research_development_operations WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM a6_professional_affilliations_memberships WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM b_professional_achievements WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM d_professional_consultations WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e11_e12_conference WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e14_knowledge_dissemination WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e1_e2_guidlines_papers_books_reports WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e3_e4_e13_journals_patents_trademarks WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e5_e6_techincal_publications WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e7_e8_papers WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM e9_e10_articles_guidelines_teaching WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM f3_research_and_project_supervision WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM f4_speaker WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM f5_scientific_technical_evaluation WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM f6_others WHERE user_id = $userid
    UNION ALL
    SELECT points, section_number FROM g_services_to_community WHERE user_id = $userid";

    $result = $conn->query($sql);

    $research_counts = array(
        'Professional Affiliations' => 0,
        'Professional Achievements' => 0,
        'Lead New Research' => 0,
        'Research Development Projects' => 0,
        'Research Development Operations' => 0,
        'Professional Affiliations Memberships' => 0,
        'Professional Achievements' => 0,
        'Professional Consultations' => 0,
        'Conference' => 0,
        'Knowledge Dissemination' => 0,
        'Guidelines Papers Books Reports' => 0,
        'Journals Patents Trademarks' => 0,
        'Techincal Publications' => 0,
        'Papers' => 0,
        'Articles Guidelines Teaching' => 0,
        'Research And Project Supervision' => 0,
        'Speaker' => 0,
        'Scientific Technical Evaluation' => 0,
        'Others' => 0,
        'Services To Community' => 0
    );

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $section_number = $row["section_number"];
            $points = $row["points"];
            if (array_key_exists($section_number, $research_counts)) {
                $research_counts[$section_number] += $points;
            }
        }
    }

    $conn->close();
    ?>

    <div class="row">
        <div class="col-md-6">
            <h3>Total Points</h3>
            <p><?php echo $pointsTotal; ?></p>
            <?php if ($higherUserId !== null) : ?>
                <h3>Total Points (Supervised Users)</h3>
                <p><?php echo $higherTotalPoints; ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach ($research_counts as $section => $count) : ?>
                        '<?php echo $section; ?>',
                    <?php endforeach; ?>
                ],
                datasets: [{
                    label: 'Points',
                    data: [
                        <?php foreach ($research_counts as $section => $count) : ?>
                            <?php echo $count; ?>,
                        <?php endforeach; ?>
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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

