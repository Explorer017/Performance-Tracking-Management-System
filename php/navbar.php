<?php 
session_start();
include_once("get_language.php");
$lang = GetLanguage();

if (isset($_GET['userid'])){
    $userid = $_GET['userid'];
}

if (isset($_POST['lang'])) {
    if ($lang == 'en') {
        if (isset($userid)){
            header('Location: '.$_SERVER['PHP_SELF'].'?lang=bm&userid='. $userid);
        } else {
            header('Location: '.$_SERVER['PHP_SELF'].'?lang=bm');
        }
    } else {
        if (isset($userid)){
            header('Location: '.$_SERVER['PHP_SELF'].'?lang=en&userid='. $userid);
        } else {
            header('Location: '.$_SERVER['PHP_SELF'].'?lang=en');
        }
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
                    <?php if (isset($_SESSION["user_id"])){
                        $userid = $_SESSION["user_id"];
                        $conn = require __DIR__ .  "/db_conn.php";
                        $sql = sprintf("SELECT first_name, last_name FROM user WHERE user_id = $userid");
                        $result = $conn->query($sql);
                        $user = $result->fetch_assoc();
                        $name = $user["first_name"] . " " . $user["last_name"];
                        $name_len = mb_strwidth($name);
                        } else{
                            $name_len = 1;
                        }
                        if ($name_len > 17){ ?>
                        <div class="box right-align" style="width:<?php echo $name_len*8;?>px;height:100px;"> <!-- Creates a box around the text and image -->
                        <?php } else {?>
                        <div class="box right-align" style="width:155px;height:100px;"> <!-- Creates a box around the text and image -->
                        <?php } ?>
                            <?php if (isset($_SESSION["user_id"])){ ?>
                            <a href = "settings.php<?php echo '?lang='.$lang; ?>"><img alt="Profile" src="../img/contact-admin.png" height="65"></a>
                            <p class="bold small-text">
                                <?php echo $name;
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
                                    <a href="set_targets.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Set Targets</button></a>
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
                    <?php if (!isset($_SESSION["permission"])): ?>
                        <td>
                            <a href="index.php<?php echo '?lang='.$lang; ?>"><img alt="Lihat halaman utama" src="../img/home-icon.png" height="40">
                        </td>
                        <td>
                        </td>
                        <td>
                            <a href="login.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Log masuk / Daftar</button></a>
                        </td>
                    <?php else: 
                        if ($_SESSION["permission"] == 0): ?>
                        <td>
                            <a href="researchdashboard.php<?php echo '?lang='.$lang; ?>"><img alt="Lihat Papan Pemuka" src="../img/home-icon.png" height="40">
                        </td>
                        <td>
                                <a href="submissionPage.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Buat Penyerahan Baru</button></a>
                        </td>
                        <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                    <?php elseif ($_SESSION["permission"] == 1): ?>
                        <td>
                            <a href="supervisordashboard.php<?php echo '?lang='.$lang; ?>"><img alt="Lihat Papan Pemuka" src="../img/home-icon.png" height="40">
                        </td>
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
                            <a href="index.php<?php echo '?lang='.$lang; ?>"><img alt="Lihat Papan Pemuka" src="../img/home-icon.png" height="40">
                            </td>
                            <td>
                                    <a href="set_targets.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Tetapkan Sasaran</button></a>
                                </td>
                            <td>
                            <a href="view_submissions.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat Penyerahan</button></a>
                        </td>
                        <td>
                            <a href="view_employees.php<?php echo '?lang='.$lang; ?>"><button class="header-text bold">Lihat pekerja</button></a>
                        </td>
                        <?php else: ?>
                            <td>
                            <a href="admindashboard.php<?php echo '?lang='.$lang; ?>"><img alt="Lihat Papan Pemuka" src="../img/home-icon.png" height="40">
                            </td>
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
