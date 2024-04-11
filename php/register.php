<?php

include_once("get_language.php");

$lang = GetLanguage();
$error_msg_en = " ";
$error_msg_bm = " ";
$allFields = "yes";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    if (empty($_POST["fname"])){
        $error_msg_en = ("First name required");
        $error_msg_bm = ("Nama pertama diperlukan");
        $allFields = "no";
    }

    elseif (empty($_POST["lname"])){
        $error_msg_en = ("Last name required");
        $error_msg_bm = ("Nama keluarga diperlukan");
        $allFields = "no";
    }

    elseif (empty($_POST["email"]) OR  !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $error_msg_en = ("Email required");
        $error_msg_bm = ("E-mel diperlukan");
        $allFields = "no";
    }

    elseif (strlen($_POST["password"]) < 8 ){
        $error_msg_en = ("Password must be at least 8 characters");
        $error_msg_bm = ("Kata laluan mestilah sekurang-kurangnya 8 aksara");
        $allFields = "no";
    }

    elseif ($_POST["password"] !== $_POST["confirm_password"]){
        $error_msg_en = ("Passwords must match");
        $error_msg_bm = ("Kata laluan mesti sepadan");
        $allFields = "no";
    }
    
    elseif ($allFields = "yes"){
        $error_msg_en = (" ");
        $error_msg_bm = (" ");


        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $higher_user_id_default = 0;
        $points_default = 0;
        $conn = require __DIR__ . "/db_conn.php";

        $sql = "INSERT INTO user (first_name, middle_name, last_name, password, email, user_access_level, points)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->stmt_init();

        if ( ! $stmt->prepare($sql)){
            die("SQL error: " . $conn->error);
        }

        $stmt->bind_param("sssssii", 
                            $_POST["fname"],
                            $_POST["mname"],
                            $_POST["lname"],
                            $password_hash,
                            $_POST["email"],
                            $higher_user_id_default,
                            $points_default
                        );

        try{
            if($stmt->execute()){
                echo("registration successful");
                sleep(2);
                header("Location: login.php");
                exit;
            }

        } 
        catch(mysqli_sql_exception $e){
            if ($e->getCode() === 1062) {
                die("email already in use");
            } 
            else {
                die("An error occurred:" . $e->getMessage() . "Error number: " . $e->getCode());
            }
        }


    }
}
?>

<html>
    <head>
        <title>MIROS - Register</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../img/miros-M.png" />
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
</html>

<body>
<div style="display: flex; height:100%";>
    <img src="../img/miros-logo.png" alt="Logo"
        style="width: 450px; height:150px; margin-left: 75px; margin-top: 75px;">

    <div class="input-form-box">
        <h1 class="input-form-title";>Register</h1>
        <form method="post">
            <div class="input-container">
                <input type="text" <?php if ($lang == 'en'):?>placeholder="First Name"<?php else:?>placeholder="Nama Pertama"<?php endif;?> id="fname" name="fname" class="input-field">
                <?php if($lang == 'en'):?>
                    <label for="input-field" class="input-label">Enter Your First Name</label>
                <?php elseif ($lang == 'bm'):?>
                    <label for="input-field" class="input-label">Masukkan Nama Pertama Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>


            <div class="input-container">
                <input type="text" <?php if ($lang == 'en'):?>placeholder="Middle Name"<?php else:?>placeholder="Nama Tengah"<?php endif;?>  id="mname" name="mname" class="input-field">
                <?php if($lang == 'en'):?>
                    <label for="input-field" class="input-label">Enter Your Middle Name</label>
                <?php elseif ($lang == 'bm'):?>
                    <label for="input-field" class="input-label">Masukkan Nama Tengah Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="text" <?php if ($lang == 'en'):?>placeholder="Last Name"<?php else:?>placeholder="Nama Akhir"<?php endif;?>  id="lname" name="lname" class="input-field">
                <?php if($lang == 'en'):?>
                    <label for="input-field" class="input-label">Enter Your Last Name</label>
                <?php elseif ($lang == 'bm'):?>
                    <label for="input-field" class="input-label">Masukkan Nama Akhir Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="email" <?php if ($lang == 'en'):?>placeholder="Email"<?php else:?>placeholder="Emel"<?php endif;?>  id="email" name="email" class="input-field">
                <?php if($lang == 'en'):?>
                    <label for="input-field" class="input-label">Enter Your Email</label>
                <?php elseif ($lang == 'bm'):?>
                    <label for="input-field" class="input-label">Masukkan Emel Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="password" <?php if ($lang == 'en'):?>placeholder="Password"<?php else:?>placeholder="Kata Laluan"<?php endif;?>  id="password" name="password" class="input-field">
                <?php if($lang == 'en'):?>
                    <label for="input-field" class="input-label">Enter Your Password</label>
                <?php elseif ($lang == 'bm'):?>
                    <label for="input-field" class="input-label">Masukkan Kata Laluan Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="password" <?php if ($lang == 'en'):?>placeholder="Confirm Password"<?php else:?>placeholder="Sahkan Kata Laluan"<?php endif;?>  id="confirm_password"  name="confirm_password" class="input-field">
                <?php if($lang == 'en'):?>
                    <label for="input-field" class="input-label">Re-enter Your Password</label>
                <?php elseif ($lang == 'bm'):?>
                    <label for="input-field" class="input-label">Masukkan Semula Kata Laluan Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>

            <div>
                <?php if($lang == 'en'):?>
                    <button type="submit" class="submit-btn";>Register</button>
                <?php elseif ($lang == 'bm'):?>
                    <button type="submit" class="submit-btn";>Daftar</button>
                <?php endif; ?>
            </div> 

            <span class="text-danger" style="color:red; display:flex; justify-content: center; margin-top:25px";>
                <?php if ($_SERVER["REQUEST_METHOD"] === "POST"){ 
                    if ($lang == 'en'){
                        echo $error_msg_en;
                    }
                    else{
                        echo $error_msg_bm;
                    }
                }?>
            </span>
        </form>
    </div>
</div>
</body>