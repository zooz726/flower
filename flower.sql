-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower`
--

-- --------------------------------------------------------

--
-- Table structure for table `flowers`
--

CREATE TABLE `flowers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flowers`
--

INSERT INTO `flowers` (`id`, `title`, `description`, `image`, `price`) VALUES
(1, 'ليلوم', 'زهور جميلة متوفرة بعدة ألوان منها الأبيض والأصفر والوردي', 'img/liliB.jpg', 15),
(2, 'هيدرنحا', 'زهور فريدة بألوان مميزة منها الأزرق والبنفسجي والأبيض', 'img/hydren.jpg', 10),
(3, 'بيوني', 'زهور جميلة وتصبح أجمل عندما تتفتح وألوانها جميلة ومشرقة', 'img/peonyB.jpg', 15),
(4, 'توليب', 'زهور ربيعية معروفة برقتها وألوانها المميزة', 'img/tolipB.jpg', 10),
(5, 'روز', 'أكثر الزهور شهرةً وتفضيلًا لدى العملاء', 'img/roseB.jpg', 6),
(6, 'بيبي روز', 'زهور صغيرة جميلة ', 'img/babyRoseB.jpg', 9),
(7, 'الباقة البنفسجية', '', 'img/purplB.jpg', 140),
(8, 'الباقة الوردية', '', 'img/pinkB.jpg', 130),
(9, 'الباقة الرقيقة', '', 'img/lightB.jpg', 130),
(10, 'الفازة الوردية', '', 'img/redV.jpg', 150),
(11, 'فازة الأفراح ', '', 'img/pinkV.jpg', 210),
(12, 'فازة الصباح', '', 'img/lightV.jpg', 180);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `house_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `price`) VALUES
(1, 'تنسيق حفلات', 'خدمة تنسيق الحفلات وجميع المناسبات', 'img/partyde.jpg', 800),
(3, 'العناية بالنباتات', 'نقدم خدمات العناية بالنباتات للحفاظ على صحتها ونموها', 'img/planets.jpg', 800),
(4, 'تنسيق المداخل', 'تنسيق مداخل للمنازل والشركات حسب اختيار العميل', 'img/entrence.jpg', 1200),
(6, 'تنسيق الحدائق ', 'تنسيق الحدائق المنزلية', 'img/internalGarden.jpg', 900);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `additional` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `saled` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `user_id`, `sub_type`, `size`, `location`, `style`, `type`, `additional`, `color`, `note`, `saled`, `price`) VALUES
(12, 1, 'صغير', 'صغير', 'مكتب', 'موسمي', 'باقة', 'كرت تهنئة', '', '', 'cart', 350),
(13, 1, 'متوسط', 'صغير', 'مكتب', 'موسمي', 'باقة', 'كرت تهنئة', '', '', 'cart', 550),
(14, 1, 'بيوني', '-', '-', '-', '-', '-', '-', '-', 'cart', 15),
(15, 1, 'روز', '-', '-', '-', '-', '-', '-', '-', 'cart', 6),
(16, 1, 'تنسيق الحفلات', '-', '-', '-', '-', '-', '-', '-', 'cart', 800),
(17, 1, 'العناية بالنباتات', '-', '-', '-', '-', '-', '-', '-', 'cart', 800),
(18, 1, 'هيدرنجا', '-', '-', '-', '-', '-', '-', '-', 'cart', 10),
(19, 1, 'الباقة الوردية', '-', '-', '-', '-', '-', '-', '-', 'cart', 130),
(20, 1, 'تنسيق المداخل', '-', '-', '-', '-', '-', '-', '-', 'cart', 1200),
(21, 1, 'صغير', 'صغير', 'مكتب', 'موسمي', 'باقة', 'كرت تهنئة', '', '', 'cart', 350),
(22, 1, 'الباقة الوردية', '-', '-', '-', '-', '-', '-', '-', 'cart', 130),
(23, 1, 'فازة الصباح', '-', '-', '-', '-', '-', '-', '-', 'cart', 180),
(26, 2, 'تنسيق الحدائق ', '-', '-', '-', '-', '-', '-', '-', 'cart', 900),
(27, 2, 'كبير', 'صغير', 'مكتب', 'موسمي', 'باقة', 'كرت تهنئة', '', '', 'cart', 750),
(29, 3, 'تنسيق الحفلات', '-', '-', '-', '-', '-', '-', '-', 'cart', 800),
(30, 3, 'متوسط', 'صغير', 'مكتب', 'موسمي', 'باقة', 'كرت تهنئة', '', '', 'cart', 550),
(31, 3, 'تنسيق الحدائق', '-', '-', '-', '-', '-', '-', '-', 'cart', 900);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `location`, `image`) VALUES
(3, 'admin1', 'admin1', 'admin1@gmail.com', '-098765456789', 'ksa', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flowers`
--
ALTER TABLE `flowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
