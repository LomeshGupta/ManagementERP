-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 04:39 PM
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
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `code` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(40) NOT NULL,
  `status` enum('open','pending approval','approved','rejected') NOT NULL DEFAULT 'open',
  `address` text NOT NULL,
  `address 2` text NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone no.` varchar(40) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `bank_name` text NOT NULL,
  `bank_account_no` varchar(40) NOT NULL,
  `IFSC_code` varchar(40) NOT NULL,
  `upi_id` varchar(40) NOT NULL,
  `pan_no` varchar(40) NOT NULL,
  `gst_registration_no` varchar(50) NOT NULL,
  `gst_vendor_type` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `type` varchar(40) NOT NULL,
  `currency_code` varchar(30) NOT NULL,
  `balance_as_vend` float NOT NULL,
  `balance_as_cust` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `code` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(40) NOT NULL,
  `status` enum('open','pending approval','approved','rejected') NOT NULL DEFAULT 'open',
  `address` text NOT NULL,
  `address 2` text NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone no.` varchar(40) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `bank_name` text NOT NULL,
  `bank_account_no` varchar(40) NOT NULL,
  `IFSC_code` varchar(40) NOT NULL,
  `upi_id` varchar(40) NOT NULL,
  `pan_no` varchar(40) NOT NULL,
  `gst_registration_no` varchar(50) NOT NULL,
  `gst_vendor_type` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `type` varchar(40) NOT NULL,
  `currency_code` varchar(30) NOT NULL,
  `balance` float NOT NULL,
  `balance_as_vend` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_no` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `item_name` varchar(40) NOT NULL,
  `unit_cost` decimal(10,0) NOT NULL,
  `unit_price` decimal(10,0) NOT NULL,
  `inv_posting_group` varchar(40) NOT NULL,
  `uom` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `type` varchar(30) NOT NULL,
  `replenish_type` varchar(30) NOT NULL,
  `costing_method` enum('FIFO','LIFO','Standard') NOT NULL,
  `reorder_qty` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_no`, `created_at`, `updated_at`, `item_name`, `unit_cost`, `unit_price`, `inv_posting_group`, `uom`, `image`, `type`, `replenish_type`, `costing_method`, `reorder_qty`) VALUES
