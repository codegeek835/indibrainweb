-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 10:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(11, 'Perspective', 1),
(7, 'Lifestyle', 1),
(12, 'Wildlife', 1),
(13, 'Nature', 1),
(14, 'Festival', 1),
(15, 'Blended', 1),
(16, 'Digital Painting', 1),
(17, 'Creative', 1),
(18, 'Wallpaper', 1),
(19, 'Street', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `status`) VALUES
(1, 'White', 1),
(2, 'Black', 1),
(3, 'Red', 1),
(4, 'Green', 1),
(5, 'Grey', 1),
(6, 'Purple', 1),
(7, 'Blue', 1),
(8, 'Yellow', 1);

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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `order_date`) VALUES
(4, 25, 5, 112, 120, 'pending', '2020-09-04 15:47:56'),
(5, 24, 6, 113, 100, 'pending', '2020-09-13 22:04:12'),
(6, 34, 7, 114, 120, 'pending', '2020-09-13 22:07:33'),
(11, 25, 9, 116, 1, 'pending', '2020-11-21 11:55:11'),
(10, 25, 8, 115, 250, 'pending', '2020-09-27 04:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_user_id` int(11) NOT NULL,
  `product_id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `sales_quantity` int(3) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `pro_user_id`, `product_id`, `product_name`, `product_price`, `sales_quantity`, `created_at`) VALUES
(5, 4, 32, 93, 'Testing', 120, 1, '2020-09-10'),
(6, 5, 32, 95, 'Nature', 100, 1, '2020-09-13'),
(7, 6, 32, 93, 'Testing', 120, 1, '2020-09-13'),
(8, 10, 32, 98, 'Test3', 130, 1, '2020-09-27'),
(9, 10, 32, 93, 'Testing', 120, 1, '2020-09-27'),
(10, 11, 32, 104, 'new car', 1, 1, '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `payment_type` varchar(20) NOT NULL,
  `payment_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `payment_status`, `payment_type`, `payment_date_time`, `payment_message`) VALUES
(115, '', 'pending', 'paypal', '2020-09-27 04:09:36', 'This is my Test'),
(112, '', 'pending', 'paypal', '2020-09-10 15:47:56', 'Hello'),
(113, '', 'pending', 'paypal', '2020-09-13 22:04:12', ''),
(114, '', 'pending', 'paypal', '2020-09-13 22:07:33', ''),
(116, '', 'pending', 'paypal', '2020-11-21 11:55:11', 'cdfghj');

-- --------------------------------------------------------

--
-- Table structure for table `payment_report`
--

CREATE TABLE `payment_report` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `amount` varchar(50) NOT NULL,
  `downloads` int(10) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_report`
--

INSERT INTO `payment_report` (`id`, `user_id`, `invoice`, `invoice_date`, `amount`, `downloads`, `status`) VALUES
(5, 32, 'jeph_325', '2020-09-05', '590', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_user_id` int(11) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_cat` tinyint(4) NOT NULL,
  `category` varchar(50) NOT NULL,
  `verticals` varchar(50) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_quantity` int(10) NOT NULL,
  `license_type` varchar(50) NOT NULL,
  `orientation` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `people` int(5) NOT NULL,
  `pro_availability` tinyint(4) NOT NULL COMMENT 'status 1=instock, 2=outof stock, 3= up coming',
  `pro_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'status=1 enable status=2 disable  status=3 reject',
  `pro_image` text DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0 COMMENT 'show Featured =1 other wise value=0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_user_id`, `pro_title`, `pro_desc`, `pro_cat`, `category`, `verticals`, `pro_price`, `pro_quantity`, `license_type`, `orientation`, `color`, `people`, `pro_availability`, `pro_status`, `pro_image`, `is_featured`, `created_at`) VALUES
