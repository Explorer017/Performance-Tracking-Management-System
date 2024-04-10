<?php

function set_targets($section_number, $year){
    $db = require "db_conn.php";

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $sql = "INSERT INTO targets (section_number, year) VALUES ('$section_number', '$year')";
    if ($db->query($sql) === TRUE) {
        return true;
    }
    return false;
}
