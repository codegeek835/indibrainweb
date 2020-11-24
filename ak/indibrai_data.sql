-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 11:01 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indibrai_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(6, 'Asus'),
(5, 'HP'),
(7, 'Dell'),
(8, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(3, 'Hair Care', 1),
(2, 'Women Health Care', 1),
(1, 'Liver Care', 1),
(4, 'Brain & Nerve Care', 1),
(5, 'Hand And Foot Care', 1),
(6, 'Male Health Care', 1),
(8, 'Bath and Spa', 1),
(12, 'Eye Lip Oral Care', 1),
(9, 'BaBy Care', 1),
(10, 'Wonder Herbs', 1),
(11, 'Beautiful Me', 1),
(13, 'Liver Well', 1),
(14, 'Nosefit', 1),
(7, 'Nail Care', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(25) NOT NULL,
  `contact_email` varchar(32) NOT NULL,
  `contact_subject` varchar(32) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_status` tinyint(2) NOT NULL,
  `contact_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `contact_status`, `contact_date`) VALUES
(4, 'abir khan', 'abirkhan@gmail.com', 'Test two', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-28'),
(5, 'abir khan', 'abirkhan@gmail.com', 'Test two', 'Hello, i am abir i need some help.', 0, '2017-12-28'),
(14, 'abcd', 'sumonsarker018@gmail.com', 'Test Message', 'E-Shopper Inc.\r\n\r\n935 W. Webster Ave New Streets Chicago, IL 60614, NY\r\n\r\nNewyork USA\r\n\r\nMobile: +2346 17 38 93\r\n\r\nFax: 1-714-252-0026\r\n\r\nEmail: info@e-shopper.com', 0, '2017-12-28'),
(15, 'mumin', 'mumin@gmail.com', 'Test', 'ddddddddddddd', 0, '2017-12-28'),
(16, 'mumin', 'mumin@gmail.com', 'Test Message', 'Test Message', 0, '2017-12-28'),
(17, 'mumin', 'mumin@gmail.com', 'Test Message', 'Test Message', 0, '2017-12-27'),
(19, 'sumon', 'sumon@gmail.com', 'This is sumon', 'This is sumon', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(55) NOT NULL,
  `cus_email` varchar(55) NOT NULL,
  `cus_company` varchar(100) NOT NULL,
  `cus_password` varchar(32) NOT NULL,
  `cus_mobile` varchar(14) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_state` varchar(55) NOT NULL,
  `cus_city` varchar(55) NOT NULL,
  `cus_zip` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_company`, `cus_password`, `cus_mobile`, `cus_address`, `cus_state`, `cus_city`, `cus_zip`, `created_at`) VALUES
(50, 'Abhilash kumar', 'abhilashphp6@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '01234567876', 'New Ashok Nagar, Delhi', 'India', 'East Delhi', '11009', '2020-06-16 12:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `cus_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `order_date`) VALUES
(102, 50, 83, 107, 430, 'pending', '2020-06-10 12:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(12) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `sales_quantity` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `sales_quantity`) VALUES
(128, 102, 60, 'Asus Mouse', 30, 1),
(127, 102, 74, 'Latest Watch', 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `payment_type` varchar(20) NOT NULL,
  `payment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_status`, `payment_type`, `payment_date_time`, `payment_message`) VALUES
(107, 'pending', 'cash_on_delivery', '2020-06-10 12:45:52', 'New Pay');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_cat` tinyint(4) NOT NULL,
  `pro_sub_cat` tinyint(4) NOT NULL,
  `pro_brand` tinyint(4) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_quantity` tinyint(4) NOT NULL,
  `pro_availability` tinyint(4) NOT NULL COMMENT 'status 1=instock, 2=outof stock, 3= up coming',
  `pro_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'status=1 enable status=2 disable',
  `pro_image` text,
  `top_product` tinyint(1) DEFAULT '0' COMMENT 'show top value=1 other wise value=0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_title`, `pro_desc`, `pro_cat`, `pro_sub_cat`, `pro_brand`, `pro_price`, `pro_quantity`, `pro_availability`, `pro_status`, `pro_image`, `top_product`) VALUES
(53, 'Samsung j7', '<p>Samsung j5</p>\r\n', 71, 0, 8, 100, -87, 1, 1, 'uploads/j7.jpeg', 1),
(56, 'Asus Monitor', '<p>Asus Monitor</p>\r\n', 74, 0, 8, 20, -67, 1, 1, 'uploads/asus.jpg', 1),
(57, 'Samsung Laptop', '<p>Samsung Laptop</p>\r\n', 76, 0, 8, 200, 7, 1, 1, 'uploads/Notebook9-PCD.jpg', 1),
(58, 'Latest Watch', '', 73, 0, 6, 20, 7, 1, 1, 'uploads/asus_watch.png', NULL),
(59, 'Latest Men Watch', '<p>Latest Men Watch</p>\r\n', 73, 0, 6, 50, 1, 1, 1, 'uploads/watch.jpg', 1),
(60, 'Asus Mouse', '<p>Asus Mouse</p>\r\n', 75, 26, 6, 30, 11, 1, 1, 'uploads/asus1.jpg', 1),
(74, 'Latest Watch', '<p>Latest Watch</p>\r\n', 73, 28, 8, 400, 3, 1, 1, 'uploads/women_watch.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `is_ship` int(5) NOT NULL DEFAULT '0',
  `ship_name` varchar(55) NOT NULL,
  `ship_email` varchar(55) NOT NULL,
  `ship_mobile` varchar(14) NOT NULL,
  `ship_address` text NOT NULL,
  `ship_state` varchar(55) NOT NULL,
  `ship_city` varchar(55) NOT NULL,
  `ship_zip` varchar(5) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `cus_id`, `is_ship`, `ship_name`, `ship_email`, `ship_mobile`, `ship_address`, `ship_state`, `ship_city`, `ship_zip`, `order_date`) VALUES
(83, 50, 0, 'Abhilash kumar', 'abhilashphp6@gmail.com', '01234567876', 'New Ashok Nagar, Delhi', 'India', 'East Delhi', '11009', '2020-06-10 12:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `category_sub_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_category_name`, `category_sub_id`) VALUES
(6, 'Erectile Dysfunction', 6),
(7, 'Fatty Liver', 1),
(5, 'Anti Dandruff', 3),
(3, 'Anxiety/Depression', 4),
(4, 'Anti Hair Fall', 3),
(1, 'Hand Cleanser/Sanitizer', 5),
(8, 'Anti Crack Cream', 5),
(9, 'Libido Enhancer', 6),
(10, 'Oligospermia', 6),
(11, 'Premature Ejaculation', 6),
(30, 'Antioxidant', 10),
(12, 'Spermaturia/Sperm In Urine', 6),
(13, 'Dysmenorrhea', 2),
(14, 'Leucorrhea/White Discharge', 2),
(15, 'MenopauseMenopause', 2),
(16, 'PCOD', 2),
(17, 'Uterine Fibroid', 2),
(18, 'Fatty Liver1', 1),
(19, 'Hepatomegaly', 1),
(20, 'Hepatitis', 1),
(21, 'Jaundice', 1),
(22, 'Insomnia', 4),
(23, 'Memory Enhancers', 4),
(24, 'Migraine', 4),
(25, 'Stress Busters', 4),
(26, 'Baby Lotion', 9),
(27, 'Baby Massage Oil', 9),
(28, 'Baby Powder', 9),
(29, 'Baby Shampoo', 9),
(31, 'Baby Drops', 10),
(32, 'Brain Tonic', 10),
(33, 'Eye Care', 10),
(34, 'Hairfall Control', 10),
(35, 'Dry/Damage Repair', 3),
(36, 'Hair Oil/Serum', 3),
(37, 'Shampoo/Conditioner', 3),
(38, 'Eye Cream/Gel', 12),
(39, 'Gum Tone/Powder/Oil', 12),
(40, 'Kajal/Eye Liner', 12),
(41, 'Lip Balm/Lip Butter', 12),
(42, 'Mouthwash/Toothpaste', 12),
(43, 'Baby Hygiene', 9),
(44, 'Nasty Beauty', 5),
(46, 'Acne/Scar Removal', 11),
(47, 'Anti Ageing', 11),
(48, 'Cleanser/Moisturizer', 11),
(49, 'Dry Dull Skin', 11),
(50, 'Scrubs/Toners', 11),
(51, 'Aroma Oil', 8),
(52, 'Body Lotion', 8),
(53, 'Essential Oil', 8),
(54, 'Face Wash', 8),
(55, 'Soap/Body Wash', 8),
(56, 'Liver Well', 13),
(57, 'Nosefit', 14),
(2, 'Hand Cream', 5),
(45, 'Foot Cream', 5);

-- --------------------------------------------------------

--
-- Table structure for table `top_category`
--

CREATE TABLE `top_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(3) NOT NULL,
  `user_status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_role`, `user_status`, `created_at`) VALUES
(1, 'Abhilash kum', 'admin@gmail.com', '$2y$10$sjw218wtQmjS.J6rb83U3.oL3ruHera8c7XWp7r69rlF.JL7xGcP6', 1, 1, '2020-06-27 11:36:32'),
(2, 'abir', 'abir@gmail.com', '$2y$10$jC5vMlVtrPNSZNZr4cpJ.O4x.pvMMhRMkLV/NuOthbiVlttTHmsTi', 0, 1, '2020-06-16 12:28:10'),
(3, 'Author', 'admin@gmail.com', 'admin', 3, 1, '2020-06-16 12:28:10'),
(4, 'Editor', 'editor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '2020-06-16 12:28:10'),
(15, 'dddddddddddd', 'dddddddddd@gmail.com', '$2y$10$.pEXHG8AENKIfZUVrfDc0O1CRZI4FBjymkeVznJ7apaqir0beALqa', 0, 1, '2020-06-16 12:28:10'),
(13, 'Deloyar J Imran', 'Imran@gmail.com', '$2y$10$RnujkWIfW4DURvAKYlaSfOZp6XMPrIXtP.HGCICoKQbWyTHR3104y', 2, 1, '2020-06-16 12:28:10'),
(14, 'abir', 'ami@gmail.com', '$2y$10$WW/OrYnmOwlFgWEM4zQ22Om3XQFDmyntZegtRNKN9OVcfQ4GXfluC', 0, 1, '2020-06-16 12:28:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `top_category`
--
ALTER TABLE `top_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `top_category`
--
ALTER TABLE `top_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
