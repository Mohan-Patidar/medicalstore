-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 05:20 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `reminder_date` varchar(20) NOT NULL,
  `reminder_status` varchar(20) NOT NULL,
  `notification_status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `password`, `name`, `designation`, `email`, `mobile`, `address`, `city`, `state`, `country`, `pincode`, `image`, `date`, `status`, `type`, `ip_address`, `reminder_date`, `reminder_status`, `notification_status`) VALUES
(1, 'admin', 'YWRtaW5AMTIzIyo=', 'JD Medical Store', 'Admin', 'info@gmail.com', '9100000001', 'H.No. 005,  Indore', 'Indore', 'Madhya Pradesh', 'India', '452001', '5ea3f714db67cprofile-32.jpeg', '25-04-2020', 'Active', 'Admin', '::1', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_mobile` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `medicine_id` varchar(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_quantity` varchar(255) NOT NULL,
  `medicine_mrp` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`id`, `customer_name`, `customer_email`, `customer_mobile`, `customer_address`, `medicine_id`, `medicine_name`, `medicine_quantity`, `medicine_mrp`, `total_amount`, `sub_total`, `discount`, `grand_total`, `status`, `created_at`) VALUES
(2, 'XYZ', '', '', 'Indore', '26', 'Pain Killer', '10', '20', '200', 200, 5, 195, 'Active', '2020-04-25 14:55:33'),
(4, 'ABC', '', '', 'Indore', '28,27', 'Polybion,Becosules', '1,5', '40,30', '40,150', 190, 0, 190, 'Active', '2020-04-25 15:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `notification_quantity` int(11) NOT NULL,
  `medicine_type` varchar(20) NOT NULL,
  `other_type_description` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `pharmacy` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `notification_status` varchar(10) NOT NULL DEFAULT 'Active',
  `notification_view_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `batch_no`, `quantity`, `notification_quantity`, `medicine_type`, `other_type_description`, `mrp`, `price`, `month`, `year`, `pharmacy`, `created_at`, `status`, `notification_status`, `notification_view_date`) VALUES
(26, 'Pain Killer', 2504, 15, 5, 'Tab', '', 20, 18, 'November', '2020', '', '2020-04-25 14:52:11', 'Active', 'Active', '25-04-2020'),
(27, 'Becosules', 2001, 10, 10, 'Cap', '', 30, 25, 'December', '2020', 'Abc', '2020-04-25 14:53:15', 'Active', 'Active', '25-04-2020'),
(28, 'Polybion', 2014, 9, 2, 'Syp', '', 40, 35, 'December', '2020', '', '2020-04-25 15:01:44', 'Active', 'Active', '25-04-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
