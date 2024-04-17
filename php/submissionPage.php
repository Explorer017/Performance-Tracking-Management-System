<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        
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
        header('Location: submissionSummary.php?submission=' . $submission. '&lang='.$lang);
	}

?>

<div class='container'>
        <?php if ($lang == 'en'): ?>
        <h1>Create Submission: </h1>
        <form action="submissionPage.php" method="get">
            <input type="hidden" name="lang" value="<?php echo $lang ?>"/>
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
                <!--<div><?php echo $section_number_error?></div>-->
            </div>
        </form>
        <?php else: ?>
        <h1>Buat Penyerahan </h1>
        <form action="submissionPage.php?lang=<?php echo $lang ?>" method="get">
        <input type="hidden" name="lang" value="<?php echo $lang ?>"/>
            <div class="mb-3">
                <label for="targetSelect" class="form-label">Bahagian: </label>
                <select class="form-select" aria-label="Default select example" name="table">
                    <option selected>Pilih satu pilihan</option>
                    <option value="A">A6: Gabungan/Keahlian Profesional (terpakai kepada bidang yang berkaitan dan institusi yang diluluskan)</option>
                    <option value="B">B: PENCAPAIAN PROFESIONAL</option>
                    <option value="C1">C1: Pimpin Cadangan Penyelidikan Baharu</option>
                    <option value="C2">C2: Projek Penyelidikan atau Pembangunan</option>
                    <option value="C3">C3: Operasi Penyelidikan dan Pembangunan</option>
                    <option value="D">D: PERUNDINGAN PROFESIONAL (Perkhidmatan kepada pihak luar dengan fungsi teras MIROS)</option>
                    <option value="E1-2">E1 or E2: Garis Panduan/Manual, Kertas Polisi, Produk, Laporan Saintifik, Buku dan Prosiding</option>
                    <option value="E3-4-13">E3, E4 or E13: Jurnal, Paten, Hak Cipta dan Tanda Dagangan</option>
                    <option value="E5-6">E5 or E6: Penerbitan Saintifik dan Teknikal</option>
                    <option value="E7-8">E7 or E8: Kertas Kerja dalam Prosiding Persidangan</option>
                    <option value="E9-10">E9 or E10: Artikel Penyelidikan/Teknikal dalam Buletin/Majalah dan Garis Panduan/Modul Latihan</option>
                    <option value="E11-12">E11 or E12: Pembentangan Persidangan Antarabangsa/Persidangan Kebangsaan/Seminar/Pembentangan Kumpulan Kerja/Jawatankuasa Teknikal/ Mesyuarat</option>
                    <option value="E14">E14: Penyebaran Ilmu</option>
                    <option value="F3">F3: Penyelidikan dan Penyeliaan Projek </option>
                    <option value="F4">F4: Penceramah Jemputan, Penceramah Ucaptama, Pengerusi Sesi, Forum (Acara Luaran Ditubuhkan)</option>
                    <option value="F5">F5: Penilaian Saintifik dan Teknikal (termasuk Cadangan Penyelidikan)</option>
                    <option value="F6">F6:Pengiktirafan Profesional Lain</option>
                    <option value="G">G: Perkhidmatan kepada Komuniti</option>
                </select>
                <input class="btn-primary" type="submit" value="Pilih Bahagian" name="submit">
                <!--<div><?php echo $section_number_error?></div>-->
            </div>
        </form>
    <?php endif;

if ($table == "A"):
     if ($lang == 'en'): ?>
    <div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php?lang=<?php echo $lang ?>" method="post">
                    <h2>A6:</h2>
                    <input type='hidden' name='table' value='A'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
