-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 09:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`, `quantity`) VALUES
(64, 'Apple', 'Baranjska jabuka', 1.99, './img/apple.jpg', 100),
(65, 'Banana', 'Banana iz Ekvadora', 0.99, './img/banana.jpg', 50),
(66, 'Bread', 'Domaci kruh', 2.50, './img/bread.jpeg', 37),
(67, 'Cereal', 'Sa slavonskih polja', 3.60, './img/cereal.jpg', 59),
(68, 'Juice', 'Od najfinijeg voca', 2.99, './img/juice.jpg', 77),
(69, 'Kiwi', 'Izvor vitamina C', 4.99, './img/kiwi.jpg', 43),
(70, 'Orange', 'Citrus aurauntium', 2.00, './img/orange.jpg', 54);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
