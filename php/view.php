<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Add custom CSS for horizontal scrolling */
        .table-wrapper {
            overflow-x: auto;
        }
    </style>
    <title>View</title>
</head>
<body>

<?php
include("NavBar.php");
include 'db_conn.php';

// Fetch all table names from the database schema excluding 'user' and 'targets'
$sqlTables = "SHOW TABLES";
$resultTables = $conn->query($sqlTables);

$tableNames = array();
if ($resultTables->num_rows > 0) {
    while ($row = $resultTables->fetch_row()) {
        // Exclude 'user' and 'targets' tables
        if ($row[0] !== 'user' && $row[0] !== 'targets') {
            $tableNames[] = $row[0];
        }
    }
}

// Function to fetch columns of a table
function fetchTableColumns($tableName, $conn)
{
    $sqlColumns = "SHOW COLUMNS FROM $tableName";
    $resultColumns = $conn->query($sqlColumns);

    if ($resultColumns) {
        $columns = array();
        while ($row = $resultColumns->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
        return $columns;
    } else {
        echo "Error fetching columns: " . $conn->error;
        return array(); // Return an empty array if there's an error
    }
}

// Check if the table name is provided
if (isset($_GET['table'])) {
    $tableName = $_GET['table']; // Get the selected table name

    // Fetch columns of the selected table
    $columns = fetchTableColumns($tableName, $conn);
} else {
    // If no table is selected, use the first table from the list
    if (!empty($tableNames)) {
        $tableName = $tableNames[0];
        $columns = fetchTableColumns($tableName, $conn);
    } else {
        // Handle case where no tables are found in the database
        $tableName = "";
        $columns = array();
    }
}
?>

<div class="container">
    
    <h2>Submission Records</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <!-- Dropdown menu for selecting table -->
            <select id="tableSelect" class="form-control">
                <?php
                // Display options for selecting tables
                foreach ($tableNames as $table) {
                    echo "<option value=\"$table\"";
                    if ($tableName == $table) {
                        echo " selected";
                    }
                    echo ">$table</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
            <tr>
                <?php
                // Display table headers based on selected table columns
                if (isset($columns)) {
                    foreach ($columns as $columnName) {
                        echo "<th class='text-warning'>$columnName</th>";
                    }
                }
                ?>
            </tr>
            </thead>
            <tbody id="tableBody">
            <?php
            // Fetch records from the selected table
            if (isset($tableName) && isset($columns)) {
                $sql = "SELECT * FROM $tableName";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($columns as $columnName) {
                                echo "<td>" . $row[$columnName] . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . count($columns) . "'>0 results found</td></tr>";
                    }
                } else {
                    echo "Error fetching data: " . $conn->error;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        // Event listener for dropdown change
        $('#tableSelect').change(function () {
            var tableName = $(this).val();
            window.location.href = 'view_submissions.php?table=' + tableName; // Redirect to the same page with selected table name as query parameter
        });
        
    });
</script>

</body>
</html>