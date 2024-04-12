<?php
include_once("NavBar.php");
include("addSubmission.php");
include_once("function.php");
include_once("db_conn.php");
$conn = db_conn();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "posted";
        $submission = addA6Submission($conn);
        header('Location: submissionSummary.php?submission=' . $submission);
	}

?>



<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Supporting File ID</label>
                        <input class="form-control" placeholder="Enter the supporting file ID" type="text" name="supportingFileID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Points</label>
                        <input class="form-control" placeholder="Enter the points given" type="text" name="points">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input class="btn-primary" type="submit" value="Finish Submission" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

