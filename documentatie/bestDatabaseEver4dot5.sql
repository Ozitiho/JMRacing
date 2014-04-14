SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `JMRacing` DEFAULT CHARACTER SET utf8 ;
USE `JMRacing` ;

-- -----------------------------------------------------
-- Table `JMRacing`.`Editor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Editor` (
  `EditorID` INT NOT NULL AUTO_INCREMENT ,
  `Admin` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`EditorID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Article`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Article` (
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
    REFERENCES `JMRacing`.`Editor` (`EditorID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Racer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Racer` (
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
-- Table `JMRacing`.`Event`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Event` (
  `EventID` INT NOT NULL AUTO_INCREMENT ,
  `Country` VARCHAR(100) NOT NULL ,
  `City` VARCHAR(100) NOT NULL ,
  `Photo` VARCHAR(300) NULL ,
  `Date` DATE NOT NULL ,
  PRIMARY KEY (`EventID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Result`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Result` (
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
    REFERENCES `JMRacing`.`Event` (`EventID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Result_Racer1`
    FOREIGN KEY (`RacerID` )
    REFERENCES `JMRacing`.`Racer` (`RacerID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Product` (
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
