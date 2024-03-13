CREATE TABLE IF NOT EXISTS `MIROSdb`.`Manager` (
  `managerID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`managerID`))
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `MIROSdb`.`SuperVisor` (
  `SuperVisorid` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `points` INT NOT NULL,
  `managerID` INT NOT NULL,
  PRIMARY KEY (`SuperVisorid`),
  INDEX `ManagerID_idx` (`managerID` ASC) VISIBLE,
  CONSTRAINT `ManagerID`
    FOREIGN KEY (`managerID`)
    REFERENCES `MIROSdb`.`Manager` (`managerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `MIROSdb`.`ResearchOfficer` (
  `officerID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `supervisorID` INT NULL,
  `points` INT NULL,
  PRIMARY KEY (`officerID`),
  INDEX `supervisorID_idx` (`supervisorID` ASC) VISIBLE,
  CONSTRAINT `supervisorID`
    FOREIGN KEY (`supervisorID`)
    REFERENCES `MIROSdb`.`SuperVisor` (`SuperVisorid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `MIROSdb`.`Submission` (
  `submissionID` INT NOT NULL,
  `officerID` INT NULL,
  `supervisorID` INT NULL,
  `fileID` INT NULL,
  `Section` VARCHAR(45) NULL,
  `Item` VARCHAR(45) NULL,
  `Date_Uploaded` DATE NULL,
  `Approved` BOOLEAN NULL,
  PRIMARY KEY (`submissionID`),
  INDEX `officerID_idx` (`officerID` ASC) VISIBLE,
  INDEX `supervisorID_idx` (`supervisorID` ASC) VISIBLE,
  CONSTRAINT `officerID`
    FOREIGN KEY (`officerID`)
    REFERENCES `MIROSdb`.`ResearchOfficer` (`officerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `supervisorID`
    FOREIGN KEY (`supervisorID`)
    REFERENCES `MIROSdb`.`SuperVisor` (`SuperVisorid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB

//inserts 
INSERT INTO `MIROSdb`.`Manager` (`managerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`) VALUES (001, 'Stephanie', NULL, 'Lewis', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'stephlewis115@gmail.com');
INSERT INTO `MIROSdb`.`Manager` (`managerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`) VALUES (002, 'Harry', 'Edward', 'Marshall', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'harry.e.marshal@student.shu.co.uk');
INSERT INTO `MIROSdb`.`Manager` (`managerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`) VALUES (003, 'Finn', 'O', 'Neil', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'fin.oneil@student.shu.ac.uk');

INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (001, 'John', 'Smith', 'Little', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'johnsmith@gmail.com', 001, 0);
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (002, 'Ben', 'Brilliant', 'Kol', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'benhol@gmail.com', 001, 0);
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (003, 'Bob', 'Harry', 'James', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'bobjames@gmail.com', 002, 0);
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (004, 'Jeremy', 'Vincient ', 'Lewis', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'JeremyLewis@outlook.com', 002, 0);
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (DEFAULT, 'Mary', 'Lou', 'Hammond', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'MaryLou@gmail.com', 003, 0);
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (DEFAULT, 'Grace', 'Jane', 'Cranfield', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'grace123@gmail.com', 001, 0);
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (DEFAULT, DEFAULT, NULL, DEFAULT, DEFAULT, NULL, , );
INSERT INTO `MIROSdb`.`ResearchOfficer` (`officerID`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `supervisorID`, `points`) VALUES (DEFAULT, DEFAULT, NULL, DEFAULT, DEFAULT, NULL, NULL, );



INSERT INTO `MIROSdb`.`SuperVisor` (`SuperVisorid`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `points`, `managerID`) VALUES (001, 'Max', 'Milan', 'Herrman', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'maxherrman@gmail.com', 20, 001);
INSERT INTO `MIROSdb`.`SuperVisor` (`SuperVisorid`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `points`, `managerID`) VALUES (002, 'Tom', 'Micheal', 'Grout', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'tomgrout@gmail.com', 0, 001);
INSERT INTO `MIROSdb`.`SuperVisor` (`SuperVisorid`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `points`, `managerID`) VALUES (003, 'Mick', 'Barry', 'Delight', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'mickdelight@gmail.com', 0, 002);

INSERT INTO `MIROSdb`.`Submission` (`submissionID`, `officerID`, `supervisorID`, `fileID`, `Section`, `Item`, `Date_Uploaded`, `Approved`) VALUES (001, 001, 001, 001, 'Personal Particulars', 'Professional Affilliations/Membership', '14/03/2024', NULL);
INSERT INTO `MIROSdb`.`Submission` (`submissionID`, `officerID`, `supervisorID`, `fileID`, `Section`, `Item`, `Date_Uploaded`, `Approved`) VALUES (002, 001, 001, 002, 'Professional Achievements', 'Operational and Development Responsibilities', '13/03/2024', NULL);
