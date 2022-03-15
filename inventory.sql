-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 02:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_salary`
--

CREATE TABLE `advance_salary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advanced_salary` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salary`
--

INSERT INTO `advance_salary` (`id`, `employee_id`, `month`, `year`, `advanced_salary`, `created_at`, `updated_at`) VALUES
(2, 7, 'February', '2022', '5000', NULL, NULL),
(3, 9, 'December', '2022', '2000', NULL, NULL),
(4, 7, 'January', '2022', '2000', NULL, NULL),
(5, 11, 'January', '2022', '4000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `att_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendence` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `employee_id`, `att_date`, `att_year`, `attendence`, `month`, `add_date`, `created_at`, `updated_at`) VALUES
(7, 7, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(8, 9, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(9, 10, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(10, 11, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(11, 12, '21/02/2022', '2022', 'Absence', 'February', '21_02_2022', NULL, NULL),
(12, 13, '21/02/2022', '2022', 'Absence', 'February', '21_02_2022', NULL, NULL),
(13, 14, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(14, 15, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(15, 16, '21/02/2022', '2022', 'Present', 'February', '21_02_2022', NULL, NULL),
(16, 17, '21/02/2022', '2022', 'Absence', 'February', '21_02_2022', NULL, NULL),
(17, 7, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(18, 9, '25/02/2022', '2022', 'Absence', 'February', '25_02_2022', NULL, NULL),
(19, 10, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(20, 11, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(21, 12, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(22, 13, '25/02/2022', '2022', 'Absence', 'February', '25_02_2022', NULL, NULL),
(23, 14, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(24, 15, '25/02/2022', '2022', 'Absence', 'February', '25_02_2022', NULL, NULL),
(25, 16, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(26, 17, '25/02/2022', '2022', 'Present', 'February', '25_02_2022', NULL, NULL),
(27, 7, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL),
(28, 9, '26/02/2022', '2022', 'Absence', 'February', '26_02_2022', NULL, NULL),
(29, 10, '26/02/2022', '2022', 'Absence', 'February', '26_02_2022', NULL, NULL),
(30, 11, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL),
(31, 12, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL),
(32, 13, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL),
(33, 14, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL),
(34, 15, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL),
(35, 16, '26/02/2022', '2022', 'Absence', 'February', '26_02_2022', NULL, NULL),
(36, 17, '26/02/2022', '2022', 'Present', 'February', '26_02_2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Joyato', '2022-02-17 22:48:18', '2022-02-17 22:48:18'),
(2, 'Echovell', '2022-02-17 22:48:42', '2022-02-17 23:03:45'),
(4, 'Archar', '2022-02-17 22:49:35', '2022-02-17 22:49:35'),
(5, 'Hyundai', '2022-02-17 22:50:16', '2022-02-17 22:50:16'),
(6, 'Toyato', '2022-02-17 22:50:38', '2022-02-17 22:50:38'),
(8, 'Motor', '2022-02-21 06:41:42', '2022-02-21 06:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `shopename`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Arafat Ali', 'arafat8@gmail.com', '01704039179', 'Motijheel,Dhaka', '15_02_2022_1644941261.jpg', 'testshop', NULL, NULL, NULL, NULL, 'Dhaka', NULL, '2022-02-15 10:07:41', '2022-02-15 10:07:41'),
(4, 'Ajijur Rahman', 'arafataliar@gmail.com', '01254689', 'Dhaka,Bangladesh', '25_02_2022_1645788403.jpg', 'Ajijur Shope', 'ajijur', '4563256', 'islamic Bank', 'Dhaka', 'Dhaka', NULL, '2022-02-25 05:17:23', '2022-02-25 05:26:43'),
(6, 'Shikder ali', 'shikder@gmail.com', '0175648956', 'jessore, Bangladesh', '26_02_2022_1645887935.jpg', 'Shikder', 'Shikder', '524545', 'islamic Bank', 'jessore', 'Dhaka', NULL, '2022-02-26 09:05:35', '2022-02-26 09:05:35'),
(7, 'Rejaul Haque', 'rejaulju2345@gmail.com', '01714826782', 'Dhaka,Bangladesh', '26_02_2022_1645888120.jpg', 'shopstore', NULL, NULL, NULL, NULL, 'Dhaka', NULL, '2022-02-26 09:08:01', '2022-02-26 09:08:40'),
(8, 'test', 'test@gmail.com', '01254689', 'Dhaka,Bangladesh', '26_02_2022_1645888170.jpg', 'Shikder', NULL, NULL, NULL, NULL, 'Dhaka', '2022-02-26 09:13:18', '2022-02-26 09:09:30', '2022-02-26 09:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `nid_no`, `photo`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(7, 'Arafat Ali', 'arafataliar69@gmail.com', '01704039173', 'Motijheel,Dhaka', '0 Years', '7896548545', '15_02_2022_1644929346.jpg', '22000', '10', 'Dhaka', '2022-02-15 06:49:06', '2022-02-15 06:49:06'),
(9, 'Shakil', 'arafat8@gmail.com', '01704039179', 'Motijheel,Dhaka', 'No', '789456783', '21_02_2022_1645432235.jpg', '22000', '10', 'Dhaka', '2022-02-15 07:09:45', '2022-02-24 22:18:35'),
(10, 'Ajijur Rahman', 'ajijur@gmail.com', '01704039173', 'Motijheel,Dhaka', 'No', '78960231', '21_02_2022_1645432255.jpg', '10000', '10', 'Dhaka', '2022-02-17 06:07:26', '2022-02-24 22:19:12'),
(11, 'Jon Do', 'jondo@gmail.com', '01756985653', 'mirpur-10,Dhaka', 'Yes, 2 Year', '78965014', '21_02_2022_1645432395.jpg', '21300', '10', 'Dhaka, Bangladesh', '2022-02-21 02:33:15', '2022-02-24 22:19:23'),
(12, 'Shahin Sikder', 'shahin897ub@gmail.com', '01756985887', 'mirpur-10,Dhaka', 'No', '0125478961', '21_02_2022_1645432475.jpg', '15000', '10', 'Dhaka, Bangladesh', '2022-02-21 02:34:35', '2022-02-24 22:19:38'),
(13, 'Sagor Ali', 'sagorali9807@gmail.com', '01756985659', 'mirpur-10,Dhaka', 'No', '7859658450', '21_02_2022_1645432625.jpg', '15000', '10', 'Dhaka', '2022-02-21 02:37:06', '2022-02-24 22:19:58'),
(14, 'Afran Sultana', 'afranara456@gmail.com', '01756985887', 'Dhaka, Bangladesh', '0 Years', '7896548569', '21_02_2022_1645432738.jpg', '18500', '10', 'Dhaka', '2022-02-21 02:38:58', '2022-02-24 22:20:17'),
(15, 'sonaika sha', 'sonai@gmail.com', '01756985887', 'Dhaka, Bangladesh', 'No', '789651005897', '21_02_2022_1645432811.jpg', '15000', '8', 'Dhaka', '2022-02-21 02:40:11', '2022-02-24 22:20:34'),
(16, 'Rafa', 'rafa768ty@gmail.com', '01756985887', 'Motijheel,Dhaka', 'No', '785960774545', '21_02_2022_1645432967.png', '15000', '8', 'Dhaka, Bangladesh', '2022-02-21 02:42:47', '2022-02-24 22:20:52'),
(17, 'Akram', 'arafat890@gmail.com', '01756985887', 'mirpur-10,Dhaka', 'No', '78965485369', '21_02_2022_1645433081.png', '18500', '8', 'Dhaka', '2022-02-21 02:44:41', '2022-02-24 22:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(1, '2 Laptop 80000 | 1 bag 500', '80500', 'February', '19/02/2022', '2022', '2022-02-19 00:47:57', '2022-02-19 00:47:57'),
(2, '1 Keyboard 400', '500', 'February', '19/02/2022', '2022', '2022-02-19 03:38:01', '2022-02-20 00:55:23'),
(3, '2 Mouse 1000', '1000', 'February', '19/02/2022', '2022', '2022-02-19 03:40:02', '2022-02-19 03:40:02'),
(5, 'Water and Drink (Cocacola) 100 | pani bill 500', '600', 'February', '20/02/2022', '2022', '2022-02-20 01:23:57', '2022-02-20 03:34:44'),
(6, 'Current Bill 4000', '4000', 'February', '20/02/2022', '2022', '2022-02-20 03:41:21', '2022-02-20 03:41:21'),
(7, 'water 100 | 2 key-board 2000', '2100', 'February', '25/02/2022', '2022', '2022-02-25 10:48:32', '2022-02-25 10:48:32'),
(8, '1 Laptop 50000', '50000', 'February', '25/02/2022', '2022', '2022-02-25 10:54:02', '2022-02-25 10:54:02'),
(9, 'tea,food,water  1000 | Net bill 1500', '2500', 'February', '27/02/2022', '2022', '2022-02-27 00:09:58', '2022-02-27 00:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_02_14_152740_create_employees_table', 2),
(10, '2022_02_15_133256_create_customers_table', 3),
(11, '2022_02_15_163947_create_suppliers_table', 4),
(14, '2022_02_16_182701_create_advance_salary_table', 5),
(15, '2022_02_17_133852_create_salaries_table', 6),
(16, '2022_02_18_033429_create_categories_table', 7),
(17, '2022_02_18_050455_create_products_table', 8),
(18, '2022_02_19_055840_create_expenses_table', 9),
(19, '2022_02_20_174759_create_attendences_table', 10),
(20, '2022_02_21_092116_create_settings_table', 11),
(27, '2022_02_21_141023_create_pos_table', 12),
(28, '2022_02_23_151419_create_orders_table', 12),
(29, '2022_02_23_151706_create_orderdetails_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitcast` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unitcast`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 2, 120000, 290400, NULL, NULL),
(2, 1, 4, 1, 10000, 12100, NULL, NULL),
(3, 1, 7, 1, 12500, 15125, NULL, NULL),
(4, 1, 8, 1, 5000, 6050, NULL, NULL),
(5, 2, 3, 1, 5500, 6655, NULL, NULL),
(6, 2, 4, 1, 10000, 12100, NULL, NULL),
(7, 2, 1, 1, 1600, 1936, NULL, NULL),
(8, 2, 7, 1, 12500, 15125, NULL, NULL),
(12, 4, 10, 4, 1600, 7744, NULL, NULL),
(13, 5, 6, 1, 3600, 4356, NULL, NULL),
(14, 5, 5, 1, 3000, 3630, NULL, NULL),
(15, 6, 4, 2, 10000, 24200, NULL, NULL),
(16, 6, 5, 1, 3000, 3630, NULL, NULL),
(17, 6, 6, 1, 3600, 4356, NULL, NULL),
(18, 7, 5, 2, 3000, 7260, NULL, NULL),
(19, 8, 12, 2, 4600, 11132, NULL, NULL),
(20, 8, 6, 1, 3600, 4356, NULL, NULL),
(21, 9, 3, 1, 5500, 6655, NULL, NULL),
(22, 9, 4, 1, 10000, 12100, NULL, NULL),
(23, 10, 3, 2, 5500, 11220, NULL, NULL),
(24, 11, 10, 3, 1600, 4896, NULL, NULL),
(25, 11, 12, 1, 4600, 4692, NULL, NULL),
(26, 11, 4, 1, 10000, 10200, NULL, NULL),
(27, 12, 5, 1, 3000, 3060, NULL, NULL),
(28, 13, 1, 2, 1600, 3264, NULL, NULL),
(29, 13, 5, 1, 3000, 3060, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_products` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `month`, `year`, `order_status`, `delivery_date`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, 2, '23/02/2022', 'February', '2022', 'Success', 'Feb 24, 2022', '5', '267,500.00', '56,175.00', '323675.00', 'HandCash', '323675', '00', NULL, NULL),
(2, 4, '23/02/2022', 'February', '2022', 'Success', 'Feb 24, 2022', '4', '29,600.00', '6,216.00', '35816.00', 'Cheque', '35820', NULL, NULL, NULL),
(4, 6, '24/02/2022', 'February', '2022', 'Success', 'Feb 24, 2022', '4', '6,400.00', '1,344.00', '7744.00', 'HandCash', '7744', NULL, NULL, NULL),
(5, 2, '24/02/2022', 'February', '2022', 'Success', 'Feb 24, 2022', '2', '6,600.00', '1,386.00', '7986.00', 'HandCash', '4000', '3986', NULL, NULL),
(6, 7, '24/02/2022', 'February', '2022', 'Success', 'Feb 26, 2022', '4', '26,600.00', '5,586.00', '32186.00', 'HandCash', '32000', '186', NULL, NULL),
(7, 2, '24/02/2022', 'February', '2022', 'Pending', NULL, '2', '6,000.00', '1,260.00', '7260.00', 'HandCash', '5000', '2260', NULL, NULL),
(8, 6, '25/02/2022', 'February', '2022', 'Pending', NULL, '3', '12,800.00', '2,688.00', '15488.00', 'HandCash', '10000', '5488', NULL, NULL),
(9, 4, '25/02/2022', 'February', '2022', 'Pending', NULL, '2', '15,500.00', '3,255.00', '18755.00', 'HandCash', '18000', '755', NULL, NULL),
(10, 7, '26/02/2022', 'February', '2022', 'Success', 'Feb 27, 2022', '2', '11,000.00', '220.00', '11220.00', 'HandCash', '6000', '5220', NULL, NULL),
(11, 6, '26/02/2022', 'February', '2022', 'Pending', NULL, '5', '19,400.00', '388.00', '19788.00', 'HandCash', '10000', '9788', NULL, NULL),
(12, 2, '27/02/2022', 'February', '2022', 'Pending', NULL, '1', '3,000.00', '60.00', '3060.00', 'HandCash', '2000', '1060', NULL, NULL),
(13, 6, '28/02/2022', 'February', '2022', 'Pending', NULL, '3', '6,200.00', '124.00', '6324.00', 'HandCash', '6000', '324', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_garage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `product_name`, `product_code`, `product_garage`, `product_route`, `product_image`, `buy_date`, `expire_date`, `buying_price`, `selling_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Gear Level', 'G3459', 'A', '5', '18_02_2022_1645193124.jpg', '2022-02-18', '2025-02-18', '800', '1600', NULL, '2022-02-18 08:05:24', '2022-02-25 11:58:02'),
(3, 8, 1, 'Motor Silver', 'M3409', 'A', '5', 'motor.png', '2022-02-21', '2027-02-21', '4200', '5500', NULL, '2022-02-21 07:29:28', '2022-02-21 07:30:11'),
(4, 1, 2, 'Speed Sensor', 'S897u', 'A', '3', '21_02_2022_1645456283.jpg', '2022-02-21', '2028-02-22', '8000', '10000', NULL, '2022-02-21 09:11:23', '2022-02-22 03:48:50'),
(5, 3, 3, 'Speed Motor', 'Sp6785', 'B', '1', '21_02_2022_1645456495.jpg', '2022-02-21', '2028-02-21', '2500', '3000', NULL, '2022-02-21 09:14:55', '2022-02-21 09:14:55'),
(6, 6, 4, 'windscreen', 'W45671', 'B', '1', '21_02_2022_1645456704.jpg', '2022-02-22', '2029-02-22', '3000', '3600', NULL, '2022-02-21 09:18:24', '2022-02-21 09:18:24'),
(7, 6, 1, 'Tyre', 'T98760', 'A', '1', '21_02_2022_1645456854.jpg', '2022-02-21', '2032-02-21', '10000', '12500', NULL, '2022-02-21 09:20:54', '2022-02-21 09:20:54'),
(8, 1, 2, 'Battery', 'B123', 'B', '2', '21_02_2022_1645456973.jpg', '2022-02-21', '2026-02-21', '4200', '5000', NULL, '2022-02-21 09:22:53', '2022-02-21 09:22:53'),
(9, 5, 4, 'Battery', 'B6978', 'B', '2', '21_02_2022_1645457050.jpg', '2022-02-21', '2026-02-21', '4200', '5000', NULL, '2022-02-21 09:24:10', '2022-02-21 09:24:10'),
(10, 2, 4, 'Fan', 'F34254', 'A', '2', '21_02_2022_1645457229.jpg', '2022-02-21', '2026-06-21', '1200', '1600', NULL, '2022-02-21 09:27:09', '2022-02-25 12:17:24'),
(11, 4, 2, 'Engine', 'E45r45', 'A', '3', '21_02_2022_1645457398.jpg', '2022-02-21', '2030-02-21', '80000', '120000', NULL, '2022-02-21 09:29:58', '2022-02-21 09:29:58'),
(12, 6, 4, 'Wing Mirror', 'W3453', 'B', '2', '21_02_2022_1645457555.jpg', '2022-02-21', '2032-02-21', '4000', '4600', NULL, '2022-02-21 09:32:35', '2022-02-21 09:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `salary_month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_salary` bigint(20) UNSIGNED NOT NULL,
  `advance_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `salary_month`, `salary_year`, `paid_salary`, `advance_id`, `created_at`, `updated_at`) VALUES
(3, 7, 'January', '2022', 20000, 4, NULL, NULL),
(4, 11, 'January', '2022', 17300, 5, NULL, NULL),
(5, 14, 'January', '2022', 18500, NULL, NULL, NULL),
(6, 9, 'January', '2022', 22000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobile` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_zipcode` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_address`, `company_email`, `company_phone`, `company_logo`, `company_mobile`, `company_city`, `company_country`, `company_zipcode`, `created_at`, `updated_at`) VALUES
(1, 'Inventory', 'Dhaka, Bangladesh', 'inventory@gmail.com', '06742589', 'favicon.png', '01704039173', 'Dhaka', 'Bangladesh', '3464', '2022-02-21 09:30:00', '2022-02-21 04:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `type`, `account_holder`, `account_number`, `bank_name`, `branch_name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Arafat Ali', 'arafataliar69@gmail.com', '01704039179', 'Motijheel,Dhaka', '16_02_2022_1645004436.jpeg', 'Whole Seller', 'arafat', '56888957854', 'Islamik Bank', 'Jhenaidah', 'Dhaka, Bangladesh', '2022-02-16 03:40:36', '2022-02-21 09:09:46'),
(2, 'Shovon Sha', 'shovon@gmail.com', '01756985887', 'Motijheel,Dhaka', '21_02_2022_1645455981.jpg', 'Distributor', 'Shovon', '56888957854', 'Islamik Bank', 'Dhaka', 'Dhaka, Bangladesh', '2022-02-21 09:06:21', '2022-02-21 09:06:21'),
(3, 'Shahin Alom', 'shahin897ub@gmail.com', '01756985659', 'mirpur-10,Dhaka', '21_02_2022_1645456085.jpg', 'Whole Seller', 'Shahin', '65487412441', 'Duch-bangla-bank', 'Dhaka', 'Dhaka', '2022-02-21 09:08:05', '2022-02-21 09:08:05'),
(4, 'mafiya', 'don@gmail.com', '01756985659', 'mirpur-10,Dhaka', '21_02_2022_1645456144.jpg', 'Brochure', 'Shovon', '56888957854', 'Duch-bangla-bank', 'Dhaka', 'Dhaka', '2022-02-21 09:09:04', '2022-02-21 09:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arafat Ali', 'arafataliar69@gmail.com', NULL, '$2y$10$JQyjW7VamrRjwFcpALKeL.RWFLiNQY43GgnepowqveCbYHQovLkMy', 'POWZvszHNy5A2i5IzaATNsnx0NvCIOJaiySXejSbShnvQ8vfMRFOTdbSWeD4', '2022-02-14 09:12:58', '2022-02-14 09:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_salary`
--
ALTER TABLE `advance_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_salary`
--
ALTER TABLE `advance_salary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
