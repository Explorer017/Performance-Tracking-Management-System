<?php 
include("navbar.php");
include_once("get_language.php");
$lang = GetLanguage();
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['logout'] == 'logout') {
    session_destroy();
    header('Location: index.php?lang='. $lang);
}
?>

<div>
    <?php if (session_status() == PHP_SESSION_ACTIVE): ?>
        <div class="centre">
            <br>
            <?php if ($lang == 'en'): ?>
            <h1>Are you sure you want to log out?</h1>
            <br></br>
            <form action="logout.php" method="post">
                <input type="hidden" value="logout" name="logout"/>
                <input class="button" type="submit" value="Log Out" name="submit">
            </form>
            <?php else: ?>
            <h1>Adakah anda pasti mahu log keluar?</h1>
            <br></br>
            <form action="logout.php" method="post">
                <input type="hidden" value="logout" name="logout"/>
                <input class="button" type="submit" value="Log Keluar" name="submit">
            </form>
            <?php endif ?>
        </div>
    <?php else:
        header('Location: index.php?lang='. $lang);
    endif ?>
</div>