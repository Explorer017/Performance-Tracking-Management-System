<?php 
include("NavBar.php");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href= "../css/style.css">
    <title>MIROS</title>
    <style>
        body {
            background: url('../img/skyline-background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>

    <?php if ($lang == 'en'): ?>
        <div class="services-description">
            <div class="container">
                <h2>Our Services</h2>
                <p>The research and development landscape is increasingly dynamic, necessitating innovative approaches to performance management. The Performance Tracking & Management System (PTMS) is designed to meet this need, offering a comprehensive tracking solution and evaluating the contributions of research officers within an institute.</p>
            </div>
        </div>
    
    <?php elseif ($lang == 'bm'): ?>
        <div class="services-description">
            <div class="container">
                <h2>Perkhidmatan Kami</h2>
                <p>Lanskap penyelidikan dan pembangunan semakin dinamik, memerlukan pendekatan inovatif untuk pengurusan prestasi. Sistem Penjejakan & Pengurusan Prestasi (PTMS) direka bentuk untuk memenuhi keperluan ini, menawarkan penyelesaian penjejakan yang komprehensif dan menilai sumbangan pegawai penyelidik dalam sesebuah institut.</p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>