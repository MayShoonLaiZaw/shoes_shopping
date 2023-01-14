-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 04:33 AM
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
-- Database: `shoes_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auths`
--

CREATE TABLE `tbl_auths` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_auths`
--

INSERT INTO `tbl_auths` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'May Shoon Lai Zaw', 'zawm54188@gmail.com', '$2y$10$U2wF5vf3CNwCyaF2zmoM..jdCI6/XRem9.hfWXxm/aGrRF7s/LEPS', '2022-12-20 11:58:03', NULL, NULL),
(2, 'Snow', 'snow123@gmail.com', '$2y$10$Qn09zudHLOs6/IoQgAsBQOUJvRHccOmvx4dzvUxKyJQ1va9Dvl8oS', '2022-12-21 06:48:28', NULL, NULL),
(3, 'Pinky', 'pinky123@gmail.com', '$2y$10$/hYO8I/mx7eWmd7Q0i4IAe9HnpVAcsLgJe9vKJMhHUmN224ytM//m', '2022-12-31 09:15:51', NULL, NULL),
(4, 'Z-bear', 'zbear123@gmail.com', '$2y$10$.CE.KIqB2KF1lixId441..71jPMx7mDSzrz/g9NWJtMcvewh9gPY6', '2023-01-05 08:12:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Peeps Shoes', '2022-12-28 06:14:54', NULL, NULL),
(2, 'Gladiator', '2022-12-28 06:14:54', NULL, NULL),
(3, 'Sling Back', '2022-12-28 06:18:02', NULL, NULL),
(4, 'Pumps Shoes', '2022-12-28 06:18:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `email`, `comments`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'zawm54188@gmail.com', 'I like it.', 6, '2022-12-28 07:13:34', NULL, NULL),
(2, 'zawm54188@gmail.com', 'Hey i', 6, '2022-12-28 07:16:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_img`, `product_name`, `product_description`, `price`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pumps_shoes.png', 'Pumps Shoes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.It is a long established fact that a reader will', 25000, 'Pumps Shoes', '2022-12-20 09:36:47', NULL, NULL),
(2, '33dd41b342a34c04620c89456d67cf56.jpg', 'Black Pumps', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 28000, 'Pumps Shoes', '2022-12-20 10:27:36', NULL, NULL),
(3, '61TjH1ZszoL._UL1000_.jpg', 'Flowers Pumps', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 30000, 'Pumps Shoes', '2022-12-20 10:28:47', NULL, NULL),
(4, 'High Heels Shoes.jpg', 'Beautiful Pumps Heels', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 34000, 'Pumps Shoes', '2022-12-20 10:30:59', NULL, NULL),
(5, 'bella-belle-shoes-georgia-ivory-pearl-slingback-wedding-kitten-heel-with-silk-bow-1_600x.jpg', 'White Sling Back', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 35000, 'Sling Back', '2022-12-20 12:01:20', NULL, NULL),
(6, 'pale-pink-patent-slingback-kitten-heel-court-shoes.jpg', 'Pink Sling Back', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 25000, 'Sling Back', '2022-12-20 12:06:13', NULL, NULL),
(7, '17-Amita-45-slingback-pumps.webp', 'Black Sling Back', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 25000, 'Sling Back', '2022-12-20 12:12:02', NULL, NULL),
(8, 'Pumps-slingbacks.jpg', 'Shark Sling Back', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 28000, 'Sling Back', '2022-12-20 12:13:19', NULL, NULL),
(9, '2021-Women-Boots-High-Heels-Gladiator-Heels-Summer-Ladies-Shoes-Female-Fashion-Open-Toe-Sandals-Party.jpg_Q90.jpg_.jpg', 'Gladiator &nbsp;High Heels', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.It is a long established fact that a reader will', 35000, 'Gladiator', '2022-12-21 06:36:25', NULL, NULL),
(10, 'Gladiator-Heels-Boot.jpg', 'Red Gladiator Boots', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.It is a long established fact that a reader will', 40000, 'Gladiator', '2022-12-21 06:43:22', NULL, NULL),
(11, 'Gladiator-boots-knee-high-boots-shoes.jpg', 'Gladiator Boots Kneel', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.It is a long established fact that a reader will', 38000, 'Gladiator', '2022-12-21 06:47:10', NULL, NULL),
(12, 'Womens-Gladiator-boots-roman.jpg', 'Grey Gladiator High', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.It is a long established fact that a reader will', 33000, 'Gladiator', '2022-12-21 11:59:32', NULL, NULL),
(13, 'Peep Toe Heels Shoes.jpg', 'Peep Toes Shoes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 28000, 'Peeps Shoes', '2022-12-21 13:34:13', NULL, NULL),
(14, 'block_heels.jpg', 'Block Peeps Heels', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 35000, 'Peeps Shoes', '2022-12-21 13:36:22', NULL, NULL),
(15, 'peep_toe3.jpg', 'Black Peeps Toes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.It is a long established fact that a reader will', 40000, 'Peeps Shoes', '2022-12-21 13:37:33', NULL, NULL),
(16, 'peep_toe2.jpg', 'Black Peep Shoes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci possimus, quae totam sunt at qui, perferendis ex repellat, sequi aperiam. Voluptatum sequi velit dolores iure asperiores vitae quos ab.', 35000, 'Peeps Shoes', '2022-12-21 13:38:47', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auths`
--
ALTER TABLE `tbl_auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auths`
--
ALTER TABLE `tbl_auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
