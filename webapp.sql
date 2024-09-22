-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2023 at 08:41 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` enum('Mercedes','BMW','Hyundai','Tesla','Cupra','Tramontana') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilo` int NOT NULL,
  `transmission` enum('manual','automatic') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `seats` int NOT NULL,
  `photos` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `title`, `location`, `brand`, `kilo`, `transmission`, `description`, `price`, `seats`, `photos`) VALUES
(10, 'BMW', 'Sevilla', 'BMW', 1235678, 'automatic', 'HEY TEST', 20, 5, '[\"uploads/1682978683_059407a1242002c443d5.png\", \"uploads/1682978683_2aa539f005cb4a619d73.png\", \"uploads/1682978683_23df7dc663d09c03c574.png\", \"uploads/1682978683_0fc9f01bbe2aa09b85e9.png\"]'),
(11, 'BMW', 'Sevilla', 'BMW', 1235678, 'automatic', 'HEY TEST', 20, 5, '[\"uploads/1682978683_059407a1242002c443d5.png\"]'),
(12, 'BMW', 'Sevilla', 'BMW', 1235678, 'automatic', 'HEY TEST', 20, 5, '[\"uploads/1682978683_059407a1242002c443d5.png\"]'),
(13, 'BMW', 'Sevilla', 'BMW', 1235678, 'automatic', 'HEY TEST', 20, 5, '[\"uploads/1682978683_059407a1242002c443d5.png\"]');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rental_id` int NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rental_id`, `user_id`, `car_id`, `start_date`, `end_date`) VALUES
(23, 'aooa@m.com', 13, '2023-05-12', '2023-05-13'),
(24, 'aooa@m.com', 13, '2023-05-01', '2023-05-02'),
(25, 'aooa@m.com', 13, '2023-05-27', '2023-05-28'),
(26, 'aooa@m.com', 12, '2023-05-11', '2023-05-12'),
(27, 'aooa@m.com', 11, '2023-06-04', '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `phonenumber` bigint DEFAULT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'v'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `country`, `city`, `state`, `address`, `zipcode`, `phonenumber`, `role`) VALUES
('amine', 'mb', 'a@m.com', '$2y$10$gFdYFgoR3f4fTFA1WA53b.m.j8MHXdbra9II/bZMOO2Qubkf3C/rq', NULL, NULL, NULL, NULL, NULL, NULL, 'a'),
('amine', 'mb', 'aa@m.comaa', '$2y$10$Tx68.0tliUxQps8bB0OUcuqxt/OvHzWhIROK33EiyEf6PzbTb5YhK', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 123456789, ''),
('amine', 'mb', 'aa@m.comaaaaaaaads', '$2y$10$f.y4MaFgf928hLyF8CGFO.0L8.SsF1FvW8iRpobCPPj2ccQWsb1BG', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 97867687, 'v'),
('amine', 'mb', 'aa@m.comaaas', '$2y$10$qCW2kj5aq0qldv/m/2tvs.27rBa1IXYIVPDuhxept3J8uG9bNovcO', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 987654321, 'v'),
('amine', 'mb', 'aa@m.combb', '$2y$10$J5eXf.K3hzdbnngAcWxzwuCDgMeLP.WH1DWFVY7u8SdQdWI71KT6e', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, NULL, 'v'),
('amine', 'mb', 'aa@m.comm', '$2y$10$nSy47rvrOILe6vq2SkAMF.L3aqZqZvr78nDaLKce4S0RCQkyXnf8i', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, NULL, 'v'),
('amine', 'mb', 'aa@m.commm', '$2y$10$zeJ4hjWIyUqIPI/sLYznjeeQ77cGbDKThq6awnv6biVk8f7LUsgE6', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 0, 'a'),
('amine', 'mb', 'aa@m.comrrr', '$2y$10$H/5yTZa5eSVmNzEOsTsZCurYSWs68MMdiLIIBvSQtXWf7dmiYptnC', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 907867656, 'v'),
('amine', 'mb', 'aa@m.comsssa', '$2y$10$jljpKWGIWlquE0J3MglxPeviYeWuzLCCZBLsqG.SiEdkZhsBK2Eva', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 2147483647, 'v'),
('amine', 'mb', 'aa@oo.com', '$2y$10$EzWFiuhxS.t0o3TllVE.f.0A8v1NS4Kcmye09dtU.Z1T0jb7coYZC', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 907867645, 'a'),
('amine', 'mb', 'aab@m.com', '$2y$10$8TXLxA3T/AwBpi42XzDw8.zimZQxIM1R3FQyI/Zwm6NZGTZBNkpMO', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 34567894, ''),
('amine', 'mb', 'aabbn@m.com', '$2y$10$lVOc/mdrlpm7t1FcfODkWuL3YSAF1GQ7nsC1YREnBCLJXcx2T9uzO', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, NULL, 'v'),
('amine', 'mb', 'abba@m.com', '$2y$10$W3tVvQTk4o4qM5uxSrx0re7M.ivO2/nIw7YlShg7TNim/MzH1BnlG', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, NULL, 'v'),
('amine', 'mb', 'aooa@m.com', '$2y$10$7k.FiAc6tsj1c/MptYM.H.f.n9hMLaDBXc/oCPGww4Qcuzncl9IZm', 'Spain', 'ttt', 'ttt', 'ttttt', 667788, 907867699, 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `n_phonenumber` (`phonenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
