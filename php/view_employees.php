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
<br>
<div class="container">
    <h2>Employee Details</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name">
        </div>
        <div class="col-md-6">
            <select class="form-control" id="sortSelect">
                <option value="name_asc" >Sort by Name (A-Z)</option>
                <option value="name_desc" >Sort by Name (Z-A)</option>
                <option value="points_high" >Sort by Points (High to Low)</option>
                <option value="points_low" >Sort by Points (Low to High)</option>
            </select>
        </div>
    </div>
    <table class="table">
        <thead class="black-bg">
            <tr>
                <th class="text-warning">User ID</th>
                <th class="text-warning">First Name</th>
                <th class="text-warning">Last Name</th>
                <th class="text-warning">Email</th>
                <th class="text-warning">Supervisor ID</th>
                <th class="text-warning">Points</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            include 'db_conn.php';

            $sql = "SELECT user_id, first_name, last_name, email, higher_user_id, points FROM user WHERE user_access_level = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $users = array();
                while($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }

                function sortByPoints($a, $b) {
                    return $b['points'] - $a['points'];
                }

                function sortByFirstName($a, $b) {
                    return strcmp($a['first_name'], $b['first_name']);
                }

                function sortByLastName($a, $b) {
                    return strcmp($a['last_name'], $b['last_name']);
                }

                if(isset($_GET['sort'])) {
                    $sortOption = $_GET['sort'];
                    switch($sortOption) {
                        case 'points_high':
                            usort($users, 'sortByPoints');
                            break;
                        case 'points_low':
                            usort($users, 'sortByPoints');
                            $users = array_reverse($users);
                            break;
                        case 'name_asc':
                            usort($users, 'sortByFirstName');
                            break;
                        case 'name_desc':
                            usort($users, 'sortByFirstName');
                            $users = array_reverse($users);
                            break;
                    }
                }

                foreach($users as $user) {
                    echo "<tr><td>".$user["user_id"]."</td><td>".$user["first_name"]."</td><td>".$user["last_name"]."</td><td>".$user["email"]."</td><td>".$user["higher_user_id"]."</td><td>".$user["points"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No results found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

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

        $("#sortSelect").on("change", function() {
            var sortOption = $(this).val();
            window.location.href = "view_employees.php?sort=" + sortOption;
        });
    });
</script>

</body>
</html>