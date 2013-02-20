-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 feb 2013 om 16:13
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
-- Tabelstructuur voor tabel `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `user_id`, `title`, `content`, `create_time`) VALUES
(1, 1, 'Webtech', 'Blablabla zever shit', '2013-02-19 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
  `vnaam` varchar(50) NOT NULL,
  `anaam` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `anaam`, `vnaam`, `email`, `password`) VALUES
(7, 'Laermans', 'Lucas', 'lucaslaermans@msn.com', 'cc03e747a6afbbcbf8be7668acfebee5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `picture`, `hobbies`, `education`, `birth_date`, `facebook`, `twitter`) VALUES
(1, 1, 'http://the4travelers.punt.nl/_files/2006-08-19/aap.jpg', 'lalala', 'niks', '1990-01-01 00:00:00', NULL, 'tweet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_internships`
--

CREATE TABLE IF NOT EXISTS `user_internships` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
