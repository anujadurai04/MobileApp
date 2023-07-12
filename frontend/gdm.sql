-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 07:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `gdm_admin_users`
--

CREATE TABLE `gdm_admin_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `role` int(11) NOT NULL,
  `user_active` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gdm_admin_users`
--

INSERT INTO `gdm_admin_users` (`user_id`, `username`, `password`, `name`, `user_email`, `user_phone`, `role`, `user_active`, `user_status`, `user_timeStamp`) VALUES
(1, 'superadmin', '$2y$10$jNHke/iWD6ZHLLRe/1oha.b.jLuxuM.rttCaVzI8SGFgglY7hNgEK', 'JDMobile', 'admin@jdmobile.com', '9899899897', 1, 0, 1, '2023-05-31 14:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `gdm_app_users`
--

CREATE TABLE `gdm_app_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `user_active` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `login_flag` int(11) DEFAULT 0,
  `user_timeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gdm_app_users`
--

INSERT INTO `gdm_app_users` (`user_id`, `username`, `password`, `name`, `profile_pic`, `user_email`, `user_phone`, `user_active`, `user_status`, `login_flag`, `user_timeStamp`) VALUES
(1, 'admin123', '$2y$10$fe1sdpYi9Snzh1m5A0x/p.nYHm.LzraVmI8sAQ8tFFnEYkI0u87QC', 'raj', NULL, 'raj@bootmacro.com', '9789115416', 0, 2, 0, '2021-07-04 21:20:08'),
(2, 'SDSD', '$2y$10$CxRBij/j13ov8XyorxIDV.xTCPNG3YbN8CX4W8Z32WSpps5OB9B/C', 'superadmin', NULL, 'WEWE@SDSD.CO', '123', 0, 2, 0, '2021-03-29 05:32:11'),
(3, 'marhesh', '$2y$10$uscx9klz5.9AaNVd8J8GVO1o9GfoHpdeDCw7fNVogxMxxpAPs4bgy', 'Raj', NULL, 'marhesh2@gmail.com', '8056773503', 0, 1, 0, '2021-05-05 16:49:40'),
(4, 'marhesh2', '$2y$10$p4zWmKiUgFgD0ptxsQZfReqwulxmqV7.wZqLRusKQalMtBEuWTPbS', 'Raj', NULL, 'marhesh2@gmail.com', '1234567890', 0, 2, 0, '2021-05-30 00:45:25'),
(5, 'admin321', '$2y$10$Cx6vTCsrRq1UXgElbdT3U.AMTIybivV/u1mb7l4aBuzFHxwd.yncy', 'Raj', NULL, 'marhesh@gmail.co', '1231231234', 0, 2, 0, '2021-04-08 05:47:40'),
(6, 'admbn', '$2y$10$nVrrqXFdoJhvluquaptZoOATsZOzPawJsXwSemrJwwpcspP4VA/gO', 'rajq', NULL, 'marhesh@ds.co', '9809809807', 0, 2, 0, '2021-04-08 05:49:59'),
(7, 'jkjkdldl', '$2y$10$qFs.zFo6.8zI0s6LsqNVaeAPh5OApLAN5vj0HDVwrDFcci17.P8BO', 'marhesh', NULL, 'weweaa@dsd.co', '1231231234', 0, 2, 0, '2021-04-08 05:51:25'),
(8, 'sdsdsd', '$2y$10$QvJvb/qucS5.HCcAGOCW/.uenE6Hxu7fQlWH1JDwOS.uN9NcJzRyC', 'Raj', NULL, 'marhesh@gms.oc', '9879879879', 0, 2, 0, '2021-04-08 05:53:45'),
(9, 'test', '$2y$10$rd/m5j0/KOWP/SHsa1aldOo1YfKyQTprKja3auhegkwp.fLfbJHeK', 'raj', NULL, 'mar@gm.co', '1231231234', 0, 2, 0, '2021-04-08 06:00:32'),
(10, 'tssfsf', '$2y$10$r.AxoBY0WK4Ccrc9OWcF4.KGfiqw6E7a8mNup9PbrajYDa4rCygeS', 'rwrw', NULL, 'marhesh@fmd.co', '1231231234', 0, 2, 0, '2021-04-08 06:02:05'),
(11, 'admin12121212', '$2y$10$ENPkQWO.bnWi0lvvcOURPe6oN/gC5LMhIUbAgrRj.j2FRpAxSMsJW', 'test', NULL, 'marheh@fmd.cxo', '1231231234', 0, 2, 0, '2021-06-09 21:33:04'),
(12, 'Raj123123', '$2y$10$LrMR6aQ9dMQ3TMm2aa5d6uezX22.8Wjot/f5XAq1FJgH6UcOBYU72', 'Raj', NULL, 'raj@gdm.com', '1231231234', 0, 2, 0, '2021-04-08 06:18:36'),
(13, 'jkjlkjljlkjl', '$2y$10$LwqSxftJatamvgJkN46FSe5te2/wSg/0Ka3XX5wotJDopBEic4xZm', 'raj', NULL, 'marheh@fma.co', '1231231234', 0, 2, 0, '2021-04-08 06:20:30'),
(14, 'nmcf', '$2y$10$dhFsWAR4quJfZlxx3hlrPuuBBwIr4wSxDAIR1B4IF9QPHS1qZlyyi', 'mdmdmd', NULL, 'asddd@df.co', '1231231234', 0, 2, 0, '2021-04-08 06:23:09'),
(15, 'marhesh123', '$2y$10$ej.ycVK/XCF41G8lT4WwlOFTPWVFpTILu8uekbU2wo6tdegZ.r.PC', 'Raj', NULL, 'marhesh2@gmail.com', '1231231231', 0, 2, 0, '2021-05-30 00:26:20'),
(16, 'rajraj', '$2y$10$BRUFVfCeSWn1UwLNquCm3.gHVq9hIyLjdCYs8rDftm.j1grkHNgbm', 'Raj', '647f3882e61cd_6.png', 'raj@rajk.lc', '8508886001', 0, 2, 0, '2023-06-06 13:45:38'),
(17, 'marhesh1977', '$2y$10$DdZfcLPJ0RTCG.U4HMjqUew3BJC/EEkNgTOmw5Dh28.j1SDxOWykm', 'Raj', NULL, 'marhesh@gmail.com', '8056773503', 0, 1, 0, '2023-03-20 10:53:14'),
(26, NULL, NULL, 'ara', NULL, NULL, '9976428291', 1, NULL, 0, '2023-05-31 13:29:53'),
(27, NULL, NULL, 'Aravind 3566', '6478942614f61_campbell-3ZUsNJhi_Ik-unsplash.jpg', NULL, '8973098084', 1, NULL, 0, '2023-06-01 12:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `gdm_products`
--

CREATE TABLE `gdm_products` (
  `gdm_prod_id` int(8) NOT NULL,
  `gdm_prod_cat_id` int(11) NOT NULL,
  `gdm_prod_brand_id` int(11) NOT NULL,
  `gdm_prod_name` varchar(255) NOT NULL,
  `gdm_prod_code` varchar(255) NOT NULL,
  `gdm_prod_desc` text NOT NULL,
  `gdm_prod_image` text NOT NULL,
  `gdm_prod_price` decimal(10,2) NOT NULL,
  `gdm_prod_min_qty` int(11) NOT NULL,
  `gdm_prod_stock` int(11) UNSIGNED NOT NULL,
  `gdm_prod_offer` int(11) NOT NULL,
  `gdm_prod_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gdm_products`
--

INSERT INTO `gdm_products` (`gdm_prod_id`, `gdm_prod_cat_id`, `gdm_prod_brand_id`, `gdm_prod_name`, `gdm_prod_code`, `gdm_prod_desc`, `gdm_prod_image`, `gdm_prod_price`, `gdm_prod_min_qty`, `gdm_prod_stock`, `gdm_prod_offer`, `gdm_prod_timestamp`) VALUES
(1, 24, 2, '7262', '7262', 'Mobile Switch', '', '120.00', 2, 100, 0, '2023-05-14 10:17:59'),
(2, 23, 6, 'Sam J710', 'J710', 'Samsung mobile on-off strip', '', '300.00', 2, 100, 0, '2023-05-18 14:18:55'),
(3, 3, 6, 'Sam 5830 B.Cam', 'SAM5830', 'Samsung 5830 back camera for mobile', '', '800.00', 2, 0, 0, '2023-05-14 10:18:04'),
(4, 26, 3, 'Y75', 'Y75', 'Outer Sim Tray ', '', '55.00', 10, 100, 0, '2023-05-14 10:18:05'),
(5, 10, 1, 'Mi 5A Frame', 'Mi5A', 'Frame for Mi mobile ', '', '100.00', 2, 96, 0, '2023-05-14 10:18:07'),
(6, 3, 6, 'Sam 5830 B.Cam2', 'SAM58302', 'Samsung 58302 back camera for mobile', '', '810.00', 2, 90, 0, '2023-05-14 10:18:09'),
(7, 3, 6, 'Sam 5830 B.Cam3', 'SAM58303', 'Samsung 58303 back camera for mobile', '', '830.00', 2, 92, 0, '2023-05-14 10:18:11'),
(8, 10, 11, 'Gioneea 1 plus', 'GPF1', 'Gioneea 1 Plus frame', '', '120.00', 5, 95, 0, '2023-05-14 10:18:13'),
(9, 10, 8, 'LenovoK5 note', 'LK5N', 'Lenovo K5 Plus frame', '', '121.00', 5, 90, 0, '2023-05-14 10:18:14'),
(10, 10, 1, 'Mi A 1hj', 'MiA1', 'Mi A1 Frame', '', '120.00', 5, 90, 0, '2023-05-14 10:18:15'),
(11, 10, 1, 'Mi Maz 2', 'MiXA2', 'Mi Max 2 Frame', '', '118.00', 5, 90, 0, '2023-05-14 10:18:16'),
(12, 10, 1, 'Mi Note 6 Pro', 'MiN6', 'Mi Note 6 Pros', '', '118.00', 5, 90, 0, '2023-05-14 10:18:17'),
(13, 10, 1, 'Mi Note 7', 'MiN7', 'Mi Note 7 Frame', '', '120.00', 5, 90, 0, '2023-05-14 10:18:18'),
(14, 1, 1, 'Bizarris', 'qw1233', 'dfsdfs', '', '120.20', 12, 90, 20, '2023-05-14 10:18:19'),
(15, 1, 1, 'Test123', 'test123', 'test trst', '', '123.00', 100, 0, 0, '2023-05-14 10:18:20'),
(16, 1, 1, 'test233', 'ererer', 'tetst', '', '123.00', 765, 67, 0, '2023-05-14 10:18:20'),
(17, 1, 1, 'Test Prod', 'prt01', 'Its test prod', '', '100.00', 10, 200, 0, '2023-06-07 12:08:34'),
(18, 1, 7, 'test', 'test12', 'test', '', '123.00', 12, 120, 5, '2023-05-28 13:57:14'),
(19, 3, 15, 'Pro Test', 'PY0213', 'Its test pro', '647cc564a8d7d_2.png', '123.00', 34, 100, 6, '2023-06-04 17:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_bank`
--

CREATE TABLE `jdm_bank` (
  `jdm_pay_id` int(11) NOT NULL,
  `jdm_pay_name` varchar(150) NOT NULL,
  `jdm_pay_number` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_bank`
--

INSERT INTO `jdm_bank` (`jdm_pay_id`, `jdm_pay_name`, `jdm_pay_number`) VALUES
(1, 'Phone Pay', '1234567890@phonepay'),
(2, 'Google Pay', '1234567890@googlepay');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_banner`
--

CREATE TABLE `jdm_banner` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `banner_desc` varchar(500) DEFAULT NULL,
  `banner_img` varchar(500) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_banner`
--

INSERT INTO `jdm_banner` (`id`, `product_id`, `banner_desc`, `banner_img`, `created_on`) VALUES
(7, 3, 'ss', '64806c9e15bbe_campbell-3ZUsNJhi_Ik-unsplash.jpg', '2023-06-07 17:10:14'),
(8, 5, 'ss', '64806d5acc5b4_7.png', '2023-06-07 17:13:22'),
(9, 16, 'dd', '64806d6a6e8af_2.png', '2023-06-07 17:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_billing_address`
--

CREATE TABLE `jdm_billing_address` (
  `jdm_ba_id` int(11) NOT NULL,
  `jdm_ba_name` varchar(150) NOT NULL,
  `jdm_ba_company` varchar(150) NOT NULL,
  `jdm_ba_address1` varchar(150) NOT NULL,
  `jdm_ba_address2` varchar(150) NOT NULL,
  `jdm_ba_state` int(11) NOT NULL,
  `jdm_ba_pincode` int(11) NOT NULL,
  `jdm_ba_uniqid` varchar(30) NOT NULL,
  `jdm_ba_userId` int(11) NOT NULL,
  `jdm_ba_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_billing_address`
--

INSERT INTO `jdm_billing_address` (`jdm_ba_id`, `jdm_ba_name`, `jdm_ba_company`, `jdm_ba_address1`, `jdm_ba_address2`, `jdm_ba_state`, `jdm_ba_pincode`, `jdm_ba_uniqid`, `jdm_ba_userId`, `jdm_ba_timestamp`) VALUES
(1, 'Mahendra Raj', 'RSR Marketing', '123 Coimbatore', 'Coimbatore', 31, 123123, 'ord60658b27be312', 1, '2021-04-01 10:42:31'),
(2, 'Raj', 'Raj', '12 raj', 'cook', 31, 123, 'ord606803fb16973', 1, '2021-04-03 05:58:47'),
(3, 'coi', 'coi', '123 wer', 'cfg', 31, 123123, 'ord60680499377db', 1, '2021-04-03 06:02:04'),
(4, 'Raj', 'Raj', '123 no', 'Cbe', 31, 123123, 'ord6069f2f1d42bb', 1, '2021-04-04 17:10:31'),
(5, 'Raj', 'Raj', '123 Ind', 'coim', 31, 123123, 'ord6069fa067b3de', 1, '2021-04-04 17:40:47'),
(6, 'rajq', 'test', '123 re', 'cbe', 31, 641047, 'ord606ec3595cb37', 3, '2021-04-08 08:48:59'),
(7, 'Ram', 'Ram', '12 sdf', 'coi', 31, 123456, 'ord607bcac0ec0de', 1, '2021-04-18 06:00:10'),
(8, 'raj', 'rsj', '123 ras', 'cbe', 31, 123123, 'ord609f33b229071', 1, '2021-05-15 02:41:13'),
(9, 'wasas', 'aas', '123 sdf', 'cbe', 33, 123123, 'ord609f35ebd35a7', 1, '2021-05-15 02:46:35'),
(10, 'wasas', 'aas', '123 sdf', 'cbe', 33, 123123, 'ord609f36829a2b9', 1, '2021-05-15 02:48:49'),
(11, 'sdsd', 'sdsd', '123 asd', 'cbe', 16, 123123, 'ord609f390240504', 1, '2021-05-15 02:59:42'),
(12, 'cvcvcv', 'wer', '123 sdf', 'cbe', 31, 123123, 'ord609f3a72550ae', 1, '2021-05-15 03:05:55'),
(13, 'test', 'testst', '123 wercbe', 'cbd', 13, 123123, 'ord609f3bc2db965', 1, '2021-05-15 03:11:40'),
(14, 'tst', 'wewe', '12we', 'cbs', 31, 641023, 'ord60a3f8d469bd0', 1, '2021-05-18 17:28:10'),
(15, 'dfds', 'ada', '123ads', 'cbe', 1, 123412, 'ord60a3f9e7e8d5c', 1, '2021-05-18 17:31:51'),
(16, 'sdsd', 'sdsd', '123sd', 'asd', 31, 123123, 'ord60a3fb3c608c0', 1, '2021-05-18 17:37:25'),
(17, 'asdsad', 'qwe', '123asda', 'yrwe', 15, 123123, 'ord60a3fbbfc250a', 1, '2021-05-18 17:39:35'),
(18, 'twrs', 'dfsdf', '123df', 'test', 31, 123123, 'ord60a4c95c2c018', 1, '2021-05-19 08:16:54'),
(19, 'twsgfsg', '123dfd', '123sdf', 'ert', 31, 123123, 'ord60a4c9ea456a4', 1, '2021-05-19 08:19:21'),
(20, 'test', 'tst', '123tssf', 'te', 31, 123123, 'ord60a4ca80d80d5', 1, '2021-05-19 08:21:49'),
(21, 'tsssj', 'rere123', 'wewe12', 'we', 31, 123123, 'ord60a4caf376b68', 1, '2021-05-19 08:23:35'),
(22, 'yeyeyq', 'wert', '12we', 'tsd', 31, 123123, 'ord60a4cb812d504', 1, '2021-05-19 08:25:57'),
(23, 'tsr', 'company', '123trsf', 'cbe', 31, 123123, 'ord60a4cc60cc79c', 1, '2021-05-19 08:29:56'),
(24, 'test', 'com', '123 str', 'cbe', 31, 123123, 'ord60a4cd06d7d13', 1, '2021-05-19 08:32:32'),
(25, 'Raj', 'ANC Cpm', '123 St 1', 'cbe', 31, 123123, 'ord60a4cdd66fcd9', 1, '2021-05-19 08:36:08'),
(26, 'trdf', 'abc', '123 str', 'cbe', 31, 123123, 'ord60a4ceb7d3d84', 1, '2021-05-19 08:39:57'),
(27, 'Test', 'AMB', '123 St 1', 'cbe', 31, 123123, 'ord60a4cff2f0e0f', 1, '2021-05-19 08:45:04'),
(28, 'Raj', 'Raj n co', '123 raj', 'coim', 8, 123123, 'ord60b1f28b23f98', 15, '2021-05-29 07:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_brand`
--

CREATE TABLE `jdm_brand` (
  `jdm_brand_id` int(11) NOT NULL,
  `jdm_brand_name` varchar(150) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `jdm_brand_active` int(11) NOT NULL,
  `jdm_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_brand`
--

INSERT INTO `jdm_brand` (`jdm_brand_id`, `jdm_brand_name`, `category_id`, `subcategory_id`, `jdm_brand_active`, `jdm_timestamp`) VALUES
(1, 'mi', 1, 1, 0, '2023-06-04 16:53:57'),
(2, 'vivo', 3, 2, 0, '2023-06-04 16:54:05'),
(3, 'oppo', 3, 2, 0, '2023-06-05 14:44:55'),
(4, 'nokia', 3, 2, 0, '2023-06-05 14:47:07'),
(5, 'one plus', 2, NULL, 0, '2023-06-06 13:04:22'),
(6, 'samsung', 8, NULL, 0, '2023-06-06 13:04:27'),
(7, 'honor', 2, NULL, 0, '2023-06-06 13:04:32'),
(8, 'lenovo', NULL, NULL, 0, '2021-04-07 05:03:22'),
(9, 'moto', NULL, NULL, 0, '2021-04-07 05:03:22'),
(10, 'sony', NULL, NULL, 0, '2021-04-07 05:03:22'),
(11, 'gionee', NULL, NULL, 0, '2021-04-07 05:03:22'),
(12, 'iphone', NULL, NULL, 0, '2021-04-07 05:03:22'),
(13, 'lava', NULL, NULL, 0, '2021-04-07 05:03:22'),
(14, 'lg', NULL, NULL, 0, '2021-04-07 05:03:22'),
(15, 'micromax', NULL, NULL, 0, '2021-04-07 05:03:22'),
(16, 'xolo', 4, NULL, 0, '2023-06-06 15:20:14'),
(17, 'lyf', NULL, NULL, 0, '2021-04-07 05:03:22'),
(18, 'asus', NULL, NULL, 0, '2021-04-07 05:03:22'),
(19, 'infnex', NULL, NULL, 0, '2021-04-07 05:03:22'),
(20, 'tecno', NULL, NULL, 0, '2021-04-07 05:03:22'),
(21, 'karbon', NULL, NULL, 0, '2021-04-07 05:03:22'),
(22, 'itel', NULL, NULL, 0, '2021-04-07 05:03:22'),
(23, 'comiyo', NULL, NULL, 0, '2021-04-07 05:03:22'),
(24, 'coolpad', NULL, NULL, 0, '2021-04-07 05:03:22'),
(25, 'htc', NULL, NULL, 0, '2021-04-07 05:03:22'),
(27, 'Demo test', 1, 1, 0, '2023-06-04 16:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_category`
--

CREATE TABLE `jdm_category` (
  `jdm_cate_id` int(11) NOT NULL,
  `jdm_cate_name` varchar(50) NOT NULL,
  `jdm_cate_desc` varchar(50) NOT NULL,
  `jdm_cate_active` int(11) NOT NULL,
  `jdm_cat_image` varchar(255) DEFAULT NULL,
  `jdm_catetimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_category`
--

INSERT INTO `jdm_category` (`jdm_cate_id`, `jdm_cate_name`, `jdm_cate_desc`, `jdm_cate_active`, `jdm_cat_image`, `jdm_catetimestamp`) VALUES
(1, 'All Mix Products', 'All mixed products', 0, '647c91a2cd005_evgeny-tchebotarev-aiwuLjLPFnU-unsplash.jpg', '2023-06-04 13:29:08'),
(2, 'Antenna Wire', 'Antenna cable wire', 0, 'no-image.png', '2023-04-19 03:04:10'),
(3, 'Back Camera', 'Back camera for all major models', 0, 'no-image.png', '2023-04-19 03:04:10'),
(4, 'Battery Connector', 'Battery connector for mobile', 0, 'no-image.png', '2023-04-19 03:04:10'),
(5, 'Camera Glass', 'Mobile camera cover', 0, 'no-image.png', '2023-04-19 03:04:10'),
(6, 'Charger / Cable', 'Mobile charge & Cable', 0, 'no-image.png', '2023-04-19 03:04:10'),
(7, 'Charging Board', 'Mobile charging board', 0, 'no-image.png', '2023-04-19 03:04:10'),
(8, 'Charging Connector', 'Mobile charging connector', 0, 'no-image.png', '2023-04-19 03:04:10'),
(9, 'Finger Print', 'Mobile finger print', 0, 'no-image.png', '2023-04-19 03:04:10'),
(10, 'Frame', 'Mobile frame', 0, 'no-image.png', '2023-04-19 03:04:10'),
(11, 'Front Camera', 'Mobile front camera', 0, 'no-image.png', '2023-04-19 03:04:10'),
(12, 'Full Ringer', 'Mobile full ringer', 0, 'no-image.png', '2023-04-19 03:04:10'),
(13, 'H/F Strip', 'Mobile H/F strip', 0, 'no-image.png', '2023-04-19 03:04:10'),
(14, 'Headphone Connector', 'Mobile headphone connector', 0, 'no-image.png', '2023-04-19 03:04:10'),
(15, 'Home Button', 'Mobile home button', 0, 'no-image.png', '2023-04-19 03:04:10'),
(16, 'IC', 'Mobile IC', 0, 'no-image.png', '2023-04-19 03:04:10'),
(17, 'Inner SIM Tray', 'Mobile inner sim tray', 0, 'no-image.png', '2023-04-19 03:04:10'),
(18, 'Battery', 'Mobile internal replacement battery', 0, 'no-image.png', '2023-04-19 03:04:10'),
(19, 'LCD Connector', 'Mobile lcd connector', 0, 'no-image.png', '2023-04-19 03:04:10'),
(20, 'LCD Strip', 'Mobile LCD strip', 0, 'no-image.png', '2023-04-19 03:04:10'),
(21, 'Mic', 'Mobile mic', 0, 'no-image.png', '2023-04-19 03:04:10'),
(22, 'Mic Board', 'Mobile mic board', 0, 'no-image.png', '2023-04-19 03:04:10'),
(23, 'On / Off Strip', 'Mobile on / off strip', 0, 'no-image.png', '2023-04-19 03:04:10'),
(24, 'On / Off Swtich', 'Mobile on/off switch', 0, 'no-image.png', '2023-04-19 03:04:10'),
(25, 'Outer On / Off Button', 'Mobile outer on/off button', 0, 'no-image.png', '2023-04-19 03:04:10'),
(26, 'Outer SIM Tray', 'Mobile outer sim tray', 0, 'no-image.png', '2023-04-19 03:04:10'),
(27, 'Panel Back Door', 'Mobile panel back door', 0, 'no-image.png', '2023-04-19 03:04:10'),
(28, 'Ringer', 'Mobile ringer', 0, 'no-image.png', '2023-04-19 03:04:10'),
(29, 'Spekar', 'Mobile spekar', 0, 'no-image.png', '2023-04-19 03:04:10'),
(30, 'Tools', 'Mobile tools', 0, 'no-image.png', '2023-04-19 03:04:10'),
(31, 'Vibrator', 'Mobile vibrator', 0, 'no-image.png', '2023-04-19 03:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_forget_password`
--

CREATE TABLE `jdm_forget_password` (
  `forget_password_id` int(11) NOT NULL,
  `forget_password_user_id` int(10) NOT NULL,
  `forget_password_token` varchar(15) NOT NULL,
  `forget_password_active` int(10) NOT NULL,
  `forget_password_time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_forget_password`
--

INSERT INTO `jdm_forget_password` (`forget_password_id`, `forget_password_user_id`, `forget_password_token`, `forget_password_active`, `forget_password_time_stamp`) VALUES
(1, 2, '0822044e81', 1, '2021-04-16 16:55:22'),
(2, 2, 'a71d9cf0fa', 1, '2021-04-16 16:28:39'),
(3, 2, '8c8c6c22eb', 1, '2021-04-17 04:12:20'),
(4, 1, 'eeec7b6a0d', 1, '2021-04-19 06:22:13'),
(5, 4, 'bce5e136bc', 1, '2021-05-29 15:33:24'),
(6, 11, '3286', 0, '2021-06-09 21:32:07'),
(7, 11, '7233', 0, '2021-06-09 21:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_order`
--

CREATE TABLE `jdm_order` (
  `jdm_order_id` int(11) NOT NULL,
  `jdm_order_prod_id` int(11) DEFAULT NULL,
  `jdm_order_qty` int(11) DEFAULT NULL,
  `jdm_order_confirm` int(11) DEFAULT 0,
  `jdm_order_placed` int(11) DEFAULT 0,
  `jdm_order_uniqid` varchar(30) DEFAULT NULL,
  `jdm_order_userid` int(11) DEFAULT NULL,
  `product_price` varchar(255) DEFAULT NULL,
  `jdm_order_sessid` varchar(50) DEFAULT NULL,
  `order_active` int(11) DEFAULT NULL,
  `jdm_order_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_order`
--

INSERT INTO `jdm_order` (`jdm_order_id`, `jdm_order_prod_id`, `jdm_order_qty`, `jdm_order_confirm`, `jdm_order_placed`, `jdm_order_uniqid`, `jdm_order_userid`, `product_price`, `jdm_order_sessid`, `order_active`, `jdm_order_timestamp`) VALUES
(47, 1, 20, 1, 1, 'ord6069fa067b3de', 1, NULL, '', 0, '2021-04-04 17:40:47'),
(55, 3, 4, 1, 1, 'ord606ec3595cb37', 3, NULL, '', 0, '2021-05-12 04:43:59'),
(56, 3, 4, 0, 0, '', 3, NULL, '', 0, '2021-05-12 04:43:59'),
(106, 7, 29, 1, 1, 'ord609f36829a2b9', 1, NULL, '', 0, '2021-05-15 02:48:49'),
(110, 3, 29, 1, 1, 'ord609f3a72550ae', 1, NULL, '', 0, '2021-05-15 03:05:55'),
(111, 3, 20, 1, 1, 'ord609f3bc2db965', 1, NULL, '', 0, '2021-05-15 03:11:40'),
(112, 6, 4, 1, 1, 'ord609f3bc2db965', 1, NULL, '', 0, '2021-05-18 18:11:54'),
(113, 7, 2, 1, 1, 'ord609f3bc2db965', 1, NULL, '', 0, '2021-05-15 03:11:40'),
(114, 14, 36, 1, 1, 'ord60a3f8d469bd0', 1, NULL, '', 0, '2023-03-20 18:13:01'),
(115, 14, 36, 1, 1, 'ord60a3f9e7e8d5c', 1, NULL, '', 0, '2023-03-20 18:13:01'),
(116, 14, 36, 1, 1, 'ord60a3fb3c608c0', 1, NULL, '', 0, '2023-03-20 18:13:01'),
(117, 15, 900, 1, 1, 'ord60a3fb3c608c0', 1, NULL, '', 0, '2021-05-18 18:09:27'),
(118, 14, 36, 1, 1, 'ord60a3fbbfc250a', 1, NULL, '', 0, '2023-03-20 18:13:01'),
(119, 15, 900, 1, 1, 'ord60a3fbbfc250a', 1, NULL, '', 0, '2021-05-18 18:09:27'),
(125, 14, 36, 1, 1, 'ord60a4c95c2c018', 1, NULL, '', 0, '2023-03-20 18:13:01'),
(126, 15, 100, 1, 1, 'ord60a4c95c2c018', 1, NULL, '', 0, '2021-05-19 08:16:54'),
(127, 6, 2, 1, 1, 'ord60a4c95c2c018', 1, NULL, '', 0, '2021-05-19 14:18:28'),
(128, 15, 100, 1, 1, 'ord60a4c9ea456a4', 1, NULL, '', 0, '2021-05-19 08:19:21'),
(129, 15, 100, 1, 1, 'ord60a4ca80d80d5', 1, NULL, '', 0, '2021-05-19 08:21:49'),
(130, 15, 100, 1, 1, 'ord60a4caf376b68', 1, NULL, '', 0, '2021-05-19 08:23:35'),
(131, 15, 100, 1, 1, 'ord60a4cb812d504', 1, NULL, '', 0, '2021-05-19 08:25:57'),
(132, 15, 100, 1, 1, 'ord60a4cc60cc79c', 1, NULL, '', 0, '2021-05-19 08:29:56'),
(133, 3, 2, 1, 1, 'ord60a4cc60cc79c', 1, NULL, '', 0, '2021-05-19 08:29:56'),
(134, 6, 2, 1, 1, 'ord60a4cc60cc79c', 1, NULL, '', 0, '2021-05-19 08:29:56'),
(135, 7, 2, 1, 1, 'ord60a4cc60cc79c', 1, NULL, '', 0, '2021-05-19 08:29:56'),
(136, 15, 100, 1, 1, 'ord60a4cd06d7d13', 1, NULL, '', 0, '2021-05-19 08:32:32'),
(137, 3, 2, 1, 1, 'ord60a4cd06d7d13', 1, NULL, '', 0, '2021-05-19 08:32:32'),
(138, 6, 2, 1, 1, 'ord60a4cd06d7d13', 1, NULL, '', 0, '2021-05-19 08:32:32'),
(139, 7, 2, 1, 1, 'ord60a4cd06d7d13', 1, NULL, '', 0, '2021-05-19 08:32:32'),
(140, 15, 100, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(141, 3, 2, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(142, 6, 2, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(143, 7, 2, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(144, 5, 2, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(145, 10, 5, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(146, 11, 5, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(147, 12, 5, 1, 1, 'ord60a4cdd66fcd9', 1, NULL, '', 0, '2021-05-19 08:36:08'),
(148, 13, 5, 1, 1, 'ord60a4ceb7d3d84', 1, NULL, '', 0, '2021-05-19 08:39:57'),
(149, 9, 5, 1, 1, 'ord60a4ceb7d3d84', 1, NULL, '', 0, '2021-05-19 08:39:57'),
(150, 15, 100, 1, 1, 'ord60a4ceb7d3d84', 1, NULL, '', 0, '2021-05-19 08:39:57'),
(151, 3, 2, 1, 1, 'ord60a4cff2f0e0f', 1, NULL, '', 0, '2021-05-19 08:45:04'),
(152, 6, 2, 1, 1, 'ord60a4cff2f0e0f', 1, NULL, '', 0, '2021-05-19 08:45:04'),
(220, 14, 1, 0, 0, 'ordC0z0ae81Br', 26, '96.16', NULL, NULL, '2023-05-14 13:23:46'),
(221, 15, 1, 0, 0, 'ordC0z0ae81Br', 26, '123', NULL, NULL, '2023-05-14 13:23:46'),
(222, 16, 1, 0, 0, 'ordC0z0ae81Br', 26, '123', NULL, NULL, '2023-05-14 13:23:46'),
(223, 14, 1, 0, 0, 'ordfSHkjlvBbI', 26, '96.16', NULL, NULL, '2023-05-14 13:25:56'),
(224, 15, 3, 0, 0, 'ordfSHkjlvBbI', 26, '369', NULL, NULL, '2023-05-14 13:25:56'),
(225, 14, 12, 0, 0, 'ordv7KXRUfjSJ', 27, '1153.92', NULL, NULL, '2023-05-19 08:10:47'),
(226, 1, 2, 0, 0, 'ordv7KXRUfjSJ', 27, '240', NULL, NULL, '2023-05-19 08:10:47'),
(227, 3, 2, 0, 0, 'ordv7KXRUfjSJ', 27, '1600', NULL, NULL, '2023-05-19 08:10:47'),
(228, 2, 2, 0, 0, 'ordv7KXRUfjSJ', 27, '600', NULL, NULL, '2023-05-19 08:10:47'),
(229, 3, 2, 0, 0, 'ord8OoqODkLzd', 27, '1600', NULL, NULL, '2023-05-19 08:12:33'),
(230, 6, 2, 0, 0, 'ord8OoqODkLzd', 27, '1620', NULL, NULL, '2023-05-19 08:12:33'),
(231, 19, 10, 0, 0, 'ord8OoqODkLzd', 27, '1230', NULL, NULL, '2023-05-19 08:12:33'),
(232, 6, 2, 0, 0, 'ordcLKlFScqRI', 27, '1620', NULL, NULL, '2023-05-19 08:50:56'),
(233, 9, 7, 0, 0, 'ordcLKlFScqRI', 27, '847', NULL, NULL, '2023-05-19 08:50:56'),
(234, 14, 12, 0, 0, 'ord77DWIkxerL', 16, '1153.92', NULL, NULL, '2023-06-02 12:14:19'),
(235, 14, 12, 0, 0, 'ordNkDShTgQ3t', 16, '1153.92', NULL, NULL, '2023-06-02 12:24:09'),
(236, 14, 12, 0, 0, 'ord9JkPDPKsKB', 16, '1153.92', NULL, NULL, '2023-06-02 13:54:50'),
(237, 10, 5, 0, 0, 'ord9JkPDPKsKB', 16, '600', NULL, NULL, '2023-06-02 13:54:50'),
(238, 19, 34, 0, 0, 'ordezsHu1IzCz', 16, '4182', NULL, NULL, '2023-06-02 15:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_order_num`
--

CREATE TABLE `jdm_order_num` (
  `jdm_on_id` int(11) NOT NULL,
  `jdm_on_uniqid` varchar(30) NOT NULL,
  `jdm_on_userid` int(11) NOT NULL,
  `jdm_on_status` int(11) NOT NULL DEFAULT 0,
  `jdm_courier_rate` decimal(10,2) NOT NULL,
  `order_amount` decimal(10,2) DEFAULT NULL,
  `jdm_on_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_order_num`
--

INSERT INTO `jdm_order_num` (`jdm_on_id`, `jdm_on_uniqid`, `jdm_on_userid`, `jdm_on_status`, `jdm_courier_rate`, `order_amount`, `jdm_on_timestamp`) VALUES
(1000, 'ord60658c6f6dba8', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1013, 'ord606803fb16973', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1014, 'ord60680499377db', 1, 0, '0.00', NULL, '2023-06-03 16:55:19'),
(1015, 'ord6069f2f1d42bb', 1, 0, '0.00', NULL, '2023-06-03 16:44:55'),
(1016, 'ord6069fa067b3de', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1017, 'ord606ec3595cb37', 3, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1018, 'ord607bcac0ec0de', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1019, 'ord609f33b229071', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1020, 'ord609f35ebd35a7', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1021, 'ord609f36829a2b9', 1, 1, '100.00', NULL, '2023-05-29 13:08:00'),
(1023, 'ord609f3a72550ae', 1, 1, '100.00', NULL, '2023-05-29 13:08:00'),
(1024, 'ord609f3bc2db965', 1, 1, '1234.00', NULL, '2023-05-29 13:08:00'),
(1025, 'ord60a3f8d469bd0', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1026, 'ord60a3f9e7e8d5c', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1027, 'ord60a3fb3c608c0', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1028, 'ord60a3fbbfc250a', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1029, 'ord60a4c95c2c018', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1030, 'ord60a4c9ea456a4', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1031, 'ord60a4ca80d80d5', 1, 1, '0.00', NULL, '2023-05-29 13:08:00'),
(1032, 'ord60a4caf376b68', 1, 1, '0.00', '500.00', '2023-06-03 03:44:26'),
(1033, 'ord60a4cb812d504', 1, 4, '1.00', NULL, '2023-05-31 15:22:40'),
(1034, 'ord60a4cc60cc79c', 1, 2, '100.00', NULL, '2023-05-31 15:12:16'),
(1035, 'ord60a4cd06d7d13', 1, 2, '0.00', NULL, '2023-05-31 15:10:27'),
(1036, 'ord60a4cdd66fcd9', 1, 4, '200.00', NULL, '2023-05-31 15:13:31'),
(1037, 'ord60a4ceb7d3d84', 1, 5, '100.00', NULL, '2023-05-31 15:05:10'),
(1038, 'ord60a4cff2f0e0f', 1, 4, '0.00', NULL, '2023-05-31 15:09:33'),
(1039, 'ord60b1f28b23f98', 15, 1, '100.00', NULL, '2021-06-11 15:11:19'),
(1040, 'ordfSHkjlvBbI', 26, 1, '0.00', '465.16', '2023-05-29 13:08:00'),
(1041, 'ordv7KXRUfjSJ', 27, 2, '0.00', '3593.92', '2023-06-01 14:02:14'),
(1042, 'ord8OoqODkLzd', 27, 2, '0.00', '4450.00', '2023-06-01 13:44:16'),
(1043, 'ordcLKlFScqRI', 27, 2, '0.00', '2467.00', '2023-06-01 13:19:42'),
(1044, 'ord77DWIkxerL', 16, 0, '0.00', '1153.92', '2023-06-02 12:14:19'),
(1045, 'ordNkDShTgQ3t', 16, 0, '0.00', '1153.92', '2023-06-02 12:24:09'),
(1046, 'ord9JkPDPKsKB', 16, 0, '0.00', '1753.92', '2023-06-02 13:54:50'),
(1047, 'ordezsHu1IzCz', 16, 2, '0.00', '4182.00', '2023-06-02 15:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_order_status`
--

CREATE TABLE `jdm_order_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_order_status`
--

INSERT INTO `jdm_order_status` (`id`, `status_name`) VALUES
(0, 'Order Placed'),
(1, 'Order Accepted'),
(2, 'Order Delivered'),
(3, 'Order Cancelled'),
(4, 'Payment Paid');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_state`
--

CREATE TABLE `jdm_state` (
  `jdm_state_id` int(11) NOT NULL,
  `jdm_state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_state`
--

INSERT INTO `jdm_state` (`jdm_state_id`, `jdm_state_name`) VALUES
(1, 'Andaman & Nicobar'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra & Nagar Haveli'),
(9, 'Daman & Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu & Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_store_setting`
--

CREATE TABLE `jdm_store_setting` (
  `jdm_store_id` int(11) NOT NULL,
  `jdm_store_name` varchar(120) NOT NULL,
  `jdm_store_phone` varchar(10) NOT NULL,
  `jdm_store_min_purchase` double(10,2) NOT NULL,
  `jdm_store_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_store_setting`
--

INSERT INTO `jdm_store_setting` (`jdm_store_id`, `jdm_store_name`, `jdm_store_phone`, `jdm_store_min_purchase`, `jdm_store_timestamp`) VALUES
(1, 'J D Mobile Spare Parts', '8056773509', 2000.00, '2021-06-19 11:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `jdm_subcategory`
--

CREATE TABLE `jdm_subcategory` (
  `jdm_subcate_id` int(11) NOT NULL,
  `jdm_catid` int(11) DEFAULT NULL,
  `jdm_subcate_name` varchar(50) NOT NULL,
  `jdm_catetimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jdm_subcategory`
--

INSERT INTO `jdm_subcategory` (`jdm_subcate_id`, `jdm_catid`, `jdm_subcate_name`, `jdm_catetimestamp`) VALUES
(1, 1, 'Sub one', '2023-06-04 14:43:01'),
(2, 3, 'Sub 2', '2023-06-04 14:26:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gdm_admin_users`
--
ALTER TABLE `gdm_admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `gdm_app_users`
--
ALTER TABLE `gdm_app_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `gdm_products`
--
ALTER TABLE `gdm_products`
  ADD PRIMARY KEY (`gdm_prod_id`),
  ADD UNIQUE KEY `product_code` (`gdm_prod_code`);

--
-- Indexes for table `jdm_bank`
--
ALTER TABLE `jdm_bank`
  ADD PRIMARY KEY (`jdm_pay_id`);

--
-- Indexes for table `jdm_banner`
--
ALTER TABLE `jdm_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdm_billing_address`
--
ALTER TABLE `jdm_billing_address`
  ADD PRIMARY KEY (`jdm_ba_id`);

--
-- Indexes for table `jdm_brand`
--
ALTER TABLE `jdm_brand`
  ADD PRIMARY KEY (`jdm_brand_id`);

--
-- Indexes for table `jdm_category`
--
ALTER TABLE `jdm_category`
  ADD PRIMARY KEY (`jdm_cate_id`);

--
-- Indexes for table `jdm_forget_password`
--
ALTER TABLE `jdm_forget_password`
  ADD PRIMARY KEY (`forget_password_id`);

--
-- Indexes for table `jdm_order`
--
ALTER TABLE `jdm_order`
  ADD PRIMARY KEY (`jdm_order_id`);

--
-- Indexes for table `jdm_order_num`
--
ALTER TABLE `jdm_order_num`
  ADD PRIMARY KEY (`jdm_on_id`);

--
-- Indexes for table `jdm_order_status`
--
ALTER TABLE `jdm_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdm_state`
--
ALTER TABLE `jdm_state`
  ADD PRIMARY KEY (`jdm_state_id`);

--
-- Indexes for table `jdm_store_setting`
--
ALTER TABLE `jdm_store_setting`
  ADD PRIMARY KEY (`jdm_store_id`);

--
-- Indexes for table `jdm_subcategory`
--
ALTER TABLE `jdm_subcategory`
  ADD PRIMARY KEY (`jdm_subcate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gdm_admin_users`
--
ALTER TABLE `gdm_admin_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gdm_app_users`
--
ALTER TABLE `gdm_app_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `gdm_products`
--
ALTER TABLE `gdm_products`
  MODIFY `gdm_prod_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jdm_bank`
--
ALTER TABLE `jdm_bank`
  MODIFY `jdm_pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jdm_banner`
--
ALTER TABLE `jdm_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jdm_billing_address`
--
ALTER TABLE `jdm_billing_address`
  MODIFY `jdm_ba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jdm_brand`
--
ALTER TABLE `jdm_brand`
  MODIFY `jdm_brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jdm_category`
--
ALTER TABLE `jdm_category`
  MODIFY `jdm_cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jdm_forget_password`
--
ALTER TABLE `jdm_forget_password`
  MODIFY `forget_password_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jdm_order`
--
ALTER TABLE `jdm_order`
  MODIFY `jdm_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `jdm_order_num`
--
ALTER TABLE `jdm_order_num`
  MODIFY `jdm_on_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;

--
-- AUTO_INCREMENT for table `jdm_order_status`
--
ALTER TABLE `jdm_order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jdm_state`
--
ALTER TABLE `jdm_state`
  MODIFY `jdm_state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `jdm_store_setting`
--
ALTER TABLE `jdm_store_setting`
  MODIFY `jdm_store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jdm_subcategory`
--
ALTER TABLE `jdm_subcategory`
  MODIFY `jdm_subcate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
