-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 07:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_so`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `referenceId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`) VALUES
(1, 'Python Programming'),
(2, 'Principles of Security'),
(3, 'Principle of Software Engineering'),
(4, 'Networking'),
(5, 'Web Programming 1');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL,
  `likes` int(11) DEFAULT 0,
  `moduleId` int(11) NOT NULL,
  `picture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `studentId`, `title`, `createdAt`, `updatedAt`, `content`, `likes`, `moduleId`, `picture`) VALUES
(1, 1, 'Getting Started with HTML – What are the basic tags?', '2025-04-27 14:55:36', '2025-04-27 14:55:36', 'I just started learning Web Programming 1 and HTML seems fun. Besides <p> and <h1>, what are some other basic tags I should learn first?', 0, 5, 0x313734353734303533365f4f49502e6a7067),
(2, 1, 'What is a strong password?', '2025-04-27 14:56:13', '2025-04-27 14:56:13', 'In my Principles of Security class, the teacher talked about strong passwords. But I don’t really understand what makes a password \"strong\". Can someone explain?', 0, 2, 0x313734353734303537335f506f535f5f315f2e6a7067),
(3, 1, 'How to start working in a software project group?', '2025-04-27 14:56:32', '2025-04-27 14:56:32', 'We have a group project in our Software Engineering class. Does anyone have experience? What’s the first thing we should do to keep it organized?', 0, 3, 0x313734353734303539325f504f53455f2e6a7067),
(4, 1, 'How to print “Hello World” in Python?', '2025-04-27 14:56:58', '2025-04-27 14:56:58', 'I just started learning Python and don’t know much yet. Can someone show me how to write a simple “Hello World” in Python?', 0, 1, 0x313734353734303631385f70792e6a7067),
(5, 1, 'What is an IP Address?', '2025-04-27 14:57:32', '2025-04-27 14:57:32', 'We’re learning about IP addresses in Networking, but I’m still confused. Can anyone explain it in a simple way?', 0, 4, 0x313734353734303635325f49502e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `studentId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` text NOT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `parentId`, `studentId`, `postId`, `createdAt`, `updatedAt`, `content`, `likes`) VALUES
(1, NULL, 2, 1, '2025-04-27 14:59:47', '2025-04-27 14:59:47', 'You should check out <a>, <div>, and <img>. Those are used a lot!', 0),
(2, NULL, 2, 1, '2025-04-27 14:59:53', '2025-04-27 14:59:53', 'Try making a personal introduction webpage. It’s a great way to practice.', 0),
(3, NULL, 2, 2, '2025-04-27 15:00:06', '2025-04-27 15:00:06', 'What is a strong password?', 0),
(4, NULL, 2, 2, '2025-04-27 15:00:15', '2025-04-27 15:00:15', 'A strong password should have uppercase, lowercase letters, numbers, and special characters.', 0),
(5, NULL, 2, 2, '2025-04-27 15:00:20', '2025-04-27 15:00:20', 'And don’t use easy ones like \"123456\" or \"password\". Those are super weak.', 0),
(6, NULL, 2, 3, '2025-04-27 15:00:30', '2025-04-27 15:00:30', 'My group usually makes a plan and divides tasks clearly. That helps avoid confusion.', 0),
(7, NULL, 2, 3, '2025-04-27 15:00:35', '2025-04-27 15:00:35', 'You can try using Trello or Google Docs so everyone can follow the progress easily.', 0),
(8, NULL, 2, 4, '2025-04-27 15:00:51', '2025-04-27 15:00:51', 'Just write print(\"Hello World\") and run your .py file. That’s it!', 0),
(9, NULL, 2, 4, '2025-04-27 15:00:56', '2025-04-27 15:00:56', 'Python is really beginner-friendly. Take it step by step and you’ll be fine!', 0),
(10, NULL, 2, 5, '2025-04-27 15:01:07', '2025-04-27 15:01:07', 'An IP address is like a home address. It helps computers find each other on the network.', 0),
(11, NULL, 2, 5, '2025-04-27 15:01:13', '2025-04-27 15:01:13', 'There are two main types: IPv4 and IPv6. Start with IPv4—it’s easier to understand.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adminId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `full_name`, `avatar`, `class`, `role`) VALUES
(1, 'annvgcs230205@fpt.edu.vn', '$2y$10$n4mrir5UU6VHrkS14yISYOWYXgIaaGuuwNqXM1B5BUIjGmYhQ.M2y', 'Admin', '', 'admin', 1),
(2, 'viannguyen119@gmail.com', '$2y$10$L6fNmJ/sT6RYeWVFjkRk6OstacdOnuhQXYnukSBDq6lqbKGxvou/q', 'Nguyen Vi An', '', 'COS1203', 2),
(3, 'vian.mt9000@gmail.com', '$2y$10$KQqkTm6Uw1wpAcsjcb5PbuN1PEZRFcM/8szEUi2pw6ojwzDNouThu', 'An Nguyen', '', 'COS1203', 2),
(4, 'an.alexander0169@gmail.com', '$2y$10$bmUIIMSPAztNzfS/hkDWE.szUk.koyg1wzoosh1WY3FK4qFVhUIn.', 'Nguyen An', '', 'COS1203', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessionId` (`sessionId`),
  ADD KEY `senderId` (`senderId`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `moduleId` (`moduleId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`parentId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sessionId`) REFERENCES `session` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`senderId`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`moduleId`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `question` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`postId`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
