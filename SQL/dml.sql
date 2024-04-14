INSERT INTO MIROSdb.targets (section_number,`year`,target_amount) VALUES
                                                                      ('A6',2024,2),
                                                                      ('B',2024,1),
                                                                      ('C2',2024,1),
                                                                      ('E1-2',2024,1),
                                                                      ('E11-12',2024,1),
                                                                      ('F5',2024,1),
                                                                      ('G',2024,1);

INSERT INTO MIROSdb.`user` (user_access_level,first_name,middle_name,last_name,password,email,points,higher_user_id) VALUES
                                                                                                                         (0,'Finn','','O''Neill','$2y$10$HpbHlEnNBdrhfVDOVu4BQuk73G2e1pzAdHR32BlUf5xZ75sOH5NXu','finn.oneill@student.shu.ac.uk',0,NULL),
                                                                                                                         (3,'Admini','','Strator','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','admin@email.com',0,NULL),
                                                                                                                         (2,'Harry','Edward','Marshal','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','harry.marshal@student.shu.ac.uk',0,NULL),
                                                                                                                         (1,'Max','','Hermon','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','max.hermon@student.shu.ac.uk',0,3),
                                                                                                                         (0,'Tom','','Grout','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','tom.grout@student.shu.ac.uk',0,4),
                                                                                                                         (1,'Natty','','Hunt','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','natty.hunt@student.shu.ac.uk',0,3),
                                                                                                                         (0,'Steph','','Lewis','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','steph.lewis@student.shu.ac.uk',0,4),
                                                                                                                         (0,'Doccy','','P','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','doccy.P@beverage.com',0,6),
                                                                                                                         (3,'Graham','Graham','Graham','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','graham@graham.org',0,NULL),
                                                                                                                         (2,'Gray','','Ham','$2y$10$mEbv8jWTT9ioi1V511jXf.rMuJ9OgnetGndL/jAFow11B6Y2PCGEm','gray@ham.com',0,NULL);

