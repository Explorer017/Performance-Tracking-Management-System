<?php

function getUser($user_id){
    $db = require "db_conn.php";

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $result = $db->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row;
    }
}

function editUser($user_id, $first_name, $middle_name, $last_name, $user_access_level, $email, $higher_user_id){
    $db = require "db_conn.php";

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "UPDATE user SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', user_access_level = '$user_access_level', email='$email', higher_user_id='$higher_user_id' WHERE user_id = '$user_id'";
    if ($db->query($sql) === TRUE) {
        return true;
    }
    return false;
}

function getSupervisors(){
    $db = require "db_conn.php";
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $sql = "SELECT * FROM user WHERE user_access_level = 1";
    $result = $db->query($sql);
    $output = [];
    while ($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
    return $output;
    return false;
}
function getManagers(){
    $db = require "db_conn.php";
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $sql = "SELECT * FROM user WHERE user_access_level = 2";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
    return $output;
    return false;
}