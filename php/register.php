<?php
$error_msg = "s ";
$allFields = "yes";


if ($_SERVER["REQUEST_METHOD"] === "POST"){

    if (empty($_POST["fname"])){
        $error_msg = ("First name required");
        $allFields = "no";
    }

    if (empty($_POST["lname"])){
        $error_msg = ("Last name required");
        $allFields = "no";
    }

    if (strlen($_POST["password"]) < 8 ){
        $error_msg = ("Password must be at least 8 characters");
        $allFields = "no";
    }

    if ($_POST["password"] !== $_POST["confirm_password"]){
        $error_msg = ("Passwords must match");
        $allFields = "no";
    }
    
    if ($allFields = "yes"){

        $password_hash = hash('SHA1', $_POST["password"]);
        $higher_user_id_default = 0;
        $points_default = 0;
        $conn = require __DIR__ . "/db_conn.php";

        $sql = "INSERT INTO user (first_name, middle_name, last_name, password, email, higher_user_id, points)
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
                <input type="text" placeholder="First Name" id="fname" name="fname" class="input-field">
                <label for="input-field" class="input-label">Enter Your First Name</label>
                <span class="input-highlight"></span>
            </div>


            <div class="input-container">
                <input type="text" placeholder="Middle Name" id="mname" name="mname" class="input-field">
                <label for="input-field" class="input-label">Enter Your Middle Name</label>
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

            <span class="text-danger" style="color:red; display:flex; justify-content: center; margin-top:25px";><?php echo $error_msg; ?></span>

        </form>
    </div>
</div>

</body>