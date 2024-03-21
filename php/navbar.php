<?php 

include_once("get_language.php");
$lang=GetLanguage();

if (isset($_POST['submit'])) {
    if ($lang == 'en') {
        header('Location: '.$_SERVER['PHP_SELF'].'?lang=bm');
    } else {
        header('Location: '.$_SERVER['PHP_SELF'].'?lang=en');
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
                       <a href="index.php<?php echo '?lang='.$lang; ?>"><img alt="MIROS logo" src="../img/MIROS-logo.png" height="100"></a>
                    </td>
                    <td>
                        <p><small>The Official Management System of</small></p>
                        <h1 class="margin-top-20 bold">Malaysian Institute of Road Safety Research</h1>
                        <p class="margin-top-10">Institut Penyelidikan Keselamatan Jalan Raya Malaysia</p>
                    </td>
                    <td class="padding">
                        <div class="box right-align"> <!-- Creates a box around the text and image -->
                            <img alt="Admin" src="../img/contact-admin.png" height="65">
                            <p class="bold small-text">admin@miros.gov.my</p>
                        </div>
                    </td>
                </tr>
            </table>
            <div class = "shadow">
            <table class="black-bg"> <!-- Table for the second navbar underneath -->
                <?php if ($lang == 'en'): ?>
                    <tr class="centre">
                        <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Submissions</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Employees</button></a>
                        <td>
                            <a href="login.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Log in / Register</button></a>
                        </td>
                        <td>
                            <form method="post">
                            <input class="header-text bold dark-grey-bg" type="submit" value="BM" name="submit"><button class="header-text bold active">EN</button>
                        </td>
                <?php else: ?>
                    <tr class="centre">
                        <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat pekerja</button></a>
                        <td>
                            <a href="login.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Log masuk / Daftar</button></a>
                        </td>
                        <td>
                            <form method="post">
                            <button class="header-text bold active">BM</button><input class="header-text bold dark-grey-bg" type="submit" value="EN" name="submit" >
                        </td>
                <?php endif; ?>
                </tr>
            </table>
        </div>
    </header>
</body>
