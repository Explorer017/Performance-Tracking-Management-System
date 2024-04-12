<?php 
include("NavBar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
    <h2>Edit User Details:</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name">
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
                <th class="text-warning">Edit</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            include 'db_conn.php';

            $sql = "SELECT user_id, first_name, last_name, email, higher_user_id, points FROM user";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $users = array();
                while($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }

            

                foreach($users as $user) { ?>
                    <tr>
                    <td>
                        <?php echo $user["user_id"]?>
                    </td>
                    <td>
                        <?php echo $user["first_name"] ?>
                    </td>
                    <td>
                        <?php echo $user["last_name"] ?>
                    </td>
                    <td>
                    <?php echo $user["email"] ?>
                    </td>
                    <td>
                    <?php echo $user["higher_user_id"] ?>
                    </td>
                    <td>
                    <?php echo $user["points"] ?>
                    </td>
                    <td><a href="edit_user.php?userid=<?php echo $user["user_id"]; ?>">Update</a></td>
                </tr>
                <?php }
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