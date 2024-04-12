<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Add custom CSS for horizontal scrolling */
        .table-wrapper {
            overflow-x: auto;
        }
    </style>
    <title>View</title>
</head>
<body>



<?php
include_once("NavBar.php");
include("addSubmission.php");
include_once("function.php");
include_once("db_conn.php");
$conn = db_conn();

if (isset($_GET['table'])){
    $table = $_GET['table'];
} else {
    $table = null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['table'] == 'A'){
            $submission = addA6Submission($conn);
        } elseif ($_POST['table'] == 'B'){
            $submission = addBProfessionalAchievements($conn);
        } elseif ($_POST['table'] == 'C1'){
            $submission = addC1LeadNewResearch($conn);
        } elseif ($_POST['table'] == 'C2'){
            $submission = addC2ResearchDevelopmentProjects($conn);
        } elseif ($_POST['table'] == 'C3'){
            $submission = addC3ResearchDevelopmentOperations($conn);
        } elseif ($_POST['table'] == 'D'){
            $submission = addDProfessionalConsultations($conn);
        } elseif ($_POST['table'] == 'E1-2'){
            $submission = addE1E2($conn);
        } elseif ($_POST['table'] == 'E3-4-13'){
            $submission = addE3E4E13($conn);
        } elseif ($_POST['table'] == 'E5-6'){
            $submission = addE5E6($conn);
        } elseif ($_POST['table'] == 'E7-8'){
            $submission = addE7E8($conn);
        } elseif ($_POST['table'] == 'E9-10'){
            $submission = addE9E10($conn);
        } elseif ($_POST['table'] == 'E11-12'){
            $submission = addE11E12($conn);
        } elseif ($_POST['table'] == 'E14'){
            $submission = addE14($conn);
        } elseif ($_POST['table'] == 'F3'){
            $submission = addF3($conn);
        } elseif ($_POST['table'] == 'F4'){
            $submission = addF4($conn);
        } elseif ($_POST['table'] == 'F5'){
            $submission = addF5($conn);
        } elseif ($_POST['table'] == 'F6'){
            $submission = addF6($conn);
        } elseif ($_POST['table'] == 'G'){
            $submission = addSectionG($conn);
        }
        echo "posted";
        header('Location: submissionSummary.php?submission=' . $submission);
	}

?>

<div class='container'>
        <h1>Create Submission: </h1>
        <form action="submissionPage.php" method="get">
            <div class="mb-3">
                <label for="targetSelect" class="form-label">Section: </label>
                <select class="form-select" aria-label="Default select example" name="table">
                    <option selected>Select an option</option>
                    <option value="A">A6: Professional Affilliations/Membership (applicable to relevant fields and approved institutions)</option>
                    <option value="B">B: PROFESSIONAL ACHIEVEMENTS</option>
                    <option value="C1">C1: Lead New Research Proposal</option>
                    <option value="C2">C2: Research or Development Projects</option>
                    <option value="C3">C3: Research and Development Operations</option>
                    <option value="D">D: PROFESSIONAL CONSULTATIONS (Services to external parties with MIROS core functions)</option>
                    <option value="E1-2">E1 or E2: Guidelines/Manuals, Policy Papers, Products, Scientific Reports, Books and Proceedings</option>
                    <option value="E3-4-13">E3, E4 or E13: Journals, Patents, Copyrights and Trademarks</option>
                    <option value="E5-6">E5 or E6: Scientific and Technical Publications</option>
                    <option value="E7-8">E7 or E8: Papers in Proceedings of Conferences</option>
                    <option value="E9-10">E9 or E10: Research/Technical Articles in Bullatins/Magazines and Guidelines/Training Modules</option>
                    <option value="E11-12">E11 or E12: International Conference Presentations/National Conference/Seminar/Working Group Presentations/Technical Committee/ Meeting</option>
                    <option value="E14">E14: Knowledge Dissemination</option>
                    <option value="F3">F3: Research and Project Supervision </option>
                    <option value="F4">F4: Invited Speaker, Keynote Speaker, Session Chairman, Forum (Established External Events)</option>
                    <option value="F5">F5: Scientific and Technical Evaluation (including Research Proposal)</option>
                    <option value="F6">F6:Other Professional Recognition</option>
                    <option value="G">G: Services to Community</option>
                </select>
                <input class="btn-primary" type="submit" value="Select Section" name="submit">
                <div><?php echo $section_number_error?></div>
            </div>
        </form>


<?php if ($table == "A"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='A'/>
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
<?php endif;?>


<?php if ($table == "B"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='B'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">b3_operational_developmental_responsibilities</label>
                        <select name="B3Task" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">b3_committee</label>
                        <select name="B3Committee" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">professional_experiences_international</label>
                        <select name="professionalInternational" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">professional_experiences_national</label>
                        <select name="professionalNational" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>


<?php if ($table == "C1"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='C1'/>
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
<?php endif;?>


<?php if ($table == "C2"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='C2'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">lead_or_co</label>
                        <select name="leadOrCo" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">internal_or_external</label>
                        <select name="intOrExt" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>


<?php if ($table == "C3"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='C3'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Name</label>
                        <input class="form-control" placeholder="" type="text" name="firstName">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">lead_or_co</label>
                        <select name="leadOrCo" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>


<?php if ($table == "D"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='D'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Monetary</label>
                        <select name="monetary" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>


<?php if ($table == "E1-2"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='E1-2'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">guidelines_papers_products</label>
                        <select name="guidelines" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">products</label>
                        <select name="products" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">commercialised</label>
                        <select name="commercialised" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">enabling_products</label>
                        <select name="enablingProducts" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">main_contributor_or_team_member</label>
                        <select name="contributorOrMember" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">report_book_proceedings</label>
                        <select name="reportBook" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">authorship</label>
                        <select name="authorship" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">authorship_book_or_chapter</label>
                        <select name="bookOrChapter" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">authorship_single_or_co</label>
                        <select name="authorSingleOrCo" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">editorship</label>
                        <select name="editorship" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">editorship_single_or_co</label>
                        <select name="editorSingleOrCo" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">translation</label>
                        <select name="translation" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">translation_single_or_co</label>
                        <select name="translationSingleOrCo" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>


<?php if ($table == "D"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='D'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Monetary</label>
                        <select name="monetary" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>


<?php if ($table == "E3-4-13"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <input type='hidden' name='table' value='E3-4-13'/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">journal</label>
                        <select name="journal" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">international_journal</label>
                        <select name="internationalJournal" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">journal_main_author_or_co</label>
                        <select name="journalMain" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">patents_copywrites_trademarks</label>
                        <select name="patentsCopyrights" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">patent_granted</label>
                        <select name="patentGranted" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">patent_pending</label>
                        <select name="patentPending" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">principle_inventor_or_co</label>
                        <select name="principleInventor" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">copyright_registered</label>
                        <select name="copyrightRegistered" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">trademark_registered</label>
                        <select name="trademarkRegistered" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
<?php endif;?>