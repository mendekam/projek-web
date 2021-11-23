-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 04:11 AM
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
-- Database: `toko_elektronik`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image_path` varchar(1024) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `stock`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Percobaan 1', 'Barang tidak berharga', 69696969, NULL, 'img/img-produk', '2021-11-22 13:56:42', '2021-11-22 20:56:42'),
(2, 'TV Elektronik', 'asdsa', 500000, NULL, 'img/img-produk619ba761d6849.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'TV Elektronik', 'wrqwrq', 500000, NULL, 'img/img-produk/619ba7a38e3e7.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'TV Elektronik', 'ZDDafasfsa', 500000, NULL, 'img/img-produk/619ba7c6b19cf.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'TV Elektronik', '124124', 500000, NULL, 'img/img-produk/619ba9330e80f.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'TV Elektronik', 'dgsaf', 500000, NULL, 'img/img-produk/619baae044e77.png', '2021-11-22 14:36:16', '2021-11-22 21:36:16'),
(7, 'TV Elektronik', 'asfasfasf', 500000, 100, 'img/img-produk/619bae14807a8.png', '2021-11-22 14:49:56', '2021-11-22 21:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'zaidan', '$2y$10$Ny3jzv909Kt0VOIysooBh.k1ALCI2gWSmzX2e13voLezg/Mfon.bu', 'zaidannoor@gmail.com', 'user'),
(5, 'admin1', '$2y$10$ATWe0K7MfsR5N7DbeBdeGuGsMH7VZuQC9GghzlA4jYdI.GV.FfkBi', 'admin123.gmail.com', 'admin'),
(6, 'abidbilal', '$2y$10$VxoEMfwSgCOuXKYcZqwQfe2SWtAkeKXGSLIoKxHPyE4h3bEztdQVS', 'abid@elji.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;