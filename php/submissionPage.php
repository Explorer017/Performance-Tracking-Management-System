<?php
include_once("NavBar.php");
include_once("addSubmission.php");
$errorsubmissionid = $errorofficerid = $errorsupervisorid = $errorfileid = $errorsection = $erroritem = $errordateuploaded = "";
$allFields = "yes";

if (isset($_POST['submit'])) {
    if ($_POST['submissionID'] == "") {
        $errorsubmissionid = "Submission ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['officerID'] == null) {
        $errorofficerid = "Officer ID name is mandatory";
        $allFields = "no";
    }
    if ($_POST['supervisorID'] == "") {
        $errorsupervisorid = "Supervisor ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['fileID'] == "") {
        $errorfileid = "File ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['section'] == "") {
        $errorsection = "The section is mandatory";
        $allFields = "no";
    }
    if ($_POST['item'] == "") {
        $erroritem = "The item is mandatory";
        $allFields = "no";
    }
    if ($_POST['dateUploaded'] == "") {
        $errordateuploaded = "The date uploaded is mandatory";
        $allFields = "no";
    }
    



    if ($allFields == "yes") {
        $submission = addSubmission();
        header('Location: submissionSummary.php?submission=' . $submission);
    }
}
?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <form method="post">
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Submission ID</label>
                        <input class="form-control" placeholder="Enter the submission ID" type="text" name="submissionID">
                        <span class="text-danger"><?php echo $errorsubmissionID; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Officer ID</label>
                        <input class="form-control" placeholder="Enter the officer ID" type="text" name="officerID">
                        <span class="text-danger"><?php echo $errorofficerID; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Supervisor ID</label>
                        <input class="form-control" placeholder="Enter the supervisor ID" type="text" name="supervisorID">
                        <span class="text-danger"><?php echo $errorsupervisorID; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">File ID</label>
                        <input class="form-control" placeholder="Enter the file ID" type="text" name="fileID">
                        <span class="text-danger"><?php echo $errorfileID; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section</label>
                        <input class="form-control" placeholder="Enter the section for the task" type="text" name="section">
                        <span class="text-danger"><?php echo $errorsection; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Item</label>
                        <input class="form-control" placeholder="Enter the item for the task" type="text" name="item">
                        <span class="text-danger"><?php echo $erroritem; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Date Uploaded</label>
                        <input class="form-control" placeholder="Enter the date of upload for this task" type="text" name="dateUploaded">
                        <span class="text-danger"><?php echo $errordateuploaded; ?></span>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input class="btn-primary" type="submit" value="Finish Submission" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>