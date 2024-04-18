<?php

function set_targets($section_number, $year, $target_amount, $highest_points, $lowest_points){
    $db = require "db_conn.php";

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $sql = "INSERT INTO targets (section_number, year, target_amount, highest_points, lowest_points) VALUES ('$section_number', '$year', '$target_amount', '$highest_points', '$lowest_points')";
    if ($db->query($sql) === TRUE) {
        return true;
    }
    return false;
}
