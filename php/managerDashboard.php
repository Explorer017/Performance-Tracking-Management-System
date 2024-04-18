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
    ?>
</body>