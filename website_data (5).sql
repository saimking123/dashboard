-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 07:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_comments`
--

CREATE TABLE `add_comments` (
  `id` int(11) NOT NULL,
  `comment_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` text NOT NULL,
  `dat_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_comments`
--

INSERT INTO `add_comments` (`id`, `comment_name`, `email`, `phone`, `message`, `dat_time`, `product_id`) VALUES
(25, 'memon', 'memon@gmail.com', 3231313, 'asdasdjdnasdfaf ff', '2023-10-11 12:36:27', 6),
(26, 'saim', 'saim@gmail.com', 3123123, 'dasdasd asdffasf', '2023-10-11 12:38:19', 6),
(27, 'saim', 'saim@gmail.com', 3123123, 'dasdasd asdffasf', '2023-10-11 12:38:49', 6),
(28, 'saim', 'saim@gmail.com', 3123123, 'dasdasd asdffasf', '2023-10-11 12:38:51', 6),
(29, 'saim', 'saim@gmail.com', 3123123, 'dasdasd asdffasf', '2023-10-11 12:39:18', 6),
(30, 'abcd', 'abcd@gmail.com', 3213123, 'dadasdasd', '2023-10-11 14:17:34', 53);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `discount`, `tax`, `product_id`, `user_id`) VALUES
(12, 2, 22, 4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'smart watches'),
(2, 'Men Watches'),
(3, 'Woman watches'),
(4, 'Children watches'),
(5, 'Wall watches'),
(6, 'abc'),
(7, 'abc'),
(8, 'abc'),
(9, 'nice watch');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` mediumtext NOT NULL,
  `address2` varchar(225) DEFAULT NULL,
  `country` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `zipcode` varchar(225) NOT NULL,
  `total_price` varchar(225) NOT NULL,
  `order_status` varchar(225) DEFAULT 'inprocess',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `email`, `address`, `address2`, `country`, `state`, `zipcode`, `total_price`, `order_status`, `created_at`, `updated_at`) VALUES
(16, 'Clio', 'Whitaker', 'xykybi@mailinator.com', 'Voluptatem quis adip', 'Dignissimos voluptat', 'United States', 'California', '45068', '', 'confirmed', '2023-10-17 01:59:08', '2023-10-17 01:59:08'),
(17, 'saim', 'jawed', 'saim@gmail.com', 'abc colony ', 'abc colony', 'United States', 'California', '79000', '', 'confirmed', '2023-10-17 02:10:46', '2023-10-17 02:10:46'),
(18, 'Mikayla', 'Black', 'coperi@mailinator.com', 'Est consequatur fug', 'Perferendis esse est', 'United States', 'California', '33280', '', 'confirmed', '2023-10-16 17:14:31', '2023-10-17 02:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_price` varchar(225) NOT NULL,
  `qty` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `id` int(11) NOT NULL,
  `review_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` varchar(225) NOT NULL,
  `rating` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`id`, `review_name`, `email`, `phone`, `message`, `rating`, `created`, `modified`, `product_id`) VALUES
