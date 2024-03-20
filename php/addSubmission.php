<?php


function addSubmission($conn)
{


    $officer_id = $_POST['officer'];
    $file_id = $_POST['fileID'];
    $section = $_POST['section'];
    $item = $_POST['item'];
    $date_uploaded = $_POST['dateUploaded'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO Submission(officerID, fileID, Section, Item, Date_Uploaded) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('iissd',$officer_id, $file_id, $section, $item, $date_uploaded);
    
    
    
    
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


?>