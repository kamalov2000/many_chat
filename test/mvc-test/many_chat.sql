-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 01 2021 г., 00:16
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `many_chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `date_change` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id`, `name`, `date_create`, `date_change`) VALUES
(46, 'department_1', '2021-10-31', '2021-10-31'),
(47, 'department_2', '2021-10-31', '2021-10-31'),
(48, 'department_3', '2021-10-31', '2021-10-31');

-- --------------------------------------------------------

--
-- Структура таблицы `employeer`
--

CREATE TABLE `employeer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `male` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `salary` varchar(255) NOT NULL,
  `date_change` date NOT NULL DEFAULT current_timestamp(),
  `id_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employeer`
--

INSERT INTO `employeer` (`id`, `name`, `first_name`, `second_name`, `male`, `date_birth`, `salary`, `date_change`, `id_department`) VALUES
(145, 'employee_5', 'employee_5', 'employee_5', 'Female', '2012-03-21', '100', '2021-11-01', 46),
(146, 'employee_1', 'employee_1', 'employee_1', 'Male', '2014-12-12', '100', '2021-11-01', 47),
(147, 'employee_2', 'employee_2', 'employee_2', 'Male', '2021-12-12', '123', '2021-11-01', 48);

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `date_change` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id`, `name`, `date_create`, `date_change`) VALUES
(69, '2', '2021-10-31', '2021-10-31'),
(70, '3', '2021-10-31', '2021-10-31'),
(71, '4', '2021-10-31', '2021-10-31');

-- --------------------------------------------------------

--
-- Структура таблицы `table_emp_proj`
--

CREATE TABLE `table_emp_proj` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `table_emp_proj`
--

INSERT INTO `table_emp_proj` (`id`, `employee_id`, `project_id`) VALUES
(167, 145, 70),
(168, 146, 69),
(169, 147, 71);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employeer`
--
ALTER TABLE `employeer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeer_fk0` (`id_department`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_emp_proj`
--
ALTER TABLE `table_emp_proj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_emp_proj_fk0` (`employee_id`),
  ADD KEY `table_emp_proj_fk1` (`project_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `employeer`
--
ALTER TABLE `employeer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `table_emp_proj`
--
ALTER TABLE `table_emp_proj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employeer`
--
ALTER TABLE `employeer`
  ADD CONSTRAINT `employeer_fk0` FOREIGN KEY (`id_department`) REFERENCES `department` (`id`);

--
-- Ограничения внешнего ключа таблицы `table_emp_proj`
--
ALTER TABLE `table_emp_proj`
  ADD CONSTRAINT `table_emp_proj_fk0` FOREIGN KEY (`employee_id`) REFERENCES `employeer` (`id`),
  ADD CONSTRAINT `table_emp_proj_fk1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
