-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 feb 2013 om 17:41
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `anaam`, `vnaam`, `email`, `password`) VALUES
(7, 'Laermans', 'Lucas', 'lucaslaermans@msn.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(8, 'Laermans', 'Joske', 'joslaermans@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(9, 'Van Eepoel', 'Stef', 'stefve@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(10, 'MitchFridge', 'Dries', 'frigo@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(11, 'Mitch', 'Dries', 'mitchie@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(12, 'Janssen', 'Greta', 'bigboobs@hotmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(13, 'Raeymaekers', 'Josepha', 'schoenmaat36@Csharp.net', 'cc03e747a6afbbcbf8be7668acfebee5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
