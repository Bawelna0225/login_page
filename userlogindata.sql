-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lut 2023, 11:50
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
-- Struktura tabeli dla tabeli `postcomments`
--

CREATE TABLE IF NOT EXISTS `postcomments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `is_edited` tinyint(1) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`,`user_id`),
  KEY `postcomments_ibfk_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `postcomments`
--

INSERT INTO `postcomments` (`comment_id`, `post_id`, `user_id`, `parent_comment_id`, `content`, `date_created`, `is_edited`) VALUES
(1, 9, 2, NULL, '123', '2023-02-13 09:49:28', 0),
(2, 9, 2, NULL, 'This is second comment under this post. This post title is \"First Post created by Czajnik\". Let\'s see if it works!', '2023-02-13 09:50:37', 0),
(3, 9, 1, NULL, 'Very nice comment man. Good job, I am second commenter btw', '2023-02-13 09:55:22', 0),
(4, 1, 1, NULL, 'First !!!!!111!!!!111!!!1!1!1!!!jeden!!11', '2023-02-13 10:04:51', 0),
(5, 12, 1, NULL, 'Good thing you added those features, they are really usefull man, well done!', '2023-02-13 10:06:02', 0),
(6, 12, 2, NULL, 'Yeah great job. This project starts to look really good, now you need to think how to make replies work.', '2023-02-13 10:07:19', 0),
(7, 12, 4, NULL, 'Yep replies are gonna be hard thing to do', '2023-02-13 10:08:29', 0),
(8, 12, 4, NULL, 'But i belive you can make it somehow', '2023-02-13 10:08:52', 0),
(9, 12, 3, NULL, 'Thanks for your support, i will make it somehow, and i thought obout one more fun thing: How about instead of redirecting user to index to redirect him to previous page, i have to make it somehow it seams super usefull!', '2023-02-13 10:11:20', 0),
(10, 12, 5, NULL, 'Oh hell yeah, it is super usefull, how does user account without pfp work btw.', '2023-02-13 10:15:01', 0),
(11, 15, 4, NULL, 'Holy shit this is first post that takes more space on screen than 100vh nice, and it work pretty fine although it doesn\'t look too god with p tag.', '2023-02-13 10:19:29', 0),
(12, 8, 2, NULL, 'comment test', '2023-02-13 12:08:48', 0),
(13, 6, 1, NULL, 'Nice redirecting works now. Kinda', '2023-02-13 12:17:19', 0),
(14, 12, 7, NULL, 'Damn this project really starts to look good', '2023-02-13 12:33:32', 0),
(15, 7, 2, NULL, 'In the end it didn\'t, and i dropped this idea.', '2023-02-13 16:49:42', 0),
(16, 14, 2, NULL, 'EDITED!', '2023-02-13 16:54:12', 0),
(17, 15, 7, NULL, 'God damn this post looks really good with a pre tag instead of p', '2023-02-13 17:06:03', 0),
(18, 15, 2, NULL, 'Tomorrow i will work on replies, and after that maybe custom themes? As always.', '2023-02-13 17:10:21', 0),
(19, 15, 8, NULL, 'Tomisław Apoloniusz Curuś Bachleda Farrell', '2023-02-13 17:11:56', 0),
(20, 16, 3, NULL, 'Ahh klasyka', '2023-02-13 17:14:29', 0),
(21, 15, 8, NULL, 'No czeba te automatycznie generowane profilowe naprawić i zrobić żeby wyświetlały tylko max 3 litery.\r\n', '2023-02-13 17:19:44', 0),
(22, 15, 8, NULL, 'Oo znalazłem kolejny błąd', '2023-02-13 17:20:37', 0),
(23, 10, 8, NULL, 'test1', '2023-02-13 17:30:10', 0),
(24, 10, 8, NULL, 'test2', '2023-02-13 17:30:13', 0),
(25, 10, 8, NULL, 'test3', '2023-02-13 17:30:15', 0),
(26, 10, 8, NULL, 'test4', '2023-02-13 17:30:18', 0),
(27, 12, 2, 7, 'Replies first test', '2023-02-14 11:19:15', 0),
(28, 12, 2, 7, 'First Reply', '2023-02-14 11:20:54', 0),
(29, 12, 2, 7, 'test', '2023-02-14 11:21:50', 0),
(30, 12, 2, 14, 'sdf', '2023-02-14 11:23:07', 0),
(31, 12, 2, 14, '1', '2023-02-14 11:24:52', 0),
(32, 15, 5, 22, 'Odpowiedzi już działają, najs', '2023-02-14 11:32:24', 0),
(33, 15, 5, 22, 'Można je jeszcze ulepszyć ale narazie niech tak zostanie', '2023-02-14 11:33:09', 0),
(34, 17, 4, NULL, 'Dobry pomysł, Te komentarze wyszły całkiem dobrze, podobają mi się', '2023-02-14 11:40:20', 0),
(35, 17, 3, 34, 'Dziękuję, zamierzam dodać też opcję edytowania i usuwania komentarzy. Kompletnie zapomniałem o tych opcjach', '2023-02-14 11:41:28', 0),
(36, 17, 4, 34, '@Paweł Czarnecki Może by jeszcze dodać możliwość plusowania komentarzy?', '2023-02-14 11:42:44', 0),
(37, 17, 3, 34, 'To bardzo dobry pomysł, ale niestety nie mam zielonego pojęcia jak to zrobić.', '2023-02-14 11:43:43', 0),
(38, 17, 3, 34, 'I naszedł mnie kolejny pomysł, a może by tak zrobić podobną stronę do singlepost ale z danymi użytkownika tj. profil z opcją komentarzy tak samo jak tutaj', '2023-02-14 11:44:55', 0),
(39, 17, 4, 34, 'To ciekawy pomysł i nie jest też jakoś specjalnie skomplikowany, w zasadzie kopiuj wklej', '2023-02-14 11:45:47', 0),
(40, 17, 3, 34, 'Nie jestem za to pewien czy te odpowiedzi do komentarzy nie powinny być wyświetlane w odwrotnej kolejności', '2023-02-14 11:46:58', 0),
(41, 17, 3, 34, 'Teraz odpowiedzi są wyświetlane w odwrotnej kolejności', '2023-02-14 11:56:45', 0),
(42, 18, 3, NULL, 'Muszę koniecznie poprawić responsywność tej strony, zwłaszcza tekstu', '2023-02-14 23:18:58', 0),
(43, 1, 3, NULL, 'This is first post ever, created for this project', '2023-02-15 13:55:32', 0),
(44, 1, 3, 4, 'You are retarded, you muppet', '2023-02-15 13:55:50', 0),
(45, 18, 3, 42, 'Poprawione!', '2023-02-15 13:57:43', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `password`, `picture`) VALUES
(1, 'test', 'test1@test.com', '$2y$10$oLdCh2zhxUAIEfXLpNiQuegXaQ2MRC5wB30.Sv8dc9lWB4EUPYmNm', '1674298765.png'),
(2, 'Test User2', '123@123.123', '$2y$10$u01lbw45eBZQCnycZTx6k.HmST2HR2wXSwhxT2sRE4vC83YYAU/.K', '1675693490.png'),
(3, 'Paweł Czarnecki', 'pawelczarnecki0225@gmail.com', '$2y$10$h07BrViyVbJZxm23nmd7v.FteaKbUislT13dk71tgumP1PyUVXMCq', '1675854493.png'),
(4, 'Czajnik Elektryczny', 'czajnikelektryczny0225@gmail.com', '$2y$10$uHVUiCJgDJEuQMhJ2RQpru6n44AIYOxwo7h/hDGPblgPRZ6JdemnO', '1674221276.png'),
(5, 'John Doe', 'johndoe@example.com', '$2y$10$vxqk4Y1Jzs9hvE3VB/FZJ.9O5pxblDthTMHtLG3xdZYPZCnqAkn6q', ''),
(6, 'Samuel L. Jackson', 'samuelljackson@mail.com', '$2y$10$Zci0gCg4mLTRvf6TtoFHjujPQhhrcd5VrgxsCR2s92IlQNrieYwce', ''),
(7, 'Brand New User', 'brandnewuser@mail.com', '$2y$10$dljNEw8/mNoiahV1yTbNJ.XXSIJvYvlStujSZmAh1tJ1NNiKAL4zy', NULL),
(8, 'Tomisław Apoloniusz Curuś Bachleda Farrell', 'bachledafarrel@mail.com', '$2y$10$oN.uGuqibPO1eXToLJMaTe10cjWr0Ey6WMr9zy7Kj1pgDj8o2iWRW', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userposts`
--

