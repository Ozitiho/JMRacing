SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `JMRacing` DEFAULT CHARACTER SET utf8 ;
USE `JMRacing` ;

-- -----------------------------------------------------
-- Table `JMRacing`.`Editors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Editors` (
  `EditorID` INT NOT NULL AUTO_INCREMENT ,
  `Admin` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`EditorID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Articles` (
  `ArticleID` INT NOT NULL AUTO_INCREMENT ,
  `EditorID` INT NOT NULL ,
  `Title` VARCHAR(200) NOT NULL ,
  `Message` TEXT NOT NULL ,
  `CreateDate` DATETIME NOT NULL ,
  `LastUpdatedDate` DATETIME NULL ,
  `Photo` VARCHAR(300) NULL ,
  PRIMARY KEY (`ArticleID`) ,
  INDEX `fk_Article_Editor1_idx` (`EditorID` ASC) ,
  CONSTRAINT `fk_Article_Editor1`
    FOREIGN KEY (`EditorID` )
    REFERENCES `JMRacing`.`Editors` (`EditorID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Racers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Racers` (
  `RacerID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(200) NOT NULL ,
  `Biography` TEXT NOT NULL ,
  `DateOfBirth` DATE NOT NULL ,
  `PlaceOfBirth` VARCHAR(100) NOT NULL ,
  `Nationality` VARCHAR(100) NOT NULL ,
  `Residence` VARCHAR(100) NOT NULL ,
  `Height` INT NOT NULL ,
  `Weight` INT NOT NULL ,
  `Hardware` VARCHAR(150) NOT NULL ,
  `RacerNumber` INT NOT NULL ,
  `Photo` VARCHAR(300) NULL ,
  `TicketsLink` VARCHAR(300) NULL ,
  PRIMARY KEY (`RacerID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Events` (
  `EventID` INT NOT NULL AUTO_INCREMENT ,
  `Country` VARCHAR(100) NOT NULL ,
  `City` VARCHAR(100) NOT NULL ,
  `Photo` VARCHAR(300) NULL ,
  `Date` DATE NOT NULL ,
  PRIMARY KEY (`EventID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Results`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Results` (
  `ResultID` INT NOT NULL AUTO_INCREMENT ,
  `EventID` INT NOT NULL ,
  `RacerID` INT NOT NULL ,
  `R1` INT NULL ,
  `R2` INT NULL ,
  `GP` INT NULL ,
  `Date` DATETIME NOT NULL ,
  PRIMARY KEY (`ResultID`) ,
  INDEX `fk_Result_Event_idx` (`EventID` ASC) ,
  INDEX `fk_Result_Racer1_idx` (`RacerID` ASC) ,
  CONSTRAINT `fk_Result_Event`
    FOREIGN KEY (`EventID` )
    REFERENCES `JMRacing`.`Events` (`EventID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Result_Racer1`
    FOREIGN KEY (`RacerID` )
    REFERENCES `JMRacing`.`Racers` (`RacerID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Products` (
  `ProductID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(200) NOT NULL ,
  `Price` DOUBLE NOT NULL ,
  `Size` VARCHAR(2) NOT NULL ,
  `Photo` VARCHAR(300) NULL ,
  PRIMARY KEY (`ProductID`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Articles`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Articles` (`ArticleID`, `EditorID`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (1, 1, 'Broem', 'Broembroemmmmm', '2014-01-01', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Racers`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Racers` (`RacerID`, `Name`, `Biography`, `DateOfBirth`, `PlaceOfBirth`, `Nationality`, `Residence`, `Height`, `Weight`, `Hardware`, `RacerNumber`, `Photo`, `TicketsLink`) VALUES (1, 'Broem van broemer', 'I broem, therefore I am.', '2014-01-01', 'Broemcity', 'Broemelander', 'Broemcity', 186, 78, 'High tech broembroemmobiel', 1, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Events`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Events` (`EventID`, `Country`, `City`, `Photo`, `Date`) VALUES (1, 'Broemland', 'Broemstad', NULL, '2014-01-01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Results`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Results` (`ResultID`, `EventID`, `RacerID`, `R1`, `R2`, `GP`, `Date`) VALUES (1, 1, 1, 2, 3, 4, '2014-01-01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Products`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Products` (`ProductID`, `Name`, `Price`, `Size`, `Photo`) VALUES (1, 'Broempet', 2, 'XL', NULL);

COMMIT;
