-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-05 19:24:24
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
-- 資料表結構 `resume_link`
--

CREATE TABLE `resume_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- 資料表結構 `resume_skillback`
--

CREATE TABLE `resume_skillback` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resume_skillcert`
--

CREATE TABLE `resume_skillcert` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resume_skillfront`
--

CREATE TABLE `resume_skillfront` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_skillfront`
--

INSERT INTO `resume_skillfront` (`id`, `userid`, `name`, `level`) VALUES
(1, 1, 'HTML/CSS3', '90');

-- --------------------------------------------------------

--
-- 資料表結構 `resume_skilllan`
--

CREATE TABLE `resume_skilllan` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resume_skillsoft`
--

CREATE TABLE `resume_skillsoft` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resume_study`
--

CREATE TABLE `resume_study` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `edu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_month` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_month` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_study`
--

INSERT INTO `resume_study` (`id`, `userid`, `edu`, `status`, `school`, `dept`, `s_year`, `s_month`, `g_year`, `g_month`, `sh`) VALUES
(3, 1, '大學', '畢業', '國立雲林科技大學', '企業管理系', '2007', '6', '2011', '9', '1'),
(4, 1, '高職', '畢業', '國立中壢商業高級中等學校', '資料處理科', '2004', '9', '2007', '6', '1');

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

-- --------------------------------------------------------

--
-- 資料表結構 `resume_work`
--

CREATE TABLE `resume_work` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `com` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_month` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_month` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inwork` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_work`
--

INSERT INTO `resume_work` (`id`, `userid`, `com`, `pos`, `job`, `s_year`, `s_month`, `e_year`, `e_month`, `inwork`, `sh`) VALUES
(1, 1, '馥瑞馨國際有限公司', '業務助理', '出貨、訂單製作、請款收款、每月報表製作、每日業績計算', '2014', '2', '2019', '9', '在職', '1'),
(2, 1, '聯府塑膠股份有限公司', '會計助理', '1.執行各項與資金有關之財務作業\n2.會計資料整理\n3.營業稅申報\n4.執行主管交代事項', '2011', '8', '2012', '8', '在職', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `resume_link`
--
ALTER TABLE `resume_link`
  ADD PRIMARY KEY (`id`);

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
-- 資料表索引 `resume_skillback`
--
ALTER TABLE `resume_skillback`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_skillcert`
--
ALTER TABLE `resume_skillcert`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_skillfront`
--
ALTER TABLE `resume_skillfront`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_skilllan`
--
ALTER TABLE `resume_skilllan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_skillsoft`
--
ALTER TABLE `resume_skillsoft`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_study`
--
ALTER TABLE `resume_study`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_user`
--
ALTER TABLE `resume_user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_work`
--
ALTER TABLE `resume_work`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_link`
--
ALTER TABLE `resume_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillback`
--
ALTER TABLE `resume_skillback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillcert`
--
ALTER TABLE `resume_skillcert`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillfront`
--
ALTER TABLE `resume_skillfront`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skilllan`
--
ALTER TABLE `resume_skilllan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillsoft`
--
ALTER TABLE `resume_skillsoft`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_study`
--
ALTER TABLE `resume_study`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_user`
--
ALTER TABLE `resume_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_work`
--
ALTER TABLE `resume_work`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
