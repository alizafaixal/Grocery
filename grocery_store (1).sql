-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2020 at 12:16 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(40) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'aliza', 'aliza');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`) VALUES
(1, 'bread', 1),
(2, 'chips', 1),
(3, 'sweet', 1),
(4, 'fruits and vegetables', 1),
(5, 'juices', 1),
(6, 'test ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_number` int(10) NOT NULL,
  `user_EnquiryTopic` varchar(200) NOT NULL,
  `user_message` longtext NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`message_id`, `user_name`, `user_email`, `user_number`, `user_EnquiryTopic`, `user_message`, `added_on`) VALUES
(1, 'aliza', 'aliza.nov@outlook.com.au', 9876543, 'General Enquiry', 'hello\n', '2020-11-07 19:45:34'),
(2, 'Marium', 'test@gmail.com', 433975432, 'Online Shopping', 'test message\n', '2020-11-08 00:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `end_users`
--

DROP TABLE IF EXISTS `end_users`;
CREATE TABLE IF NOT EXISTS `end_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_users`
--

INSERT INTO `end_users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'aliza', 'aliza@gmail.com', 'aliza'),
(2, 'faisal', 'faisal', 'faisal'),
(3, 'aliza', 'aliza', 'aliza'),
(4, 'faiza', 'faiza', 'faiza');

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

DROP TABLE IF EXISTS `forum_category`;
CREATE TABLE IF NOT EXISTS `forum_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_category`
--

INSERT INTO `forum_category` (`category_id`, `category_name`, `status`) VALUES
(1, 'food', 1),
(2, 'Recepe', 1),
(7, 'test', 1),
(6, 'test', 1),
(5, 'organic product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `post_text` text DEFAULT NULL,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`) VALUES
(2, 2, 'Hello and welcome to Ensure a Safe Workplace!\\r\\n\\r\\nThis subject requires you to approach work health and safety from a managerial perspective as the person who is in charge of workplace operations. You will explore WHS systems and ensure compliance with relevant legislative requirements. \\r\\n\\r\\nI hope you will enjoy this course and I look forward to working with you online. If you have any questions about learning on Moodle or this subject, please feel free to post them here', '2020-11-11 14:35:37', 'aleezanov@outlook.com'),
(4, 2, 'Work health and safety (WHS) â€“ sometimes called occupational health and safety (OH&S) â€“ involves the management of risks to the health and safety of everyone in your workplace.', '2020-11-11 14:37:17', 'alizafaisal@gmail.vom'),
(11, 5, 'can someone let me know ingredients in kurkuray  ', '2020-11-12 17:15:43', 'aleezanov@outlook.com'),
(12, 5, 'Kurkure is made from rice meal, edible vegetable oil (palm oil), corn meal, gram meal, spices, condiments, salt, sugar, tartaric, milk solids, and E631.', '2020-11-12 17:20:21', 'marium@gmail.com'),
(13, 6, 'can someone explain what is yogurt ', '2020-11-12 17:25:29', 'someone@gmail.com'),
(14, 7, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', '2020-11-12 17:28:14', 'john@dummyemail.com.au'),
(15, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', '2020-11-12 17:28:35', 'alizafaisal@gmail.vom'),
(16, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', '2020-11-12 17:30:21', 'mariumfaisal@gmail.vom'),
(17, 8, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', '2020-11-12 18:43:59', 'aleezanov@outlook.com'),
(18, 9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', '2020-11-12 18:56:33', 'aleezanov@outlook.com'),
(19, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', '2020-11-12 18:56:59', 'deniz@outlook.com'),
(20, 11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', '2020-11-12 18:57:16', 'shamila@outlook.com'),
(21, 11, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2020-11-12 19:13:07', 'hello@gmail.com'),
(22, 11, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2020-11-12 19:13:37', 'hello@gmail.com'),
(23, 10, 'safe_topic_id', '2020-11-12 19:16:54', 'hello@gmail.com'),
(24, 10, 'safe_topic_id', '2020-11-12 19:18:02', 'hello@gmail.com'),
(25, 10, 'lorem\r\n', '2020-11-12 19:37:14', 'hello@gmail.com'),
(26, 12, 'loremLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', '2020-11-13 13:46:23', 'aleezanov@outlook.com'),
(27, 13, 'test\r\n', '2020-11-13 13:47:02', 'test@gmail.com'),
(28, 10, 'test rece', '2020-11-14 10:21:22', 'aleeza@gmail.com'),
(29, 14, 'this is new topix', '2020-11-14 10:22:33', 'aleezanov@outlook.com'),
(30, 15, 'lorem\r\n', '2020-11-15 11:50:25', 'aleezanov@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `topic_title` varchar(150) DEFAULT NULL,
  `topic_create_time` datetime DEFAULT NULL,
  `topic_owner` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `category_id`, `topic_title`, `topic_create_time`, `topic_owner`) VALUES
(2, 1, 'welcome forum', '2020-11-11 14:35:37', 'aleezanov@outlook.com'),
(5, 1, 'ingredients in kurkuray  ', '2020-11-12 17:15:43', 'aleezanov@outlook.com'),
(6, 1, 'what is yogurt ', '2020-11-12 17:25:29', 'someone@gmail.com'),
(7, 1, 'What\'s For Dinner ', '2020-11-12 17:28:14', 'john@dummyemail.com.au'),
(8, 1, ' Road Food', '2020-11-12 18:43:59', 'aleezanov@outlook.com'),
(9, 2, 'recipe of chocolate cake', '2020-11-12 18:56:33', 'aleezanov@outlook.com'),
(10, 2, 'recipe of cupcake', '2020-11-12 18:56:59', 'deniz@outlook.com'),
(11, 2, 'recipe of biryani', '2020-11-12 18:57:16', 'shamila@outlook.com'),
(12, 2, 'reciepe of pizza', '2020-11-13 13:46:23', 'aleezanov@outlook.com'),
(13, 7, 'test', '2020-11-13 13:47:02', 'test@gmail.com'),
(14, 6, 'new topic', '2020-11-14 10:22:33', 'aleezanov@outlook.com'),
(15, 6, 'assessment', '2020-11-15 11:50:25', 'aleezanov@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `total_price` float DEFAULT NULL,
  `payment_status` varchar(250) NOT NULL,
  `order_status` int(1) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `city`, `zipcode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(1, 4, '10 Abraham Street', 'Sydeny', 2766, 'cod', 32, 'pending', 1, '2020-11-14 04:14:13'),
(2, 4, 'rest', 'test', 123, 'cod', 120, 'pending', 1, '2020-11-14 04:26:05'),
(3, 4, 'bunk test ', 'Sydeny', 2766, 'cod', 368, 'pending', 4, '2020-11-14 04:30:40'),
(4, 4, 'test bulkkkkkkkkkkkkkk for alzizaaa', 'sydnbe', 12222, 'cod', 352, 'pending', 1, '2020-11-14 04:50:00'),
(5, 4, '10 Abraham Street', 'Sydeny', 2766, 'cod', 24, 'pending', 1, '2020-11-14 05:00:49'),
(6, 4, '10 Abraham Street', 'Sydeny', 2766, 'cod', 21, 'pending', 1, '2020-11-14 05:01:16'),
(7, 1, 'hi', 'hi', 112, 'cod', 250, 'pending', 4, '2020-11-14 09:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 2, 4, 8),
(2, 2, 1, 10, 12),
(3, 3, 2, 46, 8),
(4, 4, 2, 44, 8),
(5, 5, 12, 2, 12),
(6, 6, 3, 3, 7),
(7, 7, 5, 50, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'cancelled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_mrp` float NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_img` varchar(1000) NOT NULL,
  `product_short_desc` varchar(2000) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `product_meta_title` text DEFAULT NULL,
  `product_meta_desc` varchar(2000) DEFAULT NULL,
  `product_meta_keywords` varchar(200) DEFAULT NULL,
  `product_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_mrp`, `product_price`, `product_qty`, `product_img`, `product_short_desc`, `product_desc`, `product_meta_title`, `product_meta_desc`, `product_meta_keywords`, `product_status`) VALUES
(1, 5, 'Mapro Strwberry Crush', 10, 12, 50, 'images\\/product1.jpg', 'Enjoy Keneya\'s best tea.', 'Best Team, sample description', NULL, NULL, NULL, 0),
(2, 4, 'Long Melon', 12, 8, 50, 'images\\/product3.jpg', 'Long Melon from America.', '', '1', '', '', 1),
(3, 2, 'Kurkuray', 5, 7, 50, 'images\\/product2.jpg', 'Pakistani Kururay chips', NULL, NULL, NULL, NULL, 1),
(4, 3, 'Soan Papri', 1, 3, 50, 'images\\/product4.jpg', 'Milk, Flour, Sugar, etc.', 'Product From India', NULL, NULL, NULL, 1),
(5, 5, 'Juicy Juice', 1, 5, 50, 'images\\/product5.jpg', 'Sugar Free Apple Juice', 'Australia best Juice', NULL, NULL, NULL, 1),
(6, 5, 'Coka Cola', 3, 5, 50, 'images\\/product6.jpg', 'CocaCola Cane 300 ml', '', NULL, NULL, NULL, 1),
(7, 5, 'Minute Maid Apple Juice', 2, 4, 50, 'images\\/product7.jpg', '200 ml Apple and Grapes Juice', '', NULL, NULL, NULL, 1),
(8, 2, 'Smith Chips Party size', 4, 5, 50, 'images\\/product8.jpg', 'Large size potato chips', NULL, NULL, NULL, NULL, 1),
(9, 1, 'Corossont Small 6 packs', 4, 4, 50, 'images\\/product9.jpg', '6 pack Corosock backed in our oun backery', NULL, NULL, NULL, NULL, 1),
(10, 5, 'Pops Tops Fruit Drink', 1, 2, 50, 'images\\/product10.jpg', '6 pack Fruit Drink Juice by Pop Top', NULL, NULL, NULL, NULL, 1),
(11, 5, 'Mapro White Strabery Crush', 7, 12, 50, 'images\\/product11.jpg', '6 pack Fruit Drink Juice by Map', NULL, NULL, NULL, NULL, 1),
(12, 5, 'Mapro Red Berry Crush', 6, 12, 50, 'images\\/product12.jpg', ' pack Fruit Drink Juice by Map', NULL, NULL, NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
