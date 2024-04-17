<?php 
session_start();
include_once("get_language.php");
$lang = GetLanguage();

if (isset($_POST['lang'])) {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                            <?php if (isset($_SESSION["email"])){ ?>
                            <a href = "settings.php<?php echo '?lang='.$lang; ?>"><img alt="Profile" src="../img/contact-admin.png" height="65"></a>
                            <p class="bold small-text">
                                <?php echo $_SESSION["email"];
                            }
                            else{ ?>
                                <img alt="User icon" src="../img/contact-admin.png" height="65"></a>
                                <p class="bold small-text">
                                <?php if ($lang == 'en'):
                                    echo ("Guest");
                                else:
                                    echo ("Tetamu");
                                endif;
                            }
                            ?></p>
                        </div>
                    </td>
                </tr>
            </table>
            <div>
            <table class="black-bg"> <!-- Table for the second navbar underneath -->
                <?php if ($lang == 'en'): ?>
                    <tr class="centre">
                        <?php if (!isset($_SESSION["permission"])): ?>
                            <td>
                            <a href="index.php<?php echo '?lang='.$lang; ?>"><img alt="View homepage" src="../img/home-icon.png" height="40">
                            </td>
                            <td>
                            </td>
                            <td>
                                <a href="login.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Log in / Register</button></a>
                            </td>
                            <?php else:
                                if ($_SESSION["permission"] == 0): ?>
                                <td>
                                <a href="researchdashboard.php<?php echo '?lang='.$lang; ?>"><img alt="View Dashboard" src="../img/home-icon.png" height="40">
                                </td>
                                <td>
                                    <a href="submissionPage.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Create New Submission</button></a>
                                </td>
                                <td>
                                    <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Submissions</button></a>
                                </td>
                            <?php elseif ($_SESSION["permission"] == 1): ?>
                                <td>
                                <a href="supervisordashboard.php<?php echo '?lang='.$lang; ?>"><img alt="View Dashboard" src="../img/home-icon.png" height="40">
                                </td>
                                <td>
                                    <a href="submissionPage.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Create New Submission</button></a>
                                </td>
                                <td>
                                    <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Submissions</button></a>
                                </td>
                                <td>
                                    <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Employees</button></a>
                                </td>
                            <?php elseif ($_SESSION["permission"] == 2): ?>
                                <td>
                                <a href="index.php<?php echo '?lang='.$lang; ?>"><img alt="View Dashboard" src="../img/home-icon.png" height="40">
                                </td>
                                <td>
                                    <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Submissions</button></a>
                                </td>
                                <td>
                                    <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">View Employees</button></a>
                                </td>
                            <?php else: ?>
                                <td>
                                <a href="admindashboard.php<?php echo '?lang='.$lang; ?>"><img alt="View Dashboard" src="../img/home-icon.png" height="40">
                                </td>
                                <td>
                                    <a href="view_users.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Edit Users</button></a>
                                </td>
                            <?php endif ?>
                            <td>
                                <a href="settings.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Profile</button></a>
                            </td>
                        <?php endif; ?>
                     <td>
                     <form method="post">
                            <input type="hidden" value="lang" name="lang"/>
                        <?php if ($lang == 'en'){ ?>
                            <input class="header-text bold dark-grey-bg" type="submit" value="BM" name="submit"><button class="header-text bold active">EN</button>
                        <?php } else{ ?>
                                <button class="header-text bold active">BM</button><input class="header-text bold dark-grey-bg" type="submit" value="EN" name="submit">
                        <?php } ?>
                            </form>
                    </td>
                <?php else: ?>
                    <tr class="centre">
                    <td>
                            <a href="index.php<?php echo '?lang='.$lang; ?>"><img alt="Lihat laman utama" src="../img/home-icon.png" height="40">
                    </td>
                    <?php if (!isset($_SESSION["permission"])): ?>
                        <td>
                        </td>
                        <td>
                            <a href="login.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Log masuk / Daftar</button></a>
                        </td>
                    <?php else: 
                        if ($_SESSION["permission"] == 0): ?>
                        <td>
                                <a href="submissionPage.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Buat Penyerahan Baru</button></a>
                        </td>
                        <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                    <?php elseif ($_SESSION["permission"] == 1): ?>
                        <td>
                            <a href="submissionPage.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Buat Penyerahan Baru</button></a>
                        </td>
                        <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat pekerja</button></a>
                        </td>
                        <?php elseif ($_SESSION["permission"] == 2): ?>
                            <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat pekerja</button></a>
                        </td>
                        <td> 
                            <a href="pointsAlgorithm.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Titik Pandangan</button></a>
                        </td>
                        <?php else: ?>
                            <td>
                                <a href="view_users.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Mengedit Pengguna</button></a>
                            </td>
                            <?php endif; ?>
                            <td>
                                <a href="settings.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Profil</button></a>
                            </td>
                        <?php endif; ?>
                        <td>
                        <form method="post">
                            <input type="hidden" value="lang" name="lang"/>
                        <?php if ($lang == 'en'){ ?>
                            <input class="header-text bold dark-grey-bg" type="submit" value="BM" name="submit"><button class="header-text bold active">EN</button>
                        <?php } else{ ?>
                                <button class="header-text bold active">BM</button><input class="header-text bold dark-grey-bg" type="submit" value="EN" name="submit">
                        <?php } ?>
                            </form>
                    </td>
                <?php endif; ?>
                </tr>
            </table>
        </div>
    </header>
</body>
