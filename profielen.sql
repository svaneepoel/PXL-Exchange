-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 22 feb 2013 om 10:47
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
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anaam` varchar(50) NOT NULL,
  `vnaam` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `anaam`, `vnaam`, `email`, `password`, `is_active`) VALUES
(1, 'Laermans', 'Lucas', 'lucaslaermans@msn.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1),
(8, 'Laermans', 'Joske', 'joslaermans@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1),
(9, 'Van Eepoel', 'Stef', 'stefve@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1),
(10, 'MitchFridge', 'Dries', 'frigo@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1),
(18, 'Test', 'Mitch', 'mitch.dries@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1),
(19, 'Tirol', 'Heide', 'heidiintirol@hotmail.com', '39c94dccfe8f20c6536f4747515862b4', 1),
(20, 'Deman', 'Jan', 'jandeman@hotmail.com', '66ef7b99b2d552e0aa071b50e6af9b22', 1),
(21, 'De Hark', 'Marc', 'marcske@harken.be', '05305cf99539bf875c50003bf6c17eb9', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
