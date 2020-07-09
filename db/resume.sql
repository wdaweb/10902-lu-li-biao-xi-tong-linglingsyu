-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-09 10:43:00
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

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
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_link`
--

INSERT INTO `resume_link` (`id`, `userid`, `link`, `name`) VALUES
(37, 1, 'https://www.facebook.com/ruiling.xu', 'facebook'),
(38, 1, 'https://www.instagram.com/zzxcv741/?hl=zh-tw', 'instagram'),
(39, 1, 'https://github.com/linglingsyu', 'Github'),
(40, 1, 'http://220.128.133.15/s1090221/  ', 'Portfolio');

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
(13, 1, '2020702052527.jpg', 'img/2020702052527.jpg', '0'),
(14, 1, '2020707091645.png', 'img/2020707091645.png', '0'),
(15, 1, '2020709075258.png', 'img/2020709075258.png', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `resume_profile`
--

CREATE TABLE `resume_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telshow` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lineid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lineshow` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intr` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_profile`
--

INSERT INTO `resume_profile` (`id`, `userid`, `name`, `enname`, `birthday`, `tel`, `telshow`, `email`, `live`, `lineid`, `lineshow`, `intr`) VALUES
(1, 1, '許瑞玲', 'Elsa Syu', '1988-11-26', '0955335369', '1', 'zzxcv741@hotmail.com', '桃園市', 't520131412', '1', '201402月初~201909月底在食品工廠擔任業務助理/客服/會計助理，想要轉職為前端/後端/全端網頁工程師故離職開始學習，技術努力精進中～！喜歡聽日本、華語、粵語抒情歌、沒事對PTT顆顆笑、看Youtube學些網頁技術、也很喜歡到日本自由行，更享受規劃旅程的過程，有同樣愛好者歡迎交流：）');

-- --------------------------------------------------------

--
-- 資料表結構 `resume_prot`
--

CREATE TABLE `resume_prot` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legend` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1.PHP 2.JS/JQ 3.BS 4.AI/PS 5.laravel 6.vue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_prot`
--

INSERT INTO `resume_prot` (`id`, `userid`, `name`, `pic`, `link`, `legend`, `sh`, `type`) VALUES
(1, 1, 'Calendar 萬年曆', 'img/2020709075657.png', 'http://220.128.133.15/s1090221/calendar/index.php', '使用PHP', 1, '1'),
(2, 1, '發票對獎系統', 'img/2020709080040.png', 'http://220.128.133.15/s1090221/invoice/index.php', '使用PHP+MySQL', 1, '1'),
(16, 1, 'afds', '', 'afsdf', 'asdfaf', 1, '1');

-- --------------------------------------------------------

--
-- 資料表結構 `resume_self`
--

CREATE TABLE `resume_self` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resume_self`
--

INSERT INTO `resume_self` (`id`, `userid`, `name`, `text`, `sh`) VALUES
(3, 1, '我的自傳', '一、	基本資料\n姓名：許瑞玲\n手機：0955-335-369\n學歷：國立雲林科技大學 企業管理系學士 200709~201106\n應徵職務：前端網頁工程師\n我出生於苗栗縣通宵鎮，但從小在桃園長大，雙親都是純樸誠實的老百姓，還有一個小我一歲的妹妹。從小，雙親就教導我們要有一個善良的心，腳踏實地做好自己的本分。雙親很重視我跟妹妹的品德教育，造就了我誠實木訥的個性，同時也為我的人際關係加分不少，從小就培養了良好的待人處世的道理。 我喜歡與人相處，隨和且有良好的溝通能力，個性較慢熟，溫文有禮，有良好的EQ與人際關係。 較為獨立，抗壓性高，有處理壓力的能力。面對新環境，我能夠快速融入，快速的熟悉環境及新事物。 \n\n二、	專業能力\n(1)	網頁前端技能：HTML/CSS、Javascript、jQery\n(2)	網頁後端技能：PHP、MySQL、Laravel\n(3)	繪圖軟體技能：Photoshop、Illustrator\n(4)	證照：網頁設計丙級、電腦軟體應用乙級\n\n三、	工作經驗 \n(1) 勞動力發展署北分署泰山職訓廠 – PHP資料庫網頁設計受訓\n202003~202008\n學習上述網頁前端、後端、繪圖軟體技能。\n(2)馥瑞馨國際有限公司 - 業務助理\n201402~201909\n負責接聽電話、製作訂單、安排出貨、請款、計算每日業績、製作每月報表等。\n★出貨速度客戶滿意度99%：每日準時出貨，不拖延交貨時間，讓客戶都能在限期內收到貨物。\n★每月跨部門會議，常與廠務部門主管協調出貨事宜，與部門間有良好的溝通。\n★持續改進出貨作業流程，從紙本作業全面改為網路作業，作業時間縮短30%。\n★發票作業由紙本改為電子發票，自行研究其作業流程並教導其他同仁。\n(3)聯府塑膠股份有限公司 - 會計助理\n201108~201208\n營業稅申報、製作整理主管交代之報表、整理傳票資料\n\n四、	未來展望\n在前公司累積了5年行政職的經驗，其中學習到如何與人溝通、說話的技巧以及職場上待人處事的方法。在科技業領域中雖然是個菜鳥，但我學習力快、有足夠的熱情、亦勇於接受新的挑戰，持續學習網頁相關技術，若有幸加入貴公司，我有信心自己能在一個月內上手新職務，順利執行主管所交代事項，期望在未來職涯的路上，能夠與貴公司一同成長。\n', 0),
(5, 1, 'shfg', 'hssghfsgfh', 0);

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

--
-- 傾印資料表的資料 `resume_skillback`
--

INSERT INTO `resume_skillback` (`id`, `userid`, `name`, `level`) VALUES
(2, 1, 'PHP+MySQL', '80');

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

--
-- 傾印資料表的資料 `resume_skillcert`
--

INSERT INTO `resume_skillcert` (`id`, `userid`, `name`, `level`) VALUES
(2, 1, '網頁設計', '丙級'),
(3, 1, '電腦軟體應用', '乙級');

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
(1, 1, 'HTML/CSS3', '90'),
(3, 1, 'Javascript', '50'),
(4, 1, 'jQuery', '50');

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

--
-- 傾印資料表的資料 `resume_skilllan`
--

INSERT INTO `resume_skilllan` (`id`, `userid`, `name`, `level`) VALUES
(2, 1, '中文', '100'),
(3, 1, '英文', '70'),
(4, 1, '台語', '80');

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

--
-- 傾印資料表的資料 `resume_skillsoft`
--

INSERT INTO `resume_skillsoft` (`id`, `userid`, `name`, `level`) VALUES
(3, 1, 'Photoshop', '70'),
(4, 1, 'Illustrator', '80');

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
-- 資料表索引 `resume_prot`
--
ALTER TABLE `resume_prot`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `resume_self`
--
ALTER TABLE `resume_self`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_picture`
--
ALTER TABLE `resume_picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_profile`
--
ALTER TABLE `resume_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_prot`
--
ALTER TABLE `resume_prot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_self`
--
ALTER TABLE `resume_self`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillback`
--
ALTER TABLE `resume_skillback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillcert`
--
ALTER TABLE `resume_skillcert`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillfront`
--
ALTER TABLE `resume_skillfront`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skilllan`
--
ALTER TABLE `resume_skilllan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `resume_skillsoft`
--
ALTER TABLE `resume_skillsoft`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