<?php else: ?>
    <div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>A6:</h2>
                    <input type='hidden' name='table' value='A'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Tahun</label>
                        <input class="form-control" placeholder="Masukkan tahun" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">ID Fail yang menyokong</label>
                        <input class="form-control" placeholder="Masukkan ID fail sokongan" type="text" name="supportingFileID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Mata</label>
                        <input class="form-control" placeholder="Masukkan mata yang diberi" type="text" name="points">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input class="btn-primary" type="submit" value="Selesai Penyerahan" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php endif; 
endif;?>


<?php if ($table == "B"):
    if ($lang == 'en'): ?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>B:</h2>
                    <input type='hidden' name='table' value='B'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B3: Operational and Developmental Responsibilities in MIROS</label>
                        <select name="B3Task" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B3: Committee</label>
                        <select name="B3Committee" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B4: Professional Experiences at International Level </label>
                        <select name="professionalInternational" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B5: Professional Experiences at National Level</label>
                        <select name="professionalNational" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
    <?php else: ?>
     <div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>B:</h2>
                    <input type='hidden' name='table' value='B'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B3: Tanggungjawab Operasi dan Pembangunan dalam MIROS</label>
                        <select name="B3Task" class="form-control" required>
                            <option value="1">Ya</option>
                            <option value="0" selected>Tidak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B3: Jawatankuasa</label>
                        <select name="B3Committee" class="form-control" required>
                            <option value="1">Ya</option>
                            <option value="0" selected>Tidak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B4: Pengalaman Profesional di Peringkat Antarabangsa </label>
                        <select name="professionalInternational" class="form-control" required>
                            <option value="1">Ya</option>
                            <option value="0" selected>Tidak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">B5: Pengalaman Profesional di Peringkat Kebangsaan</label>
                        <select name="professionalNational" class="form-control" required>
                            <option value="1">Ya</option>
                            <option value="0" selected>Tidak</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Tahun</label>
                        <input class="form-control" placeholder="Masukkan tahun" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">ID Fail yang menyokong</label>
                        <input class="form-control" placeholder="Masukkan ID fail sokongan" type="text" name="supportingFileID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Mata</label>
                        <input class="form-control" placeholder="Masukkan mata yang diberi" type="text" name="points">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input class="btn-primary" type="submit" value="Selesai Penyerahan" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
    </div>
    <?php endif;
endif;?>


<?php if ($table == "C1"):
    if ($lang == 'en'): ?>
    <div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>C1:</h2>
                    <input type='hidden' name='table' value='C1'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
<?php else: ?>
    <div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>C1:</h2>
                    <input type='hidden' name='table' value='C1'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Tahun</label>
                        <input class="form-control" placeholder="Masukkan tahun" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">ID Fail yang menyokong</label>
                        <input class="form-control" placeholder="Masukkan ID fail sokongan" type="text" name="supportingFileID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Mata</label>
                        <input class="form-control" placeholder="Masukkan mata yang diberi" type="text" name="points">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input class="btn-primary" type="submit" value="Selesai Penyerahan" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php endif;
 endif;?>


