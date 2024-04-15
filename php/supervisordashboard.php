<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MIROSdb";


    $conn = require ("db_conn.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $userid = $_SESSION["user_id"];
    $sql = "SELECT points FROM user WHERE user_id = $userid";
    $result = $conn->query($sql);

    $sql = "SELECT u.user_id, u.first_name, u.last_name, s.section_number, s.year, s.points
                            FROM user u
                            INNER JOIN (SELECT user_id, section_number, year, points
                                        FROM a6_professional_affilliations_memberships
                                        UNION ALL
                                        SELECT user_id, section_number, year, points
                                        FROM b_professional_achievements
                                        
                                        ) s
                            ON u.user_id = s.user_id
                            WHERE u.user_access_level = 0
                            ORDER BY u.user_id, s.year DESC";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['section_number'] . " (" . $row['year'] . ")" . "</td>";
                            echo "<td>" . $row['points'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No submissions found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>

                </div>
                <div class="supervisor-submissions">
            <h3>Supervisor's Submissions</h3>
            <table>
              
            </table>
        </div>
    </div>
    ?>

</body>
    </html>
