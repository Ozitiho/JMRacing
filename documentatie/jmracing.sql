-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2014 at 12:29 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmracing`
--
CREATE DATABASE IF NOT EXISTS `jmracing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jmracing`;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_albums_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `user_id`) VALUES
(1, 'News Images', NULL, 1),
(2, 'Event Images', NULL, 1),
(3, 'Merchandise Images', NULL, 1),
(4, 'sponsors_box', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Message` text NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '3',
  `CreateDate` datetime NOT NULL,
  `LastUpdatedDate` datetime DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Article_Editor1_idx` (`user_id`),
  KEY `fk_Articles_photos1_idx` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `Title`, `Message`, `priority`, `CreateDate`, `LastUpdatedDate`, `photo_id`) VALUES
(1, 1, 'Wilvo Nestaan Husqvarna Factory Racing on the podium in Qatar', 'Wilvo Nestaan Husqvarna Factory Racing has started the World MX2 Series in Losail, Qatar with a podium position. Romain Febvre finished third overall just the same as he did last year and his team mate Aleksandr Tonkov ended the day with fifth position overall.', 3, '2014-03-02 00:00:00', NULL, 9),
(2, 1, 'Romain Febvre scores top three moto finish in Thailand', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing managed to score a top three moto finish in the second round of the World MX2 Series in Si Racha, Thailand. The young Frenchman scored this result in the second moto. In the first moto he made a mistake in the beginning of the race but came back from twelfth to ninth position, which gave him fifth position overall. Aleksandr Tonkov was riding well in the extreme heat of Thailand. He finished in seventh and eight position in the motos and ended the day with ninth position overall.', 3, '2014-03-09 00:00:00', NULL, 8),
(3, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Emmen', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have scored podium positions at the opening round of the Dutch Open MX2 Series in Emmercompascuum. After a fourth position in the first moto, Romain Febvre was fighting for the win in the second moto and finished the race in second position. With these results he finished in second position overall as well. Aleksandr Tonkov didn’t felt comfortable on the track but gave everything he had and finished in third position in both motos.', 3, '2014-03-17 00:00:00', NULL, 7),
(4, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Mill', 'Wilvo Nestaan Husqvarna Factory Racing has scored two podium positions in the second round of the Dutch Open Championship Series in Mill. Aleksandr Tonkov and Romain Febvre had a nice battle for second position in both motos. In the first and the second moto it was Romain who crossed the finish line in second position in front of his team mate Aleksandr.', 3, '2014-03-23 00:00:00', NULL, 6),
(5, 1, 'Romain Febvre scores top three moto finish in Brazil', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish in the third round of the World MX2 Series in Beto Carrero, Brazil. Unfortunately he made a crash in the opening lap of the second moto and had to come from behind. Romain gave everything he had and worked his way back up to eleventh position for seventh overall. Aleksandr Tonkov was fighting inside of the top three in the first moto but due to a crash in the closing stages of the race he finished the moto in sixth position. In the second moto he was riding in fifth position but with still several laps to go he crashed and lost two positions to finish the race in seventh position.', 3, '2014-03-31 00:00:00', NULL, 5),
(6, 1, 'Romain Febvre in the top five in GP of Italy', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing finished inside of the top five at round four of the World MX2 Series in Arco di Trento, Italy. The young Frenchman finished seventh in the first moto and came home in fifth position in the second moto which gave him fifth place overall. Aleksandr Tonkov had to start from the outside in the first moto due to some bad luck in the qualifying heat. He had a good jump out of the gate but disaster struck the young Russian when he made a crash in the beginning of the race. Due to this he dropped back to the back of the pack. Aleksandr tried to make the best of it and charged all the way back to fourteenth position. In the second moto things were going better for him as he finished in seventh position, which gave him tenth position overall.', 3, '2014-04-14 00:00:00', NULL, 4),
(7, 1, 'Romain Febvre close of scoring a top three moto finish in Bulgaria', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing came close of scoring a top three moto finish at round five of the World MX2 Series in Sevlievo, Bulgaria. Febvre finished in fifth position in the first moto and things were looking that he was going for a top three moto finish in the second moto. He was riding in third position but with several laps to go he made a small crash and lost two positions to finally finish the race in fifth position. Aleksandr had several duels around tenth position in the first moto. He changed places for several times and finally finished the moto in tenth position. In the second moto he crashed in the start but charged back through the field and finished the race in ninth position.', 3, '2014-04-20 00:00:00', NULL, 3),
(8, 1, 'Febvre and Tonkov new leaders in the Dutch MX2 Series', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have taken over the first two spots in the Dutch MX2 Series. In round three of the series in Axel, Romain finished second overall and took over the championship lead from the injured Glenn Coldenhoff. Aleksandr Tonkov missed the overall podium by only two points but with fourth position overall he moved up to second position in the standings.', 3, '2014-04-27 00:00:00', NULL, 2),
(9, 1, 'Romain Febvre second in the Dutch Grand Prix', 'Wilvo Nestaan Husqvarna Factory Racing has had a successful Grand Prix in Valkenswaard. Romain Febvre and Aleksandr Tonkov were doing a great job and scored well on the sand circuit of Valkenswaard. Romain Febvre finished in third position in both motos which gave him second position overall. Aleksandr ended the day in seventh position with a 5-8 in the motos and scored consistent in the Dutch Grand Prix.', 3, '2014-05-04 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Latitude` varchar(45) DEFAULT NULL,
  `Longitude` varchar(45) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `main_sponsor` int(11) DEFAULT NULL,
  `sponsor1` int(11) DEFAULT NULL,
  `sponsor2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Events_photos1_idx` (`photo_id`),
  KEY `fk_Events_sponsors1_idx` (`main_sponsor`),
  KEY `fk_Events_sponsors2_idx` (`sponsor1`),
  KEY `fk_Events_sponsors3_idx` (`sponsor2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `Country`, `City`, `Description`, `Latitude`, `Longitude`, `Date`, `photo_id`, `main_sponsor`, `sponsor1`, `sponsor2`) VALUES
(1, 'Qatar', 'Losail', 'beschrijving', NULL, NULL, '2014-03-01 00:00:00', 28, NULL, NULL, NULL),
(2, 'Thailand', 'Si Racha', 'beschrijving', NULL, NULL, '2014-03-09 00:00:00', 27, NULL, NULL, NULL),
(3, 'Brazil', 'Beto Carrero', 'beschrijving', NULL, NULL, '2014-03-30 00:00:00', 26, NULL, NULL, NULL),
(4, 'Trentino', 'Arco di Trento', 'beschrijving', NULL, NULL, '2014-04-13 00:00:00', 25, NULL, NULL, NULL),
(5, 'Bulgaria', 'Sevlievo', 'beschrijving', NULL, NULL, '2014-04-20 00:00:00', 24, NULL, NULL, NULL),
(6, 'Netherlands', 'Valkenswaard', 'beschrijving', NULL, NULL, '2014-05-04 00:00:00', 23, NULL, NULL, NULL),
(7, 'Spain', 'Talavera de la Reina', 'beschrijving', NULL, NULL, '2014-05-11 00:00:00', 22, NULL, NULL, NULL),
(8, 'Great Britain', 'Matterly Basin, Winchester', 'beschrijving', '55.378051', '-3.435973', '2014-05-25 00:00:00', 21, NULL, NULL, NULL),
(9, 'France', 'Saint Jean d''Angely', 'beschrijving', '45.944823', '-0.517763', '2014-06-01 00:00:00', 20, NULL, NULL, NULL),
(10, 'Italy', 'Maggiora', 'beschrijving', '45.686217', '8.419272', '2014-06-15 00:00:00', 19, NULL, NULL, NULL),
(11, 'Germany', 'Teutschenthal', 'beschrijving', '51.447752', '11.798088', '2014-06-22 00:00:00', 18, 1, 1, 1),
(12, 'Sweden', 'Uddevalla', 'beschrijving', '58.349800', '11.935649', '2014-07-06 00:00:00', 17, NULL, NULL, NULL),
(13, 'Finland', 'Hyvinkää', 'beschrijving', '60.631811', '24.857883', '2014-07-13 00:00:00', 16, NULL, NULL, NULL),
(14, 'Czech Republic', 'Loket', 'beschrijving', '50.186012', '12.754063', '2014-07-27 00:00:00', 15, NULL, NULL, NULL),
(15, 'Belgium', 'TBA', 'beschrijving', '50.850000', '4.350000', '2014-08-03 00:00:00', NULL, NULL, NULL, NULL),
(16, 'Ukraine', 'Dimotrov, Donetssk', 'beschrijving', '48.296212', '37.270004', '2014-08-17 00:00:00', NULL, NULL, NULL, NULL),
(17, 'State of Goias', 'Goiania', 'beschrijving', '-16.686891', '-49.264794', '2014-09-07 00:00:00', 10, NULL, NULL, NULL),
(18, 'Mexico', 'Leon', 'beschrijving', '21.129201', '-101.672675', '2014-09-14 00:00:00', 13, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photos_albums1_idx` (`album_id`),
  KEY `fk_photos_users1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `album_id`, `user_id`) VALUES
(1, 'romainvalkenswaard2014.jpg', 1, 1),
(2, 'axel1.jpg', 1, 1),
(3, 'romainbulgarije20142.jpg', 1, 1),
(4, 'romaintrentino2014.jpg', 1, 1),
(5, 'febvre_brazil.jpg', 1, 1),
(6, 'jmmill.jpg', 1, 1),
(7, 'aleksandremmen.jpg', 1, 1),
(8, 'febvrethailand3.jpg', 1, 1),
(9, 'Wilvo-Nestaan-Husqvarna_pod.jpg', 1, 1),
(10, 'stateofgoias.jpeg', 2, 1),
(11, 'kegums.jpg', 2, 1),
(12, 'lierneux.jpg', 2, 1),
(13, 'leon.jpg', 2, 1),
(14, 'lommel.jpg', 2, 1),
(15, 'loket.jpg', 2, 1),
(16, 'hyvinkaa.jpg', 2, 1),
(17, 'uddevalla.jpg', 2, 1),
(18, 'teutschenhal.jpg', 2, 1),
(19, 'maggiora.jpg', 2, 1),
(20, 'saintjean.jpg', 2, 1),
(21, 'ukmaterley.jpg', 2, 1),
(22, 'spaintalavera.jpg', 2, 1),
(23, 'valkenswaardNETHERLANDS.jpg', 2, 1),
(24, 'bulgariosevlievo.jpg', 2, 1),
(25, 'trentinoARCODITRENTO.jpg', 2, 1),
(26, 'brazilBETOCARRERO.jpg', 2, 1),
(27, 'thailandsiracha.jpg', 2, 1),
(28, 'qatarlosail.jpg', 2, 1),
(29, 'home_img7.jpg', 3, 1),
(30, 'team_img5.jpg', 3, 1),
(31, 'team_img6.jpg', 3, 1),
(32, 'belray.png', 4, 1),
(33, 'de-wilg.png', 4, 1),
(34, 'engelnew.png', 4, 1),
(35, 'fmf.png', 4, 1),
(36, 'goldentyre.png', 4, 1),
(37, 'jumbo.png', 4, 1),
(38, 'lemmens.png', 4, 1),
(39, 'lobo.png', 4, 1),
(40, 'nimetaal.png', 4, 1),
(41, 'pankl.png', 4, 1),
(42, 'progripnew.png', 4, 1),
(43, 'redbull.png', 4, 1),
(44, 'renthal.png', 4, 1),
(45, 'sidi.png', 4, 1),
(46, 'suomy.png', 4, 1),
(47, 'teng.png', 4, 1),
(48, 'wings-life.png', 4, 1),
(49, 'wpnew.png', 4, 1),
(50, 'husqvarna.png', 4, 1),
(51, 'nestaan.png', 4, 1),
(52, 'wilvo.png', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `Price` double NOT NULL,
  `DiscountPrice` double DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `Size` varchar(4) NOT NULL,
  `photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_photos1_idx` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `Price`, `DiscountPrice`, `description`, `Size`, `photo_id`) VALUES
(1, 'New Era - Red Bull Cap', 29.95, 14.95, 'Een hele mooie goed', 'none', 29),
(2, 'Race Shirt - Red Bull', 29.95, 14.95, 'WOW MUCH SHIRT', 'none', 30),
(3, 'New Era - Red Bull Cap', 29.95, 14.95, 'Red bull geeft je vleugels', 'none', 31);

-- --------------------------------------------------------

--
-- Table structure for table `racers`
--

CREATE TABLE IF NOT EXISTS `racers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `RacerNumber` int(11) NOT NULL,
  `Biography` text NOT NULL,
  `DateOfBirth` date NOT NULL,
  `PlaceOfBirth` varchar(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Residence` varchar(100) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Hardware` varchar(150) NOT NULL,
  `WorldCupStanding` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `racers`
--

INSERT INTO `racers` (`id`, `Name`, `RacerNumber`, `Biography`, `DateOfBirth`, `PlaceOfBirth`, `Nationality`, `Residence`, `Height`, `Weight`, `Hardware`, `WorldCupStanding`) VALUES
(1, 'Aleksandr Tonkov', 59, 'ik ben racer 1', '2014-01-01', 'Zwolle', 'Nederlandse', 'Zwolle', 186, 85, 'Brommer', 4),
(2, 'Romain Febvre', 461, 'ik ben racer 2', '2014-01-01', 'Utrecht', 'Nederlandse', 'Utrecht', 182, 80, 'Fiets', 12);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `racer_id` int(11) NOT NULL,
  `R1` int(11) DEFAULT NULL,
  `R2` int(11) DEFAULT NULL,
  `GP` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Result_Event_idx` (`event_id`),
  KEY `fk_Result_Racer1_idx` (`racer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `event_id`, `racer_id`, `R1`, `R2`, `GP`, `year`) VALUES
(1, 1, 1, 6, 5, 5, 2014),
(2, 1, 2, 5, 4, 3, 2014),
(3, 2, 1, 7, 8, 9, 2014),
(4, 2, 2, 9, 3, 5, 2014),
(5, 3, 1, 6, 7, 8, 2014),
(6, 3, 2, 3, 11, 7, 2014),
(7, 4, 1, 14, 8, 10, 2014),
(8, 4, 2, 7, 5, 5, 2014),
(9, 5, 1, 10, 9, 9, 2014),
(10, 5, 2, 5, 5, 5, 2014),
(11, 6, 1, 5, 8, 7, 2014),
(12, 6, 2, 3, 3, 2, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `URL` varchar(200) NOT NULL,
  `wide_image` int(11) DEFAULT NULL,
  `box_image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sponsors_photos1_idx` (`wide_image`),
  KEY `fk_sponsors_photos2_idx` (`box_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `Name`, `Image`, `URL`, `wide_image`, `box_image`) VALUES
(1, 'Wilvo', 'S_logo1.png', 'http://www.wilvo.nl', 52, NULL),
(2, 'Nestaan', 'S_logo2.png', 'http://www.nestaan.nl', 51, NULL),
(3, 'Husqvarna', 'S_logo3.png', 'http://www.husqvarna.com', 50, NULL),
(4, 'Red Bull', 'S_logo4.png', 'http://www.redbull.com', NULL, 43),
(5, 'Jumbo', 'S_logo5.png', 'http://www.jumbosupermarkten.nl', NULL, 37),
(6, 'Bel Ray', 'S_logo6.png', 'http://www.belray.com/', NULL, 32),
(7, 'Segafredo', 'S_logo7.png', 'http://www.segafredo.nl/', NULL, NULL),
(8, 'Suomy', 'S_logo8.png', 'http://www.suomy.com/', NULL, 46),
(9, 'FMF', NULL, 'http://www.fmfracing.com/', NULL, 35),
(10, 'Pankl', NULL, 'http://www.pankl.com/', NULL, 41),
(11, 'WP Racing', NULL, 'http://www.wp-group.com/home/', NULL, 49),
(12, 'GoldenTyre', NULL, 'http://www.goldentyre.com/', NULL, 36),
(13, 'Lemmens Metaalbewerking', NULL, 'http://www.lemmensmetaalbewerking.nl/', NULL, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_tags_Articles1_idx` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `article_id`, `value`) VALUES
(1, 1, 'romain febvre'),
(2, 1, 'aleksandr tonkov'),
(3, 1, 'losail'),
(4, 2, 'romain febvre'),
(5, 2, 'si racha'),
(6, 3, 'emmen'),
(7, 4, 'mill'),
(8, 5, 'aleksandr tonkov'),
(9, 5, 'beto carrero'),
(10, 6, 'romain febvre'),
(11, 6, 'arco di trento'),
(12, 7, 'sevlievo'),
(13, 7, 'romain febvre'),
(14, 8, 'glenn coldenhoff'),
(15, 9, 'valkenswaard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'jirn11', '29480a2cb40cee5d0616ae74b323c1d6f74491a1', 'admin', '2014-05-08 00:00:00', NULL),
(2, 'dummy3', '0ec1dc8a7d43c63089309182d0c02508547ae020', 'author', '2014-06-16 14:40:19', '2014-06-16 14:40:19');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_albums_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_Article_Editor1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Articles_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_Events_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_Events_sponsors1` FOREIGN KEY (`main_sponsor`) REFERENCES `sponsors` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_Events_sponsors2` FOREIGN KEY (`sponsor1`) REFERENCES `sponsors` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_Events_sponsors3` FOREIGN KEY (`sponsor2`) REFERENCES `sponsors` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_photos_albums1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_photos_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_photos1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_Result_Event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Result_Racer1` FOREIGN KEY (`racer_id`) REFERENCES `racers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `fk_sponsors_photos1` FOREIGN KEY (`wide_image`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_sponsors_photos2` FOREIGN KEY (`box_image`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_article_tags_Articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
