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
<?php if ($lang == 'en'): ?>
    <h2>Employee Details</h2>
<?php else: ?>
    <h2>Butiran Pekerja</h2>
    <?php endif ?>
    <div class="row mb-3">
        <div class="col-md-6">
        <?php if ($lang == 'en'): ?>
            <input type="text" class="form-control" id="searchInput" placeholder="Search by name">
            <?php else: ?>
            <input type="text" class="form-control" id="searchInput" placeholder="Cari mengikut nama">
            <?php endif ?>
        </div>
        <div class="col-md-6">
            <select class="form-control" id="sortSelect">
                <?php if ($lang == 'en'): ?>
                <option value="name_asc" >Sort by Name (A-Z)</option>
                <option value="name_desc" >Sort by Name (Z-A)</option>
                <option value="points_high" >Sort by Points (High to Low)</option>
                <option value="points_low" >Sort by Points (Low to High)</option>
                <?php else: ?>
                <option value="name_asc" >Isih mengikut Nama (A-Z)</option>
                <option value="name_desc" >Isih mengikut Nama (Z-A)</option>
                <option value="points_high" >Isih mengikut Mata (Tertinggi ke Terendah)</option>
                <option value="points_low" >Isih mengikut Mata (Terendah hingga Tertinggi)</option>
                <?php endif ?>
            </select>
        </div>
    </div>
    <table class="table">
        <thead class="black-bg">
            <tr>
                <?php if ($lang == 'en'): ?>
                <th class="text-warning">User ID</th>
                <th class="text-warning">First Name</th>
                <th class="text-warning">Last Name</th>
                <th class="text-warning">Email</th>
                <th class="text-warning">Supervisor ID</th>
                <th class="text-warning">Points</th>

            <?php else: ?>
                <th class="text-warning">ID Pengguna</th>
                <th class="text-warning">Nama Pertama</th>
                <th class="text-warning">Nama Terakhir</th>
                <th class="text-warning">Emel</th>
                <th class="text-warning">ID Penyelia</th>
                <th class="text-warning">Mata</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php
            include 'db_conn.php';

            $sql = "SELECT user_id, first_name, last_name, email, higher_user_id, points FROM user WHERE user_access_level = 0";
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
                    <?php if ($user["higher_user_id"] == null && $lang == 'en'): ?>
                        None
                    <?php elseif ($user["higher_user_id"] == null && $lang == 'bm'): ?>
                        Tiada
                    <?php else:
                        echo $user["higher_user_id"];
                    endif; ?>
                    </td>
                    <td>
                    <?php echo $user["points"] ?>
                    </td>
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
            var language = "<?php echo $lang;?>";
            var sortOption = $(this).val();
            window.location.href = "view_employees.php?sort=" + sortOption + "&lang=" + language;
        });
    });
</script>

</body>
</html>