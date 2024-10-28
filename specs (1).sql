-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 06:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `specs`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_super_text` varchar(255) NOT NULL,
  `banner_sub_text` varchar(255) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_image`, `banner_super_text`, `banner_sub_text`, `active`) VALUES
(3, 'Banner_791.jpg', 'FESTIVAL SALE', 'FEEL CRYSTAL CLEAR', 'Yes'),
(4, 'Banner_100.jpg', 'BIG SALE', 'PUSH FOR A BETTER VISION', 'Yes'),
(5, 'Banner_699.jpg', 'BIG BILLION DAY SALE', 'WHATEVER YOU SEE, CAN INSPIRE YOU', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(80) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` bigint(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `brand`, `color`, `image_name`, `price`, `category`, `quantity`, `total`, `order_date`, `publisher`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(55, 'javed', 'RayBan', 'black', 'Product-6873.jpg', '10.00', 'Eyeglasses', 1, '10.00', '2022-07-03 00:00:00', 'javed', 'osama', 8879844015, 'osamap4026@gmail.com', 'dfb'),
(56, 'Gold Full Rim Aviator Sunglasses', 'Vincent Chase', 'Gold', 'Product-9325.jpg', '1550.00', 'Sunglasses', 1, '1550.00', '2022-08-29 00:00:00', 'Super Admin', 'xyz', 1111111178, 'xyz@gmail.com', 'pata nahi'),
(58, 'Black Full Rim Rectangle Eyeglasses', 'Vincent Chase', 'Black', 'Product-4988.jpg', '1000.00', 'Eyeglasses', 5, '5000.00', '2022-09-03 00:00:00', 'Super Admin', 'test', 8888899999, 'test@gmail.com', 'cscs'),
(59, 'Gold Sunglasses', '', 'Gold', 'Product-6041.jpg', '1950.00', 'Sunglasses', 2, '3900.00', '2022-09-04 00:00:00', 'Super Admin', 'test', 8888899999, 'test@gmail.com', 'cscs');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(43, 'Eyeglasses', 'Specs_Category_757.png', 'Yes', 'Yes'),
(44, 'Sunglasses', 'Specs_Category_368.png', 'Yes', 'Yes'),
(45, 'Computer Glasses', 'Specs_Category_185.png', 'Yes', 'Yes'),
(46, 'Contact Lenses', 'Specs_Category_820.png', 'Yes', 'Yes'),
(47, 'Power Sunglasses', 'Specs_Category_826.png', 'Yes', 'Yes'),
(48, 'Reading Glasses', 'Specs_Category_968.png', 'Yes', 'Yes'),
(51, 'glasses', 'Specs_Category_194.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `solved` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) NOT NULL,
  `min_value` int(11) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `min_value`, `active`) VALUES
(5, 'FIRST50', 50, 'Rupee', 200, 'No'),
(6, 'FIRST51', 545, 'Rupee', 425, 'Yes'),
(7, '42', 42, 'Rupee', 52, 'Yes'),
(8, '1', 2, 'Percentage', 1, 'Yes'),
(10, 'five', 50, 'Percentage', 10, 'Yes'),
(11, 'fifty', 1000, 'Rupee', 10000, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `expense_date` date NOT NULL,
  `expense` decimal(10,2) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `username`, `expense_date`, `expense`, `purpose`, `payment_mode`, `payment_remark`) VALUES
(17, 'osama', '2022-06-29', '500.00', 'bill', 'CASH', 'house bill'),
(19, 'osama', '2022-06-29', '100.00', 'bill', 'UPI PAYMENT', 'house bill'),
(20, 'osama', '2022-06-29', '100.00', 'bill', 'UPI PAYMENT', 'house bill'),
(21, 'osama', '2022-07-02', '500.00', 'bill', 'CASH', 'house bill');

-- --------------------------------------------------------

--
-- Table structure for table `eye_test`
--

CREATE TABLE `eye_test` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `whatsapp_contact` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `visited` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tester` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eye_test`
--

INSERT INTO `eye_test` (`id`, `username`, `email`, `contact`, `whatsapp_contact`, `address`, `visited`, `description`, `tester`, `date`) VALUES
(11, 'osama', 'osamap4026@gmail.com', 8879844015, 8879844015, 'fbdvfd', 'No', 'Not Contacted Yet', '27', '2022-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_name`) VALUES
(7, 'Gallery_688.jpg'),
(8, 'Gallery_462.jpg'),
(9, 'Gallery_812.jpg'),
(10, 'Gallery_864.jpg'),
(11, 'Gallery_433.jpg'),
(13, 'Gallery_683.jpg'),
(14, 'Gallery_531.jpg'),
(15, 'Gallery_286.jpg'),
(16, 'Gallery_387.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_try_on`
--

CREATE TABLE `home_try_on` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `whatsapp_contact` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `visited` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `appointment_type` varchar(20) NOT NULL,
  `tester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_try_on`
--

INSERT INTO `home_try_on` (`id`, `username`, `email`, `contact`, `whatsapp_contact`, `address`, `visited`, `description`, `appointment_type`, `tester`) VALUES
(10, 'osama', 'osamap4026@gmail.com', 8879844015, 8879844015, 'sa', 'No', 'Not Contacted Yet', 'vision therapist', '27');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_code`, `title`, `publisher`, `description`, `price`, `brand`, `color`, `image_name`, `category_id`) VALUES
(12, '1000', 'Gold Full Rim Aviato', 'javed', 'Product Id  149284\r\nModel No. VC S13127\r\nFrame Size Medium\r\nFrame Width 141 Mm\r\nFrame Dimensions 56-16-145', '2000.00', 'Vincent Chase', 'gold', 'Inventory-409.jpg', 44),
(13, '1000A', 'Gold Sunglasses', 'javed', 'Product Id  149284\r\nModel No. VC S13127\r\nFrame Size Medium\r\nFrame Width 141 Mm\r\nFrame Dimensions 56-16-145', '2500.00', 'Vincent Chase', 'gold', 'Inventory-8928.jpg', 44),
(14, '1001', 'Black Full Rim Recta', 'osama', 'Product Id 151939\r\nModel No. LA E14605\r\nFrame Size Medium\r\nFrame Width 134 Mm\r\nFrame Dimensions 50-17-145', '1500.00', 'Vincent Chase', 'Black', 'Inventory-9080.jpg', 43),
(15, '1001A', 'Full Rim Geometric E', 'osama', 'Product Id 201126\r\nModel No. VC E14809\r\nFrame Size Wide\r\nFrame Width 138 Mm\r\nFrame Dimensions 54-16-145', '2000.00', 'Vincent Chase', 'Black', 'Inventory-1216.jpg', 43),
(16, '1001B', 'Black Eyeglasses', 'javed', 'Product Id 201126\r\nModel No. VC E14809\r\nFrame Size Wide\r\nFrame Width 138 Mm\r\nFrame Dimensions 54-16-145', '2700.00', 'Vincent Chase', 'Black', 'Inventory-5175.jpg', 43),
(17, '', 'red glasses', 'osama', 'hmmmm\r\nhiiiiiiiiiiiiiiiiii\r\nuuuuuuuuuuuu', '2000.00', 'new brand', 'red', 'Inventory-8313.jpg', 43);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(80) NOT NULL,
  `power_left` varchar(255) NOT NULL,
  `power_right` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `shipping_charge` int(20) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `coupon_id` int(20) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `image_name`, `category`, `brand`, `color`, `price`, `quantity`, `power_left`, `power_right`, `total`, `shipping_charge`, `discount`, `order_date`, `status`, `publisher`, `invoice_no`, `coupon_id`, `coupon_code`, `coupon_value`) VALUES
(214, 'Black Full Rim Rectangle Eyeglasses', 'Product-4988.jpg', 'Eyeglasses', 'Vincent Chase', 'Black', '1000.00', 5, '', '', '5000.00', 150, '0.00', '2022-09-04', 'ordered', 'Super Admin', 'order778SB', 0, '', ''),
(215, 'Gold Sunglasses', 'Product-6041.jpg', 'Sunglasses', '', 'Gold', '1950.00', 2, '', '', '3900.00', 150, '0.00', '2022-09-04', 'ordered', 'Super Admin', 'order778SB', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `discounted_price` decimal(10,2) NOT NULL,
  `discount` int(20) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(80) NOT NULL,
  `new_arrival` varchar(255) NOT NULL,
  `featured` varchar(80) NOT NULL,
  `popular` varchar(80) NOT NULL,
  `active` varchar(80) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `banner` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `title`, `publisher`, `description`, `price`, `brand`, `color`, `discounted_price`, `discount`, `image_name`, `category_id`, `new_arrival`, `featured`, `popular`, `active`, `recommend`, `banner`) VALUES
(46, '1000', 'Gold Full Rim Aviator Sunglasses', 'Super Admin', 'Product Id  149284\r\nModel No. VC S13127\r\nFrame Size Medium\r\nFrame Width 141 mm\r\nFrame Dimensions 56-16-145', '2000.00', 'Vincent Chase', 'Gold', '1550.00', 25, 'Product-9325.jpg', 44, 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(47, '1000A', 'Gold Sunglasses', 'Super Admin', 'Product Id  149284\r\nModel No. VC S13127\r\nFrame Size Medium\r\nFrame Width 141 mm\r\nFrame Dimensions 56-16-145\r\n', '2500.00', '', 'Gold', '1950.00', 25, 'Product-6041.jpg', 44, 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes'),
(48, '1001', 'Black Full Rim Rectangle Eyeglasses', 'Super Admin', 'Product Id 151939\r\nModel No. LA E14605\r\nFrame Size Medium\r\nFrame Width 134 mm\r\nFrame Dimensions 50-17-145', '1500.00', 'Vincent Chase', 'Black', '1000.00', 25, 'Product-4988.jpg', 43, 'No', 'Yes', 'Yes', 'Yes', 'No', 'Yes'),
(49, '1001A', 'Full Rim Geometric Eyeglasses', 'Super Admin', 'Product Id 201126\r\nModel No. VC E14809\r\nFrame Size Wide\r\nFrame Width 138 mm\r\nFrame Dimensions 54-16-145', '2000.00', '', 'Black', '1190.00', 35, 'Product-999.jpg', 43, 'Yes', 'Yes', 'No', 'Yes', 'No', 'No'),
(50, '1001B', 'Black Eyeglasses', 'Super Admin', 'Product Id 201126\r\nModel No. VC E14809\r\nFrame Size Wide\r\nFrame Width 138 mm\r\nFrame Dimensions 54-16-145\r\n', '2700.00', '', 'Black', '1500.00', 40, 'Product-2375.jpg', 43, 'No', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(51, '1004', 'blue', 'Super Admin', 'xyz', '1500.00', '', 'blue', '1200.00', 10, 'Product-927.jpg', 43, 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No'),
(53, '10', 'fs', 'osama', 'scd', '10.00', 'RayBan', 'black', '10.00', 0, 'Product-5112.jpeg', 43, 'No', 'No', 'No', 'No', 'No', 'No'),
(55, '250', 'nb v', 'faisal', ' bhm', '54.00', 'black', '', '51.00', 54, 'Product-6706.png', 43, 'No', 'No', 'No', 'No', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `id` int(11) NOT NULL,
  `charge` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`id`, `charge`) VALUES
(1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `shop_owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_name`, `designation`, `shop_owner`) VALUES
(2, 'osama', 'cashier', 'javed'),
(6, 'saif', 'manager', 'osama');

-- --------------------------------------------------------

--
-- Table structure for table `stock_records`
--

CREATE TABLE `stock_records` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `stock_code` int(20) NOT NULL,
  `stock_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `previous_owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_records`
--

INSERT INTO `stock_records` (`id`, `supplier_name`, `stock_code`, `stock_name`, `quantity`, `unit_price`, `total_price`, `previous_owner`) VALUES
(26, 'faisal', 1000, 'blue glasses', 250, '10000.00', '2500000.00', '0'),
(27, 'faisal', 1000, 'sunglasses', 100, '2000.00', '200000.00', '0'),
(28, 'osama', 1000, 'eye glasses', 30, '1000.00', '30000.00', 'osama'),
(29, 'osama', 1004, 'reading glasses', 50, '3000.00', '150000.00', 'osama'),
(30, 'osama', 1003, 'power sunglasses', 189, '2500.00', '472500.00', 'osama'),
(31, 'osama', 1005, 'glasses', 20, '2004.00', '40080.00', 'osama');

-- --------------------------------------------------------

--
-- Table structure for table `subadmin`
--

CREATE TABLE `subadmin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sub_contact` bigint(10) NOT NULL,
  `branch_image` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subadmin`
--

INSERT INTO `subadmin` (`id`, `full_name`, `username`, `sub_contact`, `branch_image`, `branch_name`, `branch_location`, `password`) VALUES
(23, 'osama', 'osama', 8879844015, 'Branch-3072.jpg', 'alfa optics', 'kurla,mumbai', '$2y$10$K3K1brqoU0w5Wl5XeknlVudFGOndsUsYYUNTlNL4PZ8cywYPq94GC'),
(27, 'faisal', 'faisal', 0, 'Branch-5230.jpg', 'alfa optics', 'andheri', '$2y$10$FnJWU1qlauRiBiqDO3NkCeB..L1wzrovndChXCq.K3YRpXj7fan7C'),
(29, 'faisal', 'fais', 9999955555, 'Branch-6293.jpeg', 'ziya optics', 'andheri', '$2y$10$T/1eEPvpAuiubOHTM..knel9hSjv.N4bquD4ml0ZYhVO7z2Qaaq3y');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sup_contact` bigint(10) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_location` varchar(255) NOT NULL,
  `branch_image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `full_name`, `username`, `sup_contact`, `branch_name`, `branch_location`, `branch_image`, `password`) VALUES
