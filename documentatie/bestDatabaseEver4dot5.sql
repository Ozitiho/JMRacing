SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `JMRacing` DEFAULT CHARACTER SET utf8 ;
USE `JMRacing` ;

-- -----------------------------------------------------
-- Table `JMRacing`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(50) NOT NULL ,
  `password` VARCHAR(50) NOT NULL ,
  `role` VARCHAR(20) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Articles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `Title` VARCHAR(200) NOT NULL ,
  `Message` TEXT NOT NULL ,
  `CreateDate` DATETIME NOT NULL ,
  `LastUpdatedDate` DATETIME NULL ,
  `Photo` VARCHAR(300) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Article_Editor1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_Article_Editor1`
    FOREIGN KEY (`user_id` )
    REFERENCES `JMRacing`.`users` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`Racers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Racers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(200) NOT NULL ,
  `RacerNumber` INT NOT NULL ,
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
  `Latitude` VARCHAR(45) NULL ,
  `Longitude` VARCHAR(45) NULL ,
  `Date` DATETIME NOT NULL ,
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
-- Table `JMRacing`.`Sponsors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`Sponsors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  `Image` VARCHAR(200) NOT NULL ,
  `URL` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(150) NOT NULL ,
  `Price` DOUBLE NOT NULL ,
  `DiscountPrice` DOUBLE NULL ,
  `Size` VARCHAR(4) NOT NULL ,
  `Image` VARCHAR(250) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES (1, 'Admin', 'geheim', 'de baas', '2014-05-08', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Articles`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (1, 1, 'Wilvo Nestaan Husqvarna Factory Racing on the podium in Qatar', 'Wilvo Nestaan Husqvarna Factory Racing has started the World MX2 Series in Losail, Qatar with a podium position. Romain Febvre finished third overall just the same as he did last year and his team mate Aleksandr Tonkov ended the day with fifth position overall.', '2014-03-02', NULL, 'http://jmracing.mx/images/Wilvo-Nestaan-Husqvarna_pod.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (2, 1, 'Romain Febvre scores top three moto finish in Thailand', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing managed to score a top three moto finish in the second round of the World MX2 Series in Si Racha, Thailand. The young Frenchman scored this result in the second moto. In the first moto he made a mistake in the beginning of the race but came back from twelfth to ninth position, which gave him fifth position overall. Aleksandr Tonkov was riding well in the extreme heat of Thailand. He finished in seventh and eight position in the motos and ended the day with ninth position overall.', '2014-03-09', NULL, 'http://jmracing.mx/images/febvrethailand3.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (3, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Emmen', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have scored podium positions at the opening round of the Dutch Open MX2 Series in Emmercompascuum. After a fourth position in the first moto, Romain Febvre was fighting for the win in the second moto and finished the race in second position. With these results he finished in second position overall as well. Aleksandr Tonkov didn’t felt comfortable on the track but gave everything he had and finished in third position in both motos.', '2014-03-17', NULL, 'http://jmracing.mx/images/aleksandremmen.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (4, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Mill', 'Wilvo Nestaan Husqvarna Factory Racing has scored two podium positions in the second round of the Dutch Open Championship Series in Mill. Aleksandr Tonkov and Romain Febvre had a nice battle for second position in both motos. In the first and the second moto it was Romain who crossed the finish line in second position in front of his team mate Aleksandr.', '2014-03-23', NULL, 'http://jmracing.mx/images/jmmill.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (5, 1, 'Romain Febvre scores top three moto finish in Brazil', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish in the third round of the World MX2 Series in Beto Carrero, Brazil. Unfortunately he made a crash in the opening lap of the second moto and had to come from behind. Romain gave everything he had and worked his way back up to eleventh position for seventh overall. Aleksandr Tonkov was fighting inside of the top three in the first moto but due to a crash in the closing stages of the race he finished the moto in sixth position. In the second moto he was riding in fifth position but with still several laps to go he crashed and lost two positions to finish the race in seventh position.', '2014-03-31', NULL, 'http://jmracing.mx/images/febvre_brazil.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (6, 1, 'Romain Febvre in the top five in GP of Italy', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing finished inside of the top five at round four of the World MX2 Series in Arco di Trento, Italy. The young Frenchman finished seventh in the first moto and came home in fifth position in the second moto which gave him fifth place overall. Aleksandr Tonkov had to start from the outside in the first moto due to some bad luck in the qualifying heat. He had a good jump out of the gate but disaster struck the young Russian when he made a crash in the beginning of the race. Due to this he dropped back to the back of the pack. Aleksandr tried to make the best of it and charged all the way back to fourteenth position. In the second moto things were going better for him as he finished in seventh position, which gave him tenth position overall.', '2014-04-14', NULL, 'http://jmracing.mx/images/romaintrentino2014.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (7, 1, 'Romain Febvre close of scoring a top three moto finish in Bulgaria', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing came close of scoring a top three moto finish at round five of the World MX2 Series in Sevlievo, Bulgaria. Febvre finished in fifth position in the first moto and things were looking that he was going for a top three moto finish in the second moto. He was riding in third position but with several laps to go he made a small crash and lost two positions to finally finish the race in fifth position. Aleksandr had several duels around tenth position in the first moto. He changed places for several times and finally finished the moto in tenth position. In the second moto he crashed in the start but charged back through the field and finished the race in ninth position.', '2014-04-20', NULL, 'http://jmracing.mx/images/romainbulgarije20142.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (8, 1, 'Febvre and Tonkov new leaders in the Dutch MX2 Series', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have taken over the first two spots in the Dutch MX2 Series. In round three of the series in Axel, Romain finished second overall and took over the championship lead from the injured Glenn Coldenhoff. Aleksandr Tonkov missed the overall podium by only two points but with fourth position overall he moved up to second position in the standings.', '2014-04-27', NULL, 'http://jmracing.mx/images/axel1.jpg');
INSERT INTO `JMRacing`.`Articles` (`id`, `user_id`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES (9, 1, 'Romain Febvre second in the Dutch Grand Prix', 'Wilvo Nestaan Husqvarna Factory Racing has had a successful Grand Prix in Valkenswaard. Romain Febvre and Aleksandr Tonkov were doing a great job and scored well on the sand circuit of Valkenswaard. Romain Febvre finished in third position in both motos which gave him second position overall. Aleksandr ended the day in seventh position with a 5-8 in the motos and scored consistent in the Dutch Grand Prix.', '2014-05-04', NULL, 'http://jmracing.mx/images/romainvalkenswaard2014.jpg');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Racers`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Racers` (`id`, `Name`, `RacerNumber`) VALUES (1, 'Aleksandr Tonkov', 59);
INSERT INTO `JMRacing`.`Racers` (`id`, `Name`, `RacerNumber`) VALUES (2, 'Romain Febvre', 461);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Events`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (1, 'Qatar', 'Losail', 'beschrijving', NULL, NULL, NULL, '2014-03-01');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (2, 'Thailand', 'Si Racha', 'beschrijving', NULL, NULL, NULL, '2014-03-09');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (3, 'Brazil', 'Beto Carrero', 'beschrijving', NULL, NULL, NULL, '2014-03-30');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (4, 'Trentino', 'Arco di Trento', 'beschrijving', NULL, NULL, NULL, '2014-04-13');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (5, 'Bulgaria', 'Sevlievo', 'beschrijving', NULL, NULL, NULL, '2014-04-20');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (6, 'Netherlands', 'Valkenswaard', 'beschrijving', NULL, NULL, NULL, '2014-05-04');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (7, 'Spain', 'Talavera de la Reina', 'beschrijving', NULL, NULL, NULL, '2014-05-11');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (8, 'Great Britain', 'Matterly Basin, Winchester', 'beschrijving', NULL, NULL, NULL, '2014-05-25');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (9, 'France', 'Saint Jean d\'Angely', 'beschrijving', NULL, NULL, NULL, '2014-06-01');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (10, 'Italy', 'Maggiora', 'beschrijving', NULL, NULL, NULL, '2014-06-15');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (11, 'Germany', 'Teutschenthal', 'beschrijving', NULL, NULL, NULL, '2014-06-22');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (12, 'Sweden', 'Uddevalla', 'beschrijving', NULL, NULL, NULL, '2014-07-06');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (13, 'Finland', 'Hyvinkää', 'beschrijving', NULL, NULL, NULL, '2014-07-13');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (14, 'Czech Republic', 'Loket', 'beschrijving', NULL, NULL, NULL, '2014-07-27');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (15, 'Belgium', 'TBA', 'beschrijving', NULL, NULL, NULL, '2014-08-03');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (16, 'Ukraine', 'Dimotrov, Donetssk', 'beschrijving', NULL, NULL, NULL, '2014-08-17');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (17, 'State of Goias', 'Goiania', 'beschrijving', NULL, NULL, NULL, '2014-09-07');
INSERT INTO `JMRacing`.`Events` (`id`, `Country`, `City`, `Description`, `Photo`, `Latitude`, `Longitude`, `Date`) VALUES (18, 'Mexico', 'Leon', 'beschrijving', NULL, NULL, NULL, '2014-09-14');

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`Results`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (1, 1, 1, 6, 5, 5);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (2, 1, 2, 5, 4, 3);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (3, 2, 1, 7, 8, 9);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (4, 2, 2, 9, 3, 5);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (5, 3, 1, 6, 7, 8);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (6, 3, 2, 3, 11, 7);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (7, 4, 1, 14, 8, 10);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (8, 4, 2, 7, 5, 5);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (9, 5, 1, 10, 9, 9);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (10, 5, 2, 5, 5, 5);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (11, 6, 1, 5, 8, 7);
INSERT INTO `JMRacing`.`Results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`) VALUES (12, 6, 2, 3, 3, 2);

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
INSERT INTO `JMRacing`.`Sponsors` (`id`, `Name`, `Image`, `URL`) VALUES (8, 'Suomy', 'S_logo8.png', 'http://www.suomy.com/');

COMMIT;