(12, '', 'abcd@gmail.com', 2147483647, 'dsadsadas', 2, '2023-10-11 12:14:55', '2023-10-11 12:14:55', 6),
(13, 'eeee', 'ee@gmail.com', 34848, 'dadsda', 0, '2023-10-11 12:19:39', '2023-10-11 12:19:39', 6),
(14, '', 'abc@gmail.com', 2147483647, 'cgcgcgc', 5, '2023-10-11 12:24:27', '2023-10-11 12:24:27', 6),
(24, 'aaa', 'aaa@gmail.com', 432222222, 'adasdasfa', 3, '2023-10-11 12:32:16', '2023-10-11 12:32:16', 6),
(25, 'hello', 'hello@gmail.com', 2147483647, 'fffdfadfsdfa', 4, '2023-10-11 14:17:07', '2023-10-11 14:17:07', 53),
(26, 'aaa', 'abc@gmail.com', 3231313, 'ggg ggsg', 1, '2023-10-12 12:39:12', '2023-10-12 12:39:12', 50),
(27, 'hello', 'hello@gmail.com', 78978989, 'dasdasd', 0, '2023-10-12 12:40:27', '2023-10-12 12:40:27', 50),
(28, 'eeee', 'eee@gmail.com', 232312, 'dasdasds', 4, '2023-10-12 12:51:59', '2023-10-12 12:51:59', 50),
(29, 'eeee', 'eee@gmail.com', 232312, 'dasdasds', 4, '2023-10-12 12:52:34', '2023-10-12 12:52:34', 50),
(30, 'aaa', 'ali@gmail.com', 2147483647, 'ggfgcggf', 2, '2023-10-13 15:19:19', '2023-10-13 15:19:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `code` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `fully_detail` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `code`, `description`, `fully_detail`, `category_id`, `image`) VALUES
(4, 'watch', 600, 30, '4', '', '', 1, 'image/watch.webp'),
(5, 'watch', 600, 66, '5', 'abcdefghij', '', 1, 'image/watch.png'),
(6, 'abcd', 100, 3, '6', 'A watch is a portable timekeeping device typically worn on the wrist. It is designed to accurately measure and display the passage of time. Watches come in various styles, from analog with hour and minute hands to digital wit', 'Introducing the Ultimate Smartwatch Experience\r\n\r\nAre you ready to revolutionize your daily life? Say hello to the future with our state-of-the-art Smartwatch, a sleek and powerful wearable designed to seamlessly integrate into your busy lifestyle. Whether you\'re a fitness enthusiast, a tech-savvy professional, or simply someone who values convenience, this Smartwatch is your perfect companion.\r\n\r\nStunning Design and Display\r\n\r\nOur Smartwatch boasts a stylish and modern design that\'s bound to turn heads. With a premium build quality and a variety of customizable watch faces, you can match your watch to your style effortlessly. The high-resolution AMOLED display delivers vibrant colors and sharp details, making it a pleasure to interact with.\r\n\r\nUnmatched Performance\r\n\r\nUnder the hood, this Smartwatch packs a punch. It\'s equipped with a lightning-fast quad-core processor that ensures smooth performance even during the most demanding tasks. Whether you\'re tracking your fitness, receiving notifications, or streaming music, this Smartwatch handles it all with ease.\r\n\r\nYour Health, Your Priority\r\n\r\nPrioritize your health and well-being with our Smartwatch\'s comprehensive health tracking features. It includes a heart rate monitor, sleep tracker, and a precise pedometer that counts your steps with incredible accuracy. Get insights into your daily activity, monitor your sleep patterns, and keep an eye on your heart rate effortlessly.\r\n\r\nFitness Made Fun\r\n\r\nTake your fitness journey to the next level with a wide range of sports and fitness tracking modes. Whether you\'re running, cycling, swimming, or doing yoga, our Smartwatch provides real-time data on your performance, helping you achieve your fitness goals. Plus, it\'s water-resistant, so you can wear it while swimming or in the rain.\r\n\r\nStay Connected\r\n\r\nNever miss a beat with our Smartwatch. It seamlessly connects to your smartphone via Bluetooth, allowing you to receive notifications for calls, messages, emails, and social media right on your wrist. Stay in the loop without having to reach for your phone constantly.\r\n\r\nMusic on Your Wrist\r\n\r\nLeave your phone behind during workouts or commutes. This Smartwatch features built-in storage for your favorite music, so you can listen to your tunes or podcasts with wireless headphones directly from your wrist. It\'s the ultimate freedom for music lovers on the go.\r\n\r\nLong-Lasting Battery Life\r\n\r\nWorried about running out of power? Don\'t be. Our Smartwatch boasts an impressive battery life that keeps you going for days on a single charge. Whether you\'re traveling, working, or exploring the outdoors, your Smartwatch will stay with you every step of the way.\r\n\r\nYour Personal Assistant\r\n\r\nVoice commands are the future, and our Smartwatch is ready for it. It comes equipped with a virtual assistant that responds to your voice, allowing you to send messages, set reminders, and answer questions without lifting a finger.\r\n\r\nA World of Apps\r\n\r\nExpand your Smartwatch\'s capabilities with a wide selection of apps available for download. From productivity tools to entertainment apps, you can tailor your Smartwatch to your unique needs and preferences.\r\n\r\nConclusion\r\n\r\nIn a world driven by technology and connectivity, our Smartwatch stands out as the perfect blend of style, functionality, and innovation. It\'s not just a timepiece; it\'s a lifestyle upgrade. Elevate your daily routine, stay active, and enjoy the convenience of having the world at your fingertips—all from the comfort of your wrist. Experience the future today with our Smartwatch!', 1, 'image/smartwatch.png'),
(31, 'watch', 600, 222, '31', 'A watch is a portable timekeeping device typically worn on the wrist. It is designed to accurately measure and display the passage of time. Watches come in various styles, from analog with hour and minute hands to digital wit', '', 2, 'image/smart4.png'),
(36, 'Ruth Hall', 0, 199, '36', 'Quamar Robbins', 'Ut sequi dolorem vol', 2, 'image/smart.jfif'),
(37, 'Ruth Hall', 0, 199, '37', 'Quamar Robbins', 'Ut sequi dolorem vol', 2, 'image/smart.jfif'),
(50, 'Benedict Mcdaniel', 269, 6666, '50', 'Stephanie Christensen', 'Totam ut hic nulla i', 6, 'image/smart4.png'),
(51, 'Benedict Mcdaniel', 269, 6666, '51', 'Stephanie Christensen', 'Totam ut hic nulla i', 6, 'image/smart4.png'),
(52, 'Benedict Mcdaniel', 269, 6666, '52', 'Stephanie Christensen', 'Totam ut hic nulla i', 6, 'image/smart4.png'),
(53, 'Preston Vaughan', 953, 800, '53', 'Jennifer Conway', 'Officia illo nihil i', 5, 'image/smartwatch.png'),
(54, 'Kiayada Sanders', 20, 0, '54', 'Dylan Snyder', 'Mollit sit et evenie', 8, 'image/Screenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_images`
--

CREATE TABLE `subcategory_images` (
  `id` int(11) NOT NULL,
  `subcategory_images` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory_images`
--

INSERT INTO `subcategory_images` (`id`, `subcategory_images`, `product_id`) VALUES
(68, 'apple-iphone-6.jpeg', 6),
(69, 'apple-iphone-6s.jpeg', 6),
(70, 'download.png', 6),
(71, 'Screenshot (1).png', 6),
(77, 'subcategoryimage/download.png', 52),
(78, 'subcategoryimage/smart.jfif', 52),
(79, 'subcategoryimage/smartwatch.png', 52),
(80, 'subcategoryimage/watch.png', 52),
(81, 'subcategoryimage/download.png', 53),
(82, 'subcategoryimage/smart3.png', 53),
(83, 'subcategoryimage/smart4.png', 53),
(84, 'subcategoryimage/smartwatch.png', 53),
(85, 'subcategoryimage/watch.webp', 53),
(86, 'subcategoryimage/women_watch.png', 53),
(87, 'subcategoryimage/Screenshot (1).png', 54),
(88, 'subcategoryimage/Screenshot (2).png', 54),
(89, 'subcategoryimage/Screenshot (3).png', 54),
(90, 'subcategoryimage/smart.jfif', 54);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `cpassword` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(225) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `cpassword`, `phone`, `role`) VALUES
(19, 'abc', 'abc@gmail.com', '$2y$10$DxEWGmw7hp2zl3jvKX6u0Obq6kyLQ6x3HGKXfaOOO6A/T7BRB7k6e', '$2y$10$0nNztExgD86PFjb50dtn4.JFNxCUoWAuiB79nClh0ZihDfvi5G79m', 123456789, '0'),
(20, 'saim', 'saim@gmail.com', '$2y$10$aHO5dIZYJFKhgYimyyBCzen9XTp0HW0brewhBbnQgDUy/dG74egvW', '$2y$10$.F9E52LCFyH3mUVjWKYXtOp3eyK/eZ4QTC4OtRNF3vpOHnPzRwHy2', 112121221, '0'),
(21, 'hello', 'hello@gmail.com', '$2y$10$e5a3JcUibQOdFg/PjzCWL.bezL9t4yFKU1x6ph/QrdLgcm.oi61Fe', '$2y$10$MCu5qqq.kJLr.WXi.UNwl.r6VYMPW11fmJDE1nf8kL8aLVz.Kz3Qi', 2147483647, '0'),
(22, 'hashir', 'hashir@gmail.com', '$2y$10$aT5Y7JvOomAP8Cwqpj9CoOeos8AWQaTDvOqy/Jcovy5cxgDtFiOtW', '$2y$10$NUu.s4Og.2y6TVDcZjtsKuYAcV55RwDrFkbeAAv5P4laBa8DOHA82', 231323123, '0'),
(23, 'saim', 'saimsachwany@gmail.com', '$2y$10$9/Woj1r3.ba2a/JGoCGG6exH73VccUWU3gM6f3zVKMexAdac6prru', '$2y$10$qw81f1.8xKMSG915r.ExSuAOBRXkRNKlbj.5IqpUeOpTKCFufgE8S', 2147483647, '1'),
(24, 'abcd', 'abcd@gmail.com', '$2y$10$BUoD4f48I52i35JatTFF8.Ne0REZkAwQZZFOZrIz4QkjhWbcvs1EO', '$2y$10$YPBGtvSnCIgC.Sm/jbPjfuGotidaLqQU5oQfOPcwMzWBWaFdb7ys2', 2147483647, '0'),
(25, 'memon', 'memon@gmail.com', '$2y$10$zUo176N9HuC1kVO.Klfd4.HoPFBv8sAC3NHZfq7SnyuBGWIeIM9U2', '$2y$10$mJaAGmvHlFfX/A6g75vtRuZQURxkhiwnnOwetGcxTvK1/yVE98cxC', 1111111, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_comments`
--
ALTER TABLE `add_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `add_to_cart_ibfk_2` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_ibfk_1` (`updated_at`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_comments`
--
ALTER TABLE `add_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_comments`
--
ALTER TABLE `add_comments`
  ADD CONSTRAINT `add_comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD CONSTRAINT `post_rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `subcategory_images`
--
ALTER TABLE `subcategory_images`
  ADD CONSTRAINT `subcategory_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
