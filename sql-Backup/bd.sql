-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 06:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pararel`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `timeStamp` int(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forumcomment`
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
-- Table structure for table `forumpost`
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
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `Id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`Id`, `language`, `short`) VALUES
(1, 'English', 'EN'),
(2, 'Portuguese', 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `pdffiles`
--

CREATE TABLE `pdffiles` (
  `Id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `fileName` varchar(200) NOT NULL,
  `timeStamp` int(19) NOT NULL,
  `langId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
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
-- Table structure for table `sessions`
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
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Id`, `status`) VALUES
(1, 'default'),
(2, 'banned'),
(3, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `pfp` varchar(200) DEFAULT NULL,
  `birthDate` date NOT NULL,
  `timeStamp` int(19) NOT NULL,
  `statusId` int(11) NOT NULL DEFAULT 1,
  `role` int(1) NOT NULL DEFAULT 1 COMMENT '0 - admin\r\n1 - user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `userName`, `password`, `description`, `pfp`, `birthDate`, `timeStamp`, `statusId`, `role`) VALUES
(5, 'Admin', '708f49a881dc13c663be283e10405351c305c1beb0d15b6e2942aa3adaea483105828a557a583cc4e00b544e19ea231089d0df5775626174dd72585dc81b2359', NULL, NULL, '2024-06-24', 1719232353, 1, 0),
(6, 'user', '5048776a429e82f1ac6fce15e6645b786378419f8f8f7433bdf3811254e397e7907f8b1c16e5442213a5c2d4b38e91d0babb2b41a38e70832e5c68b85084bc6d', NULL, NULL, '2024-07-01', 1719849609, 1, 1),
(7, 'user1', '59114710faba447c2a6f5c6f02c4e01f1046c2cec877b997f59e877ff9e98c061743f2b92eabf2f5018bd526218168e84ae7e1ac0e9013acca502e90cc65dddf', NULL, NULL, '2024-07-03', 1720024147, 1, 1),
(8, 'usernovo', '6703535944421c6f7f391b2545115b008ae7b57687da4200b52e49bb21dc6f007eb09a44e1ce356c56f2b26779546427fe1d4fbe27a6a0f191b45315d2a56146', NULL, NULL, '2024-07-08', 1720460729, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `forumcomment`
--
ALTER TABLE `forumcomment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `forumpost`
--
ALTER TABLE `forumpost`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pdffiles`
--
ALTER TABLE `pdffiles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forumcomment`
--
ALTER TABLE `forumcomment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forumpost`
--
ALTER TABLE `forumpost`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pdffiles`
--
ALTER TABLE `pdffiles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
