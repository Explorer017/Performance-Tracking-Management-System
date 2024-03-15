<?php
require("navbar.php");
require("db_conn.php");
session_start();

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../css/style.css">
    <title>Miros</title>
    <style>
        body {
            background: url('../img/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>

    <div class="services-description">
        <div class="container">
            <h2>Our Services</h2>
            <p>The research and development landscape is increasingly dynamic, necessitating innovative approaches to performance management. The Performance Tracking & Management System (PTMS) is designed to meet this need, offering a comprehensive tracking solution and evaluating the contributions of research officers within an institute.</p>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