<?php if ($table == "C2"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>C2:</h2>
                    <input type='hidden' name='table' value='C2'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Project Lead or Co</label>
                        <select name="leadOrCo" class="form-control" required>
                            <option value="1">Lead</option>
                            <option value="0">Co</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Internal or External</label>
                        <select name="intOrExt" class="form-control" required>
                            <option value="1">Internal</option>
                            <option value="0">External</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
                    <h2>C3:</h2>
                    <input type='hidden' name='table' value='C3'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Name of Program / Operation of Work</label>
                        <input class="form-control" placeholder="" type="text" name="name">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Operation Lead or Co</label>
                        <select name="leadOrCo" class="form-control" required>
                            <option value="1">Lead</option>
                            <option value="0">Co</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
                    <h2>D: (Professional Consultations)</h2>
                    <input type='hidden' name='table' value='D'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Monetary</label>
                        <select name="monetary" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
                    <h2>E1 & E2:</h2>
                    <input type='hidden' name='table' value='E1-2'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E1: Guidelines/Manuals, Policy Papers and Products</label>
                        <select name="guidelines" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E1: Product</label>
                        <select name="products" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E1: Commercialised</label>
                        <select name="commercialised" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E1: Enabling products (must be used by others and with documentations)</label>
                        <select name="enablingProducts" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E1: Main Contributor or Team Member</label>
                        <select name="contributorOrMember" class="form-control" required>
                            <option value="1">Main Contributor</option>
                            <option value="0">Team Member</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Scientific Reports, Books and Proceedings</label>
                        <select name="reportBook" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Authorship</label>
                        <select name="authorship" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Author of book or chapter?</label>
                        <select name="bookOrChapter" class="form-control" required>
                            <option value="1">Book</option>
                            <option value="0">Chapter</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Single Author or Co-Author</label>
                        <select name="authorSingleOrCo" class="form-control" required>
                            <option value="1">Single Author</option>
                            <option value="0">Co-Author</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Editorship</label>
                        <select name="editorship" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Single Editor or Co-Editor</label>
                        <select name="editorSingleOrCo" class="form-control" required>
                            <option value="1">Single Editor</option>
                            <option value="0">Co-Editor</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Translation Work</label>
                        <select name="translation" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E2: Single Translator or Co-Translator</label>
                        <select name="translationSingleOrCo" class="form-control" required>
                            <option value="1">Single Translator</option>
                            <option value="0">Co-Translator</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
                    <h2>E3, E4 & E13:</h2>
                    <input type='hidden' name='table' value='E3-4-13'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E3: International Journal with Citation Index/Impact Factor - accepted</label>
                        <select name="journal" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E4: National/Regional/Other International Journal - accepted</label>
                        <select name="internationalJournal" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E3/4: Main Author or Co-Author</label>
                        <select name="journalMain" class="form-control" required>
                            <option value="1">Main Author</option>
                            <option value="0">Co-Author</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E13: Patents, Copyrights and Trademarks</label>
                        <select name="patentsCopyrights" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E13: Patent Granted?</label>
                        <select name="patentGranted" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E13: Patent Pending?</label>
                        <select name="patentPending" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E13: Principle or Co-inventor</label>
                        <select name="principleInventor" class="form-control" required>
                            <option value="1">Principle inventor</option>
                            <option value="0">Co-inventor</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E13: Copyright Registered</label>
                        <select name="copyrightRegistered" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">E13: Trademark Registered</label>
                        <select name="trademarkRegistered" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0" selected>Not Applicable</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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

<?php if ($table == "E5-6"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>E5 & E6:</h2>
                    <input type='hidden' name='table' value='E5-6'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Requested Internal or External</label>
                        <select name="requestIntOrExt" class="form-control" required>
                            <option value="1">Internal (Yes)</option>
                            <option value="0">External (No)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Main or Co Author</label>
                        <select name="mainOrCoAuthor" class="form-control" required>
                            <option value="1">Main (Yes)</option>
                            <option value="0">Co (No)</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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

<?php if ($table == "E7-8"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>E7 & E8:</h2>
                    <input type='hidden' name='table' value='E7-8'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">International or National</label>
                        <select name="internationalOrNational" class="form-control" required>
                            <option value="1">International (Yes)</option>
                            <option value="0">National (No)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Main or Co Author</label>
                        <select name="mainOrCoAuthor" class="form-control" required>
                            <option value="1">Main (Yes)</option>
                            <option value="0">Co (No)</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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

<?php if ($table == "E9-10"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>E9 & E10:</h2>
                    <input type='hidden' name='table' value='E9-10'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Research or Technical Article</label>
                        <select name="researchTechnical" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Author of Research / Technical Article? (if applicable)</label>
                        <select name="articleAuthor" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0">Not applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Guidelines, SOPs or Teaching/Training Modules?</label>
                        <select name="guidelinesTeaching" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Guidelines, SOPs or Teaching/Training Modules Author or Co-Author? (if applicable)</label>
                        <select name="mainOrCoAuthor" class="form-control" required>
                            <option value="1">Yes (Author)</option>
                            <option value="0">No (Co-Author)</option>
                            <option value="0">Not applicable</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Guidelines, SOPs or Teaching/Training Modules Review? (if applicable)</label>
                        <select name="review" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            <option value="0">Not applicable</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "E11-12"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php"
                 method="post">
                    <h2>E11 & E12:</h2>
                    <input type='hidden' name='table' value='E11-12'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">International or National Conference</label>
                        <select name="internationalOrNational" class="form-control" required>
                            <option value="1">International</option>
                            <option value="0">National</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Oral or Poster presentation</label>
                        <select name="oralOrPoster" class="form-control" required>
                            <option value="1">Oral presentation</option>
                            <option value="0">Poster presentation</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "E14"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>E14:</h2>
                    <input type='hidden' name='table' value='E14'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Poster/brochures/others</label>
                        <select name="posterOrSimilar" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Involvement in visit by delegates</label>
                        <select name="involvement" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Exhibition - presenting/on duty</label>
                        <select name="exhibition" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Talk/wacana</label>
                        <select name="talk" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "F3"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>F3:</h2>
                    <input type='hidden' name='table' value='F3'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Supervisor PhD?</label>
                        <select name="supervisorPHD" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Supervisor Masters?</label>
                        <select name="supervisorMasters" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Supervisor Mixed Mode?</label>
                        <select name="supervisorMixed" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Supervisor Coursework?</label>
                        <select name="supervisorCoursework" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Supervisor PostDoc</label>
                        <select name="suoervisorPostDoc" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Supervisor Industrial Training</label>
                        <select name="supervisorIndustrial" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Examiner / Academic Assessor?</label>
                        <select name="examinarAcademicAssessor" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Examiner PhD?</label>
                        <select name="examinerPHD" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Examiner Masters?</label>
                        <select name="examinerMasters" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Examiner Mixed Mode?</label>
                        <select name="examinerMixed" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Examiner Coursework?</label>
                        <select name="examinerCoursework" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Professional Examiner?</label>
                        <select name="examinerProfessionalAssessor" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "F4"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>F4:</h2>
                    <input type='hidden' name='table' value='F4'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Local speaker</label>
                        <select name="local" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">National speaker</label>
                        <select name="national" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">International speaker</label>
                        <select name="international" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Safety talk</label>
                        <select name="safetyTalk" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "F5"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>F5:</h2>
                    <input type='hidden' name='table' value='F5'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">National</label>
                        <select name="national" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">International</label>
                        <select name="international" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Internal</label>
                        <select name="internal" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "F6"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>F6:</h2>
                    <input type='hidden' name='table' value='F6'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Media Coverage</label>
                        <select name="mediaCoverage" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Interview</label>
                        <select name="interview" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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


<?php if ($table == "G"):?>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-8">
                <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">-->
                <form action="submissionPage.php" method="post">
                    <h2>G:</h2>
                    <input type='hidden' name='table' value='G'/>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" placeholder="Enter the user ID" type="text" name="userID">
                    </div>
                    -->
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['user_id']?>"/>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Services to Institute</label>
                        <select name="institute" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Services to District</label>
                        <select name="district" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">Services to state</label>
                        <select name="state" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">National Service</label>
                        <select name="national" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label labelFont">International Service</label>
                        <select name="international" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Section Number</label>
                        <input class="form-control" placeholder="Enter the section number" type="text" name="sectionNumber">
                    </div>
                    -->
                    <input type="hidden" name="sectionNumber" value="<?php echo $table?>"/>
                    <div class="form-group col-md-6">
                        <label class="control-label labelFont">Year</label>
                        <input class="form-control" placeholder="Enter the year" type="text" name="yearOfUpload" value="<?php echo date("Y"); ?>">
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
<?php endif; ?>