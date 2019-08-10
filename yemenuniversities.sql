-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2019 at 12:21 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yemenuniversities`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bks_id` int(11) NOT NULL,
  `bks_name` varchar(40) NOT NULL,
  `bks_describtion` varchar(80) NOT NULL,
  `bks_url` varchar(200) NOT NULL,
  `bks_specification` int(11) NOT NULL,
  `bks_department` int(11) NOT NULL,
  `bks_year` tinyint(4) NOT NULL,
  `bks_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bks_id`, `bks_name`, `bks_describtion`, `bks_url`, `bks_specification`, `bks_department`, `bks_year`, `bks_status`) VALUES
(9, 'jp-20811542806894.pdf', 'HHHHHHHHHHHHHH', 'books/jp-20811542806894.pdf', 2, 16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(40) NOT NULL,
  `dep_describtion` varchar(5000) NOT NULL,
  `dep_img` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`, `dep_describtion`, `dep_img`) VALUES
(12, 'كلية الهندسة', 'هندسة ', ''),
(13, 'كلية الطب', 'كلية عجيبة جدا مكلفة ومزعجة  نلاتررا ', ''),
(14, 'كلية الفنون', 'كلية الرسم والجنان ترلر لؤءفي فيفيف ارارابغبغ نعلهلعهل تابفيق5سي5قءق', ''),
(15, 'كلية الاداره', '       تااتي تغلبغي شسلسش ايساسي شيانتى سشمهايهخ ببببببببببببببببب', ''),
(16, 'كلية الحاسوب', 'تلعلع', ''),
(17, 'كلية اللغات', ' مشتىتش ثعابعثي ثباث', '');

-- --------------------------------------------------------

--
-- Table structure for table `depspc`
--

CREATE TABLE `depspc` (
  `dpsp_department` int(11) NOT NULL,
  `dpsp_specification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_name` varchar(20) NOT NULL,
  `post` varchar(500) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_name`, `post`, `image`) VALUES
(1, 'منح لاستراليا', 'اليئئثشقصًس', ''),
(2, 'منحة لصين', 'صح', '');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `spc_id` int(11) NOT NULL,
  `spc_name` varchar(40) NOT NULL,
  `spc_describtion` varchar(5000) NOT NULL,
  `spc_bestuni` varchar(2500) NOT NULL,
  `spc_aftergrad` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`spc_id`, `spc_name`, `spc_describtion`, `spc_bestuni`, `spc_aftergrad`) VALUES
(2, ' cs', '  علوم الحاسوب', 'جامعة المستقبل ياسعم', '     \r\n'),
(3, 'IS', 'نظام المعلومات', '', ''),
(5, 'حيوانية', '', ' جامعة صنعاء', ''),
(8, 'قران', '', '', ''),
(9, 'المالية', ' ليرر سيتلا', ' ', ''),
(10, 'زراعة', ' مدري', 'جامعة صنعاء', ' تزرع وتحرث الارض'),
(12, 'IT', ' تقنية المعلومات', 'جامعة الهوى', 'فرمته هه'),
(13, ' نباتي', ' نباتي يعني نباتي', 'مافي', ''),
(14, 'ترجمة', ' ترجمه الللغة العربية الى الانجبيزية', ' جامعة صنعاء', ''),
(15, 'فني اسنان', ' يعمل على عمل تركيبات للاسنان', ' العلوم', ''),
(16, 'الحاصل 123', ' مىبىبهثىبث يييييييييييييييييييييييييييييييييييي', 'سسبيضض', 'ي'),
(17, 'مساعد طبيب', ' بسرسي سس', 'اااااااااااااا', ''),
(18, 'صصصص', 'يسي', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `unidep`
--

CREATE TABLE `unidep` (
  `undp_university` int(11) NOT NULL,
  `undp_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unidep`
--

INSERT INTO `unidep` (`undp_university`, `undp_department`) VALUES
(6, 12),
(7, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(7, 17);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` int(11) NOT NULL,
  `uni_name` varchar(40) NOT NULL,
  `uni_describtion` varchar(5000) NOT NULL,
  `uni_pros` varchar(3000) NOT NULL,
  `uni_cons` varchar(3000) NOT NULL,
  `uni_contacts` varchar(2500) NOT NULL,
  `uni_certification` varchar(2500) NOT NULL,
  `uni_img` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `uni_name`, `uni_describtion`, `uni_pros`, `uni_cons`, `uni_contacts`, `uni_certification`, `uni_img`) VALUES
(6, 'جامعة صنعاء', '', '', '', '', '', ''),
(7, 'جامعة الحكمة', 'جامهة رائعة ياسعم', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(10) UNSIGNED NOT NULL,
  `usr_username` varchar(40) NOT NULL,
  `usr_password` varchar(32) NOT NULL,
  `usr_name` varchar(50) NOT NULL,
  `usr_type` tinyint(4) NOT NULL,
  `usr_regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_username`, `usr_password`, `usr_name`, `usr_type`, `usr_regdate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 0, '2017-08-17 22:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid_id` int(11) NOT NULL,
  `vid_name` varchar(40) NOT NULL,
  `vid_describtion` varchar(80) NOT NULL,
  `vid_url` varchar(200) NOT NULL,
  `vid_specification` int(11) NOT NULL,
  `vid_year` tinyint(4) NOT NULL,
  `vid_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid_id`, `vid_name`, `vid_describtion`, `vid_url`, `vid_specification`, `vid_year`, `vid_status`) VALUES
(1, '', ' فيديوا تحفيزي', 'https://www.youtube.com/embed/oWs10OYZU_8', 12, 1, 0),
(2, '', 'اغنية', 'https://www.youtube.com/embed/nn5PgeXMq8w', 3, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bks_id`),
  ADD KEY `bks_specification` (`bks_specification`),
  ADD KEY `bks_department` (`bks_department`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `dep_name` (`dep_name`);

--
-- Indexes for table `depspc`
--
ALTER TABLE `depspc`
  ADD UNIQUE KEY `dpsp_department` (`dpsp_department`,`dpsp_specification`),
  ADD KEY `dpsp_specification` (`dpsp_specification`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`spc_id`),
  ADD UNIQUE KEY `spc_name` (`spc_name`);

--
-- Indexes for table `unidep`
--
ALTER TABLE `unidep`
  ADD UNIQUE KEY `undp_university` (`undp_university`,`undp_department`),
  ADD KEY `undp_department` (`undp_department`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`),
  ADD UNIQUE KEY `uni_name` (`uni_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_username` (`usr_username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid_id`),
  ADD KEY `vid_specification` (`vid_specification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `spc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bks_specification`) REFERENCES `specifications` (`spc_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`bks_department`) REFERENCES `departments` (`dep_id`);

--
-- Constraints for table `depspc`
--
ALTER TABLE `depspc`
  ADD CONSTRAINT `depspc_ibfk_1` FOREIGN KEY (`dpsp_department`) REFERENCES `departments` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `depspc_ibfk_2` FOREIGN KEY (`dpsp_specification`) REFERENCES `specifications` (`spc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `unidep`
--
ALTER TABLE `unidep`
  ADD CONSTRAINT `unidep_ibfk_1` FOREIGN KEY (`undp_university`) REFERENCES `universities` (`uni_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unidep_ibfk_2` FOREIGN KEY (`undp_department`) REFERENCES `departments` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
