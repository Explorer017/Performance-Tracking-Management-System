<?php
include("NavBar.php");
include_once("addSubmission.php");
include_once("function.php");
include_once("db_conn.php");
$conn = db_conn();
$user_id = $_GET['userid'];

function deleteUser($user_id){
    $db = require "db_conn.php";

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "DELETE FROM user WHERE user_id = '$user_id'";
    $result = $db->query($sql);
    
}
 
deleteUser($user_id);
header("Location: view_users.php");

?>
<html>
    <body>
        <br>
            <h2> User sucessfully deleted! </h2>
</body>
</html>


 