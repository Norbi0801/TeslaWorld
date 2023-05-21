-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 21, 2023 at 01:17 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teslaworld`
--
CREATE DATABASE IF NOT EXISTS `teslaworld` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE `teslaworld`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `status`) VALUES
(1, 'Dostępny'),
(2, 'Niedostępny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `model` varchar(255) NOT NULL,
  `production_year` int(11) DEFAULT NULL,
  `mileage` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `id_brand`, `model`, `production_year`, `mileage`, `id_status`) VALUES
(1, 1, 'A4', 2147483647, 1000, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars_brands`
--

CREATE TABLE `cars_brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `cars_brands`
--

INSERT INTO `cars_brands` (`id`, `brand`) VALUES
(1, 'Audi'),
(2, 'Aston Martin Lagonda Ltd'),
(3, 'BMW'),
(4, 'Chevrolet'),
(5, 'Dodge'),
(6, 'Ferrari'),
(7, 'Honda'),
(8, 'Jaguar'),
(9, 'Lamborghini'),
(10, 'Mazda'),
(11, 'McLaren'),
(12, 'Mercedes-Benz'),
(13, 'Nissan'),
(14, 'Pagani Automobili S.p.A.'),
(15, 'Porsche'),
(16, 'FIAT'),
(17, 'Mini'),
(18, 'SCION'),
(19, 'Subaru'),
(20, 'Bentley'),
(21, 'Buick'),
(22, 'Ford'),
(23, 'Lexus'),
(24, 'Maserati'),
(25, 'Roush'),
(26, 'Volkswagen'),
(27, 'Acura'),
(28, 'Cadillac'),
(29, 'INFINITI'),
(30, 'Mitsubishi Motors Corporation'),
(31, 'Rolls-Royce Motor Cars Limited'),
(32, 'Toyota'),
(33, 'Volvo'),
(34, 'Chrysler'),
(35, 'Lincoln'),
(36, 'GMC'),
(37, 'RAM'),
(38, 'Jeep'),
(39, 'Land Rover');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1684590083),
('m230520_140208_create_cars_brands_table', 1684591462),
('m230520_140728_create_availability_table', 1684591718),
('m230520_140857_create_cars_table', 1684595307);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-cars-id_brand` (`id_brand`),
  ADD KEY `fk-cars-id_status` (`id_status`);

--
-- Indeksy dla tabeli `cars_brands`
--
ALTER TABLE `cars_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars_brands`
--
ALTER TABLE `cars_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `fk-cars-id_brand` FOREIGN KEY (`id_brand`) REFERENCES `cars_brands` (`id`),
  ADD CONSTRAINT `fk-cars-id_status` FOREIGN KEY (`id_status`) REFERENCES `availability` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
