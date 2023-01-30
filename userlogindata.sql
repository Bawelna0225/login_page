-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Sty 2023, 17:07
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `userlogindata`
--
CREATE DATABASE IF NOT EXISTS `userlogindata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `userlogindata`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `password`, `picture`) VALUES
(1, 'test', 'test1@test.com', '$2y$10$oLdCh2zhxUAIEfXLpNiQuegXaQ2MRC5wB30.Sv8dc9lWB4EUPYmNm', '1674298765.png'),
(2, 'Test User2', '123@123.123', '$2y$10$u01lbw45eBZQCnycZTx6k.HmST2HR2wXSwhxT2sRE4vC83YYAU/.K', '1674223858.png'),
(3, 'Paweł Czarnecki', 'pawelczarnecki0225@gmail.com', '$2y$10$h07BrViyVbJZxm23nmd7v.FteaKbUislT13dk71tgumP1PyUVXMCq', ''),
(4, 'Czajnik Elektryczny', 'czajnikelektryczny0225@gmail.com', '$2y$10$uHVUiCJgDJEuQMhJ2RQpru6n44AIYOxwo7h/hDGPblgPRZ6JdemnO', '1674221276.png'),
(5, 'John Doe', 'johndoe@example.com', '$2y$10$vxqk4Y1Jzs9hvE3VB/FZJ.9O5pxblDthTMHtLG3xdZYPZCnqAkn6q', ''),
(6, 'Samuel L. Jackson', 'samuelljackson@mail.com', '$2y$10$Zci0gCg4mLTRvf6TtoFHjujPQhhrcd5VrgxsCR2s92IlQNrieYwce', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userposts`
--

CREATE TABLE `userposts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `userposts`
--

INSERT INTO `userposts` (`post_id`, `author_id`, `title`, `content`, `date_created`) VALUES
(1, 2, 'First post by test user2', 'this user has this email 123@123.123\r\nasdasdasd\r\nasda\r\nsd\r\nsad\r\nas\r\ndas\r\ndas\r\ndas\r\ndasdasdasd\r\n\r\nasdasdasd', '2023-01-24'),
(2, 1, 'First post by user: test with id 1', 'this user has this email: \r\ntest@test.com\r\nsadasdasd\r\nasd\r\nas\r\ndas\r\ndasdasd', '2023-01-24'),
(3, 2, 'Second post by test user2', 'asdasdasdasd\r\nasd\r\nasd\r\nasd\r\nasd\r\nasdasdasd\r\nasd\r\nas\r\nda\r\nsda\r\nsd\r\nasd\r\nasdasdasdasdasd', '2023-01-24'),
(4, 2, 'Third post created by test user2', 'asdasdas dasdasda sdassadfds agwewerwer werwer\r\nwerwerwerwerwer\r\nwerwerwerwer werwerwerw esdgdsawf sadfasdf', '2023-01-24'),
(5, 2, 'first post created with form', 'just as i said in the title baby', '2023-01-25'),
(6, 2, 'Second post created with form ', 'sadasd sad\r\nasd\r\nasdasdasdasda\r\nsdasdasdads', '2023-01-25'),
(7, 2, 'checking if sleep() funtion works', 'asdasd asd\r\nasd\r\nasdasdasd', '2023-01-25'),
(8, 2, 'sleep funtion check no2', 'asdasdasd', '2023-01-25'),
(9, 4, 'First Post created by Czajnik', 'asdasdasdasdasd', '2023-01-25'),
(10, 4, 'sadasd', 'asdasdasd', '2023-01-25'),
(11, 4, 'Third or Fourth post i don\'t know', 'asdasdasdasd', '2023-01-25'),
(12, 3, 'First post created by Paweł Czarnecki', 'This first post created from this account,\r\nEvery function works fine so far.\r\nI am thinking what to add next, maybe edit and delete post function? Yeah that seems like usefull feature.', '2023-01-26'),
(14, 2, 'First post to be edited, it got EDITED indeed', 'this needs to be edited \r\n\r\nEDITED! ', '2023-01-27');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `userposts`
--
ALTER TABLE `userposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `userposts`
--
ALTER TABLE `userposts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `userposts`
--
ALTER TABLE `userposts`
  ADD CONSTRAINT `userposts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `userdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
