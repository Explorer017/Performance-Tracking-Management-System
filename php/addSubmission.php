<?php


function addSubmission()
{
    include_once('db_conn.php');
    $created = false;
    $stmt = $conn->prepare("INSERT INTO Submission(submissionID, officerID, supervisorID, fileID, Section, Item, Date_Uploaded) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('iiiissd', $submission_id, $officer_id, $supervisor_id, $file_id, $section, $item, $date_uploaded);
    
    
    
    
    $submission_id = $_POST['submissionID'];
    $officer_id = $_POST['officerID'];
    $supervisor_id = $_POST['supervisorID'];
    $file_id = $_POST['fileID'];
    $section = $_POST['section'];
    $item = $_POST['item'];
    $date_uploaded = $_POST['dateUploaded'];
    
    
    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if ($stmt) {
        $created = true;
    }
    
    
    $stmt->close();
    $conn->close();
    
    //header("Location: submissionSummary.php")
}


?>