-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 13 2016 г., 12:55
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpstart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `id` int(10) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `col` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ip`
--

INSERT INTO `ip` (`id`, `ip`, `date`, `col`) VALUES
(1, '127.0.0.1', '2016-11-10 22:58:21', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name_f` varchar(50) NOT NULL,
  `name_i` varchar(50) NOT NULL,
  `name_o` varchar(50) NOT NULL,
  `dater` date NOT NULL,
  `sex` varchar(50) NOT NULL,
  `stat` varchar(50) NOT NULL,
  `edu` varchar(50) NOT NULL,
  `role` int(1) NOT NULL,
  `avatars` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name_f`, `name_i`, `name_o`, `dater`, `sex`, `stat`, `edu`, `role`, `avatars`) VALUES
(17, 'ivanov', '96e79218965eb72c92a549dd5a330112', 'ivanov@mail.ru', 'Иванов', 'Иван', 'Иванович', '1980-04-04', 'male', 'Севастополь', 'h', 3, 'avatars/sample.jpg'),
(18, 'petrov', '96e79218965eb72c92a549dd5a330112', 'petrov@mail.ru', 'Петров', 'Петр', 'Петрович', '1983-09-07', 'male', 'Москва', 'hh', 2, 'avatars/sample.jpg'),
(19, 'semenova', '96e79218965eb72c92a549dd5a330112', 'semenova@mail.ru', 'Семенова', 'Мария', '', '1990-01-03', 'female', 'Севастополь', 'h', 2, 'avatars/sample.jpg'),
(20, 'admin', '96e79218965eb72c92a549dd5a330112', 'admin@mail.ru', 'Администратор', '', '', '1990-01-01', 'male', 'Севастополь', 'h', 1, 'avatars/sample.jpg'),
(24, 'orlena', '96e79218965eb72c92a549dd5a330112', 'orlena@mail.ru', 'Шляховая', 'Елена', 'Владимировна', '1980-02-20', 'female', 'Севастополь', 'hh', 1, 'avatars/sample.jpg'),
(26, 'pupkin', '96e79218965eb72c92a549dd5a330112', 'pupkin@mail.ru', 'Пупкин', 'И', 'И', '1987-07-04', 'male', 'Севастополь', 'h', 0, 'avatars/sample.jpg'),
(133, 'opera', 'ffdsa211033a5dd945a29c27be56981297e69', '123@mail.ru', 'Опера', '', '', '1988-05-06', 'male', 'Севастополь', 'hh', 0, 'avatars/small.jpg'),
(134, 'php', 'ffdsa211033a5dd945a29c27be56981297e69', '123@mail.ru', 'Hypertext Preprocessor', '', '', '1990-01-01', 'male', '', 'h', 0, 'avatars/inPHP.jpg'),
(135, 'css', 'ffdsa211033a5dd945a29c27be56981297e69', '123@mail.ru', 'Cascading Style Sheets', '', '', '1980-05-15', '', '', 'h', 0, 'avatars/CSS.jpg'),
(136, 'html', 'ffdsa211033a5dd945a29c27be56981297e69', '123@mail.ru', 'HyperText Markup Language', '', '', '1985-10-05', 'female', '', 'ss', 0, 'avatars/html.jpg'),
(137, 'user', 'ffdsa211033a5dd945a29c27be56981297e69', '123@mail.ru', 'user', '', '', '1982-01-03', 'male', '', 's', 0, 'avatars/sample_old.jpg'),
(145, 'null', 'ffdsa211033a5dd945a29c27be56981297e69', '123@mail.ru', 'без аватарки', '', '', '1980-05-15', '', '', 'h', 0, 'avatars/sample.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
