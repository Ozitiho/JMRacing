SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `JMRacing` DEFAULT CHARACTER SET utf8 ;
USE `JMRacing` ;

-- -----------------------------------------------------
-- Table `JMRacing`.`Editors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Editors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Admin` TINYINT(1) NOT NULL ,
  `Name` VARCHAR(100) NOT NULL ,
  `Password` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Articles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `editor_id` INT NOT NULL ,
  `Title` VARCHAR(200) NOT NULL ,
  `Message` TEXT NOT NULL ,
  `CreateDate` DATETIME NOT NULL ,
  `LastUpdatedDate` DATETIME NULL ,
  `Photo` VARCHAR(300) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Article_Editor1_idx` (`editor_id` ASC) ,
  CONSTRAINT `fk_Article_Editor1`
    FOREIGN KEY (`editor_id` )
    REFERENCES `JMRacing`.`Editors` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Racers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Racers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
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
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Events` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Country` VARCHAR(100) NOT NULL ,
  `City` VARCHAR(100) NOT NULL ,
  `Description` TEXT NOT NULL ,
  `Photo` VARCHAR(300) NULL ,
  `Date` DATE NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Results`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Results` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `event_id` INT NOT NULL ,
  `racer_id` INT NOT NULL ,
  `R1` INT NULL ,
  `R2` INT NULL ,
  `GP` INT NULL ,
  `Date` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Result_Event_idx` (`event_id` ASC) ,
  INDEX `fk_Result_Racer1_idx` (`racer_id` ASC) ,
  CONSTRAINT `fk_Result_Event`
    FOREIGN KEY (`event_id` )
    REFERENCES `JMRacing`.`Events` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Result_Racer1`
    FOREIGN KEY (`racer_id` )
    REFERENCES `JMRacing`.`Racers` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(200) NOT NULL ,
  `Price` DOUBLE NOT NULL ,
  `Size` VARCHAR(2) NOT NULL ,
  `Photo` VARCHAR(300) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Sponsors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Sponsors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  `Image` VARCHAR(200) NOT NULL ,
  `URL` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Editors`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Editors` (`id`, `Admin`, `Name`, `Password`) VALUES (1, 1, 'Jorn Harkema', 'homo');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Articles`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Articles` (`id`, `editor_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (1, 1, 'Broem', 'Broembroemmmmm', '2014-01-01', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Racers`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Racers` (`id`, `Name`, `Biography`, `DateOfBirth`, `PlaceOfBirth`, `Nationality`, `Residence`, `Height`, `Weight`, `Hardware`, `RacerNumber`, `Photo`, `TicketsLink`) VALUES (1, 'Broem van broemer', 'I broem, therefore I am.', '2014-01-01', 'Broemcity', 'Broemelander', 'Broemcity', 186, 78, 'High tech broembroemmobiel', 1, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Events`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Date`) VALUES (1, 'Broemland', 'Broemstad', 'Jorn de meester Sharkema heeft hier vorig jaar zegegevierd.', NULL, '2014-01-01');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Date`) VALUES (2, 'Bruumlend', 'Bruumsitty', 'Bas van koesveld heeft hier vorig jaar gewonnen, dus dat betekent dat iedereen kan winnen.', NULL, '2015-02-02');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Date`) VALUES (3, 'Motorland', 'Motorstad', 'De enige echte klassieker binnen de broemsport.', NULL, '2015-03-03');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Results`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `Date`) VALUES (1, 1, 1, 2, 3, 4, '2014-01-01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Products`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Products` (`id`, `Name`, `Price`, `Size`, `Photo`) VALUES (1, 'Broempet', 2, 'XL', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Sponsors`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (1, 'Wilvo', 'S_logo1.png', 'http://www.wilvo.nl');
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (2, 'Nestaan', 'S_logo2.png', 'http://www.nestaan.nl');
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (3, 'Husqvarna', 'S_logo3.png', 'http://www.husqvarna.com');
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (4, 'Red Bull', 'S_logo4.png', 'http://www.redbull.com');
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (5, 'Jumbo', 'S_logo5.png', 'http://www.jumbosupermarkten.nl');
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (6, 'Bel Ray', 'S_logo6.png', 'http://www.belray.com/');
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (7, 'Segafredo', 'S_logo7.png', 'http://www.segafredo.nl/');

COMMIT;