CREATE TABLE IF NOT EXISTS `userposts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `userposts_ibfk_1` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

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
(14, 2, 'First post to be edited, it got EDITED indeed', 'this needs to be edited \r\n\r\nEDITED! ', '2023-01-27'),
(15, 5, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sodales nibh bibendum lectus lacinia auctor. Aenean et sagittis ex. Nulla tristique lacus at sem tempor, vitae pharetra nunc molestie. Aliquam eget eros id nunc ultrices pharetra ut ac urna. Sed ut commodo mi. Etiam velit nisl, efficitur sit amet orci vel, interdum dapibus arcu. Morbi ut nisl nibh. Pellentesque egestas auctor orci et faucibus. Donec ut massa euismod metus ultricies iaculis sed et leo. Maecenas pulvinar, ante a pretium faucibus, dolor felis viverra erat, sed dictum odio mauris sit amet lorem. Duis at lobortis erat. Donec cursus in est eget vestibulum.\r\n\r\nPhasellus condimentum neque scelerisque, commodo neque non, malesuada lorem. Mauris cursus, augue ut dictum condimentum, odio nisl vulputate tortor, in auctor libero quam quis nisi. Etiam suscipit nisl eu magna eleifend suscipit. Nulla consequat urna et velit euismod, id gravida dui porta. Ut convallis molestie felis a viverra. Vivamus eget libero mattis, tempor massa id, ornare leo. Nam condimentum sem ac nulla imperdiet, semper ullamcorper urna laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nunc mi, ultrices eget ligula ut, condimentum vestibulum metus. Pellentesque et ligula augue. Sed eleifend nibh a turpis ullamcorper, in mattis nisl placerat. Cras elementum metus ac augue lacinia pulvinar. Vestibulum suscipit arcu leo, et pellentesque eros luctus ut.\r\n\r\nSed semper viverra laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed tincidunt ligula tellus, et sodales felis pharetra pulvinar. Nulla in lacinia elit. Maecenas nec vestibulum lacus, id eleifend nibh. Sed quis sem tortor. Aliquam eget urna vehicula justo tincidunt pretium. Sed convallis odio a nulla condimentum, vel imperdiet dolor malesuada.\r\n\r\nIn venenatis porttitor congue. Aliquam velit metus, elementum sed maximus vel, hendrerit nec nibh. Aenean sed metus sit amet quam dignissim laoreet ornare at lacus. Nunc tristique efficitur quam ut ultrices. Phasellus sit amet bibendum augue. Aliquam erat volutpat. Nullam tempus orci lacus, eget varius nunc varius non. Nulla eget nisl vel risus aliquam gravida. Fusce consectetur est vel venenatis lacinia.\r\n\r\nSuspendisse dui lorem, egestas at dignissim vel, ornare ac nisl. Pellentesque aliquet metus non dui rutrum hendrerit id non elit. Mauris consectetur diam eget ipsum condimentum, eu sollicitudin lectus rhoncus. Suspendisse consequat mi quis dignissim sagittis. Maecenas lacinia, neque vel vehicula rhoncus, augue dui hendrerit orci, et lobortis risus leo nec mi. Praesent lacinia nisl at mi commodo, eu luctus mauris egestas. Sed faucibus, dui a sagittis tristique, quam nunc tristique libero, a auctor erat est non urna. Mauris molestie, metus vitae aliquet convallis, ligula diam vulputate nibh, eget fringilla lectus elit quis lacus. Nullam id diam ligula. Proin id ligula efficitur, vulputate augue et, interdum felis. Sed sodales tincidunt mi ultrices consequat. Morbi neque leo, accumsan ut tempus et, lobortis non sem. Etiam molestie rutrum arcu nec ultrices. Curabitur facilisis eleifend neque, vulputate faucibus mi porta vitae. Proin a condimentum eros. Duis condimentum, turpis et dapibus pretium, elit dolor feugiat velit, id tempus elit elit eu ante.\r\n\r\nEtiam sed libero felis. Vivamus sed tellus ex. Aliquam auctor lacus euismod tristique tincidunt. Integer nec odio tristique, venenatis libero eu, accumsan nibh. Mauris gravida pharetra elit at finibus. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque vehicula tellus feugiat fermentum. Cras imperdiet turpis nibh, a iaculis elit facilisis at. Curabitur blandit neque et lorem efficitur, non maximus odio elementum. Fusce in neque in sem commodo lacinia. Ut orci nulla, viverra gravida risus eget, mattis molestie risus. Fusce aliquam nulla quis facilisis aliquet. Donec finibus posuere nisl et suscipit.\r\n\r\nDuis nisi ipsum, laoreet ut vulputate vitae, aliquet quis nunc. Vivamus convallis blandit convallis. Nulla sodales tincidunt ipsum, eu rhoncus mi posuere vel. Pellentesque eu tellus vel libero faucibus dapibus ac nec lectus. Sed euismod commodo pellentesque. Nullam interdum ut quam aliquam interdum. Phasellus accumsan odio ante, sed congue sapien ultrices at. Vestibulum eget mauris ut nunc dapibus ornare quis varius est. Proin at aliquam nisl. Nulla facilisi. Pellentesque a vehicula elit. Quisque vulputate lobortis dolor eu tincidunt.\r\n\r\nDuis placerat lacus facilisis ex egestas fringilla. Mauris porttitor lacus ac purus luctus, et eleifend est sagittis. Integer at libero vitae ligula commodo pulvinar. Fusce molestie dui tincidunt risus venenatis fringilla. Suspendisse nec egestas nulla, ac posuere nibh. Ut id diam fringilla, convallis mauris interdum, interdum odio. In in vehicula elit, nec posuere dolor.\r\n\r\nDonec consequat pulvinar lacinia. Nunc at gravida lorem, sed suscipit odio. Donec enim sem, fermentum condimentum lacinia eget, ornare at libero. Sed vehicula pulvinar nisi sed gravida. Pellentesque ornare et tortor eget bibendum. Nunc sit amet commodo felis, vitae lobortis arcu. Ut sapien ex, placerat id ex vel, aliquam venenatis ex. Proin sem velit, consectetur eu viverra nec, rutrum quis nisl. Morbi a dolor a metus maximus bibendum. Vivamus aliquet rutrum turpis a cursus. Suspendisse quis auctor purus. Aliquam sed velit vel felis scelerisque vulputate. Mauris condimentum tellus velit, nec varius tellus hendrerit eget.\r\n\r\nQuisque et leo lacus. Donec in tempor dolor. Etiam purus elit, tincidunt et leo congue, tincidunt mattis diam. Ut interdum ligula eget augue pulvinar varius. Donec dui leo, pretium id est vitae, mattis rhoncus diam. Proin vitae luctus ipsum. Mauris cursus, quam sed maximus ultricies, libero magna tincidunt tortor, quis placerat arcu nisl non odio.\r\n\r\nPhasellus ornare et magna id rutrum. Cras vitae tincidunt nulla, eu consequat diam. Aliquam lacinia ultricies ipsum, non commodo neque. Nulla fermentum mattis massa ac suscipit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris consectetur diam in eleifend porttitor. Suspendisse leo orci, vehicula imperdiet sagittis nec, varius sit amet enim. Cras pulvinar sollicitudin sollicitudin. Quisque velit felis, lobortis tincidunt convallis in, volutpat vitae purus. Donec placerat ipsum ut erat auctor hendrerit.\r\n\r\nMorbi cursus justo at aliquet malesuada. Duis viverra ligula volutpat, ultricies dui sed, laoreet orci. Aliquam ut ornare elit. Aenean quis tempus orci, eget dapibus augue. Fusce mollis suscipit dui ac egestas. Phasellus finibus dolor mauris, sit amet tristique ex tempor at. Vivamus pellentesque lectus euismod, placerat diam eget, tempor erat. Phasellus ex nisl, fermentum eget porta ac, auctor malesuada ligula.\r\n\r\nSuspendisse dictum venenatis mi, eu placerat ligula malesuada ac. Proin porta vulputate dignissim. Donec interdum ipsum sit amet lacus finibus commodo. Sed non mi in nulla auctor sodales quis ac est. Vestibulum non rhoncus lacus. Donec imperdiet lectus id sapien dictum luctus. Pellentesque bibendum pharetra nisl. Morbi interdum ut est sit amet porta.\r\n\r\nDonec nulla turpis, tincidunt eget nibh quis, pharetra hendrerit elit. Nulla pulvinar neque a auctor laoreet. Fusce sed suscipit urna, in porta mauris. Nullam blandit lorem venenatis iaculis iaculis. Nullam interdum commodo arcu, eu consectetur diam tincidunt nec. Donec facilisis augue eget finibus euismod. Pellentesque consequat at orci a facilisis. Nunc at pharetra nisl. Proin eu velit finibus, consectetur nisi in, varius augue. Maecenas at rutrum arcu. Duis vel ullamcorper sem, in tincidunt enim. Integer facilisis euismod diam vel scelerisque. Praesent interdum neque eget dignissim convallis.\r\n\r\nPhasellus scelerisque odio sit amet elit cursus sollicitudin. Vivamus a porta dolor, at ornare orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras vel dolor nulla. Curabitur lacinia arcu sed egestas congue. In scelerisque rhoncus malesuada. Etiam metus sapien, aliquet nec ante mollis, eleifend tincidunt massa. Proin tristique ex lorem, vitae dictum elit viverra eu. Morbi rhoncus rhoncus lacus sed euismod.', '2023-02-13'),
(16, 8, 'Śniezny Kockodan, przez niektórych nazywany też Yeti', '\"Dawno dawno tymu, za siedmioma #!$%@?, za siedmioma zekami, w okolicach Gubałówki mieszkał Tomisław Apoloniusz Curuś Bachleda Farrell, jak ten piecyk z dmuchawą. Pewnego dnia Tomisław wysedł na halę i pomyśloł: Krucafuks dość! Ile mozna #!$%@?ć łoscypek! Ani to dobre, ani śwarne a jakie drogie #!$%@?!  No i sracka murowana, toć to gołymi łapami ługniotane. Zeby to jeszcze z krowiego mleka było; a weź tu łodróznij barana od łowiecki. Stąd ten słonawy posmak. Tfu, łohydne. Co te turysty w tym widzą. Podczas, gdy Bachleda zajadał się łoscypkiem, smród baraniego nabiału niósł się po łokolicy. Nawet po wiater #!$%@?ło napletkiem hej! Bekasy nie wytsymały. Fetor przepłoszył je z terenów lęgowych. Ryby, w Morskim Łoku zdechły, a w Carnym Stawie, zdechły. Niedźwiedź Gąsienica łobudził się ze snu zimowego i łod razu poszedł pod prysznic. Lecz to nie tylko łod niego tak #!$%@?ło. Niby po kąpieli smród bełta i gówna ustąpił, ale przez to woń łoctówy stała się jeszcze bardziej nieznośna. Lecz specyficzny zapach łobudził nie tyko misia, łobudził też ządze, łobrzydliwe homoseksualne żądze. Śniezny Kockodan, przez niektórych nazywany też Yeti, dostaje smergla, gdy pocuje woń fiuta hej. Tak się składo, że łoscypek pachnie toćsamo, koniec.\"\r\n\r\n\"Bestia normalnie żywi się owocami, ale łocet budzi w niej zboczenie. Tamtej nocy zeszła z wierchu na hale wiedziona zapachem rozporka. Nieświadomy nicego Bachleda Farrell zajadoł właśnie syr. Pierwsze razy posły w dupe hej! Little Boy małpy rozdupcył Hirosimę Bachledy. Potem Kockodan założył strapona \"Big Ben\" i dzwonił jajami o brodę Curusia. Koszmar małpy trwał kilka dni. Bachleda nie chciał puścić. Donosił tylko sprzęty, od których małpie robiły się wielkie łoczy. Yeti nie wytsymał, gdy Bachleda przyniósł słoik. A gdy słój pękł, a Bachleda zabronił wzywać karetkę, tylko kazał nagrywać dalej, małpa zwariowała. I grasuje po łokolicy po dziś dzień. A film ze słoikiem dostępny jest w sieci.\r\nKONIEC.\" ', '2023-02-13'),
(17, 3, 'Sekcja komentarzy i odpowiadanie na komentarze', 'Właśnie dodałem możliwość odpowiadania na komentarze, można to jeszcze ulepszyć i np:\r\n- dodać napis do którego komentarza się odnosimy\r\n- odpowiadać na odpowiedzi komentarzy (obecnie jest jedynie możliwość odpowiadania na główny komentarz)\r\n\r\nAle na tę chwile zajmę się Frontendowymi opcjami jak np.\r\n- Zmiana motywów\r\n- Wyszukiwarka postów\r\n- responsywnośc na mniejszych ekranach', '2023-02-14'),
(18, 3, 'Pomysł na kolejny element tego projektu', 'A może by tak dodać stronę z profilem użytkownika, jest to dosyć proste, można też dodać kilka dodatkowych opcji np.\r\n- opis profilu wprowadzony przez użytkownika\r\n- linki do mediów społecznościowych\r\n- Wyświetlanie ilości postów napisanych przez użytkownika\r\n- profil będzie zawierał podobną sekcję komentarzy jak strona single post', '2023-02-14');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `postcomments`
--
ALTER TABLE `postcomments`
  ADD CONSTRAINT `postcomments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `userposts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postcomments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `userposts`
--
ALTER TABLE `userposts`
  ADD CONSTRAINT `userposts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `userdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
