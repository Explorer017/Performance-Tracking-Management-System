INSERT INTO MIROSdb.targets (section_number, year, target_amount, lowest_points, highest_points) VALUES
    ('A6',2024,2,1,2),
    ('B',2024,6,6,8),
    ('C2',2024,14,14,16),
    ('E1-2',2024,8,8,10),
    ('E11-12',2024,8,8,10),
    ('E14',2024,8,8,10),
    ('F5',2024,5,5,7),
    ('G',2024,3,3,5);

INSERT INTO MIROSdb.user (user_access_level,first_name,middle_name,last_name,password,email,points,higher_user_id) VALUES
    (0,'Finn','','ONeill','$2y$10$HpbHlEnNBdrhfVDOVu4BQuk73G2e1pzAdHR32BlUf5xZ75sOH5NXu','finn.oneill@student.shu.ac.uk',0,NULL),
    (3,'Admini','','Strator','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','admin@email.com',0,NULL),
    (2,'Harry','Edward','Marshal','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','harry.marshal@student.shu.ac.uk',0,NULL),
    (1,'Max','','Hermon','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','max.hermon@student.shu.ac.uk',0,3),
    (0,'Tom','','Grout','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','tom.grout@student.shu.ac.uk',0,4),
    (1,'Natty','','Hunt','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','natty.hunt@student.shu.ac.uk',0,3),
    (0,'Steph','','Lewis','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','steph.lewis@student.shu.ac.uk',0,4),
    (0,'Doccy','','P','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','doccy.P@beverage.com',0,6),
    (3,'Graham','Graham','Graham','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','graham@graham.org',0,NULL),
    (2,'Gray','','Ham','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','gray@ham.com',0,NULL);

INSERT INTO a6_professional_affilliations_memberships (item_id, user_id, section_number, year, supporting_file_id, points) VALUES 
(1, 1, "A6", 2024, 'file.doc', 5),
(2, 2, "A6", 2024, 'file1.doc', 5),
(3, 3, "A6", 2024, 'file2.doc', 5),
(4, 4, "A6", 2024, 'file3.doc', 5),
(5, 5, "A6", 2024, 'file4.doc', 5),
(6, 6, "A6", 2024, 'file5.doc', 5);

INSERT INTO e14_knowledge_dissemination (user_id, poster_or_similar, involvement_delegate_visit, exhibition, talk, supporting_file_id, section_number, year, points)
VALUES
(1, 1, 0, 1, 1, 'file.wav', 'E14', 2024, 8),
(1, 1, 0, 1, 1, 'file1.wav', 'E14', 2024, 10),
(1, 1, 1, 1, 1, 'file2.wav', 'E14', 2024, 9),
(1, 1, 0, 0, 1, 'file3.wav', 'E14', 2024, 8);

INSERT INTO b_professional_achievements (user_id, b3_operational_developmental_responsibilities, b3_committee, professional_experiances_international, professional_experiances_national, section_number, year, supporting_file_id, points)
VALUES
(1, 1, 0, 1, 1, 'B', 2024, 'file.docx', 8),
(1, 1, 0, 1, 1, 'B', 2024, 'file.docx', 6),
(1, 1, 1, 1, 1, 'B', 2024, 'file.docx', 7),
(1, 1, 0, 0, 1, 'B', 2024, 'file.docx', 6);

INSERT INTO g_services_to_community (item_id, user_id, institute, district, state, national, international, supporting_file_id, section_number, year, points)
VALUES
(1, 0, 0, 0, 0, 1, 'file.file', 'g', 2024, 4),
(2, 0, 0, 0, 0, 1, 'file.file', 'g', 2024, 4),
(3, 0, 0, 0, 0, 1, 'file.file', 'g', 2024, 4),
(4, 0, 0, 0, 0, 1, 'file.file', 'g', 2024, 4);