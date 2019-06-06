-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time:  6 юни 2019 в 14:06
-- Версия на сървъра: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steral`
--
CREATE DATABASE IF NOT EXISTS `steral` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `steral`;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `loged_in` tinyint(1) NOT NULL,
  `time_of_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `loged_in`, `time_of_login`) VALUES
(1, 'rali', 'rali@mail.com', '$2y$10$Q.LnDCiuaF3ai6zuDDELU.j15YIiX2q6KPqsKrBTnVEictGvJ3TBK', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
DELIMITER $$
--
-- Събития
--
CREATE DEFINER=`root`@`localhost` EVENT `test_event_02` ON SCHEDULE AT '2019-06-06 10:23:50' ON COMPLETION PRESERVE DISABLE DO UPDATE users SET loged_in = 1 WHERE id = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `test_event_01` ON SCHEDULE AT '2019-06-06 10:18:42' ON COMPLETION PRESERVE DISABLE DO UPDATE users SET loged_in = 1 WHERE id = 1$$

DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
