-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 30, 2021 la 11:39 AM
-- Versiune server: 10.4.18-MariaDB
-- Versiune PHP: 8.0.5

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
-- Structură tabel pentru tabel `allocations`
--

CREATE TABLE `allocations` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `allocations`
--

INSERT INTO `allocations` (`id`, `student_id`, `course_id`, `teacher_id`) VALUES
(17, 9, 2, 10);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_letter` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `applications`
--

INSERT INTO `applications` (`id`, `student_id`, `teacher_id`, `course_id`, `group_letter`) VALUES
(26, 9, 10, 3, 'A');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `assesments`
--

CREATE TABLE `assesments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL DEFAULT 0,
  `grade` int(11) NOT NULL,
  `observations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `credits` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `courses`
--

INSERT INTO `courses` (`id`, `name`, `year`, `credits`) VALUES
(2, 'Probabilitati si statistica', 1, 5),
(3, 'Programare orientata-obiect', 1, 5),
(4, 'Proiectarea algoritmilor', 1, 5),
(5, 'Fundamentele algebrice ale informaticii', 1, 5),
(6, 'Sisteme de operare', 1, 5),
(7, 'Limba engleza', 1, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `holders`
--

CREATE TABLE `holders` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `holders`
--

INSERT INTO `holders` (`id`, `teacher_id`, `course_id`) VALUES
(1, 10, 2),
(2, 10, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `presences`
--

CREATE TABLE `presences` (
  `id` int(11) NOT NULL,
  `presence_code_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `presence_codes`
--

CREATE TABLE `presence_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `group_letter` varchar(3) NOT NULL DEFAULT 'A',
  `scholarship` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `students`
--

INSERT INTO `students` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `year`, `group_letter`, `scholarship`) VALUES
(9, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 1, 'A', 0),
(10, 'test2', 'test2', 'test2', 'ad0234829205b9033196ba818f7a872b', 'test2', 1, 'A', 0);

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
  `approved` int(11) NOT NULL DEFAULT 0,
  `registration_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `admin`, `approved`, `registration_date`) VALUES
(10, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 1, '2021-05-28');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `assesments`
--
ALTER TABLE `assesments`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `holders`
--
ALTER TABLE `holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `presence_codes`
--
ALTER TABLE `presence_codes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pentru tabele `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pentru tabele `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `assesments`
--
ALTER TABLE `assesments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `holders`
--
ALTER TABLE `holders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `presence_codes`
--
ALTER TABLE `presence_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
