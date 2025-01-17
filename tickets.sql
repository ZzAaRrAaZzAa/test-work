-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Січ 17 2025 р., 15:32
-- Версія сервера: 8.0.40-0ubuntu0.24.04.1
-- Версія PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `test`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `status` enum('Нова','В роботі','Вирішена') COLLATE utf8mb4_general_ci NOT NULL,
  `category` enum('Відключення','Перевірка/здешевлення','Технічне питання','Інше') COLLATE utf8mb4_general_ci NOT NULL,
  `resolved_date` date DEFAULT NULL,
  `created_date` date NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `tickets`
--

INSERT INTO `tickets` (`id`, `status`, `category`, `resolved_date`, `created_date`, `agent`, `description`) VALUES
(1, 'Вирішена', 'Відключення', '2025-01-10', '2025-01-08', 'Таран Ольга', 'Вирішення проблеми відключення.'),
(2, 'Вирішена', 'Перевірка/здешевлення', '2025-01-09', '2025-01-07', 'Таран Ольга', 'Проведено перевірку тарифів.'),
(3, 'Вирішена', 'Технічне питання', '2025-01-11', '2025-01-09', 'Таран Ольга', 'Допомога з технічним налаштуванням.'),
(4, 'Нова', 'Інше', NULL, '2025-01-12', 'Таран Ольга', 'Очікує вирішення.'),
(5, 'В роботі', 'Відключення', NULL, '2025-01-13', 'Неделько Дмитрий', 'Активно вирішується питання з відключенням.'),
(6, 'Вирішена', 'Перевірка/здешевлення', '2025-01-10', '2025-01-08', 'Неделько Дмитрий', 'Оптимізація тарифного плану.'),
(7, 'Вирішена', 'Технічне питання', '2025-01-10', '2025-01-09', 'Неделько Дмитрий', 'Виправлено помилку в мережі.'),
(8, 'Нова', 'Інше', NULL, '2025-01-13', 'Неделько Дмитрий', 'Додаткове питання.'),
(9, 'Вирішена', 'Відключення', '2025-01-09', '2025-01-07', 'Іваненко Анна', 'Швидке вирішення питання з відключенням.'),
(10, 'В роботі', 'Перевірка/здешевлення', NULL, '2025-01-12', 'Петренко Юрій', 'Аналіз можливостей зниження вартості.'),
(11, 'Вирішена', 'Технічне питання', '2025-01-10', '2025-01-08', 'Сидоренко Марія', 'Питання вирішено.'),
(13, 'Вирішена', 'Відключення', '2025-01-12', '2025-01-10', 'dasdas', 'dsadas'),
(14, 'Вирішена', 'Відключення', '2025-01-15', '2025-01-12', 'dasdas', 'dsadas');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
