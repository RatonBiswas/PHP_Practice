-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 11:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_fair`
--

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_des` varchar(255) NOT NULL,
  `project_lang` varchar(255) NOT NULL,
  `is_approved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `student_id`, `project_title`, `project_des`, `project_lang`, `is_approved`) VALUES
(1, 'diu', 'diu ict division', 'ki komu vai kichui buji na', 'js,css,php', 'Accepted'),
(2, '173-25-2250', 'Covid-19', 'Show information of confirmed people.', 'PHP,CSS,JS,HTML', 'Accepted'),
(3, '173-35-2241', 'Covid-19', 'ABCD', 'node js', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_des` varchar(255) NOT NULL,
  `project_lang` varchar(255) NOT NULL,
  `is_approved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `student_name`, `student_id`, `project_title`, `project_des`, `project_lang`, `is_approved`) VALUES
(1, 'Raton chandra Biswas', 'diu', 'diu ict division', 'ki komu vai kichui buji na', 'js,css,php', 'Accepted'),
(2, 'Emon Aurko', '173-25-2250', 'Covid-19', 'Show information of confirmed people.', 'PHP,CSS,JS,HTML', 'Accepted'),
(3, 'Raton Biswas', '173-35-2241', 'Covid-19', 'ABCD', 'node js', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ins_Id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `ins_Id`, `email`, `password`, `type`) VALUES
(3, 'Raton Chandra Biswas', '123', 'management@gmail.com', 'd10af457daa1deed54e2c36b5f295e7e', 'management'),
(4, 'lakshman Gope', '173-35-2256', 'lakshman35-2256@diu.edu.bd', '601d30a958e6604df910330239ce7fcf', 'student'),
(5, 'Liton Das', '173-35-2231', 'liton@diu.edu.bd', '43b1df143ffd189af1c44dc1e809a0e2', 'student'),
(8, 'Emon Aurko', '173-25-2250', 'emon@diu.edu.bd', 'b8cc4edba5145d41f9da01d85f459aef', 'student'),
(9, 'Raton Biswas', '173-35-2241', 'raton@diu.edu.bd', '7a2c8a31c1ee7868a14f435fefcb3381', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
