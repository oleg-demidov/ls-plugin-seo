-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 13 2019 г., 17:41
-- Версия сервера: 5.7.25-0ubuntu0.16.04.2
-- Версия PHP: 7.0.33-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fend`
--

-- --------------------------------------------------------

--
-- Структура таблицы `prefix_seo_data`
--

CREATE TABLE `prefix_seo_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `target_type` varchar(128) COLLATE utf8_bin NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `keywords` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `h1` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `prefix_seo_rule`
--

CREATE TABLE `prefix_seo_rule` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` varchar(50) COLLATE utf8_bin NOT NULL,
  `vars` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `keywords` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `h1` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `prefix_seo_data`
--
ALTER TABLE `prefix_seo_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `target_type_2` (`target_type`,`target_id`),
  ADD KEY `target_type` (`target_type`),
  ADD KEY `target_id` (`target_id`);

--
-- Индексы таблицы `prefix_seo_rule`
--
ALTER TABLE `prefix_seo_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `prefix_seo_data`
--
ALTER TABLE `prefix_seo_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `prefix_seo_rule`
--
ALTER TABLE `prefix_seo_rule`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
