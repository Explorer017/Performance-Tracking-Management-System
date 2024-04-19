<?php 
    
    $targets = array();
    $sql = "SELECT section_number, lowest_points, highest_points, target_amount FROM targets"; 
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc()) {
            $section_number = $row['section_number']; 
            $targets[$section_number] = array(
                'target_amount' => $row['target_amount'],
                'lowest_points' => $row['lowest_points'],
                'highest_points' => $row['highest_points']
            );
        }
    }
    
    function calculateUserPoints($conn, $targets, $tablenames)
    {
        $userPoints = array(); 
        $highestContributions = calculateHighestContributions($conn, $tablenames);
        
        foreach($tablenames as $section_number => $tablename)
        {
            $contributions = array(); 
            
            if(isset($targets[$section_number])) {
                $points_range = $targets[$section_number]['highest_points'] - $targets[$section_number]['lowest_points']; 
                $min_required = $targets[$section_number]['target_amount']; 
            } else {
                continue; 
            }

            $resultSql = "SHOW COLUMNS ";
            $sql = "SELECT user_id, COUNT(*) AS contribution_count FROM $tablename GROUP BY user_id"; 
            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) { 
                    $user_id = $row['user_id']; 
                    $contribution_count = $row['contribution_count'];
                    $contributions[$user_id] = $contribution_count; 
                }
            }
            
            foreach($contributions as $user_id => $contribution_count)
            {
                $points = 0; 
                if($contribution_count == $min_required)
                {
                    $points = $targets[$section_number]['lowest_points'];
                }
                else if($contribution_count < $min_required && $contribution_count != 0)
                {
                    $points = $contribution_count / $min_required; 
                }
                else if($contribution_count == $highestContributions[$section_number])
                {
                    $points = $targets[$section_number]['highest_points']; 
                }
                else if ($contribution_count >= $min_required)
                {
                    $points = $targets[$section_number]['lowest_points'] + ($points_range / ($highestContributions[$section_number] - $min_required)) * ($contribution_count - $min_required); 
                }
                
                if(!isset($userPoints[$user_id]))
                {
                    $userPoints[$user_id] = array(
                        'total_points' => 0,
                        'section_points' => array()
                    ); 
                }
                
                // Store points for each section
                $userPoints[$user_id]['section_points'][$section_number] = $points;
                
                // Update total points
                $userPoints[$user_id]['total_points'] += $points;
            }
        }
        
        return $userPoints; 
    }
    function calculateHighestContributions($conn, $tableNames)
    {
        $highestContributions = array(); 

        foreach ($tableNames as $section_number => $tableName) {
            $sql = "SELECT MAX(contribution_count) AS max_contributions FROM (SELECT COUNT(*) AS contribution_count FROM $tableName GROUP BY user_id) AS subquery";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $highestContributions[$section_number] = $row['max_contributions'];
            } 
            else {
                $highestContributions[$section_number] = 0;
            }
        }
        return $highestContributions;
    }
    $tablenames = array(
        'A6' => 'a6_professional_affilliations_memberships', 
        'B' => 'b_professional_achievements', 
        'C1' => 'c1_lead_new_research', 
        'C2' => 'c2_research_development_projects',
        'C3' => 'c3_research_development_operations', 
        'D' => 'd_professional_consultations', 
        'E1&2' => 'e11_e12_conference',
        'E11&12' => 'e14_knowledge_dissemination', 
        'E14' => 'e1_e2_guidlines_papers_books_reports', 
        'E&3&4&13' => 'e3_e4_e13_journals_patents_trademarks',
        'E5&6' => 'e5_e6_techincal_publications', 
        'E7&8' => 'e7_e8_papers', 
        'E9&10' => 'e9_e10_articles_guidelines_teaching',
        'F3' => 'f3_research_and_project_supervision',
        'F4' => 'f4_speaker', 
        'F5' => 'f5_scientific_technical_evaluation', 
        'F6' => 'f6_others',
        'G' => 'g_services_to_community'
    );
?>