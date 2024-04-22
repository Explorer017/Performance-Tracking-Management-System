<?php
    include 'navbar.php';
    include 'db_conn.php';
    include 'pointsfunctions.php';
    include_once("get_language.php");

    $user_id = $_GET['userid'];

    $userAccessQuery = "SELECT user_access_level FROM user WHERE user_id = '$user_id'";
    $userAccessResult = $conn->query($userAccessQuery);

    if ($userAccessResult->num_rows > 0) {
        $userAccessRow = $userAccessResult->fetch_assoc();
        $user_access_level = $userAccessRow['user_access_level'];

        if ($user_access_level == 1) {
            $managedUsersQuery = "SELECT user_id, first_name, last_name FROM user WHERE higher_user_id = '$user_id'";
            $managedUsersResult = $conn->query($managedUsersQuery);

            $managedUsersData = array();

            if ($managedUsersResult->num_rows > 0) {
                while ($row = $managedUsersResult->fetch_assoc()) {
                    $managed_user_id = $row['user_id'];
                    $managed_user_name = $row['first_name'] . ' ' . $row['last_name'];

                    $userData = calculateUserPoints($conn, $targets, $tablenames);

                    if (!isset($userData[$managed_user_id]['total_points'])) {
                        $userData[$managed_user_id]['total_points'] = 0;
                    }

                    $managedUsersData[] = array(
                        'user_id' => $managed_user_id,
                        'name' => $managed_user_name,
                        'points' => $userData[$managed_user_id],
                    );
                }
            }
        } else {
            $userNameQuery = "SELECT first_name, last_name FROM user WHERE user_id = '$user_id'";
            $userNameResult = $conn->query($userNameQuery);

            if ($userNameResult->num_rows > 0) {
                $userNameRow = $userNameResult->fetch_assoc();
                $name = $userNameRow['first_name'] . ' ' . $userNameRow['last_name'];

                $userData = calculateUserPoints($conn, $targets, $tablenames);
                if (!isset($userData[$user_id]['total_points'])) {
                    $userData[$user_id]['total_points'] = 0;
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Points</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-wrapper {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Points</h2>
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <?php if ($lang == 'en'): ?>
                        <th class="text-warning">User ID</th>
                        <th class="text-warning">Employee Name</th>
                        <?php
                            foreach ($tablenames as $section_number => $tablename) {
                                echo "<th class='text-warning'>$section_number Points</th>";
                            }
                            echo "<th class='text-warning'>Total Points</th>";
                        else: ?>
                            <th class="text-warning">ID Pengguna</th>
                            <th class="text-warning">Nama Pekerja</th>
                        <?php
                            foreach ($tablenames as $section_number => $tablename) {
                                echo "<th class='text-warning'>$section_number Mata</th>";
                            }
                            echo "<th class='text-warning'>Jumlah Mata</th>";
                        endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($user_access_level == 1) {

                        foreach ($managedUsersData as $managedUserData) {
                            $managed_user_id = $managedUserData['user_id'];
                            $managed_user_name = $managedUserData['name'];
                            $managedUserPoints = $managedUserData['points'];

                            echo "<tr>";
                            echo "<td>$managed_user_id</td>";
                            echo "<td>$managed_user_name</td>";

                            foreach ($tablenames as $section_number => $tablename) {
                                $points = isset($managedUserPoints['section_points'][$section_number]) ? number_format($managedUserPoints['section_points'][$section_number], 2) : '0.00';
                                echo "<td>$points</td>";
                            }

                            echo "<td>" . number_format($managedUserPoints['total_points'], 2) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td>$user_id</td>";
                        echo "<td>$name</td>";

                        foreach ($tablenames as $section_number => $tablename) {
                            $points = isset($userData[$user_id]['section_points'][$section_number]) ? number_format($userData[$user_id]['section_points'][$section_number], 2) : '0.00';
                            echo "<td>$points</td>";
                        }

                        echo "<td>" . number_format($userData[$user_id]['total_points'], 2) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>