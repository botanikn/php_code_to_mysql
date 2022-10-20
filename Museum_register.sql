-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 07 2022 г., 13:11
-- Версия сервера: 5.7.39-0ubuntu0.18.04.2
-- Версия PHP: 7.2.24-0ubuntu0.18.04.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Museum_register`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Artifacts`
--

CREATE TABLE `Artifacts` (
  `ID-artifact` int(11) NOT NULL,
  `Artifact name` text NOT NULL,
  `Approximate year of creation` int(11) NOT NULL,
  `Year of location` int(11) NOT NULL,
  `ID-section` int(11) NOT NULL,
  `Short description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `Floors`
--

CREATE TABLE `Floors` (
  `Floor number` int(11) NOT NULL,
  `Interestion features` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `Sections`
--

CREATE TABLE `Sections` (
  `ID-section` int(11) NOT NULL,
  `Section name` text NOT NULL,
  `Floor number` int(11) NOT NULL,
  `Foundation date` int(11) NOT NULL,
  `Short description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Artifacts`
--
ALTER TABLE `Artifacts`
  ADD PRIMARY KEY (`ID-artifact`),
  ADD KEY `ID-section` (`ID-section`);

--
-- Индексы таблицы `Floors`
--
ALTER TABLE `Floors`
  ADD PRIMARY KEY (`Floor number`);

--
-- Индексы таблицы `Sections`
--
ALTER TABLE `Sections`
  ADD PRIMARY KEY (`ID-section`),
  ADD KEY `Floor number` (`Floor number`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Artifacts`
--
ALTER TABLE `Artifacts`
  MODIFY `ID-artifact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Floors`
--
ALTER TABLE `Floors`
  MODIFY `Floor number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Sections`
--
ALTER TABLE `Sections`
  MODIFY `ID-section` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Artifacts`
--
ALTER TABLE `Artifacts`
  ADD CONSTRAINT `Artifacts_ibfk_1` FOREIGN KEY (`ID-section`) REFERENCES `Sections` (`ID-section`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Sections`
--
ALTER TABLE `Sections`
  ADD CONSTRAINT `Sections_ibfk_1` FOREIGN KEY (`Floor number`) REFERENCES `Floors` (`Floor number`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
