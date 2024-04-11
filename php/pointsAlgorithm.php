<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Points</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php
    include 'navbar.php'; 
    include 'db_conn.php'; 
    include 'pointsfunctions.php';
    $userPoints = calculateUserPoints($conn, $targets, $tablenames);
?> 
<body> 
    <div class="container"> 
        <h2>User Points</h2>
        <div class="table-wrapper"> 
            <table class="table">
                <thead> 
                    <tr> 
                        <th class = 'text-warning'>User ID</th> 
                        <th class = 'text-warning'>Points</th> 
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    foreach ($userPoints as $user_id => $points) {
                        echo "<tr>";
                        echo "<td>$user_id</td>";
                        echo "<td>" . number_format($points, 2) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
    </div> 
</body>
</html>
