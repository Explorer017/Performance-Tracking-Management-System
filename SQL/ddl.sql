-- MIROSdb.targets definition

CREATE TABLE `targets` (
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  'target' int(11),
  PRIMARY KEY (`section_number`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.`user` definition

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_access_level` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `points` int(11) NOT NULL,
  `higher_user_id` int(11),
  PRIMARY KEY (`user_id`),
  KEY `higher_user_id` (`higher_user_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`higher_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.a6_professional_affilliations_memberships definition

CREATE TABLE `a6_professional_affilliations_memberships` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `section_number` varchar(64) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `supporting_file_id` varchar(255) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `a6_professional_affilliations_memberships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `a6_professional_affilliations_memberships_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.b_professional_achievements definition

CREATE TABLE `b_professional_achievements` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `b3_operational_developmental_responsibilities` tinyint(1) NOT NULL,
  `b3_committee` tinyint(1) NOT NULL,
  `professional_experiances_international` tinyint(1) NOT NULL,
  `professional_experiances_national` tinyint(1) NOT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `b_professional_achievements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `b_professional_achievements_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.c1_lead_new_research definition

CREATE TABLE `c1_lead_new_research` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `c1_lead_new_research_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c1_lead_new_research_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.c2_research_development_projects definition

CREATE TABLE `c2_research_development_projects` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lead_or_co` tinyint(1) NOT NULL,
  `internal_or_external` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `c2_research_development_projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c2_research_development_projects_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.c3_research_development_operations definition

CREATE TABLE `c3_research_development_operations` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lead_or_co` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `c3_research_development_operations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c3_research_development_operations_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.d_professional_consultations definition

CREATE TABLE `d_professional_consultations` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `monetary` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `d_professional_consultations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `d_professional_consultations_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e11_e12_conference definition

CREATE TABLE `e11_e12_conference` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `international_or_national` tinyint(1) NOT NULL,
  `oral_or_poster` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e11_e12_conference_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e11_e12_conference_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e14_knowledge_dissemination definition

CREATE TABLE `e14_knowledge_dissemination` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `poster_or_similar` tinyint(1) NOT NULL,
  `involvement_delegate_visit` tinyint(1) NOT NULL,
  `exhibition` tinyint(1) NOT NULL,
  `talk` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e14_knowledge_dissemination_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e14_knowledge_dissemination_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e1_e2_guidlines_papers_books_reports definition

CREATE TABLE `e1_e2_guidlines_papers_books_reports` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guidelines_papers_products` tinyint(1) NOT NULL,
  `products` tinyint(1) NOT NULL,
  `commercialised` tinyint(1) NOT NULL,
  `enabling_products` tinyint(1) NOT NULL,
  `main_contributor_or_team_member` tinyint(1) NOT NULL,
  `report_book_proceedings` tinyint(1) NOT NULL,
  `authorship` tinyint(1) NOT NULL,
  `authorship_book_or_chapter` tinyint(1) NOT NULL,
  `authorship_single_or_co` tinyint(1) NOT NULL,
  `editorship` tinyint(1) NOT NULL,
  `editorship_single_or_co` tinyint(1) NOT NULL,
  `translation` tinyint(1) NOT NULL,
  `translation_single_or_co` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e1_e2_guidlines_papers_books_reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e1_e2_guidlines_papers_books_reports_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e3_e4_e13_journals_patents_trademarks definition

CREATE TABLE `e3_e4_e13_journals_patents_trademarks` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `journal` tinyint(1) NOT NULL,
  `international_journal` tinyint(1) NOT NULL,
  `journal_main_author_or_co` tinyint(1) NOT NULL,
  `patents_copywrites_trademarks` tinyint(1) NOT NULL,
  `patent_granted` tinyint(1) NOT NULL,
  `patent_pending` tinyint(1) NOT NULL,
  `principle_inventor_or_co` tinyint(1) NOT NULL,
  `copyright_registered` tinyint(1) NOT NULL,
  `trademark_registered` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e3_e4_e13_journals_patents_trademarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e3_e4_e13_journals_patents_trademarks_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e5_e6_techincal_publications definition

CREATE TABLE `e5_e6_techincal_publications` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requested_internal_or_external` tinyint(1) NOT NULL,
  `main_author_co_author` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e5_e6_techincal_publications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e5_e6_techincal_publications_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e7_e8_papers definition

CREATE TABLE `e7_e8_papers` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `international_or_national` tinyint(1) NOT NULL,
  `main_author_or_co_author` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e7_e8_papers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e7_e8_papers_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.e9_e10_articles_guidelines_teaching definition

CREATE TABLE `e9_e10_articles_guidelines_teaching` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reasearch_technical_article` tinyint(1) NOT NULL,
  `article_author` tinyint(1) NOT NULL,
  `guidelines_teaching` tinyint(1) NOT NULL,
  `main_author_or_co` tinyint(1) NOT NULL,
  `review` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `e9_e10_articles_guidelines_teaching_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `e9_e10_articles_guidelines_teaching_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.f3_research_and_project_supervision definition

CREATE TABLE `f3_research_and_project_supervision` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supervisor_PhD` tinyint(1) NOT NULL,
  `supervisor_Masters` tinyint(1) NOT NULL,
  `supervisor_mixed_mode` tinyint(1) NOT NULL,
  `supervisor_coursework` tinyint(1) NOT NULL,
  `supervisor_postdoctor` tinyint(1) NOT NULL,
  `supervisor_industrial_training` tinyint(1) NOT NULL,
  `examinar_academic_assessor` tinyint(1) NOT NULL,
  `examiner_PhD` tinyint(1) NOT NULL,
  `examiner_Masters` tinyint(1) NOT NULL,
  `examiner_mixed_mode` tinyint(1) NOT NULL,
  `examiner_coursework` tinyint(1) NOT NULL,
  `examiner_professional_assessor` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `f3_research_and_project_supervision_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `f3_research_and_project_supervision_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.f4_speaker definition

CREATE TABLE `f4_speaker` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `local` tinyint(1) NOT NULL,
  `national` tinyint(1) NOT NULL,
  `international` tinyint(1) NOT NULL,
  `safety_talk` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `f4_speaker_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `f4_speaker_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.f5_scientific_technical_evaluation definition

CREATE TABLE `f5_scientific_technical_evaluation` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `national` tinyint(1) NOT NULL,
  `international` tinyint(1) NOT NULL,
  `internal` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `f5_scientific_technical_evaluation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `f5_scientific_technical_evaluation_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.f6_others definition

CREATE TABLE `f6_others` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `media_coverage` tinyint(1) NOT NULL,
  `interview` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `f6_others_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `f6_others_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- MIROSdb.g_services_to_community definition

CREATE TABLE `g_services_to_community` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `institute` tinyint(1) NOT NULL,
  `district` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `national` tinyint(1) NOT NULL,
  `international` tinyint(1) NOT NULL,
  `supporting_file_id` varchar(255) DEFAULT NULL,
  `section_number` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `section_number` (`section_number`,`year`),
  CONSTRAINT `g_services_to_community_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `g_services_to_community_ibfk_2` FOREIGN KEY (`section_number`, `year`) REFERENCES `targets` (`section_number`, `year`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;