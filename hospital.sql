-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-09-11 17:03:22
-- 伺服器版本: 10.1.25-MariaDB
-- PHP 版本： 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hospital`
--

-- --------------------------------------------------------

--
-- 資料表結構 `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) UNSIGNED NOT NULL,
  `ssn` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `doctor`
--

INSERT INTO `doctor` (`id`, `ssn`, `name`, `password`, `remember_token`) VALUES
(1, 'ae87', 'doctor1', '$2y$10$pvbbnSyLxSYWlb4oSxVuFO6/zvu5n95csMPgEHBjc3kqtxchWpLd2', '9fwFT84a2569iL7rSFTSQlNqOw64MkABQMQiVdVtwL0e0s8cNTACJXiZ9l4f'),
(2, 'test', 'doctor2', '$2y$10$pvbbnSyLxSYWlb4oSxVuFO6/zvu5n95csMPgEHBjc3kqtxchWpLd2', '4DaQQ9wmj0awULUkTde6s3ZC4wdkBUqTa7GFlU3Be0eKecxoCgj4e82SLrm9');

-- --------------------------------------------------------

--
-- 資料表結構 `patient`
--

CREATE TABLE `patient` (
  `id` int(10) UNSIGNED NOT NULL,
  `ssn` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `patient`
--

INSERT INTO `patient` (`id`, `ssn`, `name`, `remember_token`, `password`) VALUES
(1, 'test', 'gan', 'Ll9qzJ9bl0pmWEbDkDNGRf9UdohxT0YZYftR83YH7NM6xOznovVV2aWSJKqv', '$2y$10$PmQYUlL7kl6UDJkVxwb1uuiHRJ0t74VMFpqTzR5arzfGa2MiyjQDm'),
(3, 'test2', 'user2', NULL, '$2y$10$ygUB7PnO.QqByvK2jpnQk.87bazjady.Uviu9XVBZCcDkFzSQlOXG');

-- --------------------------------------------------------

--
-- 資料表結構 `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `hour1` int(10) UNSIGNED NOT NULL,
  `hour2` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `reservation`
--

INSERT INTO `reservation` (`id`, `patient_id`, `hour1`, `hour2`, `date`) VALUES
(1, 3, 12, 14, '2017-08-07'),
(2, 3, 0, 2, '2017-08-15'),
(4, 1, 5, 7, '2017-08-15'),
(5, 1, 2, 3, '2017-09-09'),
(6, 1, 5, 6, '2017-09-09'),
(7, 1, 2, 5, '2017-09-21'),
(9, 1, 0, 1, '2017-09-21'),
(10, 1, 5, 6, '2017-09-21'),
(11, 1, 1, 4, '2017-09-14'),
(12, 1, 6, 8, '2017-09-14'),
(13, 3, 7, 8, '2017-09-21'),
(14, 3, 3, 5, '2017-09-22');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ssn` (`ssn`);

--
-- 資料表索引 `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ssn_2` (`ssn`),
  ADD KEY `ssn` (`ssn`);

--
-- 資料表索引 `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
