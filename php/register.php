<?php
$error_msg = " ";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    if (empty($_POST["fname"])){
        $error_msg = ("First name required");
    }

    if (empty($_POST["lname"])){
        $error_msg = ("Last name required");
    }

    if (strlen($_POST["password"]) < 8 ){
        $error_msg = ("Password must be at least 8 characters");
    }

    if ($_POST["password"] !== $_POST["confirm_password"]){
        $error_msg = ("Passwords must match");
    }
    
    else{
        $password_hash = hash('SHA1', $_POST["password"]);
        $supervisorID_default = 1;
        $points_default = 0;
        $conn = require __DIR__ . "/db_conn.php";

        $sql = "INSERT INTO research_officer (first_name, middle_name, last_name, password, email, supervisorID, points)
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
                            $supervisorID_default,
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

    echo $error_msg;
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
            <input type="text" placeholder="Middle Name" id="mname" name="mname">
        </div>

        <div>
            <input type="text" placeholder="Last Name" id="lname" name="lname">
        </div>

        <div>
            <input type="email" placeholder="Email" id="email" name="email">
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