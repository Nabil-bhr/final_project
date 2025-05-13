-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 05:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bn_sneakers`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `in_the_stock` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `in_the_stock`, `img`) VALUES
(19, 'black nike air max 97', 'black nike air max 97', 7900.00, 6, 'black nike air max 97.png'),
(20, 'air force 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate esse distinctio eveniet doloremque recusandae sint veritatis atque consequatur ratione a.', 6500.00, 6, 'air force 1.png'),
(21, 'black nike p-6000', 'black nike p-6000', 9900.00, 12, 'black nike p-6000.png'),
(22, 'white nike air max 95', 'white nike air max 95', 8500.00, 7, 'white nike air max 95.png'),
(23, 'nike air max 95', 'nike air max 95', 8500.00, 9, 'nike air max 95.png'),
(24, 'air jordan 1 low method of make', 'air jordan 1 low method of make', 9200.00, 8, 'air jordan 1 low method of make.png'),
(25, 'black nike air max dn', 'black nike air max dn', 8700.00, 11, 'black nike air max dn.png'),
(26, 'black nike air max dn8', 'black nike air max dn8', 9000.00, 8, 'black nike air max dn8.png'),
(27, 'white nike zoom vomero 5', 'white nike zoom vomero 5', 8600.00, 13, 'white nike zoom vomero 5.png'),
(28, 'black nike shox TL', 'black nike shox tl', 7800.00, 14, 'black nike shox tl.png'),
(29, 'white nike shox TL', 'white nike shox tl', 7800.00, 4, 'white nike shox tl.png'),
(30, 'black nike air max plus', 'black nike air max plus', 9000.00, 6, 'black nike air max plus.png'),
(31, 'white nike air max plus', 'white nike air max plus', 9000.00, 7, 'white nike air max plus.png'),
(32, 'black nike zoom vomero 5', 'black nike zoom vomero 5', 8500.00, 5, 'black nike zoom vomero 5.png'),
(33, 'white nike p-6000', 'white nike p-6000', 9900.00, 9, 'white nike p-6000.png'),
(34, 'white nike air max dn8', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate esse distinctio eveniet doloremque recusandae sint veritatis atque consequatur ratione a.', 8200.00, 10, 'white nike air max dn8.png'),
(36, 'air jordan 1 low  ', 'air jordan 1 low  ', 11200.00, 5, 'air jordan 1 low  .png'),
(37, 'black nike air max 95', 'black nike air max 95', 8400.00, 6, 'black nike air max 95.png'),
(38, 'white nike air max dn', 'white nike air max dn', 7800.00, 6, 'white nike air max dn.png'),
(39, 'air jordan 1 high', 'air jordan 1 high', 11500.00, 4, 'jordan 1 hei.png'),
(40, 'air jordan 1 high panda', 'air jordan 1 high', 6700.00, 9, 'air jordan 1 hight panda.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`, `role`) VALUES
(1, 'nabil', '123@gmail', 32, '1234', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
