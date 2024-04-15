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
    include_once("get_language.php");

    $lang = GetLanguage();
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


    $customColumnNames_EN = array(
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
        'international_or_national' => 'International or National',
        'oral_or_poster' => 'Oral or Poster',
        'lead_or_co' => 'Lead or Co',
        'internal_or_external' => 'Internal or External',
        'guidelines_papers_products' => 'Guidelines Papers Products',
        'enabling_products' => 'Enabling Products',
        'main_contributor_or_team_member' => 'Main Contributor',
        'report_book_proceedings' => 'Report Book Proceedings',
        'authorship_book_or_chapter' => 'Book Authorship',
        'authorship_single_or_co' => 'Authorship',
        'editorship' => 'Editorship',
        'editorship_single_or_co' => 'Editorship',
        'translation' => 'Translation',
        'translation_single_or_co' => 'Translation',
        'international_journal' => 'International Journal',
        'journal_main_author_or_co' => 'Journal Author',
        'patents_copywrites_trademarks' => 'Patents',
        'patent_granted' => 'Patent Granted',
        'patent_pending' => 'Patent Pending',
        'principle_inventor_or_co' => 'Principal Inventor',
        'copyright_registered' => 'Copyright Registered',
        'trademark_registered' => 'Trademark Registered',
        'requested_internal_or_external' => 'Requested',
        'main_author_or_co_author' => 'Main Author',
        'research_technical_article' => 'Research',
        'article_author' => 'Article Author',
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
        'local' => 'Local',
        'national' => 'National',
        'international' => 'International',
        'internal' => 'Internal',
        'name' => 'Name',
        'monetary' => 'Monetary',
        'products' => 'Products',
        'commercialised' => 'Commercialised',
        'authorship' => 'Authorship',
        'journal' => 'Journal',
        'main_author_co_author' => 'Author',
        'main_author_or_co' => 'Author',
        'review' => 'Review',
        'reasearch_technical_article' => 'Research or Technical',
        'safety_talk' => 'Safety Talk',
        'media_coverage' => 'Media Coverage',
        'interview' => 'Interview',
        'institute' => 'Institute',
        'district' => 'District',
        'state' => 'State',
    );

    $customColumnNames_BM = array(
        'item_id' => 'Item',
        'user_id' => 'Pengguna',
        'poster_or_similar' => 'Poster',
        'involvement_delegate_visit' => 'Melawat',
        'exhibition' => 'Pameran',
        'talk' => 'Cakap',
        'supporting_file_id' => 'Fail',
        'section_number' => 'Bahagian',
        'year' => 'Tahun',
        'points' => 'Mata',
        'b3_operational_developmental_responsibilities' => 'B3-Tanggungjawab',
        'b3_committee' => 'Jawatankuasa',
        'professional_experiances_international' => 'IPE',
        'professional_experiances_national' => 'NPE',
        'international_or_national' => 'Antarabangsa atau Kebangsaan',
        'oral_or_poster' => 'Lisan atau Poster',
        'lead_or_co' => 'Ketua atau Pengarang Bersama',
        'internal_or_external' => 'Dalaman atau Luaran',
        'guidelines_papers_products' => 'Produk Kertas Garis Panduan',
        'enabling_products' => 'Mendayakan Produk',
        'main_contributor_or_team_member' => 'Penyumbang Utama',
        'report_book_proceedings' => 'Buku Laporan Prosiding',
        'authorship_book_or_chapter' => 'Kepengarangan Buku',
        'authorship_single_or_co' => 'Kepengarangan',
        'editorship' => 'Pengarang',
        'editorship_single_or_co' => 'Pengarang',
        'translation' => 'Terjemahan',
        'translation_single_or_co' => 'Terjemahan',
        'international_journal' => 'Jurnal Antarabangsa',
        'journal_main_author_or_co' => 'Pengarang Jurnal',
        'patents_copywrites_trademarks' => 'Paten',
        'patent_granted' => 'Paten Diberikan',
        'patent_pending' => 'Paten Belum Selesai',
        'principle_inventor_or_co' => 'Pencipta Utama',
        'copyright_registered' => 'Hak Cipta Berdaftar',
        'trademark_registered' => 'Cap Dagangan Berdaftar',
        'requested_internal_or_external' => 'Diminta',
        'main_author_or_co_author' => 'Pengarang Utama',
        'research_technical_article' => 'Penyelidikan',
        'article_author' => 'Penulis Artikel',
        'guidelines_teaching' => 'Garis panduan',
        'supervisor_PhD' => 'Penyelia(PhD)',
        'supervisor_Masters' => 'Penyelia(Ijazah Sarjana)',
        'supervisor_mixed_mode' => 'Penyelia(Bercampur-campur)',
        'supervisor_coursework' => 'Penyelia(Kerja kursus)',
        'supervisor_postdoctor' => 'Penyelia(Pasca doktoral)',
        'supervisor_industrial_training' => 'Penyelia(Latihan)',
        'examinar_academic_assessor' => 'Pemeriksa',
        'examiner_PhD' => 'Pemeriksa(PhD)',
        'examiner_Masters' => 'Pemeriksa(Ijazah Sarjana)',
        'examiner_mixed_mode' => 'Pemeriksa(Bercampur-campur)',
        'examiner_coursework' => 'Pemeriksa(Kerja kursus)',
        'examiner_professional_assessor' => 'Pemeriksa',
        'local' => 'Tempatan',
        'national' => 'Nasional',
        'international' => 'Antarabangsa',
        'internal' => 'Dalaman',
        'name' => 'Nama',
        'monetary' => 'Kewangan',
        'products' => 'Produk',
        'commercialised' => 'Dikomersialkan',
        'authorship' => 'Kepengarangan',
        'journal' => 'Jurnal',
        'main_author_co_author' => 'Pengarang',
        'main_author_or_co' => 'Pengarang',
        'review' => 'Semakan',
        'reasearch_technical_article' => 'Penyelidikan atau teknikal',
        'safety_talk' => 'Ceramah Keselamatan',
        'media_coverage' => 'Liputan Media',
        'interview' => 'Temuduga',
        'institute' => 'Institut',
        'district' => 'Daerah',
        'state' => 'Negeri',

    );
    $customTableNames_EN = array(
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

    $customTableNames_BM = array(
        'a6_professional_affilliations_memberships' => 'Gabungan dan Keahlian Profesional',
        'b_professional_achievements' => 'Pencapaian Profesional',
        'c1_lead_new_research' => 'Menerajui Penyelidikan Baharu',
        'c2_research_development_projects' => 'Projek Pembangunan Penyelidikan',
        'c3_research_development_operations' => 'Operasi Pembangunan Penyelidikan',
        'd_professional_consultations' => 'Perundingan Profesional',
        'e11_e12_conference' => 'Persidangan',
        'e14_knowledge_dissemination' => 'Penyebaran Ilmu',
        'e1_e2_guidlines_papers_books_reports' => 'Garis Panduan, Kertas Kerja, Buku, Laporan',
        'e3_e4_e13_journals_patents_trademarks' => 'Jurnal, Paten, Tanda Dagangan',
        'e5_e6_techincal_publications' => 'Penerbitan Teknikal',
        'e7_e8_papers' => 'Kertas kerja',
        'e9_e10_articles_guidelines_teaching' => 'Artikel, Garis Panduan, Pengajaran',
        'f3_research_and_project_supervision' => 'Penyelidikan & Penyeliaan Projek',
        'f4_speaker' => 'Penceramah',
        'f5_scientific_technical_evaluation' => 'Penilaian Saintifik & Teknikal',
        'f6_others' => 'Lain-lain',
        'g_services_to_community' => 'Perkhidmatan kepada Komuniti',
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
        if ($lang == 'en'): 
            $columns = fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames_EN);
        else:
            $columns = fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames_BM);
        endif;
    } else {

        if (!empty($tableNames)) {
            $tableName = $tableNames[0];

            if ($lang == 'en'): 
                $columns = fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames_EN);
            else:
                $columns = fetchTableColumnsWithCustomNames($tableName, $conn, $customColumnNames_BM);
            endif;
        } else {
            $tableName = "";
            $columns = array();
        }
    }
?>

<div class="container">
    <?php if ($lang == 'en'){ ?>
    <h2>Submission Records</h2>
    <?php }else { ?>
       <h2> Rekod Penyerahan</h2>
    <?php } ?>
    <div class="row mb-3">
        <div class="col-md-6">

            <select id="tableSelect" class="form-control">
            <?php
                foreach ($tableNames as $table) {
                    if ($lang == 'en'):
                        $displayName = isset($customTableNames_EN[$table]) ? $customTableNames_EN[$table] : $table;
                    else:
                        $displayName = isset($customTableNames_BM[$table]) ? $customTableNames_BM[$table] : $table;
                    endif;
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
                    } elseif ($lang == 'en') {
                        echo "<tr><td colspan='" . count($columns) . "'>0 results found</td></tr>";
                    } else{
                        echo "<tr><td colspan='" . count($columns) . "'>0 keputusan dijumpai</td></tr>";
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
            var language = "<?php echo $lang;?>";
            var tableName = $(this).val();
            window.location.href = 'view_submissions.php?table=' + tableName + '&lang=' + language; // Redirect to the same page with selected table name as query parameter
        });

    });
</script>

</body>
</html>