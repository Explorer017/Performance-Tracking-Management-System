<?php
function get_access_level($user_level){
    $names = [
        'Null' => 'No Job Title Assigned',
        0 => 'Research Officer',
        1 => 'Supervisor',
        2 => 'Management',
        3 => 'Admin'
    ];
return $names[$user_level];
}

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


function showUser($conn)
{
    
    $sql = $conn->query('SELECT userID, CONCAT(first_name, " ",middle_name, " ",last_name) AS user_name
    FROM user');
    //$stmt = $db->prepare($sql);
    //$stmt->execute();
    //$data = $stmt->fetchAll();

    echo '<select id = "user" name = "user" class="form-control">' ;

    foreach ($sql as $row) {
        echo '<option value="' . $row['userID'] . '">' . $row['user_name'] . '</option>';
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

//function addSubmission($conn)
//{
   
   // $officer_id = $_POST['officer'];
   // $file_id = $_POST['fileID'];
    //$section = $_POST['section'];
   // $item = $_POST['item'];
   // $date_uploaded = $_POST['dateUploaded'];

   // $created = false;
    //$stmt = $conn->prepare("INSERT INTO Submission(officerID, fileID, Section, Item, Date_Uploaded) VALUES (?, ?, ?, ?, ?)");
   // $stmt->bind_param('iisss',$officer_id, $file_id, $section, $item, $date_uploaded);
    
   
    
    //execute the sql statement
    //$stmt->execute();
    
    //the logic
   // if ($stmt) {
   //     $created = true;
   // }
    
    
    //$stmt->close();
    //$conn->close();
    
    //header("Location: submissionSummary.php");
//}

