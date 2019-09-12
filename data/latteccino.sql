-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 11:23 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latteccino`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu1`
--

CREATE TABLE `menu1` (
  `id` int(20) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slika_alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika_src` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu1`
--

INSERT INTO `menu1` (`id`, `ime`, `cena`, `opis`, `slika_alt`, `slika_src`) VALUES
(1, 'Cappuccino', '$4.89', 'with milk & cream', 'Cappuccino', 'assets/images/cappuccino.jpg'),
(2, 'Frappuccino', '$1.25', 'with heavy cream and sugar', 'Frappuccino', 'assets/images/frappucino.jpg'),
(3, 'Caramellato', '$8.45', 'with caramel topping', 'Caramellatto', 'assets/images/caramellatto.jpg'),
(4, 'Tall coffee', '$7.28', 'with almond milk & hazelnuts', 'Tall coffee', 'assets/images/tallcoffee.jpg'),
(5, 'Coffee romano', '$5.45', 'with apple sauce a side', 'Coffee romano', 'assets/images/romano.jpg'),
(6, 'Ristretto', '$5.45', 'with almonds from Piedmont', 'Ristretto', 'assets/images/ristretto.jpg'),
(7, 'Chocolatto', '$3.75', 'with cream & chocolate', 'Chocolatto', 'assets/images/chocolatto.jpg'),
(8, 'Cafe late', '$4.25', 'with heavy cream', 'Cafe late', 'assets/images/cafelate.jpg'),
(9, 'Macciato', '$5.75', 'with hazelnuts ', 'Macciato', 'assets/images/macciato.jpg'),
(10, 'Nescafe', '$2.85', 'with cookies a side', 'Nescafe', 'assets/images/nescafe.jpg'),
(11, 'Vanillato', '$6.15', 'with soft vanilla cream', 'Vanillato', 'assets/images/vanillato.jpg'),
(12, 'White coffee', '$3.65', 'with almond milk', 'White coffee', 'assets/images/whitecoffee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ahref` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`id`, `naziv`, `ahref`) VALUES
(1, 'HOME', 'index.php'),
(2, 'MENU', '#1'),
(4, 'CONTACT', '#3');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `ime`, `prezime`, `email`, `lozinka`, `id_uloga`) VALUES
(1, 'Katarina', 'Raic', 'kacaraic@gmail.com', '123456k', 1),
(2, 'Marija', 'Radulj', 'marijavasic@gmail.com', '123456m', 2),
(3, 'Filip', 'Minic', 'filipminic@gmail.com', '123456f', 2),
(4, 'Vesna', 'Zivanovic', 'vesnazivanovic@gmail.com', '123456v', 2),
(5, 'Anja', 'Zubac', 'anjazubac@gmail.com', '123456a', 2),
(6, 'Kristina', 'Markovic', 'kristinamarkovic@gmail.com', '123456kristina', 2),
(12, 'Aleksandar', 'Pekurar', 'acapaca@gmail.com', '123456a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slike1`
--

CREATE TABLE `slike1` (
  `id` int(11) NOT NULL,
  `src` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike1`
--

INSERT INTO `slike1` (`id`, `src`, `alt`) VALUES
(1, 'assets/images/coffeemaker.jpg', 'Coffee maker'),
(2, 'assets/images/drawing.jpg', 'Drawing'),
(3, 'assets/images/turkish.jpg', 'Turkish coffee'),
(4, 'assets/images/pouring.jpg', 'Pouring coffee');

-- --------------------------------------------------------

--
-- Table structure for table `slike2`
--

CREATE TABLE `slike2` (
  `id` int(11) NOT NULL,
  `src` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike2`
--

INSERT INTO `slike2` (`id`, `src`, `alt`) VALUES
(1, 'assets/images/prah.jpg', 'Powder'),
(2, 'assets/images/shot.jpg', 'Shot'),
(3, 'assets/images/machine.jpg', 'Machine'),
(4, 'assets/images/bluecup.jpg', 'Blue cup');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `uloga` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `uloga`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu1`
--
ALTER TABLE `menu1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `slike1`
--
ALTER TABLE `slike1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slike2`
--
ALTER TABLE `slike2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu1`
--
ALTER TABLE `menu1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slike1`
--
ALTER TABLE `slike1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slike2`
--
ALTER TABLE `slike2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registracija`
--
ALTER TABLE `registracija`
  ADD CONSTRAINT `registracija_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
