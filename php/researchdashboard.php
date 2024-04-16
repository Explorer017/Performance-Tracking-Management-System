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


    $conn = require ("db_conn.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $userid = $_SESSION["user_id"];
    $sql = "SELECT points FROM user WHERE user_id = $userid";
    $result = $conn->query($sql);


    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pointsTotal = $row["points"];
    } else {
      $pointsTotal = 5;
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
    SELECT points, section_number FROM f6_others WHERE user_id = 1$userid
    UNION ALL
    SELECT points, section_number FROM g_services_to_community WHERE user_id = $userid";

    $result = $conn->query($sql);


    $research_counts = array(
        'Professional Affilliations' => 0,
        'Professional Achievements' => 0,
        'Lead New Research' => 0,
        'Research Development Projects' => 0,
        'Research Development Operations' => 0,
        'Professional Affilliations Memberships' => 0,
        'Professional Achievements' => 0,
        'Professional Consultations' => 0,
        'Conference' => 0,
        'Knowledge Dissemination' => 0,
        'Guidlines Papers Books Reports' => 0,
        'Journals Patents Trademarks' => 0,
        'Techincal Publications' => 0,
        'Papers' => 0,
        'Articles Guidelines Teaching' => 0,
        'Research and Project Supervision' => 0,
        'Speaker' => 0,
        'Scientific Technical Evaluation' => 0,
        'Others' => 0,
        'Services to Community' => 0,

    );


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['section_number'] == 'A6') {
                $research_counts['Professional Affilliations']++;
            } elseif ($row['section_number'] == 'B') {
                $research_counts['Professional Achievements']++;
            } elseif ($row['section_number'] == 'C1') {
                $research_counts['Lead New Research']++;
            } elseif ($row['section_number'] == 'C2') {
                $research_counts['Research Development Projects']++;
            } elseif ($row['section_number'] == 'C3') {
                $research_counts['Research Development Operations']++;
            } elseif ($row['section_number'] == 'D') {
                $research_counts['Professional Consulations']++;
            } elseif ($row['section_number'] == 'E1-2') {
                $research_counts['Guidelines/Manuals, Policy Papers and Products']++;
            } elseif ($row['section_number'] == 'E3-4-13') {
                $research_counts['International Journal with Citation Index/Impact Factor - accepted']++;
            }  elseif ($row['section_number'] == 'E5-6') {
                $research_counts['MIROS Scientific and Technical Publications (Requested & Initiated by MIROS)']++;
            }  elseif ($row['section_number'] == 'E7-8') {
                $research_counts['Papers in Proceedings of International Conferences']++;
            } elseif ($row['section_number'] == 'E9-10') {
                $research_counts['Research and Technical Articles in Bulletins/ Magazines and News Media/ Newsletter etc']++;
            } elseif ($row['section_number'] == 'E11-12') {
                $research_counts['International Conference Presentations']++;
            } elseif ($row['section_number'] == 'E14') {
                $research_counts['Knowledge Dissemination']++;
            } elseif ($row['section_number'] == 'F3') {
                $research_counts['Research and Project Supervision ']++;
            } elseif ($row['section_number'] == 'F4') {
                $research_counts['Invited Speaker, Keynote Speaker, Session Chairman, Forum (Established External Events)']++;
            } elseif ($row['section_number'] == 'F5') {
                $research_counts['Scientific and Technical Evaluation (including Research Proposal)']++;
            } elseif ($row['section_number'] == 'F6') {
                $research_counts['Others']++;
            } elseif ($row['section_number'] == 'G') {
                $research_counts['SERVICES TO COMMUNITY']++;
            }

        }
    }

    $conn->close();

    ?>

    <div class="graphcontainer">
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