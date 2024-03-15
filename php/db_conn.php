<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "mirosdb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);

//check the connection
if ($conn->connect_error){
    die("Connection Failed: " . $conn-> connect_error);

}

return $conn;