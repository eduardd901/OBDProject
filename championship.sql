-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2021 г., 17:39
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `championship`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `apID` bigint(20) UNSIGNED NOT NULL,
  `teamID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `championship`
--

CREATE TABLE `championship` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `championship_info` varchar(1000) NOT NULL,
  `reward_to_winners` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `championship`
--

INSERT INTO `championship` (`id`, `name`, `championship_info`, `reward_to_winners`) VALUES
(1, 'CS:GO ESEA Season 39', 'ESEA', 100000123123);

-- --------------------------------------------------------

--
-- Структура таблицы `match`
--

CREATE TABLE `match` (
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team1` bigint(20) UNSIGNED NOT NULL,
  `team2` bigint(20) UNSIGNED NOT NULL,
  `maps` varchar(50) NOT NULL,
  `date_and_time` timestamp NOT NULL,
  `urlMap` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `match`
--

INSERT INTO `match` (`match_id`, `team1`, `team2`, `maps`, `date_and_time`, `urlMap`) VALUES
(1, 12, 11, 'Dust2', '2021-11-12 13:18:00', 'https://cdn-images.win.gg/news/aaf2979785deb27864047e0ea40ef1b7/17a2c47219fa5b2b4db02ea75f12bfb9/original.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `roleusers`
--

CREATE TABLE `roleusers` (
  `roleID` bigint(20) UNSIGNED NOT NULL,
  `namerole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `roleusers`
--

INSERT INTO `roleusers` (`roleID`, `namerole`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'player'),
(4, 'captain');

-- --------------------------------------------------------

--
-- Структура таблицы `storeplayers`
--

CREATE TABLE `storeplayers` (
  `storePID` bigint(20) UNSIGNED NOT NULL,
  `teamID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `storeplayers`
--

INSERT INTO `storeplayers` (`storePID`, `teamID`, `userID`) VALUES
(2, 1, 152),
(5, 1, 154),
(3, 11, 150),
(6, 12, 156),
(7, 13, 158);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name_team` varchar(50) NOT NULL,
  `information` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`team_id`, `name_team`, `information`) VALUES
(1, 'sdzc', 'asdxc'),
(11, 'nameTeam', 'info'),
(12, 'myTeam', 'info'),
(13, 'йцуйв', 'фівфів');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `nickname`, `passwd`, `email`) VALUES
(142, 1, 'admin', '$2y$10$DO1SC1szGcWxHK4P7XMM4OIS6ji62.GFHj8NvreAOxV4amiJsBXtW', 'email123@mail.tu'),
(150, 4, 'user12', '$2y$10$lgvStFK/6Ohz11R2voRJbOGBprzg6JK3VPuye2675ARu4GXJoCwF2', 'user2@mail.ru'),
(152, 4, 'users', '$2y$10$DO1SC1szGcWxHK4P7XMM4OIS6ji62.GFHj8NvreAOxV4amiJsBXtW', 'qwerty@mail.ru'),
(153, 2, 'asdawdaw', '$2y$10$t5GIrReKchZJ7uhPkqb5DeuajVjb13Rsko8D2AngNzy4SOP00UUpW', 'asdzxczs@gmail.ru'),
(154, 3, 'hash', '$2y$10$t5GIrReKchZJ7uhPkqb5DeuajVjb13Rsko8D2AngNzy4SOP00UUpW', 'email123@mail.ru'),
(155, 2, 'player', '$2y$10$VT/Bp6G7N3qcLRbUjo4pXeCTHT1py3w1RDkKHs0KS0UHCTMCqDXdG', 'player@mail.ru'),
(156, 4, 'testUser', '$2y$10$PCvbIVhi4CWkuv5U4zIEd.W8YT3/oo5xnxls.T43j0pm1xAHU4zAy', 'testUser@gmail.com'),
(157, 2, 'userasdas', '$2y$10$htiwI4rkz/t7LB.dz63YbeTn.0kj/psH5To2oIkJnIlmOMNfHxtwm', 'userasdas@mail.ru'),
(158, 4, 'YoVUk', '$2y$10$PtR95ge31REVBl.naaXF5OzJwmsyubJy8HEbo6RF7cBnZNu2XmO1C', 'email@mail.ru'),
(159, 2, 'user', '$2y$10$1Q3L.zpDj.FtQOON6I0EUOfHg0.dSjEOBYTcAhfSHUv/aoupTF3.S', 'usermail@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`apID`),
  ADD UNIQUE KEY `apID` (`apID`),
  ADD KEY `teamID` (`teamID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Индексы таблицы `championship`
--
ALTER TABLE `championship`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `championship_id` (`id`);

--
-- Индексы таблицы `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`match_id`),
  ADD UNIQUE KEY `match_id` (`match_id`),
  ADD UNIQUE KEY `match_id_2` (`match_id`),
  ADD KEY `team1` (`team1`,`team2`),
  ADD KEY `team2` (`team2`);

--
-- Индексы таблицы `roleusers`
--
ALTER TABLE `roleusers`
  ADD PRIMARY KEY (`roleID`),
  ADD UNIQUE KEY `roleID` (`roleID`);

--
-- Индексы таблицы `storeplayers`
--
ALTER TABLE `storeplayers`
  ADD PRIMARY KEY (`storePID`),
  ADD UNIQUE KEY `storePID` (`storePID`),
  ADD KEY `teamID` (`teamID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `team_id` (`team_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `apID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `championship`
--
ALTER TABLE `championship`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `match`
--
ALTER TABLE `match`
  MODIFY `match_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `roleusers`
--
ALTER TABLE `roleusers`
  MODIFY `roleID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `storeplayers`
--
ALTER TABLE `storeplayers`
  MODIFY `storePID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `team_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`team1`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`team2`) REFERENCES `team` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `storeplayers`
--
ALTER TABLE `storeplayers`
  ADD CONSTRAINT `storeplayers_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `storeplayers_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roleusers` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
