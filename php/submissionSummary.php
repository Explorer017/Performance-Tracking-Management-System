<?php

include("NavBar.php");
$result = $_GET['submission']; 

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
            <div><a href="view.php">Back</a></div>
        </div>
    </main>
</div>