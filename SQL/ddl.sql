
CREATE TABLE IF NOT EXISTS `MIROSdb`.`manager` (
  `managerID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`managerID`));

CREATE TABLE IF NOT EXISTS `MIROSdb`.`supervisor` (
  `supervisorID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `points` INT NOT NULL,
  `managerID` INT,
  PRIMARY KEY (`supervisorid`),
  FOREIGN KEY (`managerID`)
    REFERENCES `MIROSdb`.`Manager` (`managerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE IF NOT EXISTS `MIROSdb`.`research_officer` (
  `officerID` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `middle_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `supervisorID` INT NULL,
  `points` INT NULL,
  PRIMARY KEY (`officerID`),
  CONSTRAINT `supervisorID`
    FOREIGN KEY (`supervisorID`)
    REFERENCES `MIROSdb`.`supervisor` (`supervisorID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE IF NOT EXISTS `MIROSdb`.`Submission` (
  `submissionID` INT NOT NULL,
  `officerID` INT NULL,
  `fileID` INT NULL,
  `Section` VARCHAR(45) NULL,
  `Item` VARCHAR(45) NULL,
  `Date_Uploaded` DATE NULL,
  `Approved` BOOLEAN NULL,
  PRIMARY KEY (`submissionID`),
  CONSTRAINT `officerID`
    FOREIGN KEY (`officerID`)
    REFERENCES `MIROSdb`.`research_officer` (`officerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
