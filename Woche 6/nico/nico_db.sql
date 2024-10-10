-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Okt 2024 um 18:58
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `nico_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE `projekt` (
  `ID` int(11) NOT NULL,
  `projekturl` varchar(255) DEFAULT NULL,
  `projektname` varchar(100) DEFAULT NULL,
  `projektbeschreibung` text DEFAULT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`ID`, `projekturl`, `projektname`, `projektbeschreibung`, `user_ID`) VALUES
(1, 'Business-20.png', 'Business Template', 'Für Templatecreator.com', 1),
(2, 'Donerun-402x.jpg', 'Donerun', '...', 1),
(3, 'Magnetic-402x.jpg', 'Magnetic Project', '...', 0),
(4, 'Pompeo.jpg', 'Pompeo', '...', 0),
(5, 'biznus.jpg', 'Biz Webseite', '...', 1),
(6, 'eaef_Blurr-402x.jpg', 'Blurr App', '...', 1),
(7, 'incredible-402x.jpg', 'Incredible Project', '...', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `useremail` varchar(128) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `username`, `useremail`, `userpassword`) VALUES
(1, 'Nico Webdesigner', 'nico@gmail.com', '$2y$10$KwdiY7waTjje07HRGjS7nehObLoEaG9sqbv2MOUBBhJKS2zIPpDUO');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `projekt`
--
ALTER TABLE `projekt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
