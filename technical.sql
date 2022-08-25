-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2022 at 08:10 AM
-- Server version: 8.0.29
-- PHP Version: 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technical`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `produk` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `produk`, `jumlah`, `alamat`, `penerima`, `email`, `total`) VALUES
(70, 'Black Tee, Black Book', '3 Pcs, 1 Pcs', 'Wilis 15 Toko Kasur Aneka Jaya Kota  Blitar Provinsi  Jawa Timur Kode Pos  66117', 'Daffa Wardhanaditya Junaidi', 'wardhanadty@gmail.com', 180000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` int NOT NULL,
  `kode_produk` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int NOT NULL,
  `harga` bigint NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `kode_produk`, `nama`, `stok`, `harga`, `keterangan`, `gambar`) VALUES
(1, 'P01', 'Black Plate', 37, 50000, 'Black plate made by top tier romania clay', 'assets/product/plate01.jpg'),
(2, 'B01', 'Black Book', 12, 75000, 'Black magic book by harry potato and friends', 'assets/product/book01.jpg'),
(3, 'T01', 'Black Tee', 0, 35000, 'Last used by jimmy handrix on his last world tour', 'assets/product/tee01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_tengah` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama_depan`, `nama_tengah`, `nama_belakang`, `password`) VALUES
(4, 'wardhanadty@gmail.com', 'Daffa', 'Wardhanaditya', 'Junaidi', '68b1474e94bd899a1465f66fa18337d4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
