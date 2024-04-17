<?php

include("NavBar.php");
include("db_conn.php");
include("pointsfunctions.php"); 
$userPoints = calculateUserPoints($conn, $targets, $tablenames);
$result = $_GET['submission']; 
foreach ($userPoints as $user_id => $points) {
    $points = number_format($points,2);
    $sql = "UPDATE user SET points = $points WHERE user_id = $user_id";
    $result = $conn->query($sql);
}
?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>Submission Result</h2><br>
        <div>
            <?php
            if ($result) {
                echo "Submission has been completed";
            } else {
                echo "Submission has been completed";
            }
            ?>
            <div><a href="view_submissions.php">Back</a></div>
        </div>
    </main>
</div>