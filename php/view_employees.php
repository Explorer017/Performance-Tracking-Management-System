<?php 
include("NavBar.php");

include_once("get_language.php");
$lang = isset($_GET['lang']) ? $_GET['lang'] : GetLanguage(); 
if (isset($_POST['lang'])) {
    if ($lang == 'en') {
        header('Location: '.$_SERVER['PHP_SELF'].'?lang=bm');
    } else {
        header('Location: '.$_SERVER['PHP_SELF'].'?lang=en');
    }
}
$supervisorID = $_SESSION["user_id"]; 
$permission = $_SESSION["permission"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee Details</title>
    
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
        <?php if ($lang == 'en'){ ?>
        <select class="form-control" id="sortSelect">
            <option value="name_asc" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_asc') echo 'selected'; ?>>Sort by Name (A-Z)</option>
            <option value="name_desc" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_desc') echo 'selected'; ?>>Sort by Name (Z-A)</option>
            <option value="points_high" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'points_high') echo 'selected'; ?>>Sort by Points (High to Low)</option>
            <option value="points_low" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'points_low') echo 'selected'; ?>>Sort by Points (Low to High)</option>
        </select>
        <?php } else { ?>
                    <select class="form-control" id="sortSelect">
                    <option value="name_asc" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_asc') echo 'selected'; ?>>Isih mengikut Nama (A-Z)</option>
                    <option value="name_desc" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'name_desc') echo 'selected'; ?>>Isih mengikut Nama (Z-A)</option>
                    <option value="points_high" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'points_high') echo 'selected'; ?>>Isih mengikut Mata (Tinggi ke Rendah)</option>
                    <option value="points_low" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'points_low') echo 'selected'; ?>>Isih mengikut Mata (Rendah ke Tinggi)</option>
                </select>
        <?php } ?>
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
            $sql = "";
            if($permission == 1)
            {
                $sql = "SELECT user_id, first_name, last_name, email, higher_user_id, points FROM user WHERE user_access_level = 0 AND higher_user_id = $supervisorID";
            }
            elseif($permission == 2)
            {
                $sql = "SELECT user_id, first_name, last_name, email, higher_user_id, points FROM user WHERE user_access_level = 0 OR user_access_level = 1";

            }
            
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
                    <a href="view_points.php?userid=<?php echo $user["user_id"]; ?>&lang=<?php echo $lang; ?>"><?php echo $user["user_id"]?></a>
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