-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2014 at 02:13 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EditorID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Message` text NOT NULL,
  `CreateDate` datetime NOT NULL,
  `LastUpdatedDate` datetime DEFAULT NULL,
  `Photo` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Article_Editor1_idx` (`EditorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `EditorID`, `Title`, `Message`, `CreateDate`, `LastUpdatedDate`, `Photo`) VALUES
(2, 1, 'Aleksandr Tonkov finishes sixth in the MX des Nations', 'Aleksandr Tonkov of the Wilvo Nestaan JM Racing KTM Team finished sixth in the MX des Nations in...', '2014-04-15 11:47:00', '2014-04-15 11:53:00', '/images/home_img1.jpg'),
(3, 1, 'Romain Febvre scores top three moto finish in Brazil', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish...', '2014-04-15 11:55:00', NULL, '/images/home_img2.jpg'),
(4, 1, 'Romain Febvre scores top three moto finish in Brazil', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing has scored a top three moto finish...', '2014-04-15 11:58:00', NULL, '/images/home_img5.jpg'),
(5, 1, 'Aleksandr Tonkov finishes sixth in the MX des Nations', 'Aleksandr Tonkov of the Wilvo Nestaan JM Racing KTM Team finished sixth in the MX des Nations in...', '2014-04-15 11:59:00', NULL, '/images/home_img6.jpg'),
(6, 1, 'Romain Febvre in the top five in GP of Italy', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing finished inside of the top five at round four of the World MX2 Series in Arco di Trento, Italy. The young Frenchman finished seventh in the first moto and came home in fifth position in the second moto which gave him fifth place overall. Aleksandr Tonkov had to start from the outside in the first moto due to some bad luck in the qualifying heat. He had a good jump out of the gate but disaster struck the young Russian when he made a crash in the beginning of the race. Due to this he dropped back to the back of the pack. Aleksandr tried to make the best of it and charged all the way back to fourteenth position. In the second moto things were going better for him as he finished in seventh position, which gave him tenth position overall.', '2014-04-15 12:23:00', NULL, 'images/home_img9.jpg'),
(7, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Mill', 'Wilvo Nestaan Husqvarna Factory Racing has scored two podium positions in the second round of the Dutch Open Championship Series in Mill. Aleksandr Tonkov and Romain Febvre had a nice battle for second position in both motos. In the first and the second moto it was Romain who crossed the finish line in second position in front of his team mate Aleksandr.', '2014-04-15 13:12:00', NULL, '/images/home_img10.jpg'),
(8, 1, 'Febvre and Tonkov on the podium in the Dutch Open in Emmen', 'Romain Febvre and Aleksandr Tonkov of Wilvo Nestaan Husqvarna Factory Racing have scored podium positions at the opening round of the Dutch Open MX2 Series in Emmercompascuum. After a fourth position in the first moto, Romain Febvre was fighting for the win in the second moto and finished the race in second position. With these results he finished in second position overall as well. Aleksandr Tonkov didnâ€™t felt comfortable on the track but gave everything he had and finished in third position in both motos.', '2014-04-15 13:15:00', NULL, '/images/home_img11.jpg'),
(9, 1, 'Romain Febvre scores top three moto finish in Thailand', 'Romain Febvre of Wilvo Nestaan Husqvarna Factory Racing managed to score a top three moto finish in the second round of the World MX2 Series in Si Racha, Thailand. The young Frenchman scored this result in the second moto. In the first moto he made a mistake in the beginning of the race but came back from twelfth to ninth position, which gave him fifth position overall. Aleksandr Tonkov was riding well in the extreme heat of Thailand. He finished in seventh and eight position in the motos and ended the day with ninth position overall.', '2014-03-15 13:16:00', NULL, '/images/home_img12.jpg'),
(10, 1, 'Wilvo Nestaan Husqvarna Factory Racing on the podium in Qatar', 'Wilvo Nestaan Husqvarna Factory Racing has started the World MX2 Series in Losail, Qatar with a podium position. Romain Febvre finished third overall just the same as he did last year and his team mate Aleksandr Tonkov ended the day with fifth position overall.', '2014-04-15 13:17:00', NULL, '/images/home_img13.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_Article_Editor1` FOREIGN KEY (`EditorID`) REFERENCES `editors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
