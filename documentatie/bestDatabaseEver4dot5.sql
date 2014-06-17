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
-- Table `JMRacing`.`albums`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`albums` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `user_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_albums_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_albums_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `JMRacing`.`users` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`photos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`photos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(150) NOT NULL ,
  `album_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_photos_albums1_idx` (`album_id` ASC) ,
  INDEX `fk_photos_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_photos_albums1`
    FOREIGN KEY (`album_id` )
    REFERENCES `JMRacing`.`albums` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_photos_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `JMRacing`.`users` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `Title` VARCHAR(200) NOT NULL ,
  `Message` TEXT NOT NULL ,
  `priority` INT NOT NULL DEFAULT 3 ,
  `CreateDate` DATETIME NOT NULL ,
  `LastUpdatedDate` DATETIME NULL ,
  `photo_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Article_Editor1_idx` (`user_id` ASC) ,
  INDEX `fk_Articles_photos1_idx` (`photo_id` ASC) ,
  CONSTRAINT `fk_Article_Editor1`
    FOREIGN KEY (`user_id` )
    REFERENCES `JMRacing`.`users` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Articles_photos1`
    FOREIGN KEY (`photo_id` )
    REFERENCES `JMRacing`.`photos` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`racers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`racers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(200) NOT NULL ,
  `RacerNumber` INT NOT NULL ,
  `Biography` TEXT NOT NULL ,
  `DateOfBirth` DATE NOT NULL ,
  `PlaceOfBirth` VARCHAR(100) NOT NULL ,
  `Nationality` VARCHAR(100) NOT NULL ,
  `Residence` VARCHAR(100) NOT NULL ,
  `Height` INT NOT NULL ,
  `Weight` INT NOT NULL ,
  `Hardware` VARCHAR(150) NOT NULL ,
  `WorldCupStanding` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`sponsors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`sponsors` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  `Image` VARCHAR(200) NOT NULL ,
  `URL` VARCHAR(200) NOT NULL ,
  `wide_image` INT NULL ,
  `box_image` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sponsors_photos1_idx` (`wide_image` ASC) ,
  INDEX `fk_sponsors_photos2_idx` (`box_image` ASC) ,
  CONSTRAINT `fk_sponsors_photos1`
    FOREIGN KEY (`wide_image` )
    REFERENCES `JMRacing`.`photos` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_sponsors_photos2`
    FOREIGN KEY (`box_image` )
    REFERENCES `JMRacing`.`photos` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`events`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Country` VARCHAR(100) NOT NULL ,
  `City` VARCHAR(100) NOT NULL ,
  `Description` TEXT NOT NULL ,
  `Latitude` VARCHAR(45) NULL ,
  `Longitude` VARCHAR(45) NULL ,
  `Date` DATETIME NOT NULL ,
  `photo_id` INT NULL ,
  `main_sponsor` INT NULL ,
  `sponsor1` INT NULL ,
  `sponsor2` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Events_photos1_idx` (`photo_id` ASC) ,
  INDEX `fk_Events_sponsors1_idx` (`main_sponsor` ASC) ,
  INDEX `fk_Events_sponsors2_idx` (`sponsor1` ASC) ,
  INDEX `fk_Events_sponsors3_idx` (`sponsor2` ASC) ,
  CONSTRAINT `fk_Events_photos1`
    FOREIGN KEY (`photo_id` )
    REFERENCES `JMRacing`.`photos` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_Events_sponsors1`
    FOREIGN KEY (`main_sponsor` )
    REFERENCES `JMRacing`.`sponsors` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_Events_sponsors2`
    FOREIGN KEY (`sponsor1` )
    REFERENCES `JMRacing`.`sponsors` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_Events_sponsors3`
    FOREIGN KEY (`sponsor2` )
    REFERENCES `JMRacing`.`sponsors` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`results`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`results` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `event_id` INT NOT NULL ,
  `racer_id` INT NOT NULL ,
  `R1` INT NULL ,
  `R2` INT NULL ,
  `GP` INT NULL ,
  `year` YEAR NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Result_Event_idx` (`event_id` ASC) ,
  INDEX `fk_Result_Racer1_idx` (`racer_id` ASC) ,
  CONSTRAINT `fk_Result_Event`
    FOREIGN KEY (`event_id` )
    REFERENCES `JMRacing`.`events` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Result_Racer1`
    FOREIGN KEY (`racer_id` )
    REFERENCES `JMRacing`.`racers` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(150) NOT NULL ,
  `Price` DOUBLE NOT NULL ,
  `DiscountPrice` DOUBLE NULL ,
  `description` VARCHAR(200) NULL ,
  `Size` VARCHAR(4) NOT NULL ,
  `photo_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_photos1_idx` (`photo_id` ASC) ,
  CONSTRAINT `fk_products_photos1`
    FOREIGN KEY (`photo_id` )
    REFERENCES `JMRacing`.`photos` (`id` )
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `JMRacing`.`tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `JMRacing`.`tags` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `value` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_article_tags_Articles1_idx` (`article_id` ASC) ,
  CONSTRAINT `fk_article_tags_Articles1`
    FOREIGN KEY (`article_id` )
    REFERENCES `JMRacing`.`articles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES (1, 'jirn11', '29480a2cb40cee5d0616ae74b323c1d6f74491a1', 'admin', '2014-05-08', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`albums`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`albums` (`id`, `name`, `user_id`) VALUES (1, 'News Images', 1);
INSERT INTO `JMRacing`.`albums` (`id`, `name`, `user_id`) VALUES (2, 'Event Images', 1);
INSERT INTO `JMRacing`.`albums` (`id`, `name`, `user_id`) VALUES (3, 'Merchandise Images', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`photos`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (1, 'romainvalkenswaard2014.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (2, 'axel1.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (3, 'romainbulgarije20142.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (4, 'romaintrentino2014.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (5, 'febvre_brazil.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (6, 'jmmill.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (7, 'aleksandremmen.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (8, 'febvrethailand3.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (9, 'Wilvo-Nestaan-Husqvarna_pod.jpg', 1, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (10, 'stateofgoias.jpeg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (11, 'kegums.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (12, 'lierneux.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (13, 'leon.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (14, 'lommel.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (15, 'loket.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (16, 'hyvinkaa.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (17, 'uddevalla.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (18, 'teutschenhal.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (19, 'maggiora.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (20, 'saintjean.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (21, 'ukmaterley.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (22, 'spaintalavera.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (23, 'valkenswaardNETHERLANDS.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (24, 'bulgariosevlievo.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (25, 'trentinoARCODITRENTO.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (26, 'brazilBETOCARRERO.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (27, 'thailandsiracha.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (28, 'qatarlosail.jpg', 2, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (29, 'home_img7.jpg', 3, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (30, 'team_img5.jpg', 3, 1);
INSERT INTO `JMRacing`.`photos` (`id`, `name`, `album_id`, `user_id`) VALUES (31, 'team_img6.jpg', 3, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`articles`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (1, 1, 'Wilvo Nestaan Husqvarna Factory Racing on the podium in Qatar', 'Wilvo Nestaan Husqvarna Factory Racing has started the World MX2 Series in Losail, Qatar with a podium position. Romain Febvre finished third overall just the same as he did last year and his team mate Aleksandr Tonkov ended the day with fifth position overall.', 3, '2014-03-02', NULL, 9);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (2, 1, 'Romain Febvre scores top three moto finish in Thailand', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing managed to score a top three moto finish in the second round of the World MX2 Series in Si Racha, Thailand. The young Frenchman scored this result in the second moto. In the first moto he made a mistake in the beginning of the race but came back from twelfth to ninth position, which gave him fifth position overall. Aleksandr Tonkov was riding well in the extreme heat of Thailand. He finished in seventh and eight position in the motos and ended the day with ninth position overall.', 3, '2014-03-09', NULL, 8);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (3, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Emmen', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have scored podium positions at the opening round of the Dutch Open MX2 Series in Emmercompascuum. After a fourth position in the first moto, Romain Febvre was fighting for the win in the second moto and finished the race in second position. With these results he finished in second position overall as well. Aleksandr Tonkov didn’t felt comfortable on the track but gave everything he had and finished in third position in both motos.', 3, '2014-03-17', NULL, 7);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (4, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Mill', 'Wilvo Nestaan Husqvarna Factory Racing has scored two podium positions in the second round of the Dutch Open Championship Series in Mill. Aleksandr Tonkov and Romain Febvre had a nice battle for second position in both motos. In the first and the second moto it was Romain who crossed the finish line in second position in front of his team mate Aleksandr.', 3, '2014-03-23', NULL, 6);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (5, 1, 'Romain Febvre scores top three moto finish in Brazil', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish in the third round of the World MX2 Series in Beto Carrero, Brazil. Unfortunately he made a crash in the opening lap of the second moto and had to come from behind. Romain gave everything he had and worked his way back up to eleventh position for seventh overall. Aleksandr Tonkov was fighting inside of the top three in the first moto but due to a crash in the closing stages of the race he finished the moto in sixth position. In the second moto he was riding in fifth position but with still several laps to go he crashed and lost two positions to finish the race in seventh position.', 3, '2014-03-31', NULL, 5);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (6, 1, 'Romain Febvre in the top five in GP of Italy', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing finished inside of the top five at round four of the World MX2 Series in Arco di Trento, Italy. The young Frenchman finished seventh in the first moto and came home in fifth position in the second moto which gave him fifth place overall. Aleksandr Tonkov had to start from the outside in the first moto due to some bad luck in the qualifying heat. He had a good jump out of the gate but disaster struck the young Russian when he made a crash in the beginning of the race. Due to this he dropped back to the back of the pack. Aleksandr tried to make the best of it and charged all the way back to fourteenth position. In the second moto things were going better for him as he finished in seventh position, which gave him tenth position overall.', 3, '2014-04-14', NULL, 4);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (7, 1, 'Romain Febvre close of scoring a top three moto finish in Bulgaria', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing came close of scoring a top three moto finish at round five of the World MX2 Series in Sevlievo, Bulgaria. Febvre finished in fifth position in the first moto and things were looking that he was going for a top three moto finish in the second moto. He was riding in third position but with several laps to go he made a small crash and lost two positions to finally finish the race in fifth position. Aleksandr had several duels around tenth position in the first moto. He changed places for several times and finally finished the moto in tenth position. In the second moto he crashed in the start but charged back through the field and finished the race in ninth position.', 3, '2014-04-20', NULL, 3);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (8, 1, 'Febvre and Tonkov new leaders in the Dutch MX2 Series', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have taken over the first two spots in the Dutch MX2 Series. In round three of the series in Axel, Romain finished second overall and took over the championship lead from the injured Glenn Coldenhoff. Aleksandr Tonkov missed the overall podium by only two points but with fourth position overall he moved up to second position in the standings.', 3, '2014-04-27', NULL, 2);
INSERT INTO `JMRacing`.`articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES (9, 1, 'Romain Febvre second in the Dutch Grand Prix', 'Wilvo Nestaan Husqvarna Factory Racing has had a successful Grand Prix in Valkenswaard. Romain Febvre and Aleksandr Tonkov were doing a great job and scored well on the sand circuit of Valkenswaard. Romain Febvre finished in third position in both motos which gave him second position overall. Aleksandr ended the day in seventh position with a 5-8 in the motos and scored consistent in the Dutch Grand Prix.', 3, '2014-05-04', NULL, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`racers`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`racers` (`id`, `Name`, `RacerNumber`, `Biography`, `DateOfBirth`, `PlaceOfBirth`, `Nationality`, `Residence`, `Height`, `Weight`, `Hardware`, `WorldCupStanding`) VALUES (1, 'Aleksandr Tonkov', 59, 'ik ben racer 1', '2014-01-01', 'Zwolle', 'Nederlandse', 'Zwolle', 186, 85, 'Brommer', 4);
INSERT INTO `JMRacing`.`racers` (`id`, `Name`, `RacerNumber`, `Biography`, `DateOfBirth`, `PlaceOfBirth`, `Nationality`, `Residence`, `Height`, `Weight`, `Hardware`, `WorldCupStanding`) VALUES (2, 'Romain Febvre', 461, 'ik ben racer 2', '2014-01-01', 'Utrecht', 'Nederlandse', 'Utrecht', 182, 80, 'Fiets', 12);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`sponsors`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (1, 'Wilvo', 'S_logo1.png', 'http://www.wilvo.nl', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (2, 'Nestaan', 'S_logo2.png', 'http://www.nestaan.nl', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (3, 'Husqvarna', 'S_logo3.png', 'http://www.husqvarna.com', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (4, 'Red Bull', 'S_logo4.png', 'http://www.redbull.com', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (5, 'Jumbo', 'S_logo5.png', 'http://www.jumbosupermarkten.nl', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (6, 'Bel Ray', 'S_logo6.png', 'http://www.belray.com/', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (7, 'Segafredo', 'S_logo7.png', 'http://www.segafredo.nl/', NULL, NULL);
INSERT INTO `JMRacing`.`sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES (8, 'Suomy', 'S_logo8.png', 'http://www.suomy.com/', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`events`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (1, 'Qatar', 'Losail', 'beschrijving', NULL, NULL, '2014-03-01', 28, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (2, 'Thailand', 'Si Racha', 'beschrijving', NULL, NULL, '2014-03-09', 27, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (3, 'Brazil', 'Beto Carrero', 'beschrijving', NULL, NULL, '2014-03-30', 26, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (4, 'Trentino', 'Arco di Trento', 'beschrijving', NULL, NULL, '2014-04-13', 25, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (5, 'Bulgaria', 'Sevlievo', 'beschrijving', NULL, NULL, '2014-04-20', 24, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (6, 'Netherlands', 'Valkenswaard', 'beschrijving', NULL, NULL, '2014-05-04', 23, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (7, 'Spain', 'Talavera de la Reina', 'beschrijving', NULL, NULL, '2014-05-11', 22, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (8, 'Great Britain', 'Matterly Basin, Winchester', 'beschrijving', '55.378051', '-3.435973', '2014-05-25', 21, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (9, 'France', 'Saint Jean d\'Angely', 'beschrijving', '45.944823', '-0.517763', '2014-06-01', 20, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (10, 'Italy', 'Maggiora', 'beschrijving', '45.686217', '8.419272', '2014-06-15', 19, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (11, 'Germany', 'Teutschenthal', 'beschrijving', '51.447752', '11.798088', '2014-06-22', 18, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (12, 'Sweden', 'Uddevalla', 'beschrijving', '58.349800', '11.935649', '2014-07-06', 17, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (13, 'Finland', 'Hyvinkää', 'beschrijving', '60.631811', '24.857883', '2014-07-13', 16, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (14, 'Czech Republic', 'Loket', 'beschrijving', '50.186012', '12.754063', '2014-07-27', 15, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (15, 'Belgium', 'TBA', 'beschrijving', '50.850000', '4.350000', '2014-08-03', NULL, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (16, 'Ukraine', 'Dimotrov, Donetssk', 'beschrijving', '48.296212', '37.270004', '2014-08-17', NULL, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (17, 'State of Goias', 'Goiania', 'beschrijving', '-16.686891', '-49.264794', '2014-09-07', 10, NULL, NULL, NULL);
INSERT INTO `JMRacing`.`events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES (18, 'Mexico', 'Leon', 'beschrijving', '21.129201', '-101.672675', '2014-09-14', 13, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`results`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (1, 1, 1, 6, 5, 5, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (2, 1, 2, 5, 4, 3, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (3, 2, 1, 7, 8, 9, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (4, 2, 2, 9, 3, 5, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (5, 3, 1, 6, 7, 8, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (6, 3, 2, 3, 11, 7, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (7, 4, 1, 14, 8, 10, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (8, 4, 2, 7, 5, 5, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (9, 5, 1, 10, 9, 9, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (10, 5, 2, 5, 5, 5, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (11, 6, 1, 5, 8, 7, 2014);
INSERT INTO `JMRacing`.`results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES (12, 6, 2, 3, 3, 2, 2014);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`products`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`products` (`id`, `Name`, `Price`, `DiscountPrice`, `description`, `Size`, `photo_id`) VALUES (1, 'New Era - Red Bull Cap', 29.95, 14.95, NULL, 'none', 29);
INSERT INTO `JMRacing`.`products` (`id`, `Name`, `Price`, `DiscountPrice`, `description`, `Size`, `photo_id`) VALUES (2, 'Race Shirt - Red Bull', 29.95, 14.95, NULL, 'none', 30);
INSERT INTO `JMRacing`.`products` (`id`, `Name`, `Price`, `DiscountPrice`, `description`, `Size`, `photo_id`) VALUES (3, 'New Era - Red Bull Cap', 29.95, 14.95, NULL, 'none', 31);

COMMIT;

-- -----------------------------------------------------
-- Data for table `JMRacing`.`tags`
-- -----------------------------------------------------
START TRANSACTION;
USE `JMRacing`;
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (1, 1, 'romain febvre');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (2, 1, 'aleksandr tonkov');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (3, 1, 'losail');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (4, 2, 'romain febvre');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (5, 2, 'si racha');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (6, 3, 'emmen');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (7, 4, 'mill');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (8, 5, 'aleksandr tonkov');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (9, 5, 'beto carrero');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (10, 6, 'romain febvre');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (11, 6, 'arco di trento');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (12, 7, 'sevlievo');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (13, 7, 'romain febvre');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (14, 8, 'glenn coldenhoff');
INSERT INTO `JMRacing`.`tags` (`id`, `article_id`, `value`) VALUES (15, 9, 'valkenswaard');

COMMIT;
