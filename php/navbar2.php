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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="styleshee" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div>
            <table class="grey-bg"> 
                <tr>
                    <td class="padding">
                       <a href="index.php"><img alt="MIROS logo" src="../img/MIROS_logo.png" height="100"></a>
                    </td>
                    <td>
                        <p><small>The Official Management System of</small></p>
                        <h1 class="margin-top-20 bold">Malaysian Institute of Road Safety Research</h1>
                        <p class="margin-top-10">Institut Penyelidikan Keselamatan Jalan Raya Malaysia</p>
                    </td>
                    <td class="padding">
                        <div class="box right-align"> 
                            <img alt="Admin" src="../img/contact_admin.png" height="65">
                            <p class="bold small-text"> Research Officer </p>
                        </div>
                    </td>
                </tr>
            </table>
            <table class="black-bg"> 
                <tr class="centre">
                    
                    <td>
                        <a href="researchofficerhome.php"><button class="header-text bold"> Research Officer Home </button></a>
                    </td>
                    <td>
                        <a href="submission.php"><button class="header-text bold">Submit Research</button></a>
                    <td>
                        <a href="view.php"><button class="header-text bold">View Previous Submissions </button></a>
                    </td>
                    <td>
                        <div>
                        <button class="header-text bold dark-grey-bg">BM</button><button class="header-text bold active">EN</button>
</div>
                    </td>
                </tr>
            </table>
        </div>
    </header>
</body>