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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../css/style.css">
</head> 
<body>
<div class="container">
<br>
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
            <?php if ($lang == 'en'):?>
                <tr>
                    <th class="text-warning">Employee ID</th>
                    <th class="text-warning">First Name</th>
                    <th class="text-warning">Last Name</th>
                    <th class="text-warning">Email</th>
                    <th class="text-warning">Supervisor ID</th>
                    <th class="text-warning">Points</th>
                </tr>
            <?php else:?>
                <tr>
                    <th class="text-warning">ID pekerja</th>
                    <th class="text-warning">Nama pertama</th>
                    <th class="text-warning">Nama terakhir</th>
                    <th class="text-warning">E-mel</th>
                    <th class="text-warning">ID Penyelia</th>
                    <th class="text-warning">Mata</th>
                </tr>
            <?php endif; ?>
        </thead>
        <tbody id="tableBody">
            <?php
            // Include the PHP script to connect to the database
            include 'db_conn.php';

            // Fetch employee details from the database
            $sql = "SELECT officerID, first_name, last_name, email, supervisorID, points FROM research_officer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each employee
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["officerID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["supervisorID"]."</td><td>".$row["points"]."</td></tr>";
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