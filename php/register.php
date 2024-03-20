<?php
$error_msg = " ";
$allFields = "yes";


if ($_SERVER["REQUEST_METHOD"] === "POST"){

    if (empty($_POST["fname"])){
        $error_msg = ("First name required");
        $allFields = "no";
    }

    elseif (empty($_POST["lname"])){
        $error_msg = ("Last name required");
        $allFields = "no";
    }

    elseif (empty($_POST["email"]) OR  !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $error_msg = ("Email required");
        $allFields = "no";
    }

    elseif (strlen($_POST["password"]) < 8 ){
        $error_msg = ("Password must be at least 8 characters");
        $allFields = "no";
    }

    elseif ($_POST["password"] !== $_POST["confirm_password"]){
        $error_msg = ("Passwords must match");
        $allFields = "no";
    }
    
    elseif ($allFields = "yes"){
        $error_msg = " ";
        header('Location: process_register.php');
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

    <div class="input-form-box shadow">
        <h1 class="input-form-title";>Register</h1>
        <form method="post">
            <div class="input-container">
                <input type="text" placeholder="First Name" id="fname" name="fname" class="input-field">
                <label for="input-field" class="input-label">Enter Your First Name</label>
                <span class="input-highlight"></span>
            </div>


            <div class="input-container">
                <input type="text" placeholder="Middle Name" id="mname" name="mname" class="input-field">
                <?php if($english):?>
                    <label for="input-field" class="input-label">Enter Your Middle Name</label>
                <?php else:?>
                    <label for="input-field" class="input-label">Masukkan Nama Tengah Anda</label>
                <?php endif; ?>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="text" placeholder="Last Name" id="lname" name="lname" class="input-field">
                <label for="input-field" class="input-label">Enter Your Last Name</label>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="email" placeholder="Email" id="email" name="email" class="input-field">
                <label for="input-field" class="input-label">Enter Your Email</label>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="password" placeholder="Password" id="password" name="password" class="input-field">
                <label for="input-field" class="input-label">Enter Your Password</label>
                <span class="input-highlight"></span>
            </div>

            <div class="input-container">
                <input type="password" placeholder="Confirm Password" id="confirm_password"  name="confirm_password" class="input-field">
                <label for="input-field" class="input-label">Re-enter Your Password</label>
                <span class="input-highlight"></span>
            </div>


            <div>
                <button type="submit" class="submit-btn";>Register</button>
            </div> 

            <span class="text-danger" style="color:red; display:flex; justify-content: center; margin-top:25px";>
                <?php if ($_SERVER["REQUEST_METHOD"] === "POST"){ 
                    echo $error_msg; }?></span>

        </form>
    </div>
</div>

</body>