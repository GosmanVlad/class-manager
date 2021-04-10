-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 10, 2021 la 04:23 PM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `class-manager`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` int(11) NOT NULL DEFAULT 0,
  `group_letter` varchar(3) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `students`
--

INSERT INTO `students` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `year`, `group_letter`) VALUES
(9, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 1, 'A');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `approved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `admin`, `approved`) VALUES
(7, 'admin', 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@class-manager.com', 1, 1),
(8, 'da', 'sad', 'ads', '2deb000b57bfac9d72c14d4ed967b572', 'gosman.vlad95@yahoo.com', 0, 0),
(9, 'test2', 'test2', 'test2', 'ad0234829205b9033196ba818f7a872b', 'test2', 0, 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
