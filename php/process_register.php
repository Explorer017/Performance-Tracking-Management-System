<?php

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

?>