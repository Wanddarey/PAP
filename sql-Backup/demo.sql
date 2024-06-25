-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jun 2024 um 20:34
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
-- Datenbank: `demo`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE `books` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `description` varchar(600) NOT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `ageRestricted` tinyint(1) NOT NULL,
  `timeStamp` int(19) NOT NULL,
  `dOP` date NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `dateTime` int(19) NOT NULL
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
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE `sessions` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `sessionKey` varchar(64) NOT NULL,
  `expirationDateTime` datetime NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `Id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`Id`, `status`) VALUES
(1, 'default'),
(2, 'banned'),
(3, 'deleted');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `pfp` varchar(200) DEFAULT NULL,
  `birthDate` date NOT NULL,
  `timeStamp` int(19) NOT NULL,
  `statusId` int(11) NOT NULL DEFAULT 1,
  `role` int(1) NOT NULL DEFAULT 1 COMMENT '0 - admin\r\n1 - user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`Id`, `userName`, `password`, `pfp`, `birthDate`, `timeStamp`, `statusId`, `role`) VALUES
(5, 'Admin', '708f49a881dc13c663be283e10405351c305c1beb0d15b6e2942aa3adaea483105828a557a583cc4e00b544e19ea231089d0df5775626174dd72585dc81b2359', NULL, '2024-06-24', 1719232353, 1, 0);

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
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `reports`
--
ALTER TABLE `reports`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
