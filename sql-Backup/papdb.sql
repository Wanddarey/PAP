-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jan 2024 um 11:16
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `papdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE `books` (
  `Id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `ageRestricted` tinyint(1) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `dOP` date NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`Id`, `title`, `author`, `description`, `cover`, `ageRestricted`, `dateTime`, `dOP`, `statusId`) VALUES
(2, 'Lorem ipsum', 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-01-16 11:52:14', '2024-01-16', 1),
(3, 'Lorem ipsum', 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-01-16 11:52:14', '2024-01-16', 1),
(4, 'Lorem ipsum', 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-01-16 11:52:14', '2024-01-16', 1),
(5, 'Lorem ipsum', 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', 'kleeRaytheon.png', 0, '2024-01-16 11:52:14', '2024-01-16', 1),
(6, 'Lorem ipsum', 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-01-16 11:52:14', '2024-01-16', 1),
(7, 'not ipsum', 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-01-16 11:52:14', '2024-01-16', 1),
(8, 'patrick gay', 'chocrates', 'patrick encontrou o luis e beijaram-se', 'drakeBigLips.png', 1, '2024-01-23 16:40:13', '2024-01-23', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forumcomment`
--

CREATE TABLE `forumcomment` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forumpost`
--

CREATE TABLE `forumpost` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `language`
--

CREATE TABLE `language` (
  `Id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `language`
--

INSERT INTO `language` (`Id`, `language`, `short`) VALUES
(1, 'English', 'EN');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pdffiles`
--

CREATE TABLE `pdffiles` (
  `Id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `fileName` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `langId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `pdffiles`
--

INSERT INTO `pdffiles` (`Id`, `bookId`, `fileName`, `dateTime`, `langId`, `statusId`) VALUES
(1, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reports`
--

CREATE TABLE `reports` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `postType` varchar(20) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `Id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `pfp` varchar(200) DEFAULT NULL,
  `birthDate` date NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `forumcomment`
--
ALTER TABLE `forumcomment`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `forumpost`
--
ALTER TABLE `forumpost`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `pdffiles`
--
ALTER TABLE `pdffiles`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `forumcomment`
--
ALTER TABLE `forumcomment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `forumpost`
--
ALTER TABLE `forumpost`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `language`
--
ALTER TABLE `language`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `pdffiles`
--
ALTER TABLE `pdffiles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `reports`
--
ALTER TABLE `reports`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
