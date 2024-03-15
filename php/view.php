<?php 
include("NavBar.php");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../css/style.css">
    <title>View</title>
</head>
<body>

<div class="container">
    
    <h2>Submission Records</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name or item">
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-gold">Submission Id</th>
                <th class="text-gold">Research Officer Name</th>
                <th class="text-gold">Date Uploaded</th>
                <th class="text-gold">Item</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            // Include the PHP script to connect to the database
            include 'db_conn.php';

            // Fetch records from the database
            $sql = "SELECT Submission.submissionID AS submission_id, 
                           CONCAT(research_officer.first_name, ' ', research_officer.last_name) AS officer_name,
                           Submission.Date_Uploaded, 
                           Submission.Item
                    FROM Submission
                    INNER JOIN research_officer ON Submission.officerID = research_officer.officerID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["submission_id"]."</td><td>".$row["officer_name"]."</td><td>".$row["Date_Uploaded"]."</td><td>".$row["Item"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</body>
</html>