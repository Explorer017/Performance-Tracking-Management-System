<?php

include("NavBar.php");
include("db_conn.php");
include("pointsfunctions.php"); 
$userPoints = calculateUserPoints($conn, $targets, $tablenames);
$result = $_GET['submission']; 
foreach ($userPoints as $user_id => $userData) {
    $totalPoints = $userData['total_points']; 
    $Points = number_format($totalPoints, 2); 
    $sql = "UPDATE user SET points = $Points WHERE user_id = $user_id";
    $result = $conn->query($sql);
}
?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <?php if ($lang == 'en'): ?>
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
        <?php else: ?>
            <h2>Keputusan Penyerahan</h2><br>
            <?php
            if ($result) {
                echo "Penyerahan telah selesai";
            } else {
                echo "Penyerahan telah selesai";
            }
            ?>
            <div><a href="view_submissions.php">Back</a></div>
        <?php endif ?>
    </main>
</div>