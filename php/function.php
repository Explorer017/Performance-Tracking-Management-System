<?php

function db_conn(){
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
}


function showSupervisor($conn)
{
    
    $sql = $conn->query('SELECT supervisorID, CONCAT(first_name, " ",middle_name, " ",last_name) AS sv_name
    FROM supervisor');
    //$stmt = $db->prepare($sql);
    //$stmt->execute();
    //$data = $stmt->fetchAll();

    echo '<select id = "supervisor" name = "supervisor" class="form-control">' ;

    foreach ($sql as $row) {
        echo '<option value="' . $row['supervisorID'] . '">' . $row['sv_name'] . '</option>';
    }

    echo '</select>';

}

function showOfficer($conn)
{
    
    $sql = $conn->query('SELECT officerID, CONCAT(first_name, " ",middle_name, " ",last_name) AS officer
    FROM research_officer');
    //$stmt = $db->prepare($sql);
    //$stmt->execute();
    //$data = $stmt->fetchAll();

    echo '<select id = "officer" name = "officer" class="form-control">' ;

    foreach ($sql as $row) {
        echo '<option value="' . $row['officerID'] . '">' . $row['officer'] . '</option>';
    }

    echo '</select>';

}

function addSubmission($conn)
{
   
    $officer_id = $_POST['officer'];
    $file_id = $_POST['fileID'];
    $section = $_POST['section'];
    $item = $_POST['item'];
    $date_uploaded = $_POST['dateUploaded'];

    $created = false;
    $stmt = $conn->prepare("INSERT INTO Submission(officerID, fileID, Section, Item, Date_Uploaded) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('iisss',$officer_id, $file_id, $section, $item, $date_uploaded);
    
   
    
    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if ($stmt) {
        $created = true;
    }
    
    
    $stmt->close();
    $conn->close();
    
    header("Location: submissionSummary.php");
}