(93, 32, 'Testing', '<p>Testing1</p>\r\n', 17, 'Creative', 'photos', 120, 8, 'Standard', 'Horizontal', 'Green', 2, 1, 1, 'product_1599841113.jpeg', 1, '2020-10-10 09:50:03'),
(95, 32, 'Nature', '<p>Nature</p>\r\n', 18, 'Wallpaper', 'vector', 100, 126, 'Standard', 'Vertical', 'Purple', 1, 1, 1, 'product_1600031995.jpeg', 1, '2020-10-10 09:52:18'),
(96, 32, 'test1 ', '<p>test1</p>\r\n', 18, 'Wallpaper', 'arts', 50, 127, 'Standard', 'Horizontal', 'Yellow', 1, 1, 1, 'product_1600032040.jpeg', 1, '2020-10-10 09:52:13'),
(97, 32, 'test2', '<p>test2</p>\r\n', 14, 'Festival', 'prints', 120, 127, 'Standard', 'Square', 'Blue', 1, 1, 1, 'adorable_animal_background_164489.jpg', 1, '2020-10-20 15:44:36'),
(98, 32, 'Test3', '<p>Test3</p>\r\n', 17, 'Creative', 'vector', 130, 99, 'Standard', 'Horizontal', 'Red', 1, 1, 1, 'product_1600032161.jpeg', NULL, '2020-10-10 09:50:06'),
(99, 32, 'Test4', '<p>Test4</p>\r\n', 17, 'Creative', 'prints', 120, 127, 'Standard', 'Vertical', 'Purple', 1, 1, 1, 'colored_pencils_colour_pencils.jpg', NULL, '2020-10-20 15:41:20'),
(103, 37, 'asdfghjm', '<p>dejwfi43 443 ,9-34ht m49h43m349ht4p3</p>\r\n', 19, 'Street', 'prints', 2345, 5, 'Editorial', 'Vertical', 'Green', 1, 1, 1, 'drop_water_impact_experiment.jpg', NULL, '2020-10-20 15:41:38'),
(104, 32, 'new car', '<p>new car buy</p>\r\n', 18, 'Wallpaper', 'photos', 1, 0, 'Standard', 'Horizontal', 'Red', 0, 1, 1, 'product_1603380042.jpg', NULL, '2020-11-21 11:55:11'),
(107, 32, 'sxdfgfh', '<p>jfgnlkgr</p>\r\n\r\n<p>grghregr</p>\r\n\r\n<p>egerger</p>\r\n', 15, 'Blended', 'photos', 0, 100000, 'Standard', 'Horizontal', 'Green', 12, 1, 1, 'product_1603384206.JPG', NULL, '2020-10-22 16:30:06'),
(108, 32, 'coffee', '<p>FSAZ</p>\r\n', 19, 'Street', 'vector', 11, 100000, 'Standard', 'Horizontal', 'White', 3, 1, 1, 'product_1603384715.jpg', NULL, '2020-10-22 16:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` bigint(15) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `user_id`, `username`, `user_email`, `user_phone`, `address`, `country`, `state`, `city`, `pincode`, `order_date`) VALUES
(8, 25, 'Abhilash Kumar', 'ak4abhilash@gmail.com', 8506831733, 'New Ashok Nagar, Delhi', 'India', 'Delhi', 'East Delhi', '110096', '2020-09-27 04:09:35'),
(5, 25, 'Abhilash Kumar', 'ak4abhilash@gmail.com', 8506831733, 'New Ashok Nagar, Delhi', 'India', 'Delhi', 'East Delhi', '110096', '2020-09-10 15:47:56'),
(6, 24, 'Akash Gupta', 'gippy.gupta@gmail.com', 8285160104, 'Noida', 'India', 'Uttar Pradesh', 'Noida', '201301', '2020-09-13 22:04:12'),
(7, 34, 'Ayush Gupta', 'ayushmaj04@gmail.com', 123456789, 'supertech captown', 'India', 'Uttar Pradesh', 'Noida', '201301', '2020-09-13 22:07:33'),
(9, 25, 'Abhilash Kumar', 'ak4abhilash@gmail.com', 8506831733, 'New Ashok Nagar, Delhi', 'India', 'Delhi', 'East Delhi', '110096', '2020-11-21 11:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` bigint(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(3) NOT NULL DEFAULT 3 COMMENT 'admin=1,partner=2,user=3',
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `account_number` bigint(20) NOT NULL,
  `IFSC_code` varchar(50) NOT NULL,
  `pan_number` varchar(100) NOT NULL,
  `user_status` tinyint(3) NOT NULL,
  `user_level` varchar(20) NOT NULL COMMENT 'Platinum,Gold ,Silver',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_phone`, `user_password`, `user_role`, `address`, `country`, `state`, `city`, `pincode`, `image`, `holder_name`, `bank_name`, `branch_name`, `account_number`, `IFSC_code`, `pan_number`, `user_status`, `user_level`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1234567654, '$2y$10$sjw218wtQmjS.J6rb83U3.oL3ruHera8c7XWp7r69rlF.JL7xGcP6', 1, '', '', '', '', 0, '', '', '', '', 0, '', '0', 1, '', '2020-09-25 15:35:20'),
(24, 'Akash Gupta', 'gippy.gupta@gmail.com', 8285160104, '$2y$10$i73d1EsYdWcIdE6udDJP2uthacBLl8XauSeeuJDIeYpjQYIHgQ5rG', 3, 'Noida', 'India', 'Uttar Pradesh', 'Noida', 201301, 'user_1600034338.jpg', '', '', '', 0, '', '0', 1, '', '2020-09-25 15:35:24'),
(25, 'Abhilash Kumar', 'ak4abhilash@gmail.com', 8506831733, '$2y$10$DS9FbI1GRaKf6GCkmI5FwOlScEEU2lzNgdgPqC4rZzPRRaWtk/vNC', 3, 'New Ashok Nagar, Delhi', 'India', 'Delhi', 'East Delhi', 110096, 'user_1601204211.jpg', '', '', '', 0, '', '0', 1, '', '2020-11-12 06:34:10'),
(32, 'Abhilash kumar', 'abhilashphp6@gmail.com', 8506831733, '$2y$10$b5HmrQNP/QmS83T61i6U4Oo8p52xtxMe6j3d3ERrFDEFjWRJPk/2S', 2, 'New Ashok Nagar, Delhi', 'India', 'Delhi', 'Delhi', 100011, 'partner_1597069391.jpeg', 'Abhilash kumar', 'ICICI Bank', 'New Delhi', 31401523455, 'ICICI0000314', 'CMKP8075P', 1, 'Silver', '2020-11-23 10:34:01'),
(30, 'Akash Gupta', 'gippy.g@gmail.com', 8285160104, '$2y$10$7tLqlgk.1PGM.U5ORNdzzOA4rARAOk0JfMJYd3gBk4/JYmTZoXxBi', 2, '', '', '', '', 0, '', '', '', '', 0, '', '0', 1, 'Silver', '2020-09-25 15:34:01'),
(31, 'Akshay Singh', 'kmcsinghakshay@gmail.com', 7042858369, '$2y$10$2Mi5qf88WSeRduJNjnB.vuAXEczQ4o9QGKEWGj.DDyGWcjkBeJ1yO', 2, '', '', '', '', 0, '', '', '', '', 0, '', '0', 1, 'Silver', '2020-09-25 15:34:05'),
(33, 'Ram Meena', 'ram.meena242@gmail.com', 9916022240, '$2y$10$wd9yzIEoLHOmeenq1y7ehuamOiAKN3ksmhSJBtEZ5aCSecB8uccbu', 2, '', '', '', '', 0, '', '', '', '', 0, '', '0', 1, 'Silver', '2020-09-25 15:34:15'),
(34, 'Ayush Gupta', 'ayushmaj04@gmail.com', 123456789, '$2y$10$ZeMET/wp38TmQZeS6pUvs.1EEmhcUcjxqZfek9uXrG6E3WYqq6tUm', 3, 'supertech captown', 'India', 'Uttar Pradesh', 'Noida', 201301, '', '', '', '', 0, '', '0', 1, '', '2020-09-25 15:35:47'),
(35, 'Akshay Singh', 'sunderpalsng@gmail.com', 7042858367, '$2y$10$V3XSNPWruzo.N6PKNyArBuaKAffDBcFQInM2DhqgHn2XQF4hhQWFe', 3, '', '', '', '', 0, '', '', '', '', 0, '', '', 1, '', '2020-10-04 10:42:29'),
(36, 'Ayush Gupta', 'ayushlmp04@gmail.com', 8700908028, '$2y$10$PiQA8pCIK9gGQv.Jd/zUFeoZm7ORX8Q0UuKEaeCgyGEo/CRLVtCE6', 2, '', '', '', '', 0, '', '', '', '', 0, '', '', 1, '', '2020-10-18 08:29:24'),
(37, 'Monu Kumar', 'amit@gmail.com', 1234567898, '$2y$10$4YIogm0HseXLPzvduDUbKeRcxhPOgjPXzPrwcvdvioDvcui2fI.9.', 2, '', '', '', '', 0, '', '', '', '', 0, '', '', 1, '', '2020-10-20 14:33:02'),
(38, 'Manoj Kumar verma', 'manpkwebsofy@gmail.com', 7309990011, '$2y$10$xxmDmkeu1Q5ZCb6kcRyBYe/sC6d2b/TLu/zvqd2CRclW4sGQxwjAS', 2, '', '', '', '', 0, '', '', '', '', 0, '', '', 1, '', '2020-10-23 17:08:47'),
(39, 'Akshay Singh', 'akshaysingh@jephine.com', 7042858369, '$2y$10$EzXvOwwZPE8ZnYs2p78r0e3ALjpfwqo73EbXinSpN2WMXVGJEGCrG', 3, '', '', '', '', 0, '', '', '', '', 0, '', '', 1, '', '2020-11-11 12:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(22, 34, 104, '2020-11-10 19:38:56'),
(8, 24, 104, '2020-11-10 08:52:49'),
(23, 25, 104, '2020-11-11 02:57:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

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
-- Indexes for table `payment_report`
--
ALTER TABLE `payment_report`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `payment_report`
--
ALTER TABLE `payment_report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
