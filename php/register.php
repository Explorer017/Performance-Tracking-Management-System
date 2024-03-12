<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    if (empty($_POST["fname"])){
        echo("First name required");
    }

    if (empty($_POST["lname"])){
        echo("Last name required");
    }

    if (strlen($_POST["password"]) < 8 ){
        echo("Password must be at least 8 characters");
    }

    if ($_POST["password"] !== $_POST["confirm_password"]){
        echo("Passwords must match");
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $conn = require __DIR__ . "/db_conn.php";

    $sql = "INSERT INTO user ()
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->stmt_init();

    if ( ! $stmt->prepare($sql)){
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param("sss", 
                        $_POST["fname"],
                        $_POST["lname"],
                        $password_hash,
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
    };
}

?>

<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
</html>

<body>
    <h1>Register</h1>

    <form method="post">
        <div>
            <input type="text" placeholder="First Name" id="fname" name="fname">
        </div>

        <div>
            <input type="text" placeholder="Last Name" id="lname" name="lname">
        </div>

        <div>
            <input type="password" placeholder="Password" id="password" name="password">
        </div>

        <div>
            <input type="password" placeholder="Confirm Password" id="confirm_password"  name="confirm_password">
        </div>

        <div>
            <button type="submit";>Register</button>
        </div>
    </form>

</body>