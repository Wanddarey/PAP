-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Jun 2024 um 15:01
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
-- Datenbank: `demopapdb`
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
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `dOP` date NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`Id`, `UId`, `title`, `author`, `description`, `cover`, `ageRestricted`, `dateTime`, `dOP`, `statusId`) VALUES
(62, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(63, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(64, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(65, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(66, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(67, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(68, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(69, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(70, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(71, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(72, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(73, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(74, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(75, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(76, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(77, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(78, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(79, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(80, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(81, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(82, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(83, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(84, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(85, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(86, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(87, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(88, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(89, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(90, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(91, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(92, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(93, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(94, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(95, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(96, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(97, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(98, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(99, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(100, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(101, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(102, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(103, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(104, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(105, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(106, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(107, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(108, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(109, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(110, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(111, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(112, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(113, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(114, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(115, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(116, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(117, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(118, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(119, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(120, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(121, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(122, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(123, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(124, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1),
(125, 0, 'lorem ipsum', 'lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ', NULL, 0, '2024-03-05 11:03:07', '2024-03-05', 1);

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
(1, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(2, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(3, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(4, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(5, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(6, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(7, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1),
(8, 8, 'industrial-society-and-its-future', '2024-01-24 08:19:55', 1, 1);

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
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`Id`, `userName`, `password`, `pfp`, `birthDate`, `dateTime`, `statusId`) VALUES
(1, 'Test Uza', 'password', NULL, '1871-03-04', '2024-02-20 11:39:30', 1),
(2, 'test', 'pass', NULL, '2004-02-01', '2024-02-20 16:42:51', 1);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
