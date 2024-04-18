<?php


function addA6Submission($conn)
{

    
    $user_id = $_POST['userID'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
    
    $created = false;
    $stmt = $conn->prepare("INSERT INTO a6_professional_affilliations_memberships(user_id, section_Number, year, supporting_file_id, points) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('isisi',$user_id, $section_number, $year_of_upload, $supporting_file_id, $points);
    
    
    
    
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

function addBProfessionalAchievements($conn)
{


    $user_id = $_POST['userID'];
    $b3_operational_developmental_responsibilities = $_POST['B3Task'];
    $b3_committee = $_POST['B3Committee'];
    $professional_experiances_international = $_POST['professionalInternational'];
    $professional_experiances_national = $_POST['professionalNational'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO b_professional_achievements(user_id, b3_operational_developmental_responsibilities, b3_committee, professional_experiances_international, professional_experiances_national, section_number, year, supporting_file_id, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssisi',$user_id, $b3_operational_developmental_responsibilities, $b3_committee, $professional_experiances_international, $professional_experiances_national,  $section_number, $year_of_upload, $supporting_file_id, $points);
    
    
    
    
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

function addC1LeadNewResearch($conn)
{


    $user_id = $_POST['userID'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO c1_lead_new_research(user_id, section_number, year, supporting_file_id, points) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('isisi',$user_id, $section_number, $year_of_upload, $supporting_file_id, $points);
    
    
    
    
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


function addC2ResearchDevelopmentProjects($conn)
{


    $user_id = $_POST['userID'];
    $lead_or_co = $_POST['leadOrCo'];
    $internal_or_external = $_POST['intOrExt'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO c2_research_development_projects(user_id, lead_or_co, internal_or_external, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssii',$user_id, $lead_or_co, $internal_or_external, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addC3ResearchDevelopmentOperations($conn)
{


    $user_id = $_POST['userID'];
    $name = $_POST['name'];
    $lead_or_co = $_POST['leadOrCo'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO c3_research_development_operations(user_id, name, lead_or_co, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssii',$user_id, $name, $lead_or_co, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addDProfessionalConsultations($conn)
{


    $user_id = $_POST['userID'];
    $monetary = $_POST['monetary'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO d_professional_consultations(user_id, monetary, section_number, year, supporting_file_id, points) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issisi',$user_id, $monetary, $section_number, $year_of_upload, $supporting_file_id, $points);
    
    
    
    
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

function addE1E2($conn)
{


    $user_id = $_POST['userID'];
    $guidelines_papers_products = $_POST['guidelines'];
    $products = $_POST['products'];
    $commercialised = $_POST['commercialised'];
    $enabling_products = $_POST['enablingProducts'];
    $main_contributor_or_team_member = $_POST['contributorOrMember'];
    $report_book_proceedings = $_POST['reportBook'];
    $authorship = $_POST['authorship'];
    $authorship_book_or_chapter = $_POST['bookOrChapter'];
    $authorship_single_or_co = $_POST['authorSingleOrCo'];
    $editorship = $_POST['editorship'];
    $editorship_single_or_co = $_POST['editorSingleOrCo'];
    $translation = $_POST['translation'];
    $translation_single_or_co = $_POST['translationSingleOrCo'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e1_e2_guidlines_papers_books_reports(user_id, guidelines_papers_products, products, commercialised, enabling_products, main_contributor_or_team_member, report_book_proceedings, authorship, authorship_book_or_chapter, authorship_single_or_co, editorship, editorship_single_or_co, translation, translation_single_or_co, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssssssssssssii',$user_id, $guidelines_papers_products, $products, $commercialised, $enabling_products, $main_contributor_or_team_member, $report_book_proceedings, $authorship, $authorship_book_or_chapter, $authorship_single_or_co, $editorship, $editorship_single_or_co, $translation, $translation_single_or_co, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addE3E4E13($conn)
{


    $user_id = $_POST['userID'];
    $journal = $_POST['journal'];
    $international_journal = $_POST['internationalJournal'];
    $journal_main_author_or_co = $_POST['journalMain'];
    $patents_copyrights_trademarks = $_POST['patentsCopyrights'];
    $patent_granted = $_POST['patentGranted'];
    $patent_pending = $_POST['patentPending'];
    $principle_inventor_or_co = $_POST['principleInventor'];
    $copyright_registered = $_POST['copyrightRegistered'];
    $trademark_registered = $_POST['trademarkRegistered'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e3_e4_e13_journals_patents_trademarks(user_id, journal, international_journal, journal_main_author_or_co, patents_copywrites_trademarks, patent_granted, patent_pending, principle_inventor_or_co, copyright_registered, trademark_registered, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssssssssii',$user_id, $journal, $international_journal, $journal_main_author_or_co, $patents_copyrights_trademarks, $patent_granted, $patent_pending, $principle_inventor_or_co, $copyright_registered, $trademark_registered, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addE5E6($conn)
{


    $user_id = $_POST['userID'];
    $requested_internal_or_external = $_POST['requestIntOrExt'];
    $main_author_co_author = $_POST['mainOrCoAuthor'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e5_e6_techincal_publications(user_id, requested_internal_or_external, main_author_co_author, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssii',$user_id, $requested_internal_or_external, $main_author_co_author, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addE7E8($conn)
{


    $user_id = $_POST['userID'];
    $international_or_national = $_POST['internationalOrNational'];
    $main_author_or_co_author = $_POST['mainOrCoAuthor'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e7_e8_papers(user_id, international_or_national, main_author_or_co_author, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssii',$user_id, $international_or_national, $main_author_or_co_author, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addE9E10($conn)
{


    $user_id = $_POST['userID'];
    $research_technical_article = $_POST['researchTechnical'];
    $article_author = $_POST['articleAuthor'];
    $guidelines_teaching = $_POST['guidelinesTeaching'];
    $main_author_or_co = $_POST['mainOrCoAuthor'];
    $review = $_POST['review'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e9_e10_articles_guidelines_teaching(user_id, reasearch_technical_article, article_author, guidelines_teaching, main_author_or_co, review, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssssii',$user_id, $research_technical_article, $article_author, $guidelines_teaching, $main_author_or_co, $review, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addE11E12($conn)
{


    $user_id = $_POST['userID'];
    $international_or_national = $_POST['internationalOrNational'];
    $oral_or_poster = $_POST['oralOrPoster'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e11_e12_conference(user_id, international_or_national, oral_or_poster, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssii',$user_id, $international_or_national, $oral_or_poster, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addE14($conn)
{


    $user_id = $_POST['userID'];
    $poster_or_similar = $_POST['posterOrSimilar'];
    $involvement_delegate_visit = $_POST['involvement'];
    $exhibition = $_POST['exhibition'];
    $talk = $_POST['talk'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO e14_knowledge_dissemination(user_id, poster_or_similar, involvement_delegate_visit, exhibition, talk, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssssii',$user_id, $poster_or_similar, $involvement_delegate_visit, $exhibition, $talk, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addF3($conn)
{


    $user_id = $_POST['userID'];
    $supervisor_PhD = $_POST['supervisorPHD'];
    $supervisor_Masters = $_POST['supervisorMasters'];
    $supervisor_mixed_mode = $_POST['supervisorMixed'];
    $supervisor_coursework = $_POST['supervisorCoursework'];
    $supervisor_postdoctor = $_POST['suoervisorPostDoc'];
    $supervisor_industrial_training = $_POST['supervisorIndustrial'];
    $examinar_academic_assessor = $_POST['examinarAcademicAssessor'];
    $examiner_PhD = $_POST['examinerPHD'];
    $examiner_Masters = $_POST['examinerMasters'];
    $examiner_mixed_mode = $_POST['examinerMixed'];
    $examiner_coursework = $_POST['examinerCoursework'];
    $examiner_professional_assessor = $_POST['examinerProfessionalAssessor'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO f3_research_and_project_supervision(user_id, supervisor_PhD, supervisor_Masters, supervisor_mixed_mode, supervisor_coursework, supervisor_postdoctor, supervisor_industrial_training, examinar_academic_assessor, examiner_PhD, examiner_Masters, examiner_mixed_mode, examiner_coursework, examiner_professional_assessor, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssssssssssssii',$user_id, $supervisor_PhD, $supervisor_Masters, $supervisor_mixed_mode, $supervisor_coursework, $supervisor_postdoctor, $supervisor_industrial_training, $examinar_academic_assessor, $examiner_PhD, $examiner_Masters, $examiner_mixed_mode, $examiner_coursework, $examiner_professional_assessor, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if ($stmt) {
        $created = true;
    }
}

function addF4($conn)
{


    $user_id = $_POST['userID'];
    $local = $_POST['local'];
    $national = $_POST['national'];
    $international = $_POST['international'];
    $safety_talk = $_POST['safetyTalk'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO f4_speaker(user_id, local, national, international, safety_talk, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssssii',$user_id, $local, $national, $international, $safety_talk, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if ($stmt) {
        $created = true;
    }
}

function addF5($conn)
{


    $user_id = $_POST['userID'];
    $national = $_POST['national'];
    $international = $_POST['international'];
    $internal = $_POST['internal'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO f5_scientific_technical_evaluation(user_id, national, international, internal, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssii',$user_id, $national, $international, $internal, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if ($stmt) {
        $created = true;
    }
}

function addF6($conn)
{


    $user_id = $_POST['userID'];
    $media_coverage = $_POST['mediaCoverage'];
    $interview = $_POST['interview'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO f6_others(user_id, media_coverage, interview, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('issssii',$user_id, $media_coverage, $interview, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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

function addSectionG($conn)
{


    $user_id = $_POST['userID'];
    $institute = $_POST['institute'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $national = $_POST['national'];
    $international = $_POST['international'];
    $section_number = $_POST['sectionNumber'];
    $year_of_upload = $_POST['yearOfUpload'];
    $supporting_file_id = $_POST['supportingFileID'];
    $points = $_POST['points'];
   
    $created = false;
    $stmt = $conn->prepare("INSERT INTO g_services_to_community(user_id, institute, district, state, national, international, supporting_file_id, section_number, year, points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isssssssii',$user_id, $institute, $district, $state, $national, $international, $supporting_file_id, $section_number, $year_of_upload, $points);
    
    
    
    
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