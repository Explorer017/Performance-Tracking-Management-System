<?php
require("navbar2.php");


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../css/style.css">
    <title>Miros</title>
    <style>

    </style>
</head>
<body>

    <div class="services-description">
        <div class="container">
            <h2>Welcome back</h2>
            <div class="chart">
            <h3>Research Submissions</h3>
            <?php
            
            //  database
            $researchCount = 10; // Sample data

          
            echo "<div class='bar' style='width: " . ($researchCount * 10) . "px;'>$researchCount</div>";
            ?>
        </div>
        <div class="chart">
            <h3>Points Received</h3>
            <?php
            
            $pointsTotal = 350; // Sample data

            // Output bar chart based on total points
            echo "<div class='bar' style='width: " . ($pointsTotal / 10) . "px;'>$pointsTotal</div>";
            ?>
        </div>
    </div>
</body>
</html>
            
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

