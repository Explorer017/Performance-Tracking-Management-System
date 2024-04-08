<?php 
include("NavBar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Employee Details</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name">
        </div>
        <div class="col-md-6">
            <select id="sortSelect" class="form-control">
                <option value="default">Sort by:</option>
                <option value="firstName">First Name</option>
                <option value="lastName">Last Name</option>
            </select>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Supervisor ID</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            // Include the PHP script to connect to the database
            include 'db_conn.php';

            // Fetch employee details from the database
            $sql = "SELECT user_id, first_name, last_name, email, higher_user_id, points FROM user WHERE user_access_level = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each employee
                while($row = $result->fetch_assoc()) {
                    echo "<tr data-firstname='".$row["first_name"]."' data-lastname='".$row["last_name"]."' data-points='".$row["points"]."'><td>".$row["user_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["higher_user_id"]."</td><td>".$row["points"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No results found</td></tr>";
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

        $("#sortSelect").change(function() {
            var selectedOption = $(this).val();
            var rows = $('#tableBody tr').get();

            rows.sort(function(a, b) {
                var A = $(a).children('td').eq(getIndex(selectedOption)).text().toUpperCase();
                var B = $(b).children('td').eq(getIndex(selectedOption)).text().toUpperCase();

                if(A < B) {
                    return -1;
                }
                if(A > B) {
                    return 1;
                }
                return 0;
            });

            $.each(rows, function(index, row) {
                $('#tableBody').append(row);
            });
        });

        function getIndex(option) {
            switch(option) {
                case "firstName":
                    return 1;
                case "lastName":
                    return 2;
                default:
                    return 0;
            }
        }
    });
</script>

</body>
</html>