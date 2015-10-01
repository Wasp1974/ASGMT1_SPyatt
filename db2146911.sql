-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Mai 2015 um 19:52
-- Server Version: 5.5.32
-- PHP-Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db2146911`
--
/*CREATE DATABASE IF NOT EXISTS `db2146911` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db2146911`;*/

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponisten`
--

CREATE TABLE IF NOT EXISTS `komponisten` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Komponist` varchar(50) NOT NULL,
  `Bild` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `komponisten`
--

INSERT INTO `komponisten` (`id`, `Komponist`, `Bild`) VALUES
(1, 'Wolfgang A. Mozart', 'img/Mozart.jpg'),
(2, 'Gustav Mahler', 'img/Mahler.jpg'),
(3, 'Johannes Brahms', 'img/Brahms.jpg'),
(4, 'Jean Sibelius', 'img/Sibelius.jpg'),
(5, 'Richard Wagner', 'img/Wagner.jpg'),
(6, 'Joseph Haydn', 'img/Haydn.jpg'),
(7, 'Johann Sebastian Bach', 'img/Bach.jpg'),
(8, 'Frederic Chopin', 'img/Chopin.jpg'),
(9, 'Pjotr Tschaikowsky', 'img/tschaikowsky.jpg'),
(10, 'Antonio Vivaldi', 'img/vivaldi.jpg'),
(11, 'Edvard Grieg', 'img/Grieg.jpg'),
(13, 'Dmitri Shostakowitsch', 'img/shostakovich.jpg'),
(14, 'Franz Schubert', 'img/Schubert.jpg'),
(15, 'Franz Liszt', 'img/Liszt.jpg'),
(16, 'Claude Debussy', 'img/Debussy.jpg'),
(17, 'Robert Schumann', 'img/Schumann.jpg'),
(18, 'Bedrich Smetana', 'img/Smetana.jpg'),
(19, 'Maurice Ravel', 'img/Ravel.jpg'),
(20, 'Georg Friedrich Händel', 'img/Händel.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nationalhymnen`
--

CREATE TABLE IF NOT EXISTS `nationalhymnen` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `Nationalhymne` varchar(50) NOT NULL,
  `Staaten_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `nationalhymnen`
--

INSERT INTO `nationalhymnen` (`id`, `Nationalhymne`, `Staaten_id`) VALUES
(1, '../Memory/audio/USA.mp3', 1),
(2, '../Memory/audio/Russia.mp3', 2),
(3, '../Memory/audio/Switzerland.mp3', 3),
(4, '../Memory/audio/Sweden.mp3', 4),
(5, '../Memory/audio/Italy.mp3', 5),
(6, '../Memory/audio/Spain.mp3', 6),
(7, '../Memory/audio/France.mp3', 7),
(8, '../Memory/audio/China.mp3', 8),
(9, '../Memory/audio/India.mp3', 9),
(10, '../Memory/audio/Brazil.mp3', 10),
(11, '../Memory/audio/Netherlands.mp3', 11),
(12, '../Memory/audio/Belgium.mp3', 12),
(13, '../Memory/audio/Portugal.mp3', 13),
(14, '../Memory/audio/Poland.mp3', 14),
(15, '../Memory/audio/Norway.mp3', 15),
(16, '../Memory/audio/Denmark.mp3', 16),
(17, '../Memory/audio/Germany.mp3', 17),
(18, '../Memory/audio/Greece.mp3', 18),
(19, '../Memory/audio/Australia.mp3', 19),
(20, '../Memory/audio/Canada.mp3', 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `composer_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Daten für Tabelle `questions`
--

INSERT INTO `questions` (`id`, `question`, `composer_id`) VALUES
(1, 'Wirkte als Konzertmeister in Salzburg', 1),
(2, 'Seine Kompositionen sind im Koechelverzeichnis geordnet.', 1),
(3, 'Stirbt 1911 in Wien.', 2),
(4, 'Konvertierte vom Judentum zum Katholizismus.', 2),
(5, 'in Hamburg geboren', 3),
(6, 'Komponierte "Ein deutsches Requiem"', 3),
(7, 'bedeutender finnischer Komponist', 4),
(8, 'komponierte "Finlandia"', 4),
(9, 'In Bayreuth finden gleichnamige Festspiele statt.', 5),
(10, 'gebuertiger Leipziger', 5),
(11, 'war ein Lehrer Beethovens', 6),
(12, 'Komponierte die Melodie der deutschen Nationalhymne', 6),
(13, 'deutscher Barockmusiker, dessen Werk im 19.Jahrhundert eine Renaissance erlebte', 7),
(14, 'in Eisenach geboren', 7),
(15, 'lebte kurzzeitig auf Mallorca', 8),
(16, 'in Polen geboren', 8),
(17, 'Komponierte die Melodie zu Schwanensee', 9),
(18, 'verstarb in St. Petersburg', 9),
(19, 'komponierte die "Vier Jahreszeiten"', 10),
(20, 'war in jungen Jahren Priester', 10),
(21, 'norwegischer Komponist', 11),
(22, 'komponierte Peer Gynt', 11),
(23, 'komponierte die ''Leningrader Sinfonie''', 13),
(24, 'schrieb während der Belagerung Leningrads die "7. Sinfonie"', 13),
(25, 'komponierte das Kunstlied "Die Forelle"', 14),
(26, 'hatte 15 Geschwister', 14),
(27, 'mit Richard Wagner befreundet', 15),
(28, 'sein Grab befindet sich in Bayreuth', 15),
(29, 'verstarb 1918 in Paris', 16),
(30, 'komponierte das Klavierstück "Traeumerei"', 17),
(31, 'komponierte die "Moldau"', 18),
(32, 'sein Nachname heißt auf deutsch "Schlagsahne"', 18),
(34, 'komponierte "Boléro"', 19),
(35, 'komponierte die "Wassermusik"', 20),
(36, 'in Halle geboren', 20),
(37, 'komponierte die "Nocturnes"', 16),
(38, 'liegt in Bonn begraben', 17),
(40, 'Landsmann und Zeitgenosse von Claude Débussy', 19);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `staaten`
--

CREATE TABLE IF NOT EXISTS `staaten` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `Staat` varchar(30) NOT NULL,
  `Flagge` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `staaten`
--

INSERT INTO `staaten` (`id`, `Staat`, `Flagge`) VALUES
(1, 'USA', '../Memory/img/USA.png'),
(2, 'Russland', '../Memory/img/Russland.png'),
(3, 'Schweiz', '../Memory/img/Schweiz.png'),
(4, 'Schweden', '../Memory/img/Schweden.png'),
(5, 'Italien', '../Memory/img/Italien.png'),
(6, 'Spanien', '../Memory/img/Spanien.png'),
(7, 'Frankreich', '../Memory/img/Frankreich.png'),
(8, 'China', '../Memory/img/China.png'),
(9, 'Indien', '../Memory/img/Indien.png'),
(10, 'Brasilien', '../Memory/img/Brasilien.png'),
(11, 'Niederlande', '../Memory/img/Niederlande.png'),
(12, 'Belgien', '../Memory/img/Belgien.png'),
(13, 'Portugal', '../Memory/img/Portugal.png'),
(14, 'Polen', '../Memory/img/Polen.png'),
(15, 'Norwegen', '../Memory/img/Norwegen.png'),
(16, 'Dänemark', '../Memory/img/Dänemark.png'),
(17, 'Deutschland', '../Memory/img/Deutschland.png'),
(18, 'Griechenland', '../Memory/img/Griechenland.png'),
(19, 'Australien', '../Memory/img/Australien.png'),
(20, 'Kanada', '../Memory/img/Kanada.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
