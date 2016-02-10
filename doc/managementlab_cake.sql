-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2016 alle 09:54
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `managementlab_cake`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `closed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dump dei dati per la tabella `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `startdate`, `enddate`, `closed`) VALUES
(1, 'Corso PHP', 'Corso PHP Individuale fatto a Torino', '2016-02-08', '2016-02-10', 0),
(2, 'Consulenza Iveco', 'Progetto di consulenza bellissmo', '2015-01-12', '2016-02-28', 0),
(3, 'Progetto Chiuso', '', '0000-00-00', '0000-00-00', 1),
(4, 'Progetto Nuovissimo', '', '2016-01-01', '2016-01-31', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `projects_users`
--

CREATE TABLE IF NOT EXISTS `projects_users` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `projects_users`
--

INSERT INTO `projects_users` (`project_id`, `user_id`) VALUES
(1, 2),
(1, 3),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `complete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dump dei dati per la tabella `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `deadline`, `project_id`, `user_id`, `task_id`, `complete`) VALUES
(1, 'Preprare Slide', '2015-08-03', 1, 2, 0, 1),
(2, 'Scegliere il template per le slide', '2015-08-03', 1, 1, 1, 0),
(3, 'Fare la Spesa', '2016-02-08', 4, 1, 0, 0),
(4, 'Testare un camion', '2036-01-01', 2, 3, 0, 0),
(5, 'Giocare', '0000-00-00', 0, 0, 0, 0),
(6, 'Giocare a carte', '0000-00-00', 0, 1, 0, 0),
(7, 'Comprare nuovo PC', '2016-02-09', 0, 0, 0, 0),
(8, 'Comprare nuovo PC', '2016-02-09', 1, 1, 1, 0),
(9, 'Mangiare la pizza', '0000-00-00', 0, 1, 0, 0),
(10, 'Dormire molto', '2036-01-01', 4, 1, 1, 0),
(11, 'Distruggere un camion', '2016-02-09', 2, 2, 0, 0),
(12, 'Task di prova', '0000-00-00', 0, 1, 0, 0),
(13, '', '0000-00-00', 0, 0, 0, 1),
(14, '', '0000-00-00', 0, 0, 0, 1),
(15, '', '0000-00-00', 0, 0, 0, 1),
(16, '', '0000-00-00', 0, 0, 0, 1),
(17, '', '0000-00-00', 0, 0, 0, 1),
(18, '', '0000-00-00', 0, 0, 0, 1),
(19, '', '0000-00-00', 0, 0, 0, 1),
(20, '', '0000-00-00', 0, 0, 0, 1),
(21, '', '0000-00-00', 0, 0, 0, 1),
(22, '', '0000-00-00', 0, 0, 0, 1),
(23, '', '0000-00-00', 0, 0, 0, 1),
(24, '', '0000-00-00', 0, 0, 0, 1),
(25, '', '0000-00-00', 0, 0, 0, 1),
(26, '', '0000-00-00', 0, 0, 0, 1),
(27, '', '0000-00-00', 0, 0, 0, 1),
(28, '', '0000-00-00', 0, 0, 0, 1),
(29, '', '0000-00-00', 0, 0, 0, 1),
(30, '', '0000-00-00', 0, 0, 0, 1),
(31, '', '0000-00-00', 0, 0, 0, 1),
(32, '', '0000-00-00', 0, 0, 0, 1),
(33, '', '0000-00-00', 0, 0, 0, 1),
(34, '', '0000-00-00', 0, 0, 0, 1),
(35, '', '0000-00-00', 0, 0, 0, 1),
(36, '', '0000-00-00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'massimoi', 'massimoi@nkoni.org', ''),
(2, 'giuseppe', 'giuseppe@giuseppe.com', ''),
(3, 'andrea', 'andrea@andrea.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
