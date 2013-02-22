-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 22 feb 2013 om 22:23
-- Serverversie: 5.5.29
-- PHP-versie: 5.3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `deves_exchange`
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
-- Tabelstructuur voor tabel `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `config`
--

INSERT INTO `config` (`id`, `about`) VALUES
(1, 'About tekst');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `points`
--

INSERT INTO `points` (`id`, `longitude`, `latitude`, `information`) VALUES
(0, '5.311006', '51.230419', 'Lommel');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `anaam`, `vnaam`, `email`, `password`, `is_active`) VALUES
(19, 'Van Eepoel', 'Stef', 'svaneepoel@gmail.com', '4297f44b13955235245b2497399d7a93', 2),
(20, 'Laermans', 'Lucas', 'lucaslaermans@gmail.com', '4297f44b13955235245b2497399d7a93', 1),
(21, 'Dries', 'Mitch', 'mitch.dries@gmail.com', '4297f44b13955235245b2497399d7a93', 0),
(22, 'Claes', 'Yannick', 'claesyannick@gmail.com', 'd24fd3ec8518e6e43edab9f07dbb7182', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `picture`, `hobbies`, `education`, `birth_date`, `facebook`, `twitter`) VALUES
(5, 19, '', 'No hobbies entered yet', 'No education information added yet', NULL, '', ''),
(6, 20, '', 'No hobbies entered yet', 'No education information added yet', NULL, '', ''),
(7, 21, '', 'No hobbies entered yet', 'No education information added yet', NULL, '', ''),
(8, 22, '', 'No hobbies entered yet', 'No education information added yet', NULL, '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_internships`
--

CREATE TABLE IF NOT EXISTS `user_internships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `company_name` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT '',
  `latitude` double DEFAULT '0',
  `longitude` double DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `user_internships`
--

INSERT INTO `user_internships` (`id`, `user_id`, `company_name`, `location`, `latitude`, `longitude`, `description`) VALUES
(5, 19, '', '', 0, 0, NULL),
(6, 20, 'Deves', 'Norbert Neeckxlaan 70, Lommel, België', 5.328056999999944, 51.2256025, 'Deves Webshop'),
(7, 21, '', '', 0, 0, NULL),
(8, 22, '', '', 0, 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
