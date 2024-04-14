<?php 
include_once("get_language.php");
$lang = isset($_GET['lang']) ? $_GET['lang'] : GetLanguage(); // Check if language is set in the URL, otherwise get it from the session
if (isset($_POST['lang'])) {
    if ($lang == 'en') {
        header('Location: '.$_SERVER['PHP_SELF'].'?lang=bm');
    } else {
        header('Location: '.$_SERVER['PHP_SELF'].'?lang=en');
    }
}

?>

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
    include("NavBar.php");
    include 'db_conn.php';


    $sqlTables = "SHOW TABLES";
    $resultTables = $conn->query($sqlTables);

    $tableNames = array();
    if ($resultTables->num_rows > 0) {
        while ($row = $resultTables->fetch_row()) {
            
            if ($row[0] !== 'user' && $row[0] !== 'targets') {
                $tableNames[] = $row[0];
            }
        }
    }


    $customColumnNames = array(
        'item_id' => 'Item',
        'user_id' => 'User',
        'poster_or_similar' => 'Poster',
        'involvement_delegate_visit' => 'Visit',
        'exhibition' => 'Exhibition',
        'talk' => 'Talk',
        'supporting_file_id' => 'File',
        'section_number' => 'Section',
        'year' => 'Year',
        'points' => 'Points',
        'b3_operational_developmental_responsibilities' => 'B3-Responsibilities',
        'b3_committee' => 'Committee',
        'professional_experiances_international' => 'IPE',
        'professional_experiances_national' => 'NPE',
        'international_or_national' => 'International_or_National',
        'oral_or_poster' => 'Oral-or-Poster',
        'lead_or_co' => 'Lead or Co',
        'internal_or_external' => 'Internal_or_External',
        'guidelines_papers_products' => 'Guidelines_Papers_Products',
        'enabling_products' => 'Enabling_Products',
        'main_contributor_or_team_member' => 'Main_Contributor',
        'report_book_proceedings' => 'Report_Book_Proceedings',
        'authorship_book_or_chapter' => 'Book_Authorship',
        'authorship_single_or_co' => 'Authorship',
        'editorship' => 'Editorship',
        'editorship_single_or_co' => 'Editorship',
        'translation' => 'Translation',
        'translation_single_or_co' => 'Translation',
        'international_journal' => 'International_Journal',
        'journal_main_author_or_co' => 'Journal_Author',
        'patents_copywrites_trademarks' => 'Patents',
        'patent_granted' => 'Patent_Granted',
        'patent_pending' => 'Patent_Pending',
        'principle_inventor_or_co' => 'Principal_Inventor',
        'copyright_registered' => 'Copyright_Registered',
        'trademark_registered' => 'Trademark_Registered',
        'requested_internal_or_external' => 'Requested',
        'main_author_co_author' => 'Main_Author',
        'research_technical_article' => 'Research',
        'article_author' => 'Article_Author',
        'guidelines_teaching' => 'Guidelines',
        'supervisor_PhD' => 'Supervisor(PhD)',
        'supervisor_Masters' => 'Supervisor(Masters)',
        'supervisor_mixed_mode' => 'Supervisor(Mixed)',
        'supervisor_coursework' => 'Supervisor(Coursework)',
        'supervisor_postdoctor' => 'Supervisor(Postdoctor)',
        'supervisor_industrial_training' => 'Supervisor(Training)',
        'examinar_academic_assessor' => 'Examiner',
        'examiner_PhD' => 'Examiner(PhD)',
        'examiner_Masters' => 'Examiner(Masters)',
        'examiner_mixed_mode' => 'Examiner(Mixed)',
        'examiner_coursework' => 'Examiner(Coursework)',
        'examiner_professional_assessor' => 'Examiner',
        
    );
    $customTableNames = array(
        'a6_professional_affilliations_memberships' => 'Professional Affiliations & Memberships',
        'b_professional_achievements' => 'Professional Achievements',
        'c1_lead_new_research' => 'Lead New Research',
        'c2_research_development_projects' => 'Research Development Projects',
        'c3_research_development_operations' => 'Research Development Operations',
        'd_professional_consultations' => 'Professional Consultations',
        'e11_e12_conference' => 'Conference',
        'e14_knowledge_dissemination' => 'Knowledge Dissemination',
        'e1_e2_guidlines_papers_books_reports' => 'Guidelines, Papers, Books, Reports',
        'e3_e4_e13_journals_patents_trademarks' => 'Journals, Patents, Trademarks',
        'e5_e6_techincal_publications' => 'Technical Publications',
        'e7_e8_papers' => 'Papers',
        'e9_e10_articles_guidelines_teaching' => 'Articles, Guidelines, Teaching',
        'f3_research_and_project_supervision' => 'Research & Project Supervision',
        'f4_speaker' => 'Speaker',
        'f5_scientific_technical_evaluation' => 'Scientific & Technical Evaluation',
        'f6_others' => 'Others',
        'g_services_to_community' => 'Services to Community',
    );


    function fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames)
    {
        $sqlColumns = "SHOW COLUMNS FROM $tableName";
        $resultColumns = $conn->query($sqlColumns);

        if ($resultColumns) {
            $columns = array();
            while ($row = $resultColumns->fetch_assoc()) {
                $columnName = $row['Field'];
                $customName = isset($customColumnNames[$columnName]) ? $customColumnNames[$columnName] : $columnName;
                $columns[$columnName] = $customName;
            }
            return $columns;
        } else {
            echo "Error fetching columns: " . $conn->error;
            
        }
    }


    if (isset($_GET['table'])) {
        $tableName = $_GET['table']; 


        $columns = fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames);
    } else {

        if (!empty($tableNames)) {
            $tableName = $tableNames[0];

            $columns = fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames);
        } else {
            $tableName = "";
            $columns = array();
        }
    }
?>

<div class="container">
    <h2>Submission Records</h2>
    <div class="row mb-3">
        <div class="col-md-6">

            <select id="tableSelect" class="form-control">
            <?php
                foreach ($tableNames as $table) {
                    $displayName = isset($customTableNames[$table]) ? $customTableNames[$table] : $table;
                    echo "<option value=\"$table\"";
                    if ($tableName == $table) {
                        echo " selected";
                    }
                    echo ">$displayName</option>";
                }
            ?>
            </select>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
            <tr>
                <?php
                // Display table headers based on selected table columns with custom names
                if (isset($columns)) {
                    foreach ($columns as $columnName => $customName) {
                        echo "<th class='text-warning'>$customName</th>";
                    }
                }
                ?>
            </tr>
            </thead>
            <tbody id="tableBody">
            <?php
            // Fetch records from the selected table
            if (isset($tableName) && isset($columns)) {
                $sql = "SELECT * FROM $tableName";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($columns as $columnName => $customName) {
                                echo "<td>" . $row[$columnName] . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . count($columns) . "'>0 results found</td></tr>";
                    }
                } else {
                    echo "Error fetching data: " . $conn->error;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        // Event listener for dropdown change
        $('#tableSelect').change(function () {
            var tableName = $(this).val();
            var lang = "<?php echo $lang; ?>"; // Get the selected language
            window.location.href = 'view_submissions.php?table=' + tableName + '&lang=' + lang; // Redirect to the same page with selected table name and language as query parameters
        });

    });
</script>

</body>
</html>