('bags', '2023-10-27 23:55:26', '2023-10-27 23:55:26', 'school bag', 500, 1000, '0', 'PIECES', '1698431126_e943d17a5162cc69e4e2.png', 'image/png', 'Purchase', 'FIFO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_ledger`
--

CREATE TABLE `item_ledger` (
  `entry_no` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `document_type` varchar(30) NOT NULL,
  `document_no` varchar(40) NOT NULL,
  `item_no` varchar(40) NOT NULL,
  `location` varchar(30) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `unit_cost` decimal(10,0) NOT NULL,
  `unit_cost_lcy` decimal(10,0) NOT NULL,
  `amount` float NOT NULL,
  `amount_lcy` float NOT NULL,
  `currency_code` varchar(20) NOT NULL,
  `entry_type` varchar(20) NOT NULL,
  `remaining_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `code` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `in_transit` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `code` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(40) NOT NULL,
  `status` enum('open','pending approval','approved','rejected') NOT NULL DEFAULT 'open',
  `address` text NOT NULL,
  `address 2` text NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone no.` varchar(40) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `bank_name` text NOT NULL,
  `bank_account_no` varchar(40) NOT NULL,
  `IFSC_code` varchar(40) NOT NULL,
  `upi_id` varchar(40) NOT NULL,
  `pan_no` varchar(40) NOT NULL,
  `gst_registration_no` varchar(50) NOT NULL,
  `gst_vendor_type` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `type` varchar(40) NOT NULL,
  `currency_code` varchar(30) NOT NULL,
  `balance` float NOT NULL,
  `balance_as_cust` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `Image` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'general',
  `status` enum('Active','Inactive','deleted','') NOT NULL DEFAULT 'Active',
  `authtoken` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `gender`, `mobile`, `designation`, `Image`, `type`, `status`, `authtoken`, `created_at`, `updated_at`) VALUES
(1, 'lomesh', 'lomesh', 'guptabittu06@gmail.com', '1234', 'male', '', '', '', 'general', '', '', '2023-10-14 23:03:05', '2023-10-15 22:23:23'),
(2, 'sample2', 'sample2', 'sample@email.com', '231341', 'male', '', '', '', 'general', '', '', '2023-10-14 23:30:29', '2023-10-15 22:23:31'),
(3, 'lomeshg', 'Lomesh Gupta', 'guptabittu06@gmail.com', 'sha256:1000:JDJ5JDEwJC5VdVl5ei44WVouWDFxeFFJbURYZk8xcFVSOVl4NzFHOVVRLk5VdmNUQlRmV0ZyeXBQU0tx:f4k9zQ0aQ4lbZZutxli1UjcuTDwsUDq+', NULL, NULL, NULL, '1697339130_60f94a68c6cf11b529a5.png', 'image/png', '', '', '2023-10-15 08:35:32', '2023-10-15 22:24:03'),
(5, 'bittug', 'Bittu Gupta', 'guptabittu06@gmail.com', 'sha256:1000:JDJ5JDEwJC5VdVl5ei44WVouWDFxeFFJbURYZk8xcFVSOVl4NzFHOVVRLk5VdmNUQlRmV0ZyeXBQU0tx:f4k9zQ0aQ4lbZZutxli1UjcuTDwsUDq+', 'male', '8527374584', 'CEO', '1697339597_82b0bdb772b4a5d3c703.png', 'image/png', 'Active', '', '2023-10-15 08:43:18', '2023-10-27 23:13:13'),
(6, 'user1', 'user1', 'user@gmail.com', 'sha256:1000:JDJ5JDEwJEV3eHpQb0dRb08xNTIvem9tUHJFOE', NULL, NULL, NULL, '', 'image/png', '', '', '2023-10-15 16:28:24', '2023-10-15 22:24:17'),
(7, 'beast', 'beast', 'beast@gmail.com', 'sha256:1000:JDJ5JDEwJEx1OGdGNEJ3cVNKcGo3Yzd6T2Z6L3', 'male', '', '', '1698428466_fd8b2c34ee0a51a9a3bd.png', 'image/png', 'Active', '', '2023-10-15 16:58:55', '2023-10-27 23:11:06'),
(8, 'user4', 'user4', 'user@gmail.com', 'sha256:1000:JDJ5JDEwJENNWEVDQUtJd3d5STNEd0tMSFNXWU9weTBYLy5JWVNEazBhYkRBUlBnZ2cwNS5jcjd3QWt1:2qGdtPsljNOPlKD9Apz9mbHYIuXvJ/0T', NULL, NULL, NULL, '', 'image/png', '', '', '2023-10-15 17:24:05', '2023-10-15 22:24:30'),
(9, 'prop', 'prop', 'prop@mail.com', 'sha256:1000:JDJ5JDEwJGpKS0o4V0ouR1V1SXpUVE9PUncvci5UUGVyQm1zZTQ5REhmQjVZSTdUUjAudWt4alpVZS9L:wqOV3lywUg7WhRVJLvAwKjfPysitgSBD', NULL, NULL, NULL, '', 'image/png', '', '', '2023-10-15 17:35:32', '2023-10-15 22:24:36'),
(10, 'irona', 'iron', 'iron@mail.com', 'sha256:1000:JDJ5JDEwJC5VdVl5ei44WVouWDFxeFFJbURYZk8xcFVSOVl4NzFHOVVRLk5VdmNUQlRmV0ZyeXBQU0tx:f4k9zQ0aQ4lbZZutxli1UjcuTDwsUDq+', 'male', '', '', '', 'image/png', 'Active', '', '2023-10-15 17:49:59', '2023-10-27 23:14:41'),
(11, 'mhg', 'mhg', 'mhg@mail.com', 'sha256:1000:JDJ5JDEwJC5VdVl5ei44WVouWDFxeFFJbURYZk8xcFVSOVl4NzFHOVVRLk5VdmNUQlRmV0ZyeXBQU0tx:f4k9zQ0aQ4lbZZutxli1UjcuTDwsUDq+', NULL, NULL, NULL, '1697372762_8d53fd826e97859cc3ae.png', 'image/png', '', '', '2023-10-15 17:56:02', '2023-10-15 22:24:48'),
(12, 'best', 'best hai', 'best@mail.in', 'sha256:1000:JDJ5JDEwJEt6R0R4akZlWHFkU001emV1MExmVXVVM1hwcS5sQ2doLzNOc2luZlJ2NHVsdWRLcUhBb2lP:RbrxlJ+kYBUk9lsZPlhjjbShvchSNqBR', 'male', '', 'No One', '1697373716_356ae4acf389c757fcc4.png', '', 'Active', '', '2023-10-15 18:11:56', '2023-10-27 23:03:48'),
(13, 'parkresort', 'parkresort', 'park@mail.com', 'sha256:1000:JDJ5JDEwJC5jZWYydVJXL0RNb005NlhZYlBjbE9TSVRJekVxNHFSaUUvcmI1YUxpeTZOSzRLS2VvZ3Mu:Mz6tx/6WZwS59pcfxxWpZPbuOT+SWOZO', NULL, NULL, NULL, '1697394588_a78d1d2c6f4902cb6efd.png', 'image/png', '', '', '2023-10-15 23:59:49', '2023-10-18 22:27:55'),
(14, 'naveen', 'naveen', 'naveen@mail.com', 'sha256:1000:JDJ5JDEwJHJ2U0RHOU02Z3JoWEcuaXJWeEJVcmVwanE5Wk5EdUp3LkxYL0t3WTVNVExodWpuekVWUG1l:mErFJWYM43PyuZ4uSVbORAPGYhYCuB38', 'male', '', '', '1697655486_f6ca20228694583022f0.png', '', 'Active', '', '2023-10-19 00:28:07', '2023-10-27 22:43:07'),
(22, 'new', 'h&m', 'hm@mail.com', 'sha256:1000:JDJ5JDEwJHJvYWFQSlJiU0Rvc3RqeGwzU1RkdS5XWlluVXFBZUQ3TVdBbFN0UUxha1JMN0FDVkhKakwy:8hxphBaF0/kMMatFNWjwBDNppYhxOe45', 'male', '', '', '1697712237_7db893266237a1a93234.png', '', 'Active', '', '2023-10-19 16:13:58', '2023-10-27 22:42:48'),
(24, 'ironman', 'iron man', 'iron@mail.com', 'sha256:1000:JDJ5JDEwJHYzM3d1SVpTMWFiMU1EdklWWkZnYnVXRFprU2NTVkdzYTcvSS5yS1lEZFpEN3d4YUhxbjRh:hfy2kd2ToBWwIA6I3c6606mnHmiVCPs5', NULL, NULL, NULL, '1697712927_6671c7c7bd4c78333bd1.png', 'image/png', '', '', '2023-10-19 16:25:27', '2023-10-25 17:51:22'),
(26, 'shilpi', 'shilpi gupta', 'shilpidl1155@gmail.com', 'sha256:1000:JDJ5JDEwJGJmT2tpd3VpLjlpVHlWSWlmeVVuYmV4YW5xN0xmeUYzVjZyY0NmZ2Q3azFMaFU4M1Raclhx:qWFA6XDDNLC//oO17M+przoIgoJn+Rz2', 'female', '9876543210', 'MD', '1698311840_1683500c82f2065559a4.png', 'image/png', 'Active', '', '2023-10-26 14:47:20', '2023-10-26 14:47:20'),
(27, 'palvi', 'Palvi Gupta', 'Palvi2002@gmail.com', 'sha256:1000:JDJ5JDEwJG96S3ZRekFUcXV2eFdkclJvc09LZC5DU2pBdVhUaGJnZm5ieWU0MjBZMnY4NFdTMk9qSmJh:RqfXD86uEz141btKr1P7DpJdNXReetxb', 'female', '9876543210', 'Staff', '1698590116_81a38763151ed95ad0a5.jpg', 'image/jpeg', 'Active', '', '2023-10-29 20:05:16', '2023-10-29 20:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_setup`
--

CREATE TABLE `user_setup` (
  `username` varchar(100) NOT NULL,
  `allow_posting_from` date NOT NULL,
  `allow_posting_to` date NOT NULL,
  `user` enum('View','Edit','Blocked') NOT NULL DEFAULT 'View',
  `user_setup` enum('View','Edit','Blocked') NOT NULL DEFAULT 'View'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_setup`
--

INSERT INTO `user_setup` (`username`, `allow_posting_from`, `allow_posting_to`, `user`, `user_setup`) VALUES
('beast', '2023-10-21', '2023-10-19', 'Edit', 'View'),
('best', '2023-10-12', '2023-10-19', 'Edit', 'Blocked'),
('bittug', '2023-10-19', '2023-10-19', 'Edit', 'Edit'),
('irona', '2023-09-01', '0000-00-00', 'Edit', 'Blocked'),
('ironman', '0000-00-00', '0000-00-00', 'View', 'View'),
('lomesh', '2023-10-20', '2023-10-27', 'Blocked', 'Edit'),
('lomeshg', '2023-10-20', '2023-10-11', 'Edit', 'View'),
('mhg', '0000-00-00', '0000-00-00', 'View', 'Edit'),
('palvi', '0000-00-00', '0000-00-00', 'View', 'View'),
('prop', '0000-00-00', '0000-00-00', 'View', 'View'),
('sample2', '2023-10-18', '0000-00-00', 'Edit', 'Edit'),
('shilpi', '2023-10-18', '2023-10-11', 'View', 'View'),
('user1', '0000-00-00', '0000-00-00', 'View', 'View'),
('user4', '0000-00-00', '0000-00-00', 'View', 'Edit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_ledger`
--
ALTER TABLE `item_ledger`
  ADD PRIMARY KEY (`entry_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_setup`
--
ALTER TABLE `user_setup`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_ledger`
--
ALTER TABLE `item_ledger`
  MODIFY `entry_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
