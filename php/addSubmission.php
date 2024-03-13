<?php

function addSubmission(){
    
    
    $created = false;
    $db = new SQLite3('Task management system database.db.db'); 
    $sql = 'INSERT INTO Submission(submissionID, officerID, supervisorID, fileID, Section, Item, Date_Uploaded) VALUES (:submissionID, :officerID, :supervisorID, :fileID, :section, :item, :dateUploaded)';
    $stmt = $db->prepare($sql); 

    
    $stmt->bindParam(':submissionID', $_POST['submissionID'], SQLITE3_TEXT); 
    $stmt->bindParam(':officerID', $_POST['officerID'], SQLITE3_TEXT);
    $stmt->bindParam(':supervisorID', $_POST['supervisorID'], SQLITE3_TEXT);
    $stmt->bindParam(':fileID', $_POST['fileID'], SQLITE3_TEXT);
    $stmt->bindParam(':section', $_POST['section'], SQLITE3_TEXT);
    $stmt->bindParam(':item', $_POST['item'], SQLITE3_TEXT);
    $stmt->bindParam(':dateUploaded', $_POST['dateUploaded'], SQLITE3_TEXT);


    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}