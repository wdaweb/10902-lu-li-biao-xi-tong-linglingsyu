-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-02 18:34:44
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `resume`
--

-- --------------------------------------------------------

--
-- 資料表結構 `resume_picture`
--

CREATE TABLE `resume_picture` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_picture`
--

INSERT INTO `resume_picture` (`id`, `userid`, `name`, `path`, `sh`) VALUES
(12, 1, '2020702051910.jpg', 'img/2020702051910.jpg', '1'),
(13, 1, '2020702052527.jpg', 'img/2020702052527.jpg', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `resume_profile`
--

CREATE TABLE `resume_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telshow` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lineid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lineshow` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_profile`
--

INSERT INTO `resume_profile` (`id`, `userid`, `name`, `enname`, `tel`, `telshow`, `email`, `live`, `lineid`, `lineshow`, `intr`) VALUES
(1, 1, '許瑞玲', 'Elsa Syu', '0955335369', '', 'zzxcv741@hotmail.com', '桃園市', 't520131412', '', '你好安安安安');

-- --------------------------------------------------------

--
-- 資料表結構 `resume_user`
--

CREATE TABLE `resume_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_user`
--

INSERT INTO `resume_user` (`id`, `acc`, `pw`) VALUES
(1, 'admin', '1234');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `resume_picture`
--
ALTER TABLE `resume_picture`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_profile`
--
ALTER TABLE `resume_profile`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_user`
--
ALTER TABLE `resume_user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_picture`
--
ALTER TABLE `resume_picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_profile`
--
ALTER TABLE `resume_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_user`
--
ALTER TABLE `resume_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
