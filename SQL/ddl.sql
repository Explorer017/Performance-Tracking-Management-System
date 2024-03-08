CREATE TABLE IF NOT EXISTS `MIROSdb`.`User` (
  `UserID` INT NOT NULL,
  `First_Name` VARCHAR(255) NOT NULL,
  `Last_Name` VARCHAR(32) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Access_Level` VARCHAR(45) NOT NULL,
  `Score` INT NULL,
  PRIMARY KEY (`UserID`));

CREATE TABLE IF NOT EXISTS `MIROSdb`.`Files` (
  `FileID` INT NOT NULL,
  `User_ID_Uploaded_By` INT NOT NULL,
  PRIMARY KEY (`FileID`),
  INDEX `UserID_Uploaded_By_idx` (`User_ID_Uploaded_By` ASC) VISIBLE,
  CONSTRAINT `UserID_Uploaded_By`
    FOREIGN KEY (`User_ID_Uploaded_By`)
    REFERENCES `MIROSdb`.`User` (`UserID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


CREATE TABLE IF NOT EXISTS `MIROSdb`.`Submission` (
  `Submission_ID` INT NOT NULL,
  `Submission_Type` VARCHAR(45) NOT NULL,
  `FileID` INT NULL,
  PRIMARY KEY (`Submission_ID`),
  INDEX `FileID_idx` (`FileID` ASC) VISIBLE,
  CONSTRAINT `FileID`
    FOREIGN KEY (`FileID`)
    REFERENCES `MIROSdb`.`Files` (`FileID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


CREATE TABLE IF NOT EXISTS `MIROSdb`.`UserSubmissions` (
  `UserID` INT NOT NULL,
  `SubmissionID` INT NOT NULL,
  PRIMARY KEY (`UserID`, `SubmissionID`),
  INDEX `SubmissionID_idx` (`SubmissionID` ASC) VISIBLE,
  CONSTRAINT `UserID`
    FOREIGN KEY (`UserID`)
    REFERENCES `MIROSdb`.`User` (`UserID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `SubmissionID`
    FOREIGN KEY (`SubmissionID`)
    REFERENCES `MIROSdb`.`Submission` (`Submission_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB