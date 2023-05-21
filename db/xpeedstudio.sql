-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2023 at 04:27 PM
-- Server version: 8.0.27
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpeedstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

DROP TABLE IF EXISTS `submissions`;
CREATE TABLE IF NOT EXISTS `submissions` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `amount` int DEFAULT NULL,
  `buyer` varchar(255) DEFAULT NULL,
  `receipt_id` varchar(20) DEFAULT NULL,
  `items` varchar(255) DEFAULT NULL,
  `buyer_email` varchar(50) DEFAULT NULL,
  `buyer_ip` varchar(20) DEFAULT NULL,
  `note` text,
  `city` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hash_key` varchar(255) DEFAULT NULL,
  `entry_at` date DEFAULT NULL,
  `entry_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(1, 3000, 'Sazzad Hosian', '4563263', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dupl.saifulmolin@gmail.com', NULL, NULL, 'Dhaka', '8801924508028', NULL, '2023-05-20', 1),
(2, 52600, 'Sazzad Hosian', '123456', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'molin.dupl.75@gmail.com', NULL, NULL, 'Dhaka', '8801924508028', NULL, '2023-05-20', 3),
(3, 4500, 'Sazzad Hosian', '156324587', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dupl.saifulmolin@gmail.com', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Dhaka', '8801924508028', NULL, '2023-05-20', 6),
(4, 3800, 'Asraful Alam', '85556', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Dhaka', '8801924508028', '2023-05-20', '2023-05-20', 3),
(5, 3800, 'Abu Nasir', '1563245', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Dhaka', '8801924508028', '2023-05-20', '2023-05-20', 2),
(6, 56230, 'Kamrul Mahmud', '446565', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Dhaka', '01924508028', '2023-05-20', '2023-05-20', 3),
(7, 2500, 'Asif khan', '156324', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Dhaka', '01924508028', '2023-05-20', '2023-05-20', 1),
(8, 500, 'Sazzad Hosian', '1254645', 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting industry', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Dhaka', '01924508028', '2023-05-20', '2023-05-20', 3),
(9, 500, 'Sazzad Hosian', '1254645', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Dhaka', '01924508028', 'b74ce0a8fb4505eb61535cc0f00175adee147e26237925c30a64873f832b3c2c64aa16df1557ba1319cecd1850172abad771610f0c1f68046b216ec1d498e199', '2023-05-20', 3),
(10, 1400, 'Sazzad Hosian', '1563245', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy', 'Dhaka', '01924508028', 'd33320513bbf40c9d2998b00a55a1d66d176f45fefd5b4791800f1b2e6d72bd890e7580f4bb32db741954aac062457b2bb4c80596b3971d933059bad9c2825ac', '2023-05-20', 3),
(11, 5008, 'Iftekhar Hosian', '152364', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'dupl.saifulmolin@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Dhaka', '8801924508028', 'd2d19a3f43fe446b637e1367920270c0a44352e97c48e94f99c53309245ed09ccb0219276d621b96e9226899d1746f3817bbf881a623b538381cd365dcf5a0ac', '2023-05-20', 5),
(12, 600, 'Abu Hanif', '123654', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'molin.dupl.75@gmail.com', '127.0.0.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Dhaka', '8801673546262', 'cfac0a9ad81b9651b4e4a765df78d10af91c19773449ce6da7a739ca1ec387b46b7f935207098e21e871cda6f3fb24ae42531912e212ca2039ed3c69318b6a97', '2023-05-20', 1),
(13, 900, 'Abu Hyder Rony', '159654', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra, odio ac egestas consequat, neque metus dapibus elit, nec consequat ex enim vitae nibh. Ut non ante turpis. Integer tincidunt luctus felis id convallis. Etiam maximus, metus vel rhonc', 'cei.developer1@gmail.com', '127.0.0.1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra, odio ac egestas consequat, neque metus dapibus elit, nec consequat ex ', 'Dhaka', '8801673546262', 'd7815414f30ea0bb8df92090d7cb9f604c11c39e449ba5205a244c7bcd0edf9cf822c892bbf78d3dc684b1ce6a24c7d313ca4eec8ef26079ed6d4dee7d0080f3', '2023-05-21', 1),
(14, 800, 'Mathew Hyden', '1523', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra, odio ac egestas consequat, neque metus dapibus elit, nec consequat ex enim vitae nibh. Ut non ante turpis. Integer tincidunt luctus felis id convallis. Etiam maximus, metus vel rhonc', 'molin.dupl.75@gmail.com', '127.0.0.1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra, odio ac egestas consequat.', 'Mirpur', '8801924508028', 'b43c6d4127c1f2962513a0c198d5ca41aeff11e5a032a651a6118ddb23a7b270fb7c17f0b5596faf3f7eeeb67ac637ac8b908e3fb4d8af46837fddafe98a82a1', '2023-05-21', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
