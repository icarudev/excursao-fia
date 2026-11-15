-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20261113.f4aeb7801c
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2026 at 02:29 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excursao_fia`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartamentos`
--
CREATE TABLE `apartamentos` (
  `id` int NOT NULL,
  `modelos` enum('casal','duplo','triplo','quadriplo') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `viagem_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pessoas`
--
CREATE TABLE `pessoas` (
  `id` int NOT NULL,
  `nome` varchar(55) DEFAULT NULL,
  `cpf` int UNSIGNED DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `apartamento_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viagens`
--
CREATE TABLE `viagens` (
  `id` int NOT NULL,
  `local` varchar(50) DEFAULT NULL,
  `hotel` varchar(50) DEFAULT NULL,
  `guias` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_viagem_id` (`viagem_id`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_apartamento_id` (`apartamento_id`);

--
-- Indexes for table `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartamentos`
--
ALTER TABLE `apartamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `viagens`
--
ALTER TABLE `viagens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD CONSTRAINT `fk_viagem_id` FOREIGN KEY (`viagem_id`) REFERENCES `viagens` (`id`);

--
-- Constraints for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `fk_apartamento_id` FOREIGN KEY (`apartamento_id`) REFERENCES `apartamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
