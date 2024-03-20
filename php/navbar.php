<?php 
$english = $_GET['english'];
if ($english != 'True' && $english != 'False'){
    $english = 'True';
}

if (isset($_POST['submit'])) {
    if ($english == 'True') {
        header('Location: '.$_SERVER['PHP_SELF'].'?english=False');
    } else {
        header('Location: '.$_SERVER['PHP_SELF'].'?english=True');
    }
}

?>

<!DOCTYPE html>

<head>
    <title>MIROS Managment System</title>
    <link rel='stylesheet' href='../css/style.css' />
    <link rel="shortcut icon" href="../img/miros-M.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styleshee" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div>
            <table class="grey-bg"> <!-- Table for the first navbar at the top -->
                <tr>
                    <td class="padding">
                       <a href="index.php<?php echo '?english='.$english; ?>"><img alt="MIROS logo" src="../img/MIROS-logo.png" height="100"></a>
                    </td>
                    <td>
                        <p><small>The Official Management System of</small></p>
                        <h1 class="margin-top-20 bold">Malaysian Institute of Road Safety Research</h1>
                        <p class="margin-top-10">Institut Penyelidikan Keselamatan Jalan Raya Malaysia</p>
                    </td>
                    <td class="padding">
                        <div class="box right-align shadow2"> <!-- Creates a box around the text and image -->
                            <img alt="Admin" src="../img/contact-admin.png" height="65">
                            <p class="bold small-text">admin@miros.gov.my</p>
                        </div>
                    </td>
                </tr>
            </table>
            <div class = "shadow">
            <table class="black-bg"> <!-- Table for the second navbar underneath -->
                <?php if ($english == 'True'): ?>
                    <tr class="centre">
                        <td>
                            <a href="view_submissions.php"><button class="header-text bold">View Submissions</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php"><button class="header-text bold">View Employees</button></a>
                        <td>
                            <a href="login.php"><button class="header-text bold">Log in / Register</button></a>
                        </td>

                <?php else: ?>
                    <tr class="centre">
                        <td>
                            <a href="view_submissions.php"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php"><button class="header-text bold">Lihat pekerja</button></a>
                        <td>
                            <a href="login.php"><button class="header-text bold">Log masuk / Daftar</button></a>
                        </td>
                <?php endif; ?>
                    <td>
                        <?php if ($english == 'True'){ ?>
                            <form method="post">
                            <input class="header-text bold dark-grey-bg" type="submit" value="BM" name="submit"><button class="header-text bold active">EN</button>
                        <?php } else{ ?>
                            <form method="post">
                                <button class="header-text bold active">BM</button><input class="header-text bold dark-grey-bg" type="submit" value="EN" name="submit" >
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
    </header>
</body>
