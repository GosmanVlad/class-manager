-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 08, 2021 la 06:10 PM
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
(26, 13, 11, 26),
(27, 13, 12, 26),
(28, 13, 10, 23);

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
(34, 13, 26, 13, 'A'),
(35, 13, 26, 14, 'A'),
(36, 13, 26, 15, 'A');

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
  `observations` varchar(255) NOT NULL,
  `corrected` int(11) NOT NULL DEFAULT 0,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp(),
  `corrected_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `assesments`
--

INSERT INTO `assesments` (`id`, `student_id`, `course_id`, `file`, `file_name`, `teacher_id`, `grade`, `observations`, `corrected`, `sent_at`, `corrected_at`) VALUES
(17, 13, 10, 'public/files/dd35f5145ad1188104cda200dc074491class-manager (4).sql', 'class-manager (4).sql', 23, 10, 'Bravo!', 1, '2021-06-08 19:08:41', '2021-06-08 18:09:00'),
(18, 13, 10, 'public/files/53196249f484fbf3a58958778dcfa747class-manager (4).sql', 'class-manager (4).sql', 23, 0, '', 0, '2021-06-08 19:08:49', '2021-06-08 19:08:49');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `credits` int(11) NOT NULL DEFAULT 5,
  `max_grades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `courses`
--

INSERT INTO `courses` (`id`, `name`, `year`, `credits`, `max_grades`) VALUES
(10, 'Structuri de date', 1, 6, 4),
(11, 'Arhitectura calculatoarelor', 1, 5, 0),
(12, 'Logica pentru informatica', 1, 6, 0),
(13, 'Matematica', 1, 5, 0),
(14, 'Limba engleza 1', 1, 4, 0),
(15, 'Programare orientata-obiect', 1, 6, 0),
(16, 'Sisteme de operare', 1, 6, 0),
(17, 'Fundamente algebrice', 1, 5, 0),
(18, 'Probabilitati si statistica', 1, 5, 0),
(19, 'Proiectarea algoritmilor', 1, 5, 0),
(20, 'Retele de calculatoare', 2, 6, 0),
(21, 'Baze de date', 2, 6, 0),
(22, 'Limbaje formale, automate', 2, 5, 0),
(23, 'Algoritmica grafurilor', 2, 5, 0),
(24, 'Limba engleza II', 2, 6, 0),
(25, 'Tehnologii WEB', 2, 6, 0),
(26, 'Programare avansata', 2, 5, 0),
(27, 'Ingineria Programarii', 2, 6, 0),
(28, 'Practica SGBD', 2, 4, 0),
(29, 'Invatare automata', 3, 6, 0),
(30, 'Securitatea informatiei', 3, 5, 0),
(31, 'Inteligenta artificiala', 3, 6, 0),
(32, 'Python', 3, 4, 0),
(33, 'Introducere in .NET', 3, 4, 0),
(34, 'DSFUM', 3, 4, 0),
(35, 'Retele neuronale', 3, 6, 0),
(36, 'Calcul numeric', 3, 4, 0),
(37, 'Grafica pe calculator', 3, 4, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `course_id`, `grade`) VALUES
(22, 13, 10, 2),
(23, 13, 10, 3);

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
(3, 23, 10),
(4, 24, 10),
(5, 25, 11),
(6, 26, 10),
(7, 26, 11),
(8, 26, 12),
(9, 26, 13),
(10, 26, 14),
(11, 26, 15),
(12, 26, 17),
(13, 26, 18),
(14, 26, 19),
(15, 28, 20),
(16, 28, 21),
(17, 28, 22),
(18, 28, 23),
(19, 28, 24),
(20, 28, 25),
(21, 28, 26),
(22, 28, 27),
(23, 28, 26),
(24, 28, 28);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `presences`
--

CREATE TABLE `presences` (
  `id` int(11) NOT NULL,
  `presence_code_id` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `presence_codes`
--

CREATE TABLE `presence_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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
(13, 'GosmanVlad', 'Gosman', 'Vlad', '098f6bcd4621d373cade4e832627b4f6', 'gvlad@yahoo.com', 1, 'A', 0);

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
(10, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 1, '2021-05-28'),
(23, 'mraschip', 'Raschip', 'Madalina', '21232f297a57a5a743894a0e4a801fc3', 'mraschip', 0, 1, '2021-06-08'),
(24, 'gcristian', 'Gatu', 'Cristian', '21232f297a57a5a743894a0e4a801fc3', 'gcristian', 0, 1, '2021-06-08'),
(25, 'rvlad', 'Radulescu', 'Vlad', '21232f297a57a5a743894a0e4a801fc3', 'rvlad', 0, 1, '2021-06-08'),
(26, 'an1', 'Materii', 'An1', '21232f297a57a5a743894a0e4a801fc3', 'an1', 0, 1, '2021-06-08'),
(27, 'vcosmin', 'Varlan', 'Cosmin', '21232f297a57a5a743894a0e4a801fc3', 'vcosmin', 0, 1, '2021-06-08'),
(28, 'an2', 'Materii', 'An2', '21232f297a57a5a743894a0e4a801fc3', 'an2', 0, 1, '2021-06-08'),
(29, 'an3', 'Materii', 'An3', '21232f297a57a5a743894a0e4a801fc3', 'an3', 0, 1, '2021-06-08');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pentru tabele `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pentru tabele `assesments`
--
ALTER TABLE `assesments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pentru tabele `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pentru tabele `holders`
--
ALTER TABLE `holders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pentru tabele `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pentru tabele `presence_codes`
--
ALTER TABLE `presence_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