(46, 'javed', 'javed', 8879844015, 'alfa optics', 'Kurla', 'Branch-2313.jpg', '$2y$10$M9KXhs.FTJ4JXTF9njXLCe0zC6CfJqeGflDApHGNUVXCvJOBOZP6u');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gold_membership` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `address`, `password`, `gold_membership`) VALUES
(6, 'saif', 'osamap4026@gmail.com', 8879844015, 'dfb', '$2y$10$5DpJlTRGj2SW6XFDehjpjekBca13QL2YehXSVnkCmYBXuUP5FASsi', 'false'),
(14, 'osama', 'jp@gmail.com', 8879844015, 'wce', '$2y$10$DdG/CbVXXM6rB6/btcaZReA8DpwQDPb1bMRHl99oIplaPA6DbVVVm', 'false'),
(15, 'maqsood', 'mq@gmail.com', 8888899999, 'vsd', '$2y$10$y12vQL3wbp1f/BbORRf33e6OGjKv02KkqCbjX.D/1iMKxBwGOqR1q', 'true'),
(16, 'test', 'test@gmail.com', 8888899999, 'cscs', '$2y$10$okVoHCyXlI4tEN60Rj4wIOQLKDUY8/OmQ0ZoHPbQhIsJTsTAKDoiS', 'true'),
(17, 'osama', 'abc@gmail.com', 8879844015, 'kurla', '$2y$10$hWKYvAsIuG27nGyuEPw8xOi0MHMu9H6qwCG9e54rMT9wm49Or6yeC', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eye_test`
--
ALTER TABLE `eye_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_try_on`
--
ALTER TABLE `home_try_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_records`
--
ALTER TABLE `stock_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `eye_test`
--
ALTER TABLE `eye_test`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_try_on`
--
ALTER TABLE `home_try_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_records`
--
ALTER TABLE `stock_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subadmin`
--
ALTER TABLE `subadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
