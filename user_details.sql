-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 22 feb 2013 om 10:49
-- Serverversie: 5.5.24-log
-- PHP-versie: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `users`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `picture` varchar(255) DEFAULT '',
  `hobbies` varchar(255) DEFAULT 'No hobbies entered yet',
  `education` varchar(255) DEFAULT 'No education information added yet',
  `birth_date` datetime DEFAULT NULL,
  `facebook` varchar(255) DEFAULT '',
  `twitter` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `picture`, `hobbies`, `education`, `birth_date`, `facebook`, `twitter`) VALUES
(1, 1, 'http://the4travelers.punt.nl/_files/2006-08-19/aap.jpg', 'lalala', 'niks', '1990-01-01 00:00:00', '', 'tweet'),
(4, 18, '', 'No hobbies entered yet', 'No education information added yet', NULL, '', ''),
(5, 19, 'd002fdd8dc09f54f483329c2d65c0996.jpg', 'No hobbies entered yet', 'No education information added yet', NULL, '', ''),
(6, 20, 'd7bde0f06ab3a38f7023e930e48c1e20.jpg', 'No hobbies entered yet', 'No education information added yet', NULL, '', ''),
(7, 21, 'fbe3953118079e12c8b2253b6b0791ec.jpg', 'No hobbies entered yet', 'No education information added yet', NULL, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
