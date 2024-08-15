-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 11:53 AM
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
-- Database: `zipupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(200) NOT NULL,
  `by_user_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `date_n_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `unique_id`, `by_user_id`, `file_name`, `downloads`, `views`, `date_n_time`) VALUES
(21, '34VWRbkIY', 1, 'Zipupload_34VWRbkIY.zip', 6, 21, '2024-08-12 21:38:28'),
(22, 'M2irzwW3p', 1, 'Zipupload_M2irzwW3p.zip', 13, 47, '2024-08-12 21:38:31'),
(23, 'G5BVTSca9', 1, 'Zipupload_G5BVTSca9.zip', 6, 25, '2024-08-12 21:38:34'),
(24, 'bZHpQNXgi', 1, 'Zipupload_bZHpQNXgi.zip', 4, 33, '2024-08-12 21:38:38'),
(25, 'AkLiyGOSV', 1, 'Zipupload_AkLiyGOSV.zip', 9, 36, '2024-08-12 21:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Aaron', 'aaronicmatter@gmail.com', '$2y$10$fK5GRo7B6XQxMTWOvkSbAO6A4nAZzLgDzEO5X6WYUUjyRsgr6jzJq'),
(2, 'John Doe', 'johndoe@gmail.com', '$2y$10$RpM.goGlqAG1E/O/LOu10.MkEf4GTReiL31Gcq4GuEXeLic4Qs/hG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
