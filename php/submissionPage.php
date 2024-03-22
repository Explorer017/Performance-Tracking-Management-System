<?php
include_once("NavBar.php");
//include_once("addSubmission.php");
include_once("function.php");
include_once("db_conn.php");
$conn = db_conn();
if (isset($_POST['submit'])) {
    
        $submission = addSubmission($conn);
        header('Location: submissionSummary.php?submission=' . $submission);
	}

?>

<div class="container bgColor">
	<main role="main" class="pb-3">
		<div class="row">
			<div class="col-8">
				<form method="post">
					<div class="form-group col-md-6">
						<label class="control-label labelFont">Officer ID</label>
						<?php showOfficer($conn); ?>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label labelFont">Supervisor ID</label>
						<?php showSupervisor($conn); ?>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label labelFont">File ID</label>
						<input class="form-control" placeholder="Enter the file ID" type="text" name="fileID" required>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label labelFont">Section</label>
						<input class="form-control" placeholder="Enter the section for the task" type="text" name="section" required>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label labelFont">Item</label>
						<input class="form-control" placeholder="Enter the item for the task" type="text" name="item" required>
					</div>
					<div class="form-group col-md-6">
						<label class="control-label labelFont">Date Uploaded</label>
						<input class="form-control" placeholder="Enter the date of upload for this task" type="date" name="dateUploaded" required>
					</div>

					<div class="form-group col-md-4">
						<input class="btn-primary" type="submit" value="Finish Submission" name="submit">
					</div>
				</form>
			</div>
		</div>
	</main>
</div